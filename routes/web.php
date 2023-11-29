<?php

use App\Http\Controllers\TagController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
  return redirect('login');
});

Route :: get ( '/phpinfo' , function() {
    return  phpinfo ();
});


Route::group(['middleware' => 'auth'], function () {

  # TODO: #### TASKS ####

  Route::group(['prefix' => 'task'], function () {
    Route::get('/', [TaskController::class, 'index'])->name('tasks');
    Route::get('create', [TaskController::class, 'create'])->name('task-create');
    Route::get('{task}', [TaskController::class, 'show'])->name('task');
    Route::post('store', [TaskController::class, 'store'])->name('task-store');
  });

  # TODO: #### TASKS ####

  # TODO: #### TAGS ####

  Route::group(['prefix' => 'tag'], function () {
    Route::get('/', [TagController::class, 'index'])->name('tags');
    Route::get('create', [TagController::class, 'create'])->name('tag-create');
    Route::get('{tag}', [TagController::class, 'show'])->name('tag');
    Route::post('store', [TagController::class, 'store'])->name('tag-store');;
  });

  # TODO: #### TAGS ####

});


require __DIR__ . '/auth.php';

