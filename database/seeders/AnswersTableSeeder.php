<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnswersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('answers')->insert([
            ['QuestionID' => 1, 'Text' => 'Good', 'IsCorrect' => true],
            ['QuestionID' => 1, 'Text' => 'Bad', 'IsCorrect' => false],
            ['QuestionID' => 2, 'Text' => 'Yes', 'IsCorrect' => true],
            ['QuestionID' => 2, 'Text' => 'No', 'IsCorrect' => false],
        ]);
    }
}
