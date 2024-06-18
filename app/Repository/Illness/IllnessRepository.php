<?php

namespace App\Repository\Illness;

use App\Interfaces\Illness\IllnessRepositoryInterface;
use App\Models\Illness;
use App\Traits\UploadTrait;

class IllnessRepository implements IllnessRepositoryInterface
{
    public function index()
    {
        $illnesses = Illness::all();
        return view('Dashboard.Admin.Illness.index', compact('illnesses'));
    }
    public function store($request)
    {
        try {
            Illness::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
            ]);
            session()->flash('add');
            return redirect()->route('Admin.Illnesses.index');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }

    public function update($request)
    {
        try {
            $illness = Illness::findOrFail($request->input('id'));
            $illness->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
            ]);
            session()->flash('edit');
            return redirect()->route('Admin.Illnesses.index');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            $illness = Illness::findOrFail($request->input('id'))->delete();
            session()->flash('delete');
            return redirect()->route('Admin.Illnesses.index');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }

}