<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('team_groups', function (Blueprint $table) {
            $table->id('GroupID');
            $table->string('Name', 100);
            $table->unsignedBigInteger('LeaderID')->nullable();
            $table->foreign('LeaderID')->references('id')->on('users');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('team_groups');
    }
    
};