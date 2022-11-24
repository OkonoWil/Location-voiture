<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\TechnicienController;
use App\Http\Livewire\ClientComp;
use App\Http\Livewire\LocationComp;
use App\Http\Livewire\PaiementComp;
use App\Http\Livewire\RetourComp;
use App\Http\Livewire\UtilisateurComp;

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
    Route::get('retour', RetourComp::class)->name('technicien.retour');
});


Route::prefix('manager')->middleware(['auth', 'manager'])->group(function () {
    Route::get('/', [ManagerController::class, 'index'])->name('manager.index');
    Route::get('utilisateur', UtilisateurComp::class)->name('manager.utilisateur');
});


Route::prefix('employe')->middleware(['auth', 'employe'])->group(function () {
    Route::get('/', [EmployeController::class, 'index'])->name('employe.index');
    Route::get('paiement', PaiementComp::class)->name('employe.paiement');
    Route::get('client', ClientComp::class)->name('employe.client');
    Route::get('location', LocationComp::class)->name('employe.location');
});
