<?php

namespace App\Interfaces\DoctorImage;

interface DoctorImageRepositoryInterface
{
    public function create($id);

    public function store($request);

    public function destroy($request);
}