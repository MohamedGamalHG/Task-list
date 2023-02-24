<?php

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
    return view('welcome');
});

 Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'task','middleware'=>'auth'],function(){

    Route::get('tasks',[TaskController::class,'index'])->name('tasks.index');
    Route::post('tasks',[TaskController::class,'store'])->name('tasks.store');
    Route::delete('tasks/{task}',[TaskController::class,'destroy'])->name('tasks.destroy');

});
