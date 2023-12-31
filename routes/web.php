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
Route::post('userlogin', [AuthController::class, 'auth'])->name('userlogin');


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
Route::get('downloadrepo', [reportController::class, 'downloadrepo'])->name('downloadrepo');
Route::get('changeaction', [reportController::class, 'changeaction'])->name('changeaction');
Route::post('savechangeaction', [reportController::class, 'savechangeaction'])->name('savechangeaction');
Route::get('seetype', [reportController::class, 'seetype'])->name('seetype');
Route::get('download', [reportController::class, 'downloadPDF'])->name('download');

Route::get('accounts-open', [reportController::class, 'accounts_open'])->name('accounts_open');
Route::get('accounts-ongoing', [reportController::class, 'accounts_ongoing'])->name('accounts_ongoing');
Route::get('accounts-close', [reportController::class, 'accounts_close'])->name('accounts_close');
 
Route::get('complaints-open', [reportController::class, 'complaints_open'])->name('complaints_open');
Route::get('complaints-ongoing', [reportController::class, 'complaints_ongoing'])->name('complaints_ongoing');
Route::get('complaints-close', [reportController::class, 'complaints_close'])->name('complaints_close');

Route::get('general-query-repo', [reportController::class, 'general_query_repo'])->name('general_query_repo');
Route::get('others-repo', [reportController::class, 'others_repo'])->name('others_repo');

Route::get('open-account', [reportController::class, 'open_account'])->name('open-account');
Route::get('ongoing-account', [reportController::class, 'ongoing_account'])->name('ongoing-account');
Route::get('close-account', [reportController::class, 'close_account'])->name('close-account');
 
Route::get('open-complaint', [reportController::class, 'open_complaint'])->name('open-complaint');
Route::get('ongoing-complaint', [reportController::class, 'ongoing_complaint'])->name('ongoing-complaint');
Route::get('close-complaint', [reportController::class, 'close_complaint'])->name('close-complaint');
 

 

?>



