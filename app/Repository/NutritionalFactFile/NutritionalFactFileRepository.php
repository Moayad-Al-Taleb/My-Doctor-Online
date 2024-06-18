<?php

namespace App\Repository\NutritionalFactFile;

use App\Interfaces\NutritionalFactFile\NutritionalFactFileRepositoryInterface;
use App\Models\NutritionalFact;
use App\Models\NutritionalFactFile;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\Auth;

class NutritionalFactFileRepository implements NutritionalFactFileRepositoryInterface
{
    use UploadTrait;

    public function create($id)
    {
        $nutritional_fact_id = NutritionalFact::where('doctor_id', auth()->id())->where('id', $id)->pluck('id')->first();
        return view('Dashboard.Doctor.Nutritional-Fact.Nutritional-Fact-File.add', compact('nutritional_fact_id'));
    }

    public function store($request)
    {
        try {
            $nutritional_fact_id = $request->input('nutritional_fact_id');

            $nutritionalFactFileData = $request->all();

            if ($request->hasFile('file')) {
                $file = $request->file('file');

                $nutritionalFact = NutritionalFact::where('id', $request->nutritional_fact_id)->first();
                $originalName = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $newName = pathinfo($originalName, PATHINFO_FILENAME) . '_' . $nutritionalFact->name . '_' . date('Y.m.d_His') . '.' . $extension;

                if (in_array($extension, ['jpeg', 'png', 'gif', 'svg', 'jpg'])) {

                    $path = $file->storeAs('Nutritional-Fact', $newName, 'images');
                    $nutritionalFactFileData['file'] = $path;
                    $nutritionalFactFileData['type'] = 1;

                } elseif (in_array($extension, ['mp4', 'avi', 'mov'])) {

                    $path = $file->storeAs('Nutritional-Fact', $newName, 'videos');
                    $nutritionalFactFileData['file'] = $path;
                    $nutritionalFactFileData['type'] = 2;

                }
            }

            NutritionalFactFile::create($nutritionalFactFileData);

            session()->flash('add');
            return redirect()->route('Doctor.NutritionalFacts.show', ['NutritionalFact' => $nutritional_fact_id]);
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            if (auth()->guard('admin')->check()) {
                $nutritional_fact_id = $request->input('nutritional_fact_id');

                $nutritionalFactFileId = $request->input('id');

                $nutritionalFactFile = NutritionalFactFile::findOrFail($nutritionalFactFileId);

                $file_path = $nutritionalFactFile->file;
                $file_extension = pathinfo($file_path, PATHINFO_EXTENSION);
                if (in_array($file_extension, ['jpeg', 'png', 'gif', 'svg', 'jpg'])) {
                    $this->deleteFile($file_path, 'images');
                } elseif (in_array($file_extension, ['mp4', 'avi', 'mov'])) {
                    $this->deleteFile($file_path, 'videos');
                }

                $nutritionalFactFile->delete();

                session()->flash('delete');
                return redirect()->route('Admin.NutritionalFacts.show', ['NutritionalFact' => $nutritional_fact_id]);

            } elseif (auth()->guard('doctor')->check()) {
                $nutritional_fact_id = $request->input('nutritional_fact_id');

                $nutritionalFactFileId = $request->input('id');
                $doctorId = Auth::id();

                $nutritionalFactFile = NutritionalFactFile::whereHas('nutritionalFact', function ($query) use ($doctorId) {
                    $query->where('doctor_id', $doctorId);
                })->findOrFail($nutritionalFactFileId);

                $file_path = $nutritionalFactFile->file;
                $file_extension = pathinfo($file_path, PATHINFO_EXTENSION);
                if (in_array($file_extension, ['jpeg', 'png', 'gif', 'svg', 'jpg'])) {
                    $this->deleteFile($file_path, 'images');
                } elseif (in_array($file_extension, ['mp4', 'avi', 'mov'])) {
                    $this->deleteFile($file_path, 'videos');
                }

                $nutritionalFactFile->delete();

                session()->flash('delete');
                return redirect()->route('Doctor.NutritionalFacts.show', ['NutritionalFact' => $nutritional_fact_id]);
            }
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }
}