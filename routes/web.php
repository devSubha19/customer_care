<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\callController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\reportController;
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
//accounts
Route::get('/', [AuthController::class, 'login'])->name('login');


//admin

Route::get('admin', [UserController::class, 'admin'])->name('admin');
Route::get('editadmin', [UserController::class, 'editadmin'])->name('editadmin');
Route::post('saveeditadmin', [UserController::class, 'saveeditadmin'])->name('saveeditadmin');
Route::get('viewuser', [UserController::class, 'user'])->name('user');
Route::get('adduser', [UserController::class, 'adduser'])->name('adduser');
Route::post('saveuser', [UserController::class, 'saveuser'])->name('saveuser');
Route::get('edituser', [UserController::class, 'edituser'])->name('edituser');
Route::post('saveedituser', [UserController::class, 'saveedituser'])->name('saveedituser');
Route::get('banuser', [UserController::class, 'banuser'])->name('banuser');

//employee
Route::get('addcall', [callController::class, 'addcall'])->name('addcall');
Route::post('savecall', [callController::class, 'savecall'])->name('savecall');
Route::get('calllist', [callController::class, 'calllist'])->name('calllist');
Route::get('show_rem_emp', [callController::class, 'show_rem_emp'])->name('show_rem_emp');


//report 
Route::get('donwloadrepo', [reportController::class, 'donwloadrepo'])->name('donwloadrepo');

?>



