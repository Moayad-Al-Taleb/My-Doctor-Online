<?php

namespace App\Interfaces\ArticleFile;

interface ArticleFileRepositoryInterface
{
    public function create($id);

    public function store($request);

    public function destroy($request);
}