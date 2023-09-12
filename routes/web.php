<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UploadController;
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

Route::get('/', [LoginController::class, 'show_login_form'])->name('show-login');
Route::post('/login', [LoginController::class, 'process_login'])->name('login');
Route::get('/register', [LoginController::class, 'show_signup_form'])->name('register');
Route::post('/register', [LoginController::class, 'process_signup']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/home', [CompanyController::class, 'index'])->name('home');
Route::get('/create', [CompanyController::class, 'create']);
Route::post('/store', [CompanyController::class, 'store'])->name('store');
