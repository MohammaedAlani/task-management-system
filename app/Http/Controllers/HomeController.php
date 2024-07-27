<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Get the number of users per month
        $usersPerMonth = User::selectRaw('MONTH(created_at) as month, YEAR(created_at) as year, COUNT(*) as count')
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        // Format the data for the chart
        $months = [];
        $userCounts = [];

        foreach ($usersPerMonth as $data) {
            $monthName = date('F', mktime(0, 0, 0, $data->month, 10)); // Convert month number to month name
            $months[] = $monthName . ' ' . $data->year; // e.g., "January 2024"
            $userCounts[] = $data->count;
        }

        $tasksCompleted = Task::where('is_complete', true)->count();
        $tasksIncomplete = Task::where('is_complete', false)->count();

        $taskMonths = ['Completed Tasks', 'Incomplete Tasks'];
        $taskCounts = [$tasksCompleted, $tasksIncomplete];

        $projectsActiveCount = Project::where('is_active', true)->count();
        $projectsInactiveCount = Project::where('is_active', false)->count();

        $projectLabel = ['Active Projects', 'Inactive Projects'];
        $projectCounts = [$projectsActiveCount, $projectsInactiveCount];


        return view('home', [
            'months' => $months,
            'userCounts' => $userCounts,
            'taskMonths' => $taskMonths,
            'taskCounts' => $taskCounts,
            'projectLabel' => $projectLabel,
            'projectCounts' => $projectCounts,
        ]);
    }
}
