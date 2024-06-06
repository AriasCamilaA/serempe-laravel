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
            ['name' => 'Juan Pérez', 'email' => 'juan.perez@example.com', 'password' => Hash::make('password'), 'Type' => 'Leader', 'RoleID' => 2],
            ['name' => 'Ana Gómez', 'email' => 'ana.gomez@example.com', 'password' => Hash::make('password'), 'Type' => 'Collaborator', 'RoleID' => 2],
            ['name' => 'Luis Martínez', 'email' => 'luis.martinez@example.com', 'password' => Hash::make('password'), 'Type' => 'Collaborator', 'RoleID' => 2],
        ]);
    }
}
