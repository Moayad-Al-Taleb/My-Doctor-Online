<?php

namespace App\Interfaces\NutritionalFact;

interface NutritionalFactRepositoryInterface
{
    public function index();

    public function create();

    public function store($request);

    public function show($id);

    public function edit($id);

    public function update($request);

    public function destroy($request);

    public function update_status($request);
}