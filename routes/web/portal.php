<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Portal Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', \App\Http\Livewire\Admin\Home::class)->name('portal');

Route::prefix('/exams')->group(function () {
    Route::get('/', \App\Http\Livewire\Portal\Exam\Index::class)->name('exams.all');
    Route::get('/{slug}', \App\Http\Livewire\Portal\Exam\Single::class)->name('exams.single');
});

Route::get('/records', \App\Http\Livewire\Portal\Records\Index::class)->name('records');
Route::get('/record/{exam}', \App\Http\Livewire\Portal\Records\Single::class)->name('records.single');
