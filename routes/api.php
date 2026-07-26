<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\jobtypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/users', [AuthController::class, 'fatch']);
Route::post('/usersCreate', [AuthController::class, 'create']);
Route::get('/deleteUser/{id}', [AuthController::class, 'delete']);

Route::get('/jobtype', [jobtypeController::class, 'jobtype']);
Route::post('/jobtypeCreate', [jobtypeController::class, 'create']);
Route::delete('/jobdel/{id}', [jobtypeController::class, 'delete']);
Route::put('/jobupdate/{id}', [jobtypeController::class, 'update']);
