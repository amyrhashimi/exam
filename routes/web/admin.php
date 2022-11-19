<?php

use App\Http\Livewire\Admin\Home;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/' , Home::class)->name('admin');

Route::prefix('/users')->group(function() {
    Route::get('/', App\Http\Livewire\Admin\Users\Index::class)->name('users');
    Route::get('/{user}/edit', \App\Http\Livewire\Admin\Users\Edit::class)->name('users.edit');
    Route::delete('/{user}/destroy', \App\Http\Livewire\Admin\Users\Destroy::class)->name('users.destroy');
});

Route::prefix('/exams')->group(function () {
    Route::get('/', \App\Http\Livewire\Admin\Exam\Index::class)->name('exams');
    Route::get('/create', \App\Http\Livewire\Admin\Exam\Create::class)->name('exams.create');
    Route::get('/{exam}/edit', \App\Http\Livewire\Admin\Exam\Edit::class)->name('exams.edit');
    Route::delete('/{exam}/destroy', \App\Http\Livewire\Admin\Exam\Destroy::class)->name('exams.destroy');

    Route::get('/{exam}/questions', App\Http\Livewire\Admin\Exam\AllQuestions::class)->name('exams.questions');
    Route::get('/{question}/result', App\Http\Livewire\Admin\Exam\AddResults::class)->name('exams.addResults');
});

Route::prefix('/lessons')->group(function () {
    Route::get('/', \App\Http\Livewire\Admin\Lesson\Index::class)->name('lessons');
    Route::get('/create', \App\Http\Livewire\Admin\Lesson\Create::class)->name('lessons.create');
    Route::get('/{lesson}/edit', \App\Http\Livewire\Admin\Lesson\Edit::class)->name('lessons.edit');
    Route::delete('/{lesson}/destroy', \App\Http\Livewire\Admin\Lesson\Destroy::class)->name('lessons.destroy');
});
