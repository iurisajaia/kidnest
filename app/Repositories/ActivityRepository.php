<?php

namespace App\Repositories;

use App\Enums\ActivityEnum;
use App\Enums\UserRoleEnum;
use App\Http\Requests\Activity\CreateActivityNotificationRequest;
use App\Http\Requests\Activity\CreateActivityRequest;
use App\Http\Requests\Activity\UpdateActivityRequest;
use App\Models\Activity;
use App\Models\ActivityNotification;
use App\Models\Attendance;
use App\Models\Kid;
use App\Models\Staff;
use App\Models\User;
use App\Repositories\Interfaces\ActivityRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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

    public function getActivityNotifications(Request $request): Collection
    {
        return ActivityNotification::query()
            ->where('parent_id', $request->user()->id)
            ->with(['activity', 'group', 'staff'])
            ->orderByDesc('id')
            ->get();

    }

    public function createNotification(CreateActivityNotificationRequest $request): JsonResponse{
        foreach ($request->parent_id as $parent){
            $parentUser = User::query()->findOrFail($parent);
            $phone = $parentUser['user_data']['phone_number'];

            $newActivity = ActivityNotification::create([
                ...$request->except('parent_id', '_token'),
                'parent_id' => $parent
            ]);

            $activityNotification = ActivityNotification::with(['parent', 'staff', 'group', 'group.kindergarten', 'activity'])->findOrFail($newActivity->id);

            if($phone){
                $token = '240|pkBuftIvI59BjVnSoCzdnZ9GEOeCNYWero6jSdeZ';

                $dataToSend = [
                    'subject' => $activityNotification->group->kinderGarten->name ?? 'Morty',
                    'message' => $activityNotification->activity->title . ' - ' . $activityNotification->activity->description,
                    'phone_numbers' => [
                        $phone
                    ]
                ];

                Http::withHeaders([
                    'Authorization' => 'Bearer ' . $token,
                    'accept' => 'application/json',
                    'Content-Type' => 'application/json'
                ])->post('https://smsservice.inexphone.ge/api/v1/sms/bulk', $dataToSend);
            }

            // create attendance
            if($activityNotification->activity->key === 'kindergarten_visit'){
                $kid = $parentUser->kids()->first();
                $newAttendance = Attendance::create([
                    'kindergarten_id' => $activityNotification->group->kindergarten_id,
                    'group_id' => $activityNotification->group->id,
                    'branch_id' => $activityNotification->group->branch_id,
                    'kid_id' => $kid->id,
                    'attended' => true
                ]);
                $newAttendance->save();
            }

//            event(new SendNotification($activityNotification));

        }
        return response()->json(['message' => 'Notification sent successfully'], 200);
    }

}
