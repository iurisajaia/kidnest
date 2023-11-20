<?php

namespace App\Repositories;

use App\Http\Requests\User\UpdateUserPasswordRequest;
use App\Models\Kid;
use App\Repositories\Interfaces\KidRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Http\Requests\User\RegistrationRequest;
use App\Http\Requests\User\UpdateUserRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Enums\UserRoleEnum;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;


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
            return $e->getMessage();
        }
    }

    public function updatePassword(UpdateUserPasswordRequest $request): User|string|JsonResponse
    {
        try {

            if(!Hash::check($request->old_password, auth()->user()->password)){
                if ($request->wantsJson()) {
                    return response()->json([
                        'error' => "Old Password Doesn't match!",
                    ], 401);
                }
                return back()->with("error", "Old Password Doesn't match!");
            }

            $user = User::query()->where('id', auth()->user()->id)->update([
                'password' => Hash::make($request->password)
            ]);

            if ($request->wantsJson()) {
                return response()->json([
                    'status' => true,
                    'message' => 'Password updated successfully',
                ]);
            }

            return redirect()->back()->with(['success' => 'Password updated successfully']);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function sendMessage(Request $request): RedirectResponse|JsonResponse
    {
        try {
//            $users = User::query()
//                ->where('user_role_id', UserRoleEnum::PARENT['id'])
//                ->whereJsonContains('user_data->kindergarten_id', $request->user()->id);
//
//
//            $phoneNumbers = [];
//
//            foreach ($users as $user) {
//                $phoneNumbers[] = $user->phone_number;
//            }


//            if ($phoneNumbers && count($phoneNumbers)) {
                $token = '240|pkBuftIvI59BjVnSoCzdnZ9GEOeCNYWero6jSdeZ';

                $dataToSend = [
                    'subject' => 'Morty',
                    'message' => $request->text ?? 'მოგესალმებით ! შეგახსენებთ ბაგა ბაღი new age - ში სწავლის საფასირის გადახდის რიცხვი არის 1 ოქტომბერი , საფასურის დაგვიანებაზე, ყოველ ვადაგადაცილებულ დღეზე, დაგერიცხებათ ჯარიმა 10 ლარის ოდენობით.',
                    'phone_numbers' => ['995598297961']
                ];


                Http::withHeaders([
                    'Authorization' => 'Bearer ' . $token,
                    'accept' => 'application/json',
                    'Content-Type' => 'application/json'
                ])->post('https://smsservice.inexphone.ge/api/v1/sms/bulk', $dataToSend);
//            }

            return redirect()->back()->with(['success' => 'Message sent successfully']);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

}
