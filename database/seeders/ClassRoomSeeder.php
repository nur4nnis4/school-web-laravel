<?php

namespace Database\Seeders;

use App\Models\ClassRoom;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ClassRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        ClassRoom::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            'Kom A', 'Kom B', 'Kom C', 'Kom D', 'Kom E',
        ];
        $teacherIds = Teacher::pluck('id');
        foreach ($data as $item) {
            ClassRoom::insert(
                [
                    'name' => $item,
                    'teacher_id' => fake()->randomElement($teacherIds),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
    }
}
