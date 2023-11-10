<?php

namespace App\Http\Controllers;

use App\Http\Requests\Activity\CreateActivityNotificationRequest;
use App\Http\Requests\Activity\CreateActivityRequest;
use App\Http\Requests\Activity\UpdateActivityRequest;
use App\Repositories\Interfaces\ActivityRepositoryInterface;
use App\Repositories\Interfaces\GroupRepositoryInterface;
use App\Repositories\Interfaces\StaffRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class ActivityController extends Controller
{

    private GroupRepositoryInterface $groupRepository;
    private ActivityRepositoryInterface $activityRepository;
    private StaffRepositoryInterface $staffRepository;


    public function __construct(
        GroupRepositoryInterface $groupRepository,
        ActivityRepositoryInterface $activityRepository,
        StaffRepositoryInterface $staffRepository

    )
    {
        $this->groupRepository = $groupRepository;
        $this->activityRepository = $activityRepository;
        $this->staffRepository = $staffRepository;

    }

    public function index(Request $request): View|JsonResponse
    {
        if($request->user()->isKindergarten()){
            $groups = $this->groupRepository->getGroupsWithActivities($request);
            return view('pages.activity.index')->with(['groups' => $groups]);
        }

        if($request->user()->isEducator()){
            $staff = $this->staffRepository->getStaffByUserId($request->user()->id);
            $group = $this->groupRepository->getGroupWithActivities($staff->group_id);
            return view('pages.activity.educator.index')->with(['group' => $group, 'staff' => $staff]);
        }

//        if($request->user()->isParent()){
            $notifications = $this->activityRepository->getActivityNotifications($request);

            if($request->wantsJson()){
                return response()->json([
                    'status' => true,
                    'notifications' => $notifications
                ]);
            }
            return view('pages.activity.parent.index')->with(['notifications' => $notifications]);
//        }

    }

    public function send(CreateActivityNotificationRequest $request): RedirectResponse{
        $this->activityRepository->createNotification($request);
        Session::flash('success','აქტივობა გაეგზავნა მშობლებს');
        return redirect()->back();
    }

    public function store(CreateActivityRequest $request): RedirectResponse{
        $this->activityRepository->create($request);
        Session::flash('success', 'ახალი აქტივობა წარმატებით დაემატა');
        return redirect()->back();
    }
    public function update(UpdateActivityRequest $request, $id): RedirectResponse{
        $this->activityRepository->update($request, $id);
        Session::flash('success', 'აქტივობა წარმატებით განახლდა');
        return redirect()->back();
    }

    public function delete(Request $request, $id): RedirectResponse{
        $this->activityRepository->delete($request, $id, true);
        Session::flash('success', 'აქტივობა წარმატებით წაიშალა');
        return redirect()->back();
    }
}
