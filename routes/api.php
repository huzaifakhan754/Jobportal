<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\jobController;
use App\Http\Controllers\jobtypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//     Job Type Routes
Route::get('/jobtype', [jobtypeController::class, 'jobtype']);
Route::post('/jobtypeCreate', [jobtypeController::class, 'create']);
Route::delete('/jobdel/{id}', [jobtypeController::class, 'delete']);
Route::put('/jobupdate/{id}', [jobtypeController::class, 'update']);

//     User login Routes
Route::post('/register', [AuthController::class, 'insert']);
Route::post('/login', [AuthController::class, 'login']);

//     Job innsert Routes
Route::get('/jobs', [jobController::class, 'jobtype']);
Route::post('/jobsCreate', [jobController::class, 'create']);
Route::delete('/jobsdel/{id}', [jobController::class, 'delete']);
Route::put('/jobsupdate/{id}', [jobController::class, 'update']);
