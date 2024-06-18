<?php

namespace App\Interfaces\Appointment;

interface AppointmentRepositoryInterface
{
    // id: Doctor Id Or User Id
    public function index($id);

    // id: Doctor Id
    public function create($id);

    public function store($request);

    public function update($request);

    public function destroy($request);
}