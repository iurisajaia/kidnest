<?php

namespace App\Repositories;

use App\Http\Requests\Branch\CreateBranchRequest;
use App\Models\Branch;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
//use App\Http\Requests\Branch\CreateBranchRequest;
use App\Repositories\Interfaces\BranchRepositoryInterface;
use Illuminate\Http\Request;


class BranchRepository implements  BranchRepositoryInterface {


    public function getBranchById(Request $request, $id): Model {
        return Branch::query()->where('kindergarten_id' , $request->user()->id)->findOrFail($id);
    }

    public function getBranchesByKindergarten(Request $request): Collection
    {
        return Branch::where('kindergarten_id', $request->user()->id)
            ->orderByDesc('id')
            ->get();
    }

    public function create(CreateBranchRequest $request) : JsonResponse{
        Branch::create([
            ...$request->all(),
            'kindergarten_id' => $request->user()->id
        ]);

        return response()->json([
            'message' => 'Branch Created Successfully'
        ], 200);

    }

}
