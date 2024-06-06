<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CollaboratorAnswersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('collaborator_answers')->insert([
            ['AssignedEvaluationID' => 1, 'QuestionID' => 1, 'AnswerID' => 2],
            ['AssignedEvaluationID' => 1, 'QuestionID' => 2, 'AnswerID' => 3],
        ]);
    }
}
