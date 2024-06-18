<?php

namespace App\Repository\NutritionalFact;

use App\Interfaces\NutritionalFact\NutritionalFactRepositoryInterface;
use App\Models\NutritionalFact;
use App\Models\HealthCategory;
use App\Models\Illness;
use App\Traits\UploadTrait;

class NutritionalFactRepository implements NutritionalFactRepositoryInterface
{
    use UploadTrait;

    public function index()
    {
        if (auth()->guard('admin')->check()) {
            $nutritionalFacts = NutritionalFact::with([
                'healthCategory',
                'illness',
                'doctor',
            ])->get();

            return view('Dashboard.Admin.Nutritional-Fact.index', compact('nutritionalFacts'));
        } elseif (auth()->guard('doctor')->check()) {
            $nutritionalFacts = NutritionalFact::with([
                'healthCategory',
                'illness',
            ])->where('doctor_id', auth()->id())->get();

            return view('Dashboard.Doctor.Nutritional-Fact.index', compact('nutritionalFacts'));
        } elseif (auth()->guard('web')->check()) {
            $nutritionalFacts = NutritionalFact::with([
                'healthCategory',
                'illness',
                'nutritionalFactFiles',
            ])->where('status', 1)->get();

            return view('Dashboard.User.Nutritional-Fact.index', compact('nutritionalFacts'));
        }
    }

    public function create()
    {
        $healthCategories = HealthCategory::all();
        $illnesses = Illness::all();

        return view('Dashboard.Doctor.Nutritional-Fact.add', compact('healthCategories', 'illnesses'));
    }

