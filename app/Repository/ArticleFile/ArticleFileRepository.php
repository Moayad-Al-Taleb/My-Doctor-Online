<?php

namespace App\Repository\ArticleFile;

use App\Interfaces\ArticleFile\ArticleFileRepositoryInterface;
use App\Models\Article;
use App\Models\ArticleFile;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\Auth;

class ArticleFileRepository implements ArticleFileRepositoryInterface
{
    use UploadTrait;

    public function create($id)
    {
        $article_id = Article::where('doctor_id', auth()->id())->where('id', $id)->pluck('id')->first();
        return view('Dashboard.Doctor.Article.Article-File.add', compact('article_id'));
    }

    public function store($request)
    {
        try {
            $article_id = $request->input('article_id');

            $articleFileData = $request->all();

            if ($request->hasFile('file')) {
                $file = $request->file('file');

                $article = Article::where('id', $request->article_id)->first();
                $originalName = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $newName = pathinfo($originalName, PATHINFO_FILENAME) . '_' . $article->name . '_' . date('Y.m.d_His') . '.' . $extension;

                if (in_array($extension, ['jpeg', 'png', 'gif', 'svg', 'jpg'])) {

                    $path = $file->storeAs('Article', $newName, 'images');
                    $articleFileData['file'] = $path;
                    $articleFileData['type'] = 1;

                } elseif (in_array($extension, ['mp4', 'avi', 'mov'])) {

                    $path = $file->storeAs('Article', $newName, 'videos');
                    $articleFileData['file'] = $path;
                    $articleFileData['type'] = 2;

                }
            }

            ArticleFile::create($articleFileData);

            session()->flash('add');
            return redirect()->route('Doctor.Articles.show', ['Article' => $article_id]);
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            if (auth()->guard('admin')->check()) {
                $article_id = $request->input('article_id');

                $articleFileId = $request->input('id');

                $articleFile = ArticleFile::findOrFail($articleFileId);

                $file_path = $articleFile->file;
                $file_extension = pathinfo($file_path, PATHINFO_EXTENSION);
                if (in_array($file_extension, ['jpeg', 'png', 'gif', 'svg', 'jpg'])) {
                    $this->deleteFile($file_path, 'images');
                } elseif (in_array($file_extension, ['mp4', 'avi', 'mov'])) {
                    $this->deleteFile($file_path, 'videos');
                }

                $articleFile->delete();

                session()->flash('delete');
                return redirect()->route('Admin.Articles.show', ['Article' => $article_id]);

            } elseif (auth()->guard('doctor')->check()) {
                $article_id = $request->input('article_id');

                $articleFileId = $request->input('id');
                $doctorId = Auth::id();

                $articleFile = ArticleFile::whereHas('article', function ($query) use ($doctorId) {
                    $query->where('doctor_id', $doctorId);
                })->findOrFail($articleFileId);

                $file_path = $articleFile->file;
                $file_extension = pathinfo($file_path, PATHINFO_EXTENSION);
                if (in_array($file_extension, ['jpeg', 'png', 'gif', 'svg', 'jpg'])) {
                    $this->deleteFile($file_path, 'images');
                } elseif (in_array($file_extension, ['mp4', 'avi', 'mov'])) {
                    $this->deleteFile($file_path, 'videos');
                }

                $articleFile->delete();

                session()->flash('delete');
                return redirect()->route('Doctor.Articles.show', ['Article' => $article_id]);
            }
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }
}