<?php

namespace App\Interfaces\HealthCategory;

interface HealthCategoryRepositoryInterface
{
    public function index();

    public function store($request);

    public function update($request);

    public function destroy($request);
}