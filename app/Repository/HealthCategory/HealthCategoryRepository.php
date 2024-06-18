<?php

namespace App\Repository\HealthCategory;

use App\Interfaces\HealthCategory\HealthCategoryRepositoryInterface;
use App\Models\HealthCategory;
use App\Traits\UploadTrait;

class HealthCategoryRepository implements HealthCategoryRepositoryInterface
{
    public function index()
    {
        $healthCategories = HealthCategory::all();
        return view('Dashboard.Admin.Health-Category.index', compact('healthCategories'));
    }
    public function store($request)
    {
        try {
            HealthCategory::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
            ]);
            session()->flash('add');
            return redirect()->route('Admin.HealthCategories.index');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }

    public function update($request)
    {
        try {
            $healthCategory = HealthCategory::findOrFail($request->input('id'));
            $healthCategory->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
            ]);
            session()->flash('edit');
            return redirect()->route('Admin.HealthCategories.index');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            $healthCategory = HealthCategory::findOrFail($request->input('id'))->delete();
            session()->flash('delete');
            return redirect()->route('Admin.HealthCategories.index');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }

    }
}