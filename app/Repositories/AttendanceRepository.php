<?php

namespace App\Repositories;

use App\Repositories\Interfaces\AttendanceRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Kid;
use Carbon\Carbon;


class AttendanceRepository implements  AttendanceRepositoryInterface {

    public function index(Request $request, int $groupId, int $kidId): array{
        $desiredWeek = Carbon::now()->startOfWeek(); // Get the start of the current week
        $endOfWeek = Carbon::now()->endOfWeek(); // Get the end of the current week

        $allKidsQuery = Attendance::select('kid_id')
            ->whereBetween('created_at', [$desiredWeek, $endOfWeek]);

        if ($groupId != 0) {
            $allKidsQuery->where('group_id', $groupId);
        }

        if ($kidId != 0) {
            $allKidsQuery->where('kid_id', $kidId);
        }

        $allKids = $allKidsQuery->distinct()->get();
        // Initialize an array to store attendance information for each kid
        $attendanceByKid = [];

        // Define an array with days of the week
        $weekDays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];

        foreach ($allKids as $kid) {
            // Get all attendance records for the specific kid
            $kidId = $kid->kid_id;
            $attendances = Attendance::where('kid_id', $kidId)->get();

            // Group the attendances by day of the week
            $groupedAttendances = $attendances->groupBy(function ($attendance) {
                return Carbon::parse($attendance->created_at)->format('l');
            });

            $kid = Kid::find($kidId);
            // Initialize an array to store attendance information for each day for the current kid
            $attendanceByDay = ['kid' => $kid, 'days' => []];

            // Loop through the days of the week and collect attendance data for existing days only
            foreach ($weekDays as $day) {
                if ($groupedAttendances->has($day)) {
                    $attendanceByDay['days'][$day] = $groupedAttendances[$day][0]->attended;
                } else {
                    $attendanceByDay['days'][$day] = -1; // Set the attendance as 0 for days with no records
                }
            }

            // Store attendance information for the current kid
            $attendanceByKid[] = $attendanceByDay;
        }

        return $attendanceByKid;
    }
}
