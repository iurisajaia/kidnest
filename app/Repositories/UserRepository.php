<?php

namespace App\Repositories;

use App\Enums\UserRoleEnum;
use App\Http\Requests\User\RegistrationRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use App\Repositories\Interfaces\KidRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class UserRepository implements UserRepositoryInterface
{


    private KidRepositoryInterface $kidRepository;

    public function __construct(
        KidRepositoryInterface $kidRepository
    )
    {
        $this->kidRepository = $kidRepository;
    }

    public function findById(int $id): User|string
    {
        try {
            return User::query()->findOrFail($id);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getUserRelations(User $user): array
    {
        try {
            return UserRoleEnum::getValue(strtoupper($user->role->key))['relations'];
        } catch (\Exception $e) {
            return [];
        }
    }

    public function getCurrentUser(Request $request): User|string
    {
        try {
            $relations = $this->getUserRelations($request->user());

            return User::query()->with($relations)->findOrFail($request->user()->id);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function createParent(RegistrationRequest $request): User|string
    {
        try {
            $data = [
                'name' => $request['name'] . ' ' . $request['lastname'],
                'email' => $request['email'],
                'status' => $request['status'],
            ];

            $user = User::query()->create([
                ...$data,
                'password' => bcrypt($request['password']),
                'user_role_id' => UserRoleEnum::PARENT['id'],
                'user_data' => [
                    'kid_private_number' => $request['kid_private_number'],
                    'phone_number' => $request['phone_number'],
                    'kindergarten_id' => intval($request['kindergarten_id'])
                ]
            ]);

            $this->kidRepository->findByPrivateNumberAndMatchForParent($request['kid_private_number'], $user->id);

            return $user;
        } catch (\Exception $e) {
            dd($e->getMessage());
            return $e->getMessage();
        }
    }

    public function update(UpdateUserRequest $request): User|string|JsonResponse
    {
        try {
            $user = User::query()->findOrFail($request->user()->id);
            $data = [
                'name' => $request['name'] . ' ' . $request['lastname'],
                'email' => $request['email'],
                'status' => $request['status'],
                'user_data' => [
                    'address' => $request['address'],
                    'phone_number' => $request['phone_number'],
                    'kid_private_number' => $request['kid_private_number'],
                ]

            ];

            $user->update($data);

            if ($request->wantsJson()) {
                return response()->json([
                    'status' => true,
                    'message' => 'User updated successfully',
                    'user' => $user
                ]);
            }

            return $user;
        } catch (\Exception $e) {
            dd($e->getMessage());
            return $e->getMessage();
        }
    }

}
