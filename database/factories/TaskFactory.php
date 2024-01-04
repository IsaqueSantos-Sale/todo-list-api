<?php

namespace Database\Factories;

use App\Models\User;
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
            "name" => $this->faker->sentence(1),
            "describe" => $this->faker->sentence(4),
            "status" => $this->faker->randomElement(["todo", "in progress", "done"]),
            "user_id" => $this->faker->randomElement(User::all())->id,
        ];
    }
}
