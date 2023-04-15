<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            /** The order should be based on independent
             *  class to dependent class based on foreign key
             */
            TeacherSeeder::class,
            ClassRoomSeeder::class,
            StudentSeeder::class,
            ExtracurricularSeeder::class,
            RoleSeeder::class,
            StudentExtracurricularSeeder::class,
            UserSeeder::class,
        ]);
    }
}
