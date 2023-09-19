<?php

use App\Http\Controllers\HahaController;
use App\Livewire\Admin\Course\Index as CourseIndex;
use App\Livewire\Admin\Subject\SubjectIndex;
use App\Livewire\Auth\Registration;
use App\Livewire\Teacher\Class\IndexClass;
use App\Livewire\Teacher\Dashboard\TeacherDashboard;
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

Route::get('/', [HahaController::class, 'haha']);

Route::get('/register', Registration::class)->name('register');


/**
 * ADMIN ROUTE
 */

Route::middleware([
    'auth:sanctum', 'role:admin',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('admin.dashboard');

    Route::get('/course', CourseIndex::class)->name('course.index');

    Route::get('/subject', SubjectIndex::class)->name('subject.index');
});

/**
 * TEACHER ROUTE
 */

Route::middleware([
    'auth:sanctum', 'role:teacher',
    config('jetstream.auth_session'),
    'verified',
])->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/dashboard', TeacherDashboard::class)->name('dashboard');

    Route::get('/{id}/class', IndexClass::class)->name('class');
});
