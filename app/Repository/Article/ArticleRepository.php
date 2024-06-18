<?php

namespace App\Repository\Article;

use App\Interfaces\Article\ArticleRepositoryInterface;
use App\Models\Article;
use App\Models\HealthCategory;
use App\Models\Illness;
use App\Traits\UploadTrait;

class ArticleRepository implements ArticleRepositoryInterface
{
    use UploadTrait;

    public function index()
    {
        if (auth()->guard('admin')->check()) {
            $articles = Article::with([
                'healthCategory',
                'illness',
                'doctor',
            ])->get();

            return view('Dashboard.Admin.Article.index', compact('articles'));
        } elseif (auth()->guard('doctor')->check()) {
            $articles = Article::with([
                'healthCategory',
                'illness',
            ])->where('doctor_id', auth()->id())->get();

            return view('Dashboard.Doctor.Article.index', compact('articles'));
        } elseif (auth()->guard('web')->check()) {
            $articles = Article::with([
                'healthCategory',
                'illness',
                'articleFiles',
            ])->where('status', 1)->get();

            return view('Dashboard.User.Article.index', compact('articles'));
        }
    }

    public function create()
    {
        $healthCategories = HealthCategory::all();
        $illnesses = Illness::all();

        return view('Dashboard.Doctor.Article.add', compact('healthCategories', 'illnesses'));
    }

