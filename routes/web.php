<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\InstitutionController;

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

Route::get('/', [HomeController::class, 'showHome'])->name('home');
Route::get('/about', [AboutController::class, 'show'])->name('about');
Route::get('/animal', [AnimalController::class, 'show'])->name('animal');
Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::get('/institution', [InstitutionController::class, 'show'])->name('institution');

// Auth Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.showForm');
Route::post('/login', [AuthController::class, 'doLogin'])->name('login.do');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.showForm');
Route::post('/register', [AuthController::class, 'doRegister'])->name('register.do');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');