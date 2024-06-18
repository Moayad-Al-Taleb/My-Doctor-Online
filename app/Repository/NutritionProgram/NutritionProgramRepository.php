<?php

namespace App\Repository\NutritionProgram;

use App\Interfaces\NutritionProgram\NutritionProgramRepositoryInterface;
use App\Models\HealthCategory;
use App\Models\Illness;
use App\Models\NutritionProgram;
use App\Models\NutritionProgramMeal;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class NutritionProgramRepository implements NutritionProgramRepositoryInterface
{
    public function index()
    {
        $id = Auth::id();

        if (auth()->guard('web')->check()) {
            $nutritionPrograms = NutritionProgram::with(['doctor', 'healthCategory', 'illness'])
                ->where('user_id', $id)
                ->where('end_date', '>=', now()) // شرط لجلب المواعيد التي لم تنتهي
                ->orderBy('end_date', 'asc') // ترتيب تصاعدي حسب تاريخ الانتهاء
                ->get();

            return view('Dashboard.User.Nutrition-Program.index', compact('nutritionPrograms'));
        } elseif (auth()->guard('doctor')->check()) {
            $nutritionPrograms = NutritionProgram::with(['user', 'healthCategory', 'illness'])
                ->where('doctor_id', $id)
                ->orderBy('end_date', 'asc')
                ->get();

            return view('Dashboard.Doctor.Nutrition-Program.index', compact('nutritionPrograms'));
        }
    }

    public function create()
    {
        $id = Auth::id();

        // استرجاع المستخدمين الذين لديهم مواعيد مع الطبيب الحالي
        $users = User::whereHas('appointments', function ($query) use ($id) {
            $query->where('doctor_id', $id);
        })->get();

        $healthCategories = HealthCategory::all();
        $illnesses = Illness::all();

        return view('Dashboard.Doctor.Nutrition-Program.add', compact('users', 'healthCategories', 'illnesses'));
    }

    public function store($request)
    {
        try {
            $id = Auth::id();

            NutritionProgram::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'health_category_id' => $request->input('health_category_id'),
                'illness_id' => $request->input('illness_id'),
                'doctor_id' => $id,
                'user_id' => $request->input('user_id'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
            ]);
            session()->flash('add');
            return redirect()->route('Doctor.NutritionPrograms.index');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }

    public function show($id)
    {
        if (auth()->guard('doctor')->check()) {
            $doctor_id = Auth::id();

            $nutritionProgram = NutritionProgram::with(['healthCategory', 'illness'])->where('doctor_id', $doctor_id)->findOrFail($id);
            $nutritionProgramMeals = NutritionProgramMeal::where('nutrition_program_id', $nutritionProgram->id)->orderBy('meal_time')->get();

            return view('Dashboard.Doctor.Nutrition-Program.show', compact('nutritionProgram', 'nutritionProgramMeals'));

        } elseif (auth()->guard('web')->check()) {
            $user_id = Auth::id();

            $nutritionProgram = NutritionProgram::with(['healthCategory', 'illness'])->where('user_id', $user_id)->findOrFail($id);
            $nutritionProgramMeals = NutritionProgramMeal::where('nutrition_program_id', $nutritionProgram->id)->orderBy('meal_time')->get();

            return view('Dashboard.User.Nutrition-Program.show', compact('nutritionProgram', 'nutritionProgramMeals'));
        }

    }

    public function edit($id)
    {
        $doctor_id = Auth::id();

        // استرجاع المستخدمين الذين لديهم مواعيد مع الطبيب الحالي
        $users = User::whereHas('appointments', function ($query) use ($doctor_id) {
            $query->where('doctor_id', $doctor_id);
        })->get();

        $healthCategories = HealthCategory::all();
        $illnesses = Illness::all();

        $nutritionProgram = NutritionProgram::with(['user'])->findOrFail($id);

        return view('Dashboard.Doctor.Nutrition-Program.edit', compact('users', 'healthCategories', 'illnesses', 'nutritionProgram'));
    }

    public function update($request)
    {
        try {
            // الحصول على معرف المستخدم الحالي من الجلسة
            $id = Auth::id();

            // البحث عن برنامج التغذية الذي ينتمي إلى المستخدم الحالي بواسطة معرف البرنامج الوارد في الطلب
            $nutritionProgram = NutritionProgram::where('id', $id)->findOrFail($request->input('id'));

            // تحديث بيانات برنامج التغذية بالقيم الجديدة الواردة في الطلب
            $nutritionProgram->update([
                'name' => $request->input('name'), // تحديث اسم البرنامج
                'description' => $request->input('description'), // تحديث وصف البرنامج
                'health_category_id' => $request->input('health_category_id'), // تحديث معرف فئة الصحة
                'illness_id' => $request->input('illness_id'), // تحديث معرف المرض
                'doctor_id' => $id, // تحديث معرف الطبيب بالمستخدم الحالي
                'user_id' => $request->input('user_id'), // تحديث معرف المستخدم
                'start_date' => $request->input('start_date'), // تحديث تاريخ بدء البرنامج
                'end_date' => $request->input('end_date'), // تحديث تاريخ انتهاء البرنامج
            ]);

            // إعداد رسالة فلاش في الجلسة للإشارة إلى نجاح عملية التعديل
            session()->flash('edit');

            // إعادة التوجيه إلى صفحة فهرس برامج التغذية الخاصة بالطبيب
            return redirect()->route('Doctor.NutritionPrograms.index');
        } catch (\Exception $exception) {
            // في حالة حدوث خطأ، إعادة التوجيه إلى الصفحة السابقة مع عرض رسالة الخطأ
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            $id = Auth::id();

            if (auth()->guard('web')->check()) {
            } elseif (auth()->guard('doctor')->check()) {
                // التحقق مما إذا كانت قيمة page_id في الطلب تساوي 1
                if ($request->page_id == 1) {
                    // البحث عن برنامج التغذية الذي ينتمي إلى الطبيب المحدد بواسطة id وحذف البرنامج الذي يحمل المعرف الوارد في الطلب
                    $nutritionPrograms = NutritionProgram::where('doctor_id', $id)
                        ->findOrFail($request->input('id'))
                        ->delete();
                } else {
                    // تحويل سلسلة المعرفات المحذوفة (delete_select_id) إلى مصفوفة باستخدام الفاصلة كفاصل
                    $delete_select_id = explode(",", $request->delete_select_id);
                    // الحصول على البرامج التي تتطابق مع معرفات الطبيب المحدد
                    $programsToDelete = NutritionProgram::where('doctor_id', $id)
                        ->whereIn('id', $delete_select_id)
                        ->get();
                    // حذف البرامج التي تم العثور عليها
                    foreach ($programsToDelete as $program) {
                        $program->delete();
                    }
                }

                // إعداد رسالة جلسة (session flash message) للإشارة إلى نجاح عملية الحذف
                session()->flash('delete');

                // إعادة التوجيه إلى صفحة فهرس برامج التغذية الخاصة بالطبيب
                return redirect()->route('Doctor.NutritionPrograms.index');
            }

        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }

}