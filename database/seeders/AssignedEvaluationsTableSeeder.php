<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssignedEvaluationsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('assigned_evaluations')->insert([
            ['EvaluationID' => 1, 'CollaboratorID' => 4, 'AssignmentDate' => now()],
            ['EvaluationID' => 1, 'CollaboratorID' => 5, 'AssignmentDate' => now()],
        ]);
    }
}