    public function store($request)
    {
        try {
            NutritionalFact::create([
                'fact' => $request->input('fact'),
                'description' => $request->input('description'),
                'health_category_id' => $request->input('health_category_id'),
                'illness_id' => $request->input('illness_id'),
                'doctor_id' => auth()->id(),
            ]);
            session()->flash('add');
            return redirect()->route('Doctor.NutritionalFacts.index');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }

    public function show($id)
    {
        if (auth()->guard('admin')->check()) {
            $nutritionalFact = NutritionalFact::with([
                'healthCategory',
                'illness',
                'doctor',
                'nutritionalFactFiles',
            ])->findOrFail($id);

            $nutritionalFactFiles = $nutritionalFact->nutritionalFactFiles;

            return view('Dashboard.Admin.Nutritional-Fact.show', compact('nutritionalFact', 'nutritionalFactFiles'));
        } elseif (auth()->guard('doctor')->check()) {
            $nutritionalFact = NutritionalFact::with([
                'healthCategory',
                'illness',
                'nutritionalFactFiles',
            ])->where('doctor_id', auth()->id())->findOrFail($id);

            $nutritionalFactFiles = $nutritionalFact->nutritionalFactFiles;

            return view('Dashboard.Doctor.Nutritional-Fact.show', compact('nutritionalFact', 'nutritionalFactFiles'));
        }

    }

    public function edit($id)
    {
        if (auth()->guard('admin')->check()) {
            $healthCategories = HealthCategory::all();
            $illnesses = Illness::all();
            $nutritionalFact = NutritionalFact::with([
                'healthCategory',
                'illness',
            ])->findOrFail($id);

            return view('Dashboard.Admin.Nutritional-Fact.edit', compact('healthCategories', 'illnesses', 'nutritionalFact'));
        } elseif (auth()->guard('doctor')->check()) {
            $healthCategories = HealthCategory::all();
            $illnesses = Illness::all();
            $nutritionalFact = NutritionalFact::with([
                'healthCategory',
                'illness',
            ])->where('doctor_id', auth()->id())->findOrFail($id);

            return view('Dashboard.Doctor.Nutritional-Fact.edit', compact('healthCategories', 'illnesses', 'nutritionalFact'));
        }
    }

    public function update($request)
    {
        try {
            if (auth()->guard('admin')->check()) {
                $nutritionalFact = NutritionalFact::findOrFail($request->input('id'));
                $nutritionalFact->update([
                    'fact' => $request->input('fact'),
                    'description' => $request->input('description'),
                    'health_category_id' => $request->input('health_category_id'),
                    'illness_id' => $request->input('illness_id'),
                ]);
                session()->flash('edit');
                return redirect()->route('Admin.NutritionalFacts.index');
            } elseif (auth()->guard('doctor')->check()) {
                // where('doctor_id', auth()->id())
                $nutritionalFact = NutritionalFact::where('doctor_id', auth()->id())->findOrFail($request->input('id'));
                $nutritionalFact->update([
                    'fact' => $request->input('fact'),
                    'description' => $request->input('description'),
                    'health_category_id' => $request->input('health_category_id'),
                    'illness_id' => $request->input('illness_id'),
                    'doctor_id' => auth()->id(),
                ]);
                session()->flash('edit');
                return redirect()->route('Doctor.NutritionalFacts.index');
            }
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            if (auth()->guard('admin')->check()) {
                if ($request->page_id == 1) {
                    $nutritionalFact = NutritionalFact::with(['nutritionalFactFiles'])->findOrFail($request->input('id'));
                    $nutritionalFactFiles = $nutritionalFact->nutritionalFactFiles;

                    foreach ($nutritionalFactFiles as $nutritionalFactFile) {
                        $file_path = $nutritionalFactFile->file;
                        $file_extension = pathinfo($file_path, PATHINFO_EXTENSION);
                        if (in_array($file_extension, ['jpeg', 'png', 'gif', 'svg', 'jpg'])) {
                            $this->deleteFile($file_path, 'images');
                        } elseif (in_array($file_extension, ['mp4', 'avi', 'mov'])) {
                            $this->deleteFile($file_path, 'videos');
                        }
                    }

                    $nutritionalFact->delete();
                } else {
                    $delete_select_id = explode(",", $request->delete_select_id);
                    foreach ($delete_select_id as $nutritionalFact_id) {
                        $nutritionalFact = NutritionalFact::with(['nutritionalFactFiles'])->findOrFail($nutritionalFact_id);
                        $nutritionalFactFiles = $nutritionalFact->nutritionalFactFiles;

                        foreach ($nutritionalFactFiles as $nutritionalFactFile) {
                            $file_path = $nutritionalFactFile->file;
                            $file_extension = pathinfo($file_path, PATHINFO_EXTENSION);
                            if (in_array($file_extension, ['jpeg', 'png', 'gif', 'svg', 'jpg'])) {
                                $this->deleteFile($file_path, 'images');
                            } elseif (in_array($file_extension, ['mp4', 'avi', 'mov'])) {
                                $this->deleteFile($file_path, 'videos');
                            }
                        }
                    }
                    NutritionalFact::destroy($delete_select_id);
                }
                session()->flash('delete');
                return redirect()->route('Admin.NutritionalFacts.index');
            } elseif (auth()->guard('doctor')->check()) {
                if ($request->page_id == 1) {
                    $nutritionalFact = NutritionalFact::with(['nutritionalFactFiles'])->where('doctor_id', auth()->id())->findOrFail($request->input('id'));
                    $nutritionalFactFiles = $nutritionalFact->nutritionalFactFiles;

                    foreach ($nutritionalFactFiles as $nutritionalFactFile) {
                        $file_path = $nutritionalFactFile->file;
                        $file_extension = pathinfo($file_path, PATHINFO_EXTENSION);
                        if (in_array($file_extension, ['jpeg', 'png', 'gif', 'svg', 'jpg'])) {
                            $this->deleteFile($file_path, 'images');
                        } elseif (in_array($file_extension, ['mp4', 'avi', 'mov'])) {
                            $this->deleteFile($file_path, 'videos');
                        }
                    }

                    $nutritionalFact->delete();
                } else {
                    $delete_select_id = explode(",", $request->delete_select_id);
                    foreach ($delete_select_id as $nutritional_fact_id) {
                        $nutritionalFact = NutritionalFact::with(['nutritionalFactFiles'])->where('doctor_id', auth()->id())->findOrFail($nutritional_fact_id);
                        $nutritionalFactFiles = $nutritionalFact->nutritionalFactFiles;

                        foreach ($nutritionalFactFiles as $nutritionalFactFile) {
                            $file_path = $nutritionalFactFile->file;
                            $file_extension = pathinfo($file_path, PATHINFO_EXTENSION);
                            if (in_array($file_extension, ['jpeg', 'png', 'gif', 'svg', 'jpg'])) {
                                $this->deleteFile($file_path, 'images');
                            } elseif (in_array($file_extension, ['mp4', 'avi', 'mov'])) {
                                $this->deleteFile($file_path, 'videos');
                            }
                        }
                    }
                    NutritionalFact::destroy($delete_select_id);
                }
                session()->flash('delete');
                return redirect()->route('Doctor.NutritionalFacts.index');
            }
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }

    public function update_status($request)
    {
        try {
            $nutritionalFact = NutritionalFact::findOrFail($request->input('id'));
            $nutritionalFact->update([
                'status' => $request->input('status'),
            ]);
            session()->flash('edit');
            return redirect()->route('Admin.NutritionalFacts.index');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }
}