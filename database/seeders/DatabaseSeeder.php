<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            TeamGroupsTableSeeder::class,
            GroupCollaboratorsTableSeeder::class,
            EvaluationsTableSeeder::class,
            QuestionsTableSeeder::class,
            AnswersTableSeeder::class,
            AssignedEvaluationsTableSeeder::class,
            CollaboratorAnswersTableSeeder::class,
        ]);
    }
}
