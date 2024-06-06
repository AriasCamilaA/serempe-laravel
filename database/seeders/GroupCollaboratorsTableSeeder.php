<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupCollaboratorsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('group_collaborators')->insert([
            ['GroupID' => 1, 'CollaboratorID' => 2],
            ['GroupID' => 1, 'CollaboratorID' => 3],
        ]);
    }
}
