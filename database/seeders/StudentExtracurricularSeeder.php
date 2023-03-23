<?php

namespace Database\Seeders;

// use App\Models\Extracurricular;
// use App\Models\Student;
use App\Models\StudentExtracurricular;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class StudentExtracurricularSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        StudentExtracurricular::truncate();
        Schema::enableForeignKeyConstraints();
        StudentExtracurricular::factory()->count(20)->create();
        // Student::factory()
        //     ->has(Extracurricular::factory()->count(20))
        //     ->create();
    }
}
