<?php

namespace App\Repositories\Interfaces;


use Illuminate\Http\Request;

Interface AttendanceRepositoryInterface{
    public function index(Request $request, int $groupId, int $kidId);
}
