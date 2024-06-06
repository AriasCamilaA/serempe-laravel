<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AssignedEvaluation;
use App\Models\TeamGroup;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->role->Name == 'Admin') {
            $data = 'Hola Admin';
        } elseif ($user->Type == 'Leader') {
            $groups = TeamGroup::whereHas('collaborators', function ($query) {
                $query->where('id', Auth::id());
            })->with(['collaborators.assignedEvaluations.evaluation'])->get();
            $data = $groups;
        } elseif ($user->Type == 'Collaborator'){
            $user = Auth::user();
            $assignedEvaluations = AssignedEvaluation::where('CollaboratorID', $user->id)->get();
            $data = $assignedEvaluations;
        }

        return view('home', compact('data'));
    }
}
