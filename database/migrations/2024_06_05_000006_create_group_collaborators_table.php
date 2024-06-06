<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('group_collaborators', function (Blueprint $table) {
            $table->unsignedBigInteger('GroupID');
            $table->unsignedBigInteger('CollaboratorID');
            $table->primary(['GroupID', 'CollaboratorID']);
            $table->foreign('GroupID')->references('GroupID')->on('team_groups');
            $table->foreign('CollaboratorID')->references('id')->on('users');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('group_collaborators');
    }
    
};