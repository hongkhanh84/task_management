<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login',[AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');


Route::get('/user/infor',[UserController::class, 'infor']);

Route::post('/project/add',[ProjectController::class, 'store']);

Route::get('/test', function () {
    if (auth()->check()) {
        // User is authenticated
        $tokens = auth()->user()->tokens;
        // Proceed with token-related operations
        dd(1);
    } else {
        dd(2);
        // User is not authenticated
        // Handle the case where authentication is required
    }
});