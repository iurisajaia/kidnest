<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UpdateUserPasswordRequest;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Http\Requests\User\UpdateUserRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
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

    function index(Request $request) : View|JsonResponse{
        $user = $this->userRepository->getCurrentUser($request);

        if ($request->wantsJson()) {
            return response()->json([
                'user' => $user
            ]);
        }
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

    public function updatePassword(UpdateUserPasswordRequest $request) : JsonResponse
    {
        try {
            return $this->userRepository->updatePassword($request);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function sendMessage(Request $request) : RedirectResponse|JsonResponse
    {
        try {
            return $this->userRepository->sendMessage($request);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function getParent(Request $request, int $id) : View|JsonResponse
    {
        try {
            return $this->userRepository->getParent($request, $id);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }


}
