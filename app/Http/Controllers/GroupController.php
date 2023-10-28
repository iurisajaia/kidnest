<?php

namespace App\Http\Controllers;

use App\Enums\UserRoleEnum;
use App\Http\Requests\Group\CreateGroupRequest;
use App\Models\Staff;
use App\Repositories\Interfaces\GroupRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;


class GroupController extends Controller
{
    private GroupRepositoryInterface $groupRepository;

    public function __construct(
        GroupRepositoryInterface $groupRepository,
    )
    {
        $this->groupRepository = $groupRepository;
    }




    function index(Request $request, $id): View
    {

        $group = $this->groupRepository->show($request, $id, true);

        $positions = [
            UserRoleEnum::EDUCATOR,
            UserRoleEnum::MANAGER,
            UserRoleEnum::PSYCHOLOGIST
        ];


        return view('pages.groups.index')->with(['group' => $group, 'positions' => $positions]);
    }

    public function store(CreateGroupRequest $request): RedirectResponse
    {
        try {
            $this->groupRepository->store($request);
            return redirect()->back()->with(['message' => 'ჯგუფი დაემატა']);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with(['error' => 'შეცდომაა']);

        }
    }

    public function update(CreateGroupRequest $request, $id): RedirectResponse
    {
        try {
            $this->groupRepository->update($request, $id);
            Session::flash('success', 'ჯგუფი წარმატებით განახლდა');
            return redirect()->back()->with(['message' => 'ჯგუფი დაემატა']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'შეცდომაა']);

        }
    }

    public function delete(Request $request, $id): RedirectResponse
    {
        try {
            $this->groupRepository->delete($request, $id);
            return redirect()->back()->with(['message' => 'ჯგუფი წაიშალა']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'შეცდომაა']);

        }
    }
}
