<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\FeedbackController;
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
Route::get('/', [AuthenticatedSessionController::class, 'create'])
    ->name('login');



    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [UserController::class, 'showAll'])->name('dashboard');
        Route::group(['middleware' => ['can:create student']], function () {
            Route::get('/subjectsRegister/create', [SubjectController::class, 'create'])->name('subjects.subjectsRegister');
            Route::post('/subjectsRegister/store', [SubjectController::class, 'store'])->name('subjects.subjectsRegister.store');
            Route::get('/classesRegister/create', [ClassesController::class, 'create'])->name('classes.classesRegister');
            Route::post('/classesRegister/store', [ClassesController::class, 'store'])->name('classes.classesRegister.store');
            Route::get('teachers/{id}/attach', [SubjectController::class, 'index'])->name('classes.attach-teacher');
            Route::post('teacher/{id}/attach', [SubjectController::class, 'update'])->name('classes.attach-teachers');
            Route::get('students/{id}/attach', [UserController::class, 'index'])->name('classes.student');
            Route::post('student/{id}/attach', [UserController::class, 'update'])->name('classes.students');
        });
    
    Route::group(['middleware' => ['can:feedback']], function(){
        Route::post('/feedback/store', [FeedbackController::class, 'store'])->name('feedbacks.store');
    });

    Route::group(['middleware' => ['can:view feedback']], function(){
        Route::get('teachers/{id}/feedbacks', [FeedbackController::class, 'index'])->name('feedbacks.index');
    });


    Route::get('teachers/{id}/attach', [SubjectController::class, 'index'])->name('classes.attach-teacher');
    Route::get('teachers/{id}/classes', [UserController::class, 'show'])->name('classes.view-classes');
    Route::post('teacher/{id}/attach', [SubjectController::class, 'update'])->name('classes.attach-teachers');

    Route::get('students/{id}/attach', [UserController::class, 'index'])->name('classes.student');
    Route::post('student/{id}/attach', [UserController::class, 'update'])->name('classes.students');
        
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__ . '/auth.php';
