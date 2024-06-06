<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id('QuestionID');
            $table->unsignedBigInteger('EvaluationID');
            $table->text('Text');
            $table->foreign('EvaluationID')->references('EvaluationID')->on('evaluations');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('questions');
    }
    
};
