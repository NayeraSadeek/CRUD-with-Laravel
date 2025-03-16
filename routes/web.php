<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


// *Create a route to display list of users

// Route :: get('/users',[UserController::class,'loadAllUsers']);
// Route :: get('/add/user',[UserController::class,'loadAllUsers']);

// Route :: post('/add/user',[UserController::class,'AddUser'])->name('AddUser');


Route::get('/users',[UserController::class,'loadAllUsers'])->name('users.index');;
Route::get('/add/user',[UserController::class,'loadAddUserForm'])->name('users.create');

Route::post('/add/user',[UserController::class,'AddUser'])->name('AddUser');

Route ::get('/edit/{id}',[UserController::class,'loadEditForm']);
Route ::get('/delete/{id}',[UserController::class,'deleteUser']);


Route::post('/edit/user',[UserController::class,'EditUser'])->name('EditUser');