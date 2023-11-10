<?php

namespace App\Repositories;

use App\Http\Requests\Staff\CreateStaffRequest;
use App\Models\Branch;
use App\Models\Group;
use App\Models\Staff;
use App\Models\StaffPosition;
use App\Models\User;
use App\Repositories\Interfaces\GroupRepositoryInterface;
use App\Repositories\Interfaces\StaffRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class StaffRepository implements StaffRepositoryInterface
{


    public function create(CreateStaffRequest $request): JsonResponse
    {
        $user = User::query()->where('email', $request->email)->first();

        if($user){
            return response()->json([
                'message' => 'User with this email already exists'
            ], 400);
        }


        $staff = Staff::create([
            ...$request->except(['email', 'password','user_role_id', '_token']),
            'kindergarten_id' => $request->user()->id
        ]);


         $user = User::create([
            'name' => $request['firstname'] . ' ' . $request['lastname'],
            'email' => $request['email'],
            'private_number' => $request['private_number'],
            'password' => Hash::make($request['password']),
            'user_role_id' => $request['user_role_id']
        ]);

         $staff->user_id = $user->id;
         $staff->save();


        return response()->json([
            'message' => 'Staff Created Successfully',
            'data' => $staff
        ], 200);

    }

    public function update(CreateStaffRequest $request, $id): JsonResponse
    {
        $staff = Staff::findOrFail($id);
        $staff->update($request->except(['_method', '_token', 'email']));

        User::where('id', $staff->user_id)->update(['email' => $request->email]);

        return response()->json([
            'message' => 'Staff Updated Successfully'
        ], 200);

    }

    public function delete($id): JsonResponse
    {
        $staff = Staff::query()->findOrFail($id);

        $staff->delete();

        return response()->json([
            'message' => 'Staff Deleted Successfully'
        ], 200);

    }

    public function getStaffByUserId($id): Model{
        return Staff::query()->where('user_id', $id)->first();

    }


}
