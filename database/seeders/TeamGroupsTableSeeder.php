<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamGroupsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('team_groups')->insert([
            ['Name' => 'Development Team', 'LeaderID' => 3]
        ]);
    }
}
