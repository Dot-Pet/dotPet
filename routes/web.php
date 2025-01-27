<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\MyAnimalsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SearchController;
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
Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard');
Route::get('/about', [AboutController::class, 'show'])->name('about');
Route::get('/myanimals', [MyAnimalsController::class, 'show'])->name('myanimals');
Route::get('/contact', [ContactController::class, 'show'])->name('contact');

// Institution Routes
Route::get('/institution', [SearchController::class, 'showSearchInstitution'])->name('institution');
Route::get('/institution/search', [SearchController::class, 'searchInstitution'])->name('search.institution');

// Animal Routes
Route::get('/animal', [SearchController::class, 'showSearchAnimal'])->name('animal');
Route::post('/animal', [AnimalController::class, 'doRegister'])->name('animalRegister');
Route::get('/animal/search', [SearchController::class, 'searchAnimal'])->name('search.animal');
Route::get('/animal/publish/{id}', [AnimalController::class, 'publish'])->name('animal.publish');
Route::get('/animal/unpublish/{id}', [AnimalController::class, 'unpublish'])->name('animal.unpublish');
Route::get('/animal/delete/{id}', [AnimalController::class, 'delete'])->name('animal.delete');
Route::post('/animal/update/bio/{id}', [AnimalController::class, 'updateBio'])->name('animal.update.bio');
Route::post('/animal/update/photo/{id}', [AnimalController::class, 'updatePhoto'])->name('animal.update.photo');
Route::post('/animal/update/{id}', [AnimalController::class, 'update'])->name('animal.update');
Route::get('/animal/adopt/{id}', [AnimalController::class, 'adopt'])->name('animal.adopt');
Route::get('/animal/adopt/cancel/{id}', [AnimalController::class, 'cancelAdopt'])->name('animal.adopt.cancel');
Route::get('/animal/adopt/approve/{id}', [AnimalController::class, 'approveAdopt'])->name('animal.adopt.approve');
Route::get('/animal/adopt/disapprove/{id}', [AnimalController::class, 'disapproveAdopt'])->name('animal.adopt.disapprove');
Route::get('/animal/{id}', [AnimalController::class, 'showId'])->name('animalId');

// Auth Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.showForm');
Route::post('/login', [AuthController::class, 'doLogin'])->name('login.do');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.showForm');
Route::post('/register', [AuthController::class, 'doRegister'])->name('register.do');
Route::get('/register/institution', [AuthController::class, 'showInstitutionRegisterForm'])->name('register.institution.showForm');
Route::post('/register/institution', [AuthController::class, 'doInstitutionRegister'])->name('register.institution.do');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');