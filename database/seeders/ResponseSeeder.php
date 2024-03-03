<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Response;

class ResponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) { // Cambia 100 por la cantidad de registros que deseas crear
            Response::create([
                'survey_id' => 1,
                'user_id' => 2,
                'value' => rand(1, 5),
                'question_id' => rand(1, 10),
            ]);
        }
    }
}
