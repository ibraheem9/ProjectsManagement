<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\TimesheetController;

Route::get('/', function (){
    return "Welcome to projects management API";
});
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('/projects', ProjectController::class);
    Route::apiResource('/attributes', AttributeController::class);
    Route::apiResource('/timesheets', TimesheetController::class);
});