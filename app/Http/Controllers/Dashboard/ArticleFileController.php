<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\ArticleFile\ArticleFileRepositoryInterface;
use Illuminate\Http\Request;

class ArticleFileController extends Controller
{
    private $articleFileRepository;

    public function __construct(ArticleFileRepositoryInterface $articleFileRepository)
    {
        $this->articleFileRepository = $articleFileRepository;
    }

    public function create($id)
    {
        return $this->articleFileRepository->create($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimetypes:image/jpeg,image/png,image/jpg,image/gif,video/mp4,video/mpeg,video/quicktime|max:100000', // 2048
            'article_id' => 'required|exists:articles,id',
        ]);

        return $this->articleFileRepository->store($request);
    }

    public function destroy(Request $request)
    {
        return $this->articleFileRepository->destroy($request);
    }
}
