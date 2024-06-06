<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            $message = 'Hola Admin';
        } elseif ($user->Type == 'Leader') {
            $message = 'Hola Empleado Líder';
        } else {
            $message = 'Hola Empleado Colaborador';
        }

        return view('home', compact('message'));
    }
}
