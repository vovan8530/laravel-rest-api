<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\TaskController;
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

# TODO: #### AUTH ####

Route::post('/login', [AuthController::class, 'login'])->name('api-login');


Route::middleware('auth:sanctum')->group(function () {

  Route::get('/user', function (Request $request) {
    return $request->user();
  });

  Route::get('/logout', [AuthController::class, 'logout'])->name('api-logout');

  # TODO: #### AUTH ####

  # TODO: #### TASKS ####

  Route::group(['prefix' => 'task'], function () {
    Route::get('/', [TaskController::class, 'index'])->name('tasks-api');
    Route::get('{task}', [TaskController::class, 'show'])->name('task-api');
    Route::post('store', [TaskController::class, 'store'])->name('task-store');
  });

  # TODO: #### TASKS ####

  # TODO: #### TAGS ####

  Route::group(['prefix' => 'tag'], function () {
    Route::get('/', [TagController::class, 'index'])->name('tags-api');
    Route::get('{task}', [TagController::class, 'show'])->name('tag-api');
    Route::post('store', [TagController::class, 'store'])->name('tag-store');
  });

  # TODO: #### TAGS ####

});



