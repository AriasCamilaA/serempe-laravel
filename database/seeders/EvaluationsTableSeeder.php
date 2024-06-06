<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EvaluationsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('evaluations')->insert([
            ['Name' => 'Basic Knowledge Evaluation', 'Description' => 'Evaluation on basic programming knowledge']
        ]);
    }
}
