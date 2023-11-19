<?php

namespace App\Repositories\Interfaces;


use App\Http\Requests\User\RegistrationRequest;
use App\Http\Requests\User\UpdateUserPasswordRequest;
use App\Http\Requests\User\UpdateUserRequest;
use Illuminate\Http\Request;


Interface UserRepositoryInterface{
    public function findById(int $id);
    public function getCurrentUser(Request $request);
    public function createParent(RegistrationRequest $request);

    public function update(UpdateUserRequest $request);

    public function updatePassword(UpdateUserPasswordRequest $request);
}
