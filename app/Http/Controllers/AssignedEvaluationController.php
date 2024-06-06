<?php

namespace App\Http\Controllers;

use App\Models\AssignedEvaluation;
use App\Models\Evaluation;
use App\Models\User;
use Illuminate\Http\Request;

class AssignedEvaluationController extends Controller
{
    // Función para mostrar todas las evaluaciones asignadas al usuario actual
    public function index()
    {
        $assignedEvaluations = AssignedEvaluation::where('CollaboratorID', auth()->id())->get();
        return view('assigned_evaluations.index', compact('assignedEvaluations'));
    }

    // Función para mostrar el formulario de creación de una nueva evaluación asignada
    public function create()
    {
        $evaluations = Evaluation::all();
        $collaborators = User::where('Type', 'Collaborator')->get();
        return view('assigned_evaluations.create', compact('evaluations', 'collaborators'));
    }

    // Función para almacenar una nueva evaluación asignada
    public function store(Request $request)
    {
        $request->validate([
            'evaluation_id' => 'required|exists:evaluations,EvaluationID',
            'collaborator_id' => 'required|exists:users,id',
        ]);

        AssignedEvaluation::create([
            'EvaluationID' => $request->evaluation_id,
            'CollaboratorID' => $request->collaborator_id,
            'AssignmentDate' => now(),
        ]);

        return redirect()->route('assigned_evaluations.index')->with('success', 'Evaluación asignada con éxito.');
    }

    // Función para mostrar una evaluación asignada específica
    public function show(AssignedEvaluation $assignedEvaluation)
    {
        return view('assigned_evaluations.show', compact('assignedEvaluation'));
    }

    // Función para mostrar un resumen de todas las evaluaciones asignadas
    public function overview()
    {
        $evaluations = Evaluation::with(['assignedEvaluations.collaborator'])->get();
        return view('assigned_evaluations.overview', compact('evaluations'));
    }

    // Función para eliminar una evaluación asignada
    public function destroy(AssignedEvaluation $assignedEvaluation)
    {
        $assignedEvaluation->delete();
        return redirect()->route('assigned_evaluations.index')->with('success', 'Evaluación asignada eliminada con éxito.');
    }
}
