<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\AttendanceRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AttendanceController extends Controller
{

    private AttendanceRepositoryInterface $attendanceRepository;

    public function __construct(AttendanceRepositoryInterface $attendanceRepository){
        $this->attendanceRepository = $attendanceRepository;
    }

    public function index(Request $request, int $groupId = 0, int $kidId = 0): View{

        $attendances = $this->attendanceRepository->index($request, $groupId, $kidId);

        return view('pages.attendance.index')->with('attendances', $attendances);
    }
}
