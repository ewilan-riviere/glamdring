<?php

use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\SubmissionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::prefix('/projects')->group(function () {
        Route::get('/', [ProjectController::class, 'index'])->name('api.projects.index');
        Route::patch('/', [ProjectController::class, 'update'])->name('api.projects.update');
    });
});

Route::prefix('/submissions')->group(function () {
    Route::post('/', [SubmissionController::class, 'create'])->name('api.submissions.create');
});
