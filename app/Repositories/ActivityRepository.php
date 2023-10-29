<?php

namespace App\Repositories;

use App\Enums\ActivityEnum;
use App\Enums\UserRoleEnum;
use App\Http\Requests\Activity\CreateActivityRequest;
use App\Http\Requests\Activity\UpdateActivityRequest;
use App\Models\Activity;
use App\Models\Staff;
use App\Repositories\Interfaces\ActivityRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ActivityRepository implements ActivityRepositoryInterface
{

    public function createPredefinedActivitiesForGroup($groupId, $userId)
    {
        foreach (ActivityEnum::ACTIVITIES as $activity){
             Activity::create([
                'title' => $activity['title'],
                'description' => $activity['description'],
                'group_id' => $groupId,
                'kindergarten_id' => $userId
            ]);
        }
    }

    public function getKindergartenId(CreateActivityRequest $request): int{
        if($request->user()->user_role_id === UserRoleEnum::KINDERGARTEN['id']){
            $id = $request->user()->id;
        }else{
            $staff = Staff::query()->where('user_id', $request->user()->id)->first();
            $id = $staff?->kindergarten_id;
        }
        return $id;
    }

    public function create(CreateActivityRequest $request) : JsonResponse{
        Activity::create([
            ...$request->only(['title', 'description', 'group_id']),
            'kindergarten_id' => $this->getKindergartenId($request)
        ]);

        return response()->json([
            'message' => 'Activity Created Successfully'
        ], 200);

    }

    public function update(UpdateActivityRequest $request, $id) : JsonResponse{
            $existing = Activity::query()->findOrFail($id);

            $existing['title'] = $request['title'];
            $existing['description'] = $request['description'];
            $existing->save();


        return response()->json([
            'message' => 'Activity Updated Successfully'
        ], 200);

    }


    public function delete(Request $request , $id, $ignoreJson = false): JsonResponse{
        $activity  = Activity::query()->where(['id' => $id, 'kindergarten_id' => $request->user()->id])->first();

        if(!$activity) return response()->json(['error' => 'Cannot find activity'], 404);

        $activity->delete();

        return response()->json([
            'message' => 'Activity Deleted Successfully'
        ], 200);

    }

}
