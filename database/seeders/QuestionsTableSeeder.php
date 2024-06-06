<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('questions')->insert([
            ['EvaluationID' => 1, 'Text' => 'What is a variable?'],
            ['EvaluationID' => 1, 'Text' => 'What is a loop?'],
        ]);
    }
}
