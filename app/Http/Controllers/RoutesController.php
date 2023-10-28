<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\RegistrationRequest;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RoutesController extends Controller
{

    private UserRepositoryInterface $userRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
    )
    {
        $this->userRepository = $userRepository;
    }

    function index(): View {
        return view('pages.homepage.index');
    }

    public function register($id): View
    {
        $kindergarten = $this->userRepository->findById($id);
        return view ('auth.register')->with(['id' => $kindergarten->id]);
    }

    function registerUser(RegistrationRequest $request): RedirectResponse {
        $user = $this->userRepository->createParent($request);

        if($user instanceof User){
            Auth::login($user);
        }
        return redirect()->route('index');
    }
}
