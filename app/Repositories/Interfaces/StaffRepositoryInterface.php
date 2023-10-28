<?php

namespace App\Repositories\Interfaces;


use App\Http\Requests\Staff\CreateStaffRequest;
use Illuminate\Http\Request;

Interface StaffRepositoryInterface{
    public function delete($id);
    public function create(CreateStaffRequest $request);
    public function update(CreateStaffRequest $request, $id);
}
