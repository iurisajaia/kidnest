<?php

namespace App\Http\Controllers;

use App\Enums\UserRoleEnum;
use App\Models\Branch;
use App\Models\Group;
use App\Models\Kid;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(Request $request): View{
        $id = $request->user()->id;

        $parents = User::query()->where('user_role_id', UserRoleEnum::PARENT['id'])->whereJsonContains('user_data->kindergarten_id', $id)->count();
        $branches = Branch::query()->where('kindergarten_id', $id)->count();
        $groups = Group::query()->where('kindergarten_id', $id)->count();
        $staff = Staff::query()->where('kindergarten_id', $id)->count();
        $kids = Kid::query()->where('kindergarten_id', $id)->count();

        return view('pages.dashboard.index')->with([
            'kids' => $kids,
            'branches' => $branches,
            'groups' => $groups,
            'staff' => $staff,
            'parents' => $parents
        ]);
    }
}
