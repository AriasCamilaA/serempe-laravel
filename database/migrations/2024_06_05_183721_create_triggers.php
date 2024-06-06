<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTriggers extends Migration
{
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER GradeAnswers AFTER INSERT ON collaborator_answers FOR EACH ROW 
        BEGIN     
            DECLARE totalQuestions INT;     
            DECLARE totalCorrect INT;     
            DECLARE score DECIMAL(5, 2);

            -- Count total questions in the evaluation     
            SELECT COUNT(*) INTO totalQuestions     
            FROM questions     
            WHERE EvaluationID = (SELECT EvaluationID FROM assigned_evaluations WHERE AssignedEvaluationID = NEW.AssignedEvaluationID);  

            -- Count total correct answers by the collaborator in the assigned evaluation     
            SELECT COUNT(*) INTO totalCorrect     
            FROM collaborator_answers CA     
            JOIN answers A ON CA.AnswerID = A.AnswerID     
            WHERE CA.AssignedEvaluationID = NEW.AssignedEvaluationID AND A.IsCorrect = TRUE;  

            -- Calculate score     
            SET score = (totalCorrect / totalQuestions) * 100;  

            -- Update score in Assigned_Evaluations table     
            UPDATE assigned_evaluations     
            SET Score = score     
            WHERE AssignedEvaluationID = NEW.AssignedEvaluationID;  

            -- Mark as completed if all questions have been answered     
            IF totalCorrect = totalQuestions THEN         
                UPDATE assigned_evaluations         
                SET CompletionDate = CURRENT_DATE         
                WHERE AssignedEvaluationID = NEW.AssignedEvaluationID;     
            END IF; 
        END
        ');
    }

    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS GradeAnswers');
    }
}
