<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('assigned_evaluations', function (Blueprint $table) {
            $table->id('AssignedEvaluationID');
            $table->unsignedBigInteger('EvaluationID');
            $table->unsignedBigInteger('CollaboratorID');
            $table->date('AssignmentDate');
            $table->date('CompletionDate')->nullable();
            $table->decimal('Score', 5, 2)->default(0);
            $table->foreign('EvaluationID')->references('EvaluationID')->on('evaluations');
            $table->foreign('CollaboratorID')->references('id')->on('users');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('assigned_evaluations');
    }
    
};