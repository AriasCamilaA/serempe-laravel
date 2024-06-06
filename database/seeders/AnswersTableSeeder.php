<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnswersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('answers')->insert([
            ['QuestionID' => 1, 'Text' => 'A place to store data', 'IsCorrect' => true],
            ['QuestionID' => 1, 'Text' => 'A data type', 'IsCorrect' => false],
            ['QuestionID' => 2, 'Text' => 'A control structure that repeats a block of code', 'IsCorrect' => true],
            ['QuestionID' => 2, 'Text' => 'A type of function', 'IsCorrect' => false],
        ]);
    }
}
