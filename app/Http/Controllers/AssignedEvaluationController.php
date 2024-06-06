<?php

namespace App\Http\Controllers;

use App\Models\AssignedEvaluation;
use App\Models\Evaluation;
use App\Models\Question;
use App\Models\TeamGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignedEvaluationController extends Controller
{
    public function index()
    {
        $assignedEvaluations = AssignedEvaluation::where('CollaboratorID', auth()->id())->get();
        return view('assigned_evaluations.index', compact('assignedEvaluations'));
    }

    public function create(Request $request)
    {
        $groupID = $request->input('group_id');
        $evaluations = Evaluation::all();
        $group = TeamGroup::findOrFail($groupID);
        return view('assigned_evaluations.create', compact('evaluations', 'group'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'evaluation_id' => 'required|exists:evaluations,EvaluationID',
            'group_id' => 'required|exists:team_groups,GroupID',
        ]);

        $group = TeamGroup::find($request->group_id);
        $evaluation = Evaluation::find($request->evaluation_id);

        foreach ($group->collaborators as $collaborator) {
            AssignedEvaluation::create([
                'EvaluationID' => $evaluation->EvaluationID,
                'CollaboratorID' => $collaborator->id,
                'LeaderID' => Auth::id(),
                'AssignmentDate' => now(),
            ]);
        }

        return redirect()->route('homme')->with('success', 'Evaluación asignada a todos los colaboradores del grupo.');
    }

    public function showGroupEvaluations()
    {
        $groups = TeamGroup::where('LeaderID', Auth::id())->with('collaborators.assignedEvaluations.evaluation')->get();
        return view('assigned_evaluations.group_evaluations', compact('groups'));
    }

    public function showGroupEvaluationDetails($evaluationID, $groupID)
    {
        $group = TeamGroup::findOrFail($groupID);
        $evaluation = Evaluation::findOrFail($evaluationID);
        
        $assignedEvaluations = AssignedEvaluation::where('EvaluationID', $evaluationID)
            ->whereIn('CollaboratorID', $group->collaborators->pluck('id'))
            ->get();

        $evaluated = $assignedEvaluations->whereNotNull('CompletionDate');
        $notEvaluated = $assignedEvaluations->whereNull('CompletionDate');

        return view('assigned_evaluations.group_evaluation_details', compact('evaluation', 'group', 'evaluated', 'notEvaluated'));
    }

    public function show(AssignedEvaluation $assignedEvaluation)
    {
        return view('assigned_evaluations.show', compact('assignedEvaluation'));
    }

    public function edit(AssignedEvaluation $assignedEvaluation)
    {
        $questions = Question::where('EvaluationID', $assignedEvaluation->EvaluationID)->get();
        return view('assigned_evaluations.edit', compact('assignedEvaluation', 'questions'));
    }

    public function update(Request $request, AssignedEvaluation $assignedEvaluation)
    {
        $questions = Question::where('EvaluationID', $assignedEvaluation->EvaluationID)->get();

        foreach ($questions as $question) {
            $assignedEvaluation->collaboratorAnswers()->updateOrCreate(
                ['QuestionID' => $question->QuestionID],
                ['AnswerID' => $request->input('answer_'.$question->QuestionID)]
            );
        }

        $assignedEvaluation->update([
            'CompletionDate' => now(),
            'Score' => $this->calculateScore($assignedEvaluation),
        ]);

        $group = TeamGroup::whereHas('collaborators', function ($query) use ($assignedEvaluation) {
            $query->where('id', $assignedEvaluation->CollaboratorID);
        })->first();

        return redirect()->route('assigned_evaluations.group.details', [
            'evaluationID' => $assignedEvaluation->EvaluationID,
            'groupID' => $group->GroupID,
        ])->with('success', 'Evaluación actualizada correctamente.');
    }

    private function calculateScore(AssignedEvaluation $assignedEvaluation)
    {
        $questions = $assignedEvaluation->evaluation->questions;
        $totalQuestions = $questions->count();
        $correctAnswers = 0;

        foreach ($questions as $question) {
            $correctAnswer = $question->answers()->where('IsCorrect', true)->first();
            if ($assignedEvaluation->collaboratorAnswers()->where('QuestionID', $question->QuestionID)->where('AnswerID', $correctAnswer->AnswerID)->exists()) {
                $correctAnswers++;
            }
        }

        return ($correctAnswers / $totalQuestions) * 100;
    }

    public function destroy(AssignedEvaluation $assignedEvaluation)
    {
        $assignedEvaluation->delete();
        return redirect()->route('assigned_evaluations.index')->with('success', 'Evaluación asignada eliminada con éxito.');
    }
}
