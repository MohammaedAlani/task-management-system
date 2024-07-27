<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'is_complete' => $this->faker->boolean,
            'project_id' => \App\Models\Project::factory(),
            'create_by_user_id' => \App\Models\User::factory(),
            'due_date' => $this->faker->dateTime,
        ];
    }
}
