<?php

namespace App\Http\Controllers;

use App\Http\Requests\Kid\CreateKidRequest;
use App\Http\Requests\Kid\CreateKidSummeryRequest;
use App\Repositories\Interfaces\KidRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class KidController extends Controller
{
    private KidRepositoryInterface $kidRepository;

    public function __construct(
        KidRepositoryInterface $kidRepository,
    ){
        $this->kidRepository = $kidRepository;
    }


    public function index(Request $request) : View
    {
        $kids = $this->kidRepository->index($request, true);

        return view('pages.kindergarten.kids.index', ['kids' => $kids, 'search' => $request->search]);
    }

    public function store(CreateKidRequest $request) : RedirectResponse
    {
        try {
            $this->kidRepository->create($request);
            Session::flash('success','ბავშვი წარმატებით დაემატა');
            return redirect()->back()->with(['message' => 'ბავშვი დაემატა']);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with(['error' => 'შეცდომაა']);

        }
    }

    public function update(CreateKidRequest $request, $id) : RedirectResponse
    {
        try {
            $this->kidRepository->update($request, $id, true);
            Session::flash('success', 'ბავშვი წარმატებით განახლდა');
            return redirect()->back()->with(['message' => 'ბავშვი განახლდა']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'შეცდომაა']);

        }
    }

    public function delete($id) : RedirectResponse
    {
        try {
            $this->kidRepository->delete($id);
            Session::flash('success','ბავშვი წარმატებით წაიშალა');
            return redirect()->back()->with(['message' => 'ბავშვი წაიშალა']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'შეცდომაა']);

        }
    }

    public function addSummary(CreateKidSummeryRequest $request , int $id) : RedirectResponse
    {
        try {
            $this->kidRepository->addSummary($request , $id);
            if($request->summary_id)
                Session::flash('success','დღის შეჯამება წარმატებით განახლდა');
            else
                Session::flash('success','დღის შეჯამება წარმატებით დაემატა');
            return redirect()->back()->with(['message' => 'დღის შეჯამება დაემატა']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'შეცდომაა']);

        }
    }
}
