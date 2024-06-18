<?php

namespace App\Repository\User;

use App\Interfaces\User\UserRepositoryInterface;
use App\Models\User;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    use UploadTrait;

    public function index()
    {
        $users = User::all();
        return view('Dashboard.Admin.User.index', compact('users'));
    }

    public function show($id)
    {
        if (auth()->guard('admin')->check()) {
            $user = User::findOrFail($id);
            return view('Dashboard.Admin.User.show', compact('user'));
        } elseif (auth()->guard('doctor')->check()) {
            $user = User::findOrFail($id);
            return view('Dashboard.Doctor.User.show', compact('user'));
        }

    }

    public function edit($id)
    {
        $user = User::where('id', auth()->id())->findOrFail($id);
        return view('Dashboard.User.update_profile', compact('user'));
    }

    public function update($request)
    {
        try {
            // استخراج معرف المستخدم من الطلب
            $user_id = $request->input('id');

            // جلب المستخدم بواسطة المعرف، مع التأكد من أنه ينتمي إلى المستخدم المصادق عليه
            $user = User::where('id', auth()->id())->findOrFail($request->input('id'));

            // تحويل بيانات المستخدم إلى مصفوفة
            $userData = $user->toArray();

            // تحديث صورة الملف الشخصي إذا تم توفيرها في الطلب
            if ($request->hasFile('profile_picture')) {

                // حذف الصورة الشخصية الحالية إذا كانت موجودة
                if ($user->profile_picture) {
                    $this->deleteFile($user->profile_picture, 'images');
                }

                // معالجة الصورة الشخصية المُرفقة
                $profile_picture = $request->file('profile_picture');
                $originalName = $profile_picture->getClientOriginalName();
                $extension = $profile_picture->getClientOriginalExtension();
                $newName = pathinfo($originalName, PATHINFO_FILENAME) . '_' . $request->name . '_' . date('Y.m.d_His') . '.' . $extension;

                // التحقق مما إذا كان امتداد الملف صالحًا
                if (in_array($extension, ['jpeg', 'png', 'gif', 'svg', 'jpg'])) {
                    // تخزين صورة الملف الشخصي وتحديث بيانات المستخدم
                    $path = $profile_picture->storeAs('User', $newName, 'images');
                    $userData['profile_picture'] = $path;
                }
            }

            // تحديث صورة بطاقة الهوية إذا تم توفيرها في الطلب
            if ($request->hasFile('id_card_picture')) {

                // حذف صورة بطاقة الهوية الحالية إذا كانت موجودة
                if ($user->id_card_picture) {
                    $this->deleteFile($user->id_card_picture, 'images');
                }

                // معالجة صورة بطاقة الهوية المُرفقة
                $id_card_picture = $request->file('id_card_picture');
                $originalName = $id_card_picture->getClientOriginalName();
                $extension = $id_card_picture->getClientOriginalExtension();
                $newName = pathinfo($originalName, PATHINFO_FILENAME) . '_' . $request->name . '_' . date('Y.m.d_His') . '.' . $extension;

                // التحقق مما إذا كان امتداد الملف صالحًا
                if (in_array($extension, ['jpeg', 'png', 'gif', 'svg', 'jpg'])) {
                    // تخزين صورة بطاقة الهوية وتحديث بيانات المستخدم
                    $path = $id_card_picture->storeAs('User', $newName, 'images');
                    $userData['id_card_picture'] = $path;
                }
            }

            // تحديث بيانات المستخدم في قاعدة البيانات
            $user->update($userData);

            // عرض رسالة نجاح مؤقتة وإعادة التوجيه إلى صفحة التحرير
            session()->flash('edit');
            return redirect()->route('User.Users.edit', ['User' => $user_id]);
        } catch (\Exception $exception) {
            // إعادة التوجيه إلى الصفحة السابقة في حالة حدوث خطأ مع رسالة الخطأ
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            if ($request->page_id == 1) {
                $user = User::findOrFail($request->input('id'));

                if ($user->profile_picture) {
                    $this->deleteFile($user->profile_picture, 'images');
                }
                if ($user->id_card_picture) {
                    $this->deleteFile($user->id_card_picture, 'images');
                }

                $user->delete();
            } else {
                $delete_select_id = explode(",", $request->delete_select_id);
                foreach ($delete_select_id as $user_id) {
                    $user = User::findOrFail($user_id);

                    if ($user->profile_picture) {
                        $this->deleteFile($user->profile_picture, 'images');
                    }
                    if ($user->id_card_picture) {
                        $this->deleteFile($user->id_card_picture, 'images');
                    }

                }
                User::destroy($delete_select_id);
            }
            session()->flash('delete');
            return redirect()->route('Admin.Users.index');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }

    }

    public function edit_password($id)
    {
        $user = User::where('id', auth()->id())->findOrFail($id);
        return view('Dashboard.User.update_password', compact('user'));
    }

    public function update_password($request)
    {
        try {
            if (auth()->guard('admin')->check()) {
                $user = User::findorfail($request->input('id'));

                $user->update([
                    'password' => Hash::make($request->password)
                ]);

                session()->flash('edit');
                return redirect()->route('Admin.Users.index');
            } elseif (auth()->guard('web')->check()) {
                $user_id = $request->input('id');

                $user = User::where('id', auth()->id())->findOrFail($request->input('id'));

                $user->update([
                    'password' => Hash::make($request->password)
                ]);

                session()->flash('edit');
                return redirect()->route('User.Users.edit_password', ['User' => $user_id]);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function update_status($request)
    {
        try {
            $user = User::findOrFail($request->input('id'));
            $user->update([
                'status' => $request->input('status'),
            ]);
            session()->flash('edit');
            return redirect()->route('Admin.Users.index');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }

    }
}