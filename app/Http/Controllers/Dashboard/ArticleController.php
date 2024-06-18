<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\Article\ArticleRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ArticleController extends Controller
{
    private $articleRepository;

    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function index()
    {
        return $this->articleRepository->index();
    }

    public function create()
    {
        return $this->articleRepository->create();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:article_translations|max:255',
            'description' => 'required|max:65535',
            'content' => 'required|max:65535',
            'health_category_id' => 'exists:health_categories,id',
            'illness_id' => 'exists:illnesses,id',
        ]);

        return $this->articleRepository->store($request);
    }

    public function show($id)
    {
        return $this->articleRepository->show($id);
    }

    public function edit($id)
    {
        return $this->articleRepository->edit($id);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                Rule::unique('article_translations')->ignore($request->input('id')),
                'max:255',
            ],
            'description' => 'required|max:65535',
            'content' => 'required|max:65535',
            'health_category_id' => 'nullable|exists:health_categories,id',
            'illness_id' => 'nullable|exists:illnesses,id',
        ]);

        return $this->articleRepository->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->articleRepository->destroy($request);
    }

    public function update_status(Request $request)
    {
        $request->validate([
            'status' => 'required|in:0,1|numeric'
        ]);

        return $this->articleRepository->update_status($request);
    }
}
