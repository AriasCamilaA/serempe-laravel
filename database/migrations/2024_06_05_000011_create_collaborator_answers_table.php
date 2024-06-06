<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('collaborator_answers', function (Blueprint $table) {
            $table->id('CollaboratorAnswerID');
            $table->unsignedBigInteger('AssignedEvaluationID');
            $table->unsignedBigInteger('QuestionID');
            $table->unsignedBigInteger('AnswerID');
            $table->foreign('AssignedEvaluationID')->references('AssignedEvaluationID')->on('assigned_evaluations');
            $table->foreign('QuestionID')->references('QuestionID')->on('questions');
            $table->foreign('AnswerID')->references('AnswerID')->on('answers');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('collaborator_answers');
    }
    
};