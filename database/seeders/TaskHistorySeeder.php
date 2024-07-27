<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\TaskHistory;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasks = Task::all();
        $users = User::all();

        foreach ($tasks as $task) {
            TaskHistory::create([
                'task_id' => $task->id,
                'user_id' => $users->random()->id,
                'action' => 'created',
                'description' => null,
            ]);

            if ($task->is_complete) {
                TaskHistory::create([
                    'task_id' => $task->id,
                    'user_id' => $users->random()->id,
                    'action' => 'completion status changed',
                    'description' => json_encode(['is_complete' => true]),
                ]);
            }
        }
    }
}
