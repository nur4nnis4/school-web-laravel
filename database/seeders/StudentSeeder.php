<?php

namespace Database\Seeders;

use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Student::truncate();
        Schema::enableForeignKeyConstraints();
        Student::factory()->count(30)->create();


        // $data = [
        //     [
        //         'name' => 'Nisa',
        //         'gender' => 'Female',
        //         'nis' => '13140100',
        //         'class_id' => '1',
        //     ],
        //     [
        //         'name' => 'Budi',
        //         'gender' => 'Male',
        //         'nis' => '13140101',
        //         'class_id' => '2',
        //     ],
        //     [
        //         'name' => 'Ani',
        //         'gender' => 'Female',
        //         'nis' => '13140102',
        //         'class_id' => '3',
        //     ],
        // ];

        // foreach ($data as $item) {
        //     Student::insert(
        //         [
        //             'name' => $item['name'],
        //             'gender' => $item['gender'],
        //             'nis' => $item['nis'],
        //             'class_id' => $item['class_id'],
        //             'created_at' => Carbon::now(),
        //             'updated_at' => Carbon::now(),
        //         ]
        //     );
        // }
    }
}