    public function store($request)
    {
        try {
            Article::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'content' => $request->input('content'),
                'health_category_id' => $request->input('health_category_id'),
                'illness_id' => $request->input('illness_id'),
                'doctor_id' => auth()->id(),
            ]);
            session()->flash('add');
            return redirect()->route('Doctor.Articles.index');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }

    public function show($id)
    {
        if (auth()->guard('admin')->check()) {
            $article = Article::with([
                'healthCategory',
                'illness',
                'doctor',
                'articleFiles',
            ])->findOrFail($id);

            $articleFiles = $article->articleFiles;

            return view('Dashboard.Admin.Article.show', compact('article', 'articleFiles'));
        } elseif (auth()->guard('doctor')->check()) {
            $article = Article::with([
                'healthCategory',
                'illness',
                'articleFiles',
            ])->where('doctor_id', auth()->id())->findOrFail($id);

            $articleFiles = $article->articleFiles;

            return view('Dashboard.Doctor.Article.show', compact('article', 'articleFiles'));
        }

    }

    public function edit($id)
    {
        if (auth()->guard('admin')->check()) {
            $healthCategories = HealthCategory::all();
            $illnesses = Illness::all();
            $article = Article::with([
                'healthCategory',
                'illness',
            ])->findOrFail($id);

            return view('Dashboard.Admin.Article.edit', compact('healthCategories', 'illnesses', 'article'));
        } elseif (auth()->guard('doctor')->check()) {
            $healthCategories = HealthCategory::all();
            $illnesses = Illness::all();
            $article = Article::with([
                'healthCategory',
                'illness',
            ])->where('doctor_id', auth()->id())->findOrFail($id);

            return view('Dashboard.Doctor.Article.edit', compact('healthCategories', 'illnesses', 'article'));
        }
    }

    public function update($request)
    {
        try {
            if (auth()->guard('admin')->check()) {
                $article = Article::findOrFail($request->input('id'));
                $article->update([
                    'name' => $request->input('name'),
                    'description' => $request->input('description'),
                    'content' => $request->input('content'),
                    'health_category_id' => $request->input('health_category_id'),
                    'illness_id' => $request->input('illness_id'),
                ]);
                session()->flash('edit');
                return redirect()->route('Admin.Articles.index');
            } elseif (auth()->guard('doctor')->check()) {
                // where('doctor_id', auth()->id())
                $article = Article::where('doctor_id', auth()->id())->findOrFail($request->input('id'));
                $article->update([
                    'name' => $request->input('name'),
                    'description' => $request->input('description'),
                    'content' => $request->input('content'),
                    'health_category_id' => $request->input('health_category_id'),
                    'illness_id' => $request->input('illness_id'),
                    'doctor_id' => auth()->id(),
                ]);
                session()->flash('edit');
                return redirect()->route('Doctor.Articles.index');
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
                    $article = Article::with(['articleFiles'])->findOrFail($request->input('id'));
                    $articleFiles = $article->articleFiles;

                    foreach ($articleFiles as $articleFile) {
                        $file_path = $articleFile->file;
                        $file_extension = pathinfo($file_path, PATHINFO_EXTENSION);
                        if (in_array($file_extension, ['jpeg', 'png', 'gif', 'svg', 'jpg'])) {
                            $this->deleteFile($file_path, 'images');
                        } elseif (in_array($file_extension, ['mp4', 'avi', 'mov'])) {
                            $this->deleteFile($file_path, 'videos');
                        }
                    }

                    $article->delete();
                } else {
                    $delete_select_id = explode(",", $request->delete_select_id);
                    foreach ($delete_select_id as $article_id) {
                        $article = Article::with(['articleFiles'])->findOrFail($article_id);
                        $articleFiles = $article->articleFiles;

                        foreach ($articleFiles as $articleFile) {
                            $file_path = $articleFile->file;
                            $file_extension = pathinfo($file_path, PATHINFO_EXTENSION);
                            if (in_array($file_extension, ['jpeg', 'png', 'gif', 'svg', 'jpg'])) {
                                $this->deleteFile($file_path, 'images');
                            } elseif (in_array($file_extension, ['mp4', 'avi', 'mov'])) {
                                $this->deleteFile($file_path, 'videos');
                            }
                        }
                    }
                    Article::destroy($delete_select_id);
                }
                session()->flash('delete');
                return redirect()->route('Admin.Articles.index');
            } elseif (auth()->guard('doctor')->check()) {
                if ($request->page_id == 1) {
                    $article = Article::with(['articleFiles'])->where('doctor_id', auth()->id())->findOrFail($request->input('id'));
                    $articleFiles = $article->articleFiles;

                    foreach ($articleFiles as $articleFile) {
                        $file_path = $articleFile->file;
                        $file_extension = pathinfo($file_path, PATHINFO_EXTENSION);
                        if (in_array($file_extension, ['jpeg', 'png', 'gif', 'svg', 'jpg'])) {
                            $this->deleteFile($file_path, 'images');
                        } elseif (in_array($file_extension, ['mp4', 'avi', 'mov'])) {
                            $this->deleteFile($file_path, 'videos');
                        }
                    }

                    $article->delete();
                } else {
                    $delete_select_id = explode(",", $request->delete_select_id);
                    foreach ($delete_select_id as $article_id) {
                        $article = Article::with(['articleFiles'])->where('doctor_id', auth()->id())->findOrFail($article_id);
                        $articleFiles = $article->articleFiles;

                        foreach ($articleFiles as $articleFile) {
                            $file_path = $articleFile->file;
                            $file_extension = pathinfo($file_path, PATHINFO_EXTENSION);
                            if (in_array($file_extension, ['jpeg', 'png', 'gif', 'svg', 'jpg'])) {
                                $this->deleteFile($file_path, 'images');
                            } elseif (in_array($file_extension, ['mp4', 'avi', 'mov'])) {
                                $this->deleteFile($file_path, 'videos');
                            }
                        }
                    }
                    Article::destroy($delete_select_id);
                }
                session()->flash('delete');
                return redirect()->route('Doctor.Articles.index');
            }
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }

    public function update_status($request)
    {
        try {
            $article = Article::findOrFail($request->input('id'));
            $article->update([
                'status' => $request->input('status'),
            ]);
            session()->flash('edit');
            return redirect()->route('Admin.Articles.index');
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error' => $exception->getMessage()]);
        }
    }
}