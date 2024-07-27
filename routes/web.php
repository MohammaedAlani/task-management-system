<?php

use App\Http\Controllers\HomeController;
use App\Livewire\Project\ProjectCreate;
use App\Livewire\Project\ProjectEdit;
use App\Livewire\Project\ProjectIndex;
use App\Livewire\Project\ProjectView;
use App\Livewire\Task\TaskCreate;
use App\Livewire\Task\TaskEdit;
use App\Livewire\Task\TaskShow;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/login', [UserController::class, 'showLoginForm']);
Route::post('/login', [UserController::class, 'login'])->name('login');


// create group routes named dashboard and add middleware auth
Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    // Project
    Route::get('/projects', ProjectIndex::class)->name('project.index');
    Route::get('/projects/create', ProjectCreate::class)->name('project.create');
    Route::get('/projects/{project}/edit', ProjectEdit::class)->name('project.edit');
    Route::get('/projects/{project}', ProjectView::class)->name('project.show');

    // Task
    Route::get('/projects/{project}/tasks/create', TaskCreate::class)->name('task.create');
    Route::get('/task/{task}/edit', TaskEdit::class)->name('task.edit');
    Route::get('/task/{task}', TaskShow::class)->name('task.show');

});
