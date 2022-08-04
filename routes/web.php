<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\CheckLoginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Chạy migrate trên hosting
Route::get('/migrate', function () {
    return app('migrator')->run(database_path('migrations'));
});

// Clear cache hosting
Route::get('/clear-cache', function() {
    $checkCache = Artisan::call('cache:clear');

    return 'Clear thành công';
});


Route::get('/', function () {
    return view('welcome');
});


// Resource Controller
Route::resource('projects',ProjectController::class)->middleware(['auth']);
Route::resource('tasks',TaskController::class)->middleware(['auth']);
Route::resource('users',\App\Http\Controllers\UserController::class)->middleware(['auth']);
Route::resource('departments',\App\Http\Controllers\DepartmentController::class)->middleware(['auth']);
Route::resource('positions',\App\Http\Controllers\PositionController::class)->middleware(['auth']);
Route::resource('users',\App\Http\Controllers\UserController::class)->middleware(['auth']);

// Other Controller
// Logout
Route::get('/logout',[\App\Http\Controllers\HomeController::class,'logout'])->middleware(['auth'])->name('home.logout');


Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
