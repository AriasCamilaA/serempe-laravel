<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id('AnswerID');
            $table->unsignedBigInteger('QuestionID');
            $table->text('Text');
            $table->boolean('IsCorrect');
            $table->foreign('QuestionID')->references('QuestionID')->on('questions');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('answers');
    }
    
};