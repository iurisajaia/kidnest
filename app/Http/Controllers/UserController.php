<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\CreateUserRequest;
use App\Http\Requests\User\RegistrationRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\Staff;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    private UserRepositoryInterface $userRepository;

    private array $views = [
        'parent' => 'pages.user.parent',
        'kindergarten' => 'pages.user.kindergarten',
        'educator' => 'pages.user.educator',
    ];

    public function __construct(
        UserRepositoryInterface $userRepository,
    ){
        $this->userRepository = $userRepository;
    }

    function index(Request $request) : View{
        $user = $this->userRepository->getCurrentUser($request);
        return view($this->views[$user->role->key])->with(['user' => $user]);
    }

    public function update(UpdateUserRequest $request) : JsonResponse
    {
        try {
            return $this->userRepository->update($request);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }


}
