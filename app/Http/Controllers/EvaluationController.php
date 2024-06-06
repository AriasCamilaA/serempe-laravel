<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function index()
    {
        $evaluations = Evaluation::all();
        return view('evaluations.index', compact('evaluations'));
    }

    public function create()
    {
        return view('evaluations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Evaluation::create([
            'Name' => $request->name,
            'Description' => $request->description,
        ]);

        return redirect()->route('evaluations.index')->with('success', 'Evaluación creada con éxito.');
    }

    public function show(Evaluation $evaluation)
    {
        return view('evaluations.show', compact('evaluation'));
    }

    public function createQuestion(Evaluation $evaluation)
    {
        return view('questions.create', compact('evaluation'));
    }

    public function storeQuestion(Request $request, Evaluation $evaluation)
    {
        $request->validate([
            'text' => 'required|string',
        ]);

        Question::create([
            'EvaluationID' => $evaluation->EvaluationID,
            'Text' => $request->text,
        ]);

        return redirect()->route('evaluations.show', $evaluation)->with('success', 'Pregunta creada con éxito.');
    }

    public function createAnswer(Evaluation $evaluation, Question $question)
    {
        return view('answers.create', compact('evaluation', 'question'));
    }

    public function storeAnswer(Request $request, Evaluation $evaluation, Question $question)
    {
        $request->validate([
            'text' => 'required|string',
            'is_correct' => 'required|boolean',
        ]);

        Answer::create([
            'QuestionID' => $question->QuestionID,
            'Text' => $request->text,
            'IsCorrect' => $request->is_correct,
        ]);

        return redirect()->route('evaluations.show', $evaluation)->with('success', 'Respuesta creada con éxito.');
    }
}
