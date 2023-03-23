<?php

namespace Database\Factories;

use App\Models\Extracurricular;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentExtracurricular>
 */
class StudentExtracurricularFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => fake()->randomElement(Student::pluck('id')),
            'extracurricular_id' => fake()->randomElement(Extracurricular::pluck('id')),
        ];
    }
}
