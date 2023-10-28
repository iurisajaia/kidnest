<?php

namespace App\Repositories\Interfaces;


use App\Http\Requests\Group\CreateGroupRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

Interface GroupRepositoryInterface{
    public function show(Request $request, $id);
    public function getGroupsByBranchId(Request $request, $branchId);
    public function getGroupById(Request $request, $id);
    public function getAges();

    public function delete(Request $request , $id);
    public function store(CreateGroupRequest $request);
    public function update(CreateGroupRequest $request, $id);
}
