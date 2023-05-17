<?php

use App\Http\Controllers\SubjectController;
use App\Models\subject;
use App\Models\Department;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
Route::get('/', function () {
    return view('welcome');
});

*/



route::get('departments', function () {
    $departments = Department::get();
    return view('departments', ['departments' => $departments]);
});

route::middleware('auth')->resource('subjects', SubjectController::class);

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
