<?php

use App\Http\Controllers\Api\AuthController;
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

});



