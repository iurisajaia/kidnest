<?php

namespace App\Repositories;

use App\Http\Requests\Branch\CreateBranchRequest;
use App\Http\Requests\Group\CreateGroupRequest;
use App\Models\Branch;
use App\Models\Group;
use App\Models\KidAge;
use App\Repositories\Interfaces\ActivityRepositoryInterface;
use App\Repositories\Interfaces\GroupRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
//use App\Http\Requests\Branch\CreateBranchRequest;
use App\Repositories\Interfaces\BranchRepositoryInterface;
use Illuminate\Http\Request;


class GroupRepository implements  GroupRepositoryInterface {

    private ActivityRepositoryInterface $activityRepository;

    public function __construct(
        ActivityRepositoryInterface $activityRepository,
    ){
        $this->activityRepository = $activityRepository;
    }

    public function getGroupsByBranchId(Request $request, $branchId): Collection
    {
        return Group::where(['kindergarten_id' => $request->user()->id, 'branch_id' => $branchId])->with('age')->orderByDesc('id')->get();
    }

    public function show(Request $request, $id, $ignoreJson = false){

        return Group::query()->where('kindergarten_id' , $request->user()->id)->with(['staff', 'staff.user', 'kids'])->findOrFail($id);

    }

    public function getGroupById(Request $request, $id): Collection
    {
        return Group::where(['kindergarten_id' => $request->user()->id, 'id' => $id])->firstOrFail();
    }

    public function getAges(): Collection {
        return KidAge::query()->orderByDesc('id')->get();
    }

    public function store(CreateGroupRequest $request): JsonResponse {
        $group = Group::create([
            ...$request->all(),
            'kindergarten_id' => $request->user()->id
        ]);

        $this->activityRepository->createPredefinedActivitiesForGroup($group->id, $request->user()->id);

        return response()->json([
            'message' => 'Group Created Successfully',
            'data' => $group
        ], 200);
    }



    public function update(CreateGroupRequest $request, $id): JsonResponse {
        $group = Group::where('id', $id)
            ->where('kindergarten_id' , $request->user()->id)
            ->update($request->except(['_method', '_token']));

        return response()->json([
            'message' => 'Group Updated Successfully',
            'data' => $group
        ], 200);
    }

    public function delete(Request $request , $id): JsonResponse {
        $group = Group::query()->findOrFail($id);
        $group->delete();
        return response()->json([
            'message' => 'Group Deleted Successfully',
            'data' => $group
        ], 200);
    }

    public function getGroupsWithActivities(Request $request): Collection
    {
        return Group::where(['kindergarten_id' => $request->user()->id])->with(['activities' => function($q){
            $q->orderByDesc('id');
        }, 'branch'])->orderByDesc('id')->get();
    }

}
