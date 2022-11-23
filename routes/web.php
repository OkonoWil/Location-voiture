<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\RetourController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\TechnicienController;

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

Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
Route::get('login', [AuthController::class, 'getLogin'])->name('getlogin');
Route::post('login', [AuthController::class, 'postLogin'])->name('postlogin');
Route::get('contact', [HomeController::class, 'getcontact'])->name('home.getContact');
Route::post('contact', [HomeController::class, 'postContact'])->name('home.postContact');
Route::get('about', [HomeController::class, 'about'])->name('home.about');

Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});


Route::prefix('technicien')->middleware(['auth', 'technicien'])->group(function () {
    Route::get('/', [TechnicienController::class, 'index'])->name('technicien.index');
    Route::resource('retours', RetourController::class);
});


Route::prefix('manager')->middleware(['auth', 'manager'])->group(function () {
    Route::get('/', [ManagerController::class, 'index'])->name('manager.index');
});


Route::prefix('employe')->middleware(['auth', 'employe'])->group(function () {
    Route::get('/', [EmployeController::class, 'index'])->name('employe.index');
    Route::resource('location', LocationController::class);
    Route::resource('paiement', PaiementController::class);
    Route::resource('client', ClientController::class);
    Route::resource('location', LocationController::class);
});
