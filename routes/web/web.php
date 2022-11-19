<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Artisan;
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

// Route::get('/clear', function(){
//     Artisan::call('cache:clear');
//     Artisan::call('route:clear');
//     Artisan::call('config:clear');

//     return 'DONE ... ';
// });

Route::get('/' , [HomeController::class , 'home'])->name('home');
Route::get('/register' , [HomeController::class , 'register'])->middleware('guest')->name('register');
Route::post('/register' , [HomeController::class , 'registerPost'])->middleware('guest')->name('register.post');
Route::get('/login' , [HomeController::class , 'login'])->middleware('guest')->name('login');
Route::post('/login' , [HomeController::class , 'loginPost'])->middleware('guest')->name('login.post');
Route::get('/logout' ,[ HomeController::class , 'logout' ] )->middleware('auth')->name('logout');

