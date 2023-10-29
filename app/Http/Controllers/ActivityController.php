<?php

namespace App\Http\Controllers;

use App\Http\Requests\Activity\CreateActivityRequest;
use App\Http\Requests\Activity\UpdateActivityRequest;
use App\Repositories\Interfaces\ActivityRepositoryInterface;
use App\Repositories\Interfaces\GroupRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class ActivityController extends Controller
{

    private GroupRepositoryInterface $groupRepository;
    private ActivityRepositoryInterface $activityRepository;


    public function __construct(
        GroupRepositoryInterface $groupRepository,
        ActivityRepositoryInterface $activityRepository,

    )
    {
        $this->groupRepository = $groupRepository;
        $this->activityRepository = $activityRepository;

    }

    public function index(Request $request): View
    {
        $groups = $this->groupRepository->getGroupsWithActivities($request);

        return view('pages.activity.index')->with(['groups' => $groups]);
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
