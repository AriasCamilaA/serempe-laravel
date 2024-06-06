<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\TeamGroupController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AssignedEvaluationController;
use App\Http\Controllers\CollaboratorAnswerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;


// General routes
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Admin routes
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    // Rutas para gestionar usuarios
    Route::get('/admin/register', [AdminController::class, 'showRegisterForm'])->name('admin.register.form');
    Route::post('/admin/register', [AdminController::class, 'register'])->name('admin.register');
    Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/admin/users/{user}', [UserController::class, 'update'])->name('users.update');
});


// Rutas para evaluaciones
Route::middleware(['auth'])->group(function () {
    Route::get('/evaluations', [EvaluationController::class, 'index'])->name('evaluations.index');
    Route::get('/evaluations/create', [EvaluationController::class, 'create'])->name('evaluations.create');
    Route::post('/evaluations', [EvaluationController::class, 'store'])->name('evaluations.store');
    Route::get('/evaluations/{evaluation}', [EvaluationController::class, 'show'])->name('evaluations.show');
    Route::get('/evaluations/{evaluation}/questions/create', [EvaluationController::class, 'createQuestion'])->name('questions.create');
    Route::post('/evaluations/{evaluation}/questions', [EvaluationController::class, 'storeQuestion'])->name('questions.store');
    Route::get('/evaluations/{evaluation}/questions/{question}/answers/create', [EvaluationController::class, 'createAnswer'])->name('answers.create');
    Route::post('/evaluations/{evaluation}/questions/{question}/answers', [EvaluationController::class, 'storeAnswer'])->name('answers.store');
});

// Rutas para grupos
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/groups', [TeamGroupController::class, 'index'])->name('groups.index');
    Route::get('/groups/create', [TeamGroupController::class, 'create'])->name('groups.create');
    Route::post('/groups', [TeamGroupController::class, 'store'])->name('groups.store');
    Route::get('/groups/{group}', [TeamGroupController::class, 'show'])->name('groups.show');
    Route::get('/groups/{group}/add-leader', [TeamGroupController::class, 'addLeaderForm'])->name('groups.add-leader');
    Route::post('/groups/{group}/add-leader', [TeamGroupController::class, 'storeLeader'])->name('groups.store-leader');
    Route::get('/groups/{group}/add-collaborator', [TeamGroupController::class, 'addCollaboratorForm'])->name('groups.add-collaborator');
    Route::post('/groups/{group}/add-collaborator', [TeamGroupController::class, 'storeCollaborator'])->name('groups.store-collaborator');
});

// Rutas para evaluaciones asignadas
Route::middleware(['auth'])->group(function () {
    Route::get('/assigned_evaluations', [AssignedEvaluationController::class, 'index'])->name('assigned_evaluations.index');
    Route::get('/assigned_evaluations/create', [AssignedEvaluationController::class, 'create'])->name('assigned_evaluations.create');
    Route::post('/assigned_evaluations', [AssignedEvaluationController::class, 'store'])->name('assigned_evaluations.store');
    Route::get('/assigned_evaluations/{assignedEvaluation}', [AssignedEvaluationController::class, 'show'])->name('assigned_evaluations.show');
    Route::get('/assigned_evaluations/{assignedEvaluation}/edit', [AssignedEvaluationController::class, 'edit'])->name('assigned_evaluations.edit');
    Route::put('/assigned_evaluations/{assignedEvaluation}', [AssignedEvaluationController::class, 'update'])->name('assigned_evaluations.update');
    Route::delete('/assigned_evaluations/{assignedEvaluation}', [AssignedEvaluationController::class, 'destroy'])->name('assigned_evaluations.destroy');
    Route::get('/assigned_evaluations/group', [AssignedEvaluationController::class, 'showGroupEvaluations'])->name('assigned_evaluations.group');
    Route::get('/assigned_evaluations/group/{evaluationID}/{groupID}', [AssignedEvaluationController::class, 'showGroupEvaluationDetails'])->name('assigned_evaluations.group.details');
});
