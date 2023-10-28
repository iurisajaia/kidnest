<?php

namespace App\Repositories\Interfaces;


use App\Http\Requests\Branch\CreateBranchRequest;
use App\Models\Branch;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

Interface BranchRepositoryInterface{
    public function getBranchesByKindergarten(Request $request): Collection;
    public function getBranchById(Request $request, $id): Model;
    public function create(CreateBranchRequest $request);
}
