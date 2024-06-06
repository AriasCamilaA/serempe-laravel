<?php

namespace App\Http\Controllers;

use App\Models\TeamGroup;
use App\Models\User;
use Illuminate\Http\Request;

class TeamGroupController extends Controller
{
    public function index()
    {
        $groups = TeamGroup::all();
        return view('groups.index', compact('groups'));
    }

    public function create()
    {
        $leaders = User::where('Type', 'Leader')->get();
        return view('groups.create', compact('leaders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'leader_id' => 'required|exists:users,id',
        ]);

        TeamGroup::create([
            'Name' => $request->name,
            'LeaderID' => $request->leader_id,
        ]);

        return redirect()->route('groups.index')->with('success', 'Grupo creado con éxito.');
    }

    public function show(TeamGroup $group)
    {
        return view('groups.show', compact('group'));
    }

    public function addLeaderForm(TeamGroup $group)
    {
        $leaders = User::where('Type', 'Leader')->get();
        return view('groups.add-leader', compact('group', 'leaders'));
    }

    public function storeLeader(Request $request, TeamGroup $group)
    {
        $request->validate([
            'leader_id' => 'required|exists:users,id',
        ]);

        $group->LeaderID = $request->leader_id;
        $group->save();

        return redirect()->route('groups.show', $group)->with('success', 'Líder agregado con éxito.');
    }

    public function addCollaboratorForm(TeamGroup $group)
    {
        $collaborators = User::where('Type', 'Collaborator')->get();
        return view('groups.add-collaborator', compact('group', 'collaborators'));
    }

    public function storeCollaborator(Request $request, TeamGroup $group)
    {
        $request->validate([
            'collaborator_id' => 'required|exists:users,id',
        ]);

        $group->collaborators()->attach($request->collaborator_id);

        return redirect()->route('groups.show', $group)->with('success', 'Colaborador agregado con éxito.');
    }
}

