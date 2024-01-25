<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/register', [UserController::class, 'registerForm']);
Route::post('/register', [UserController::class, 'createUser']);
Route::get('/view/students', [UserController::class, 'viewUser']);
Route::delete('/deleteuser/{id}', [UserController::class, 'deleteUser'])->name('delete.user');
Route::delete('/updateuser/{id}', [UserController::class, 'updateUser'])->name('update.user');