<?php

namespace App\Http\Controllers;

use App\Http\Requests\timesheets\TimesheetRequest;
use App\Models\Timesheet;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;

class TimesheetController extends Controller
{
    public function index(Request $request)
    {
        $query = Timesheet::with(['user', 'project']);
        $timesheets = $query->get();
        return sendResponse($timesheets, 'Timesheets retrieved successfully');
    }

    public function store(TimesheetRequest $request)
    {
        $timesheet = Timesheet::create($request->only(['task_name', 'date', 'hours', 'user_id', 'project_id']));

        return sendResponse($timesheet, 'Timesheet created successfully');
    }

    public function show(Timesheet $timesheet)
    {
        return sendResponse($timesheet, 'Timesheet details retrieved');
    }

    public function update(TimesheetRequest $request, Timesheet $timesheet)
    {
        $timesheet->update($request->only(['task_name', 'date', 'hours', 'user_id', 'project_id']));

        return sendResponse($timesheet, 'Timesheet updated successfully');
    }

    public function destroy(Timesheet $timesheet)
    {
        $timesheet->delete();
        return sendResponse(null, 'Timesheet deleted successfully');
    }
}
