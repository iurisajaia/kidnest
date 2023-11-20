<?php

namespace App\Repositories;

use App\Http\Requests\Branch\CreateBranchRequest;
use App\Http\Requests\Group\CreateGroupRequest;
use App\Models\Branch;
use App\Models\Group;
use App\Models\KidAge;
use App\Repositories\Interfaces\ActivityRepositoryInterface;
use App\Repositories\Interfaces\GroupRepositoryInterface;
use App\Repositories\Interfaces\StaffRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
//use App\Http\Requests\Branch\CreateBranchRequest;
use App\Repositories\Interfaces\BranchRepositoryInterface;
use Illuminate\Http\Request;


class GroupRepository implements  GroupRepositoryInterface {

    private ActivityRepositoryInterface $activityRepository;
    private StaffRepositoryInterface $staffRepository;

    public function __construct(
        ActivityRepositoryInterface $activityRepository,
        StaffRepositoryInterface $staffRepository
    ){
        $this->activityRepository = $activityRepository;
        $this->staffRepository = $staffRepository;
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
        return Group::where(['kindergarten_id' => $request->user()->id])->with(['activities', 'branch'])->orderByDesc('id')->get();
    }

    public function getGroupWithActivities(int $id): Model
    {
        return Group::where('id', $id)->with(['activities' => function($q){
            $q->orderByDesc('id');
        }, 'branch', 'kids', 'kids.parents'])->orderByDesc('id')->first();
    }

    public function getGroupByAuthUser(Request $request): Model
    {
        if($request->user()->isEducator()){
            $staff = $this->staffRepository->getStaffByUserId($request->user()->id);


            return $this->getGroupWithActivities($staff->group_id);
        }

        if($request->user()->isParent()){
            return $this->getGroupWithActivities($request->user()?->kids()?->first()?->group_id);
        }


       return Group::query()->first();
    }



}
