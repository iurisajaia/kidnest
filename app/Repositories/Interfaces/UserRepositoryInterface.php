<?php

namespace App\Repositories\Interfaces;


use App\Http\Requests\User\RegistrationRequest;
use Illuminate\Http\Request;


Interface UserRepositoryInterface{
    public function findById(int $id);
    public function getCurrentUser(Request $request);
    public function createParent(RegistrationRequest $request);
}