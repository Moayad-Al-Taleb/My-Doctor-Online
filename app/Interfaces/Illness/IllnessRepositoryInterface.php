<?php

namespace App\Interfaces\Illness;

interface IllnessRepositoryInterface
{
    public function index();

    public function store($request);

    public function update($request);

    public function destroy($request);
}