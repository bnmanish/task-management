<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::post('/add-task', [HomeController::class, 'addTask'])->name('add.task');
Route::post('/get-task-list', [HomeController::class, 'getTaskList'])->name('get.task.list');
Route::post('/update-task-order', [HomeController::class, 'updateTaskOrder'])->name('update.task.order');
Route::post('/delete-task-order', [HomeController::class, 'deleteTask'])->name('delete.task');
Route::post('/update-task', [HomeController::class, 'updateTask'])->name('update.task');
