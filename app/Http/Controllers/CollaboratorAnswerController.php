<?php

namespace App\Http\Controllers;

use App\Models\AssignedEvaluation;
use App\Models\CollaboratorAnswer;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Http\Request;

class CollaboratorAnswerController extends Controller
{
    public function create(AssignedEvaluation $assignedEvaluation, Question $question)
    {
        return view('collaborator_answers.create', compact('assignedEvaluation', 'question'));
    }

    public function store(Request $request, AssignedEvaluation $assignedEvaluation, Question $question)
    {
        $request->validate([
            'answer_id' => 'required|exists:answers,AnswerID',
        ]);

        CollaboratorAnswer::create([
            'AssignedEvaluationID' => $assignedEvaluation->AssignedEvaluationID,
            'QuestionID' => $question->QuestionID,
            'AnswerID' => $request->answer_id,
        ]);

        return redirect()->route('assigned_evaluations.show', $assignedEvaluation)->with('success', 'Respuesta registrada con éxito.');
    }
}

