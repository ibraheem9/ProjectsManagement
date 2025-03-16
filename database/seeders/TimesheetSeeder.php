<?php
namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Timesheet;
use App\Models\User;
use App\Models\Project;

class TimesheetSeeder extends Seeder
{
    public function run()
    {
        $user1 = User::first();
        $project1 = Project::where('name', 'ProjectA')->first();

        Timesheet::create([
            'task_name' => 'Task 1',
            'date' => '2025-03-16',
            'hours' => 5,
            'user_id' => $user1->id,
            'project_id' => $project1->id,
        ]);

        $user2 = User::skip(1)->first();
        $project2 = Project::where('name', 'ProjectB')->first();

        Timesheet::create([
            'task_name' => 'Task 2',
            'date' => '2025-03-16',
            'hours' => 3,
            'user_id' => $user2->id,
            'project_id' => $project2->id,
        ]);
    }
}
