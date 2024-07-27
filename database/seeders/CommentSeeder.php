<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = \App\Models\User::all();
        $tasks = \App\Models\Task::all();

        $tasks->each(function ($task) use ($users) {
            $users->random(random_int(1, 5))->each(function ($user) use ($task) {
                $task->comments()->create([
                    'user_id' => $user->id,
                    'commentable_type' => 'App\Models\Task',
                    'commentable_id' => $task->id,
                    'comment' => \Faker\Factory::create()->sentence,
                ]);
            });
        });
    }
}
