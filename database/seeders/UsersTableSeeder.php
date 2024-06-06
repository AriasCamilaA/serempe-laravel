<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'Elian Villamarin', 'email' => 'admin@example.com', 'password' => Hash::make('password'), 'Type' => 'Leader', 'RoleID' => 1],
            ['name' => 'Juan Pérez', 'email' => 'L1@example.com', 'password' => Hash::make('password'), 'Type' => 'Leader', 'RoleID' => 2],
            ['name' => 'Camila Arias', 'email' => 'L2@example.com', 'password' => Hash::make('password'), 'Type' => 'Leader', 'RoleID' => 2],
            ['name' => 'Ana Gómez', 'email' => 'E1@example.com', 'password' => Hash::make('password'), 'Type' => 'Collaborator', 'RoleID' => 2],
            ['name' => 'Luis Martínez', 'email' => 'E2@example.com', 'password' => Hash::make('password'), 'Type' => 'Collaborator', 'RoleID' => 2],
            ['name' => 'Jorge Ruiz', 'email' => 'E3@example.com', 'password' => Hash::make('password'), 'Type' => 'Collaborator', 'RoleID' => 2],
            ['name' => 'Daniel Pinzón', 'email' => 'E4@example.com', 'password' => Hash::make('password'), 'Type' => 'Collaborator', 'RoleID' => 2],
        ]);
    }
}
