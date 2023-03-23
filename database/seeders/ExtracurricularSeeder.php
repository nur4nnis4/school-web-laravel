<?php

namespace Database\Seeders;

use App\Models\Extracurricular;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ExtracurricularSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Extracurricular::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            [
                'name' => 'Voli',
            ],
            [
                'name' => 'Bola',

            ],
            [
                'name' => 'Takraw',

            ],
            [
                'name' => 'Pramuka',

            ],
            [
                'name' => 'Basket',

            ],
            [
                'name' => 'Pmr',

            ],
        ];

        foreach ($data as $item) {
            Extracurricular::insert(
                [
                    'name' => $item['name'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
    }
}
