<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\SubtaskController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Sanctum;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Auth Routes
Route::post('/login',[AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
//Project Routes
Route::prefix('project')->controller(ProjectController::class)->middleware('auth:sanctum')
->group(function() {
    Route::post('/', 'index');
    Route::post('add', 'store');
    Route::post('update', 'edit');
    Route::post('delete', 'destroy');
});
//Task Routes
Route::prefix('task')->controller(TaskController::class)->middleware('auth:sanctum')
->group(function() {
    Route::post('/', 'index');
    Route::post('add', 'store');
    Route::post('update', 'edit');
    Route::post('delete', 'destroy');
});
//Sub_Task Routes
Route::prefix('subtask')->controller(SubtaskController::class)->middleware('auth:sanctum')
->group(function() {
    Route::post('/', 'index');
    Route::post('add', 'store');
    Route::post('update', 'edit');
    Route::post('delete', 'destroy');
});
//Status Routes
Route::prefix('status')->controller(StatusController::class)->middleware('auth:sanctum')
->group(function() {
    Route::post('/', 'index');
    Route::post('add', 'store');
    Route::post('update', 'edit');
    Route::post('delete', 'destroy');
});
//User Routes
Route::prefix('user')->controller(UserController::class)->middleware('auth:sanctum')
->group(function() {
    Route::post('/', 'index');
    Route::post('add', 'store');
    Route::post('update', 'edit');
    Route::post('delete', 'destroy');
});