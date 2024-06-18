<?php

namespace App\Interfaces\NutritionalFactFile;

interface NutritionalFactFileRepositoryInterface
{
    public function create($id);

    public function store($request);

    public function destroy($request);
}