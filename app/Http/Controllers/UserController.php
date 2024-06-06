<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role_id' => 'required|exists:roles,RoleID',
            'type' => 'required|in:Leader,Collaborator',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'RoleID' => $request->role_id,
            'Type' => $request->type,
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado con éxito.');
    }
}
