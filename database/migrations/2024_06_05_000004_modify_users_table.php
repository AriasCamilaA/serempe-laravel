<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('Type', ['Leader', 'Collaborator'])->default('Collaborator');
            $table->unsignedBigInteger('RoleID')->nullable();
            $table->foreign('RoleID')->references('RoleID')->on('roles');
        });
    }
    
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('Type');
            $table->dropForeign(['RoleID']);
            $table->dropColumn('RoleID');
        });
    }
      
};