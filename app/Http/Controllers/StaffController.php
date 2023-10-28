<?php

namespace App\Http\Controllers;

use App\Http\Requests\Staff\CreateStaffRequest;
use App\Repositories\Interfaces\StaffRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StaffController extends Controller
{
    private StaffRepositoryInterface $staffRepository;

    public function __construct(
        StaffRepositoryInterface $staffRepository,
    ){
        $this->staffRepository = $staffRepository;
    }

//    public function index(Request $request): View {
//        $staff = $this->staffRepository->index($request);
//        return view('pages.kindergarten.staff.index')->with(['staff' => $staff]);
//    }


    public function store(CreateStaffRequest $request) : RedirectResponse
    {
        try {
            $this->staffRepository->create($request);
            Session::flash('success', 'პერსონალი წარმატებით დაემატა');
            return redirect()->back()->with(['message' => 'პერსონალი დაემატა']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'შეცდომაა']);

        }
    }

    public function update(CreateStaffRequest $request, $id) : RedirectResponse
    {
        try {
            $this->staffRepository->update($request, $id);
            Session::flash('success', 'პერსონალი წარმატებით განახლდა');
            return redirect()->back()->with(['message' => 'პერსონალი დაემატა']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'შეცდომაა']);
        }
    }

    public function delete($id) : RedirectResponse
    {
        try {
            $this->staffRepository->delete($id);
            Session::flash('success', 'პერსონალი წარმატებით წაიშალა');
            return redirect()->back()->with(['message' => 'პერსონალი დაემატა']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'შეცდომაა']);

        }
    }
}
