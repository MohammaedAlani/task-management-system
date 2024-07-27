<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = Project::all();
        $users = User::all();

        foreach ($projects as $project) {
            $tasks = Task::factory(100)->create(['project_id' => $project->id]);

            foreach ($tasks as $task) {
                $task->create_by_user_id = $users->random()->id;
                $task->save();
            }
        }
    }
}
