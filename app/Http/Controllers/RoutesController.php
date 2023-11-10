<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\RegistrationRequest;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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

    function registerUser(RegistrationRequest $request): RedirectResponse | JsonResponse {
        $user = $this->userRepository->createParent($request);

        if($user instanceof User){
            Auth::login($user);
        }

        if ($request->wantsJson()) {
            // generate token
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json(['user' => $user, 'token' => $token]);
        }

        return redirect()->route('index');
    }

    public function loginUser(Request $request): JsonResponse {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json(['user' => $user, 'token' => $token]);
        }
        return response()->json(['error' => 'Invalid Credentials']);
    }

    public function logoutUser(Request $request): JsonResponse {
        Auth::logout();
        return response()->json(['message' => 'Logged out']);
    }

}
