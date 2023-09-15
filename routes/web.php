<?php

use App\Livewire\Admin\Course\Index as CourseIndex;
use App\Livewire\Admin\Subject\SubjectIndex;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum', 'admin',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/course', CourseIndex::class)->name('course.index');

    Route::get('/subject', SubjectIndex::class)->name('subject.index');
});
