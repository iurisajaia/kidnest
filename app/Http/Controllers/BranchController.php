<?php

namespace App\Http\Controllers;

use App\Http\Requests\Branch\CreateBranchRequest;
use App\Repositories\Interfaces\BranchRepositoryInterface;
use App\Repositories\Interfaces\GroupRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BranchController extends Controller
{
    private BranchRepositoryInterface $branchRepository;
    private GroupRepositoryInterface $groupRepository;

    public function __construct(
        BranchRepositoryInterface $branchRepository,
        GroupRepositoryInterface $groupRepository,
    ){
        $this->branchRepository = $branchRepository;
        $this->groupRepository = $groupRepository;
    }

    public function index(Request $request): View {
        try{
            $branches = $this->branchRepository->getBranchesByKindergarten($request);
            return view('pages.branches.index')->with(['branches' => $branches]);
        }catch (\Throwable $th){
            return view('pages.branches.index')->with(['branches' => []]);
        }
    }

    function show(Request $request, $id): View {
        try{
            $branch = $this->branchRepository->getBranchById($request, $id);
            $groups = $this->groupRepository->getGroupsByBranchId($request, $id);
            $ages = $this->groupRepository->getAges();

            return view('pages.branches.show')->with(['groups' => $groups, 'branchId' => $id, 'branch' => $branch, 'ages' => $ages]);
        }catch (\Throwable $th) {
            return view('pages.branches.show')->with(['groups' => [], 'branchId' => $id, 'branch' => null]);
        }
    }

    public function store(CreateBranchRequest $request) : RedirectResponse
    {
        try {
            $this->branchRepository->create($request);
            return redirect()->back()->with(['message' => 'ფილიალი დაემატა']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'შეცდომაა']);

        }
    }



}
