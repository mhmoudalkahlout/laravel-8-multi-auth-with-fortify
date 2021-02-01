<?php

use App\Http\Controllers\Web\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Web\HomeController;
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

Route::group(['middleware' => 'auth'], function() {

	Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
	
	Route::group(['middleware' => 'verified'], function() {

		Route::get('/', [HomeController::class, 'index'])->name('home');

	});

});
