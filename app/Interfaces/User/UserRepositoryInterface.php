<?php

namespace App\Interfaces\User;

interface UserRepositoryInterface
{
    public function index();

    public function show($id);

    public function edit($id);

    public function update($request);

    public function destroy($request);

    public function edit_password($id);

    public function update_password($request);

    public function update_status($request);
}