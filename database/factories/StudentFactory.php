<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        $id = sprintf('2023-%04d%d-SP-0', \fake()->numberBetween(0,9999), fake()->numberBetween(0,9));

        return [
            'student_id' => $id,
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'course_id' => fake()->randomElement(['BSIT', 'BSHM', 'BSBA', 'BSHR', 'BSCS']),
            'is_passed' => fake()->numberBetween(0, 1)
        ];
    }
}
