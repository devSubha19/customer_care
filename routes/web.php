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
//admin
Route::get('viewuser', [UserController::class, 'user'])->name('user');
Route::get('adduser', [UserController::class, 'adduser'])->name('adduser');
Route::post('saveuser', [UserController::class, 'saveuser'])->name('saveuser');
Route::get('banuser', [UserController::class, 'banuser'])->name('banuser');
Route::get('addcall', [UserController::class, 'addcall'])->name('addcall');

?>



