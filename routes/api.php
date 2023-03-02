<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LoginController;
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

Route::middleware(['guest'])->prefix('/admin')->group(function () {
    Route::post('login', [LoginController::class, 'login']);
});

Route::middleware('auth:sanctum')->prefix('/admin')->group(function () {
    Route::post('logout', [LoginController::class, 'logout']);
    Route::get('me', [AdminController::class, 'me']);

});

Route::group(['prefix' => 'jobs'], function () {
    Route::get('/', [JobController::class, 'view'])->name('job.view');
    Route::get('/{id}', [JobController::class, 'show'])->name('job.show');

});
Route::group(['prefix' => 'admin'], function () {
    Route::get('/jobs', [JobController::class, 'viewByAdmin'])->name('job.view.admin');
    Route::get('/jobs/{id}', [JobController::class, 'showByAdmin'])->name('job.show.admin');
    Route::post('/jobs', [JobController::class, 'create'])->name('job.create');
    Route::put('/jobs/{id}', [JobController::class, 'update'])->name('job.update');
    Route::delete('/jobs/{id}', [JobController::class, 'delete'])->name('job.delete');
});