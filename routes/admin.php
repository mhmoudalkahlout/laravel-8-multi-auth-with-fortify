<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\HomeController;
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

Route::group(['as' => 'admin.'], function() {

	Route::group(['middleware' => 'auth:admin'], function() {

		Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
		Route::get('/', [HomeController::class, 'index'])->name('home');

	});

	Route::group(['middleware' => 'guest:admin'], function() {

		Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
		Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login');

	});

});
