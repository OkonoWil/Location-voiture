<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManagerController;
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
Route::get('contact', [HomeController::class, 'getcontact'])->name('home.getContact');
Route::get('about', [HomeController::class, 'about'])->name('home.about');
Route::post('contact', [HomeController::class, 'postContact'])->name('home.postContact');


Route::get('admin', [ManagerController::class, 'index'])->name('manager.index');
Route::get('employe', [EmployeController::class, 'index'])->name('employe.index');
Route::get('technicien', [TechnicienController::class, 'index'])->name('technicien.index');
Route::post('login', [AuthController::class, 'postLogin'])->name('postlogin');
Route::get('login', [AuthController::class, 'getLogin'])->name('getlogin');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
