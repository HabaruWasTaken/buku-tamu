<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'no_id' => fake()->numerify('employee-####'),
            'name' => fake()->name(),
            'position' => fake()->numberBetween(1, 5),
            'division' => fake()->randomElements(['a', 'b', 'c']),
            'photo' => fake()->word(),
        ];
    }
}
