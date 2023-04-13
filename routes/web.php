<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Faculty\PageController;
use App\Http\Controllers\Student\StudentPagesController;
use App\Http\Controllers\Student\QuestionController;
use App\Http\Controllers\Faculty\LectureController;
use App\Http\Controllers\Faculty\LessonController;




/*
|--------------------------------------------------------------------------
| Web Routes
|----------------------a----------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/logout', [AuthController::class , 'logout'])->name('logout');

Route::resource('/auth', AuthController::class);

Route::prefix('admin')->group(function () {
    Route::resource('/', AdminController::class);
    Route::get('/{pages}' , [PagesController::class , 'index'])->name('admin.page');
    Route::resource('/announcement' , AnnouncementController::class);
    Route::get('/class/{id?}' , [PagesController::class , 'show'])->name('admin.show');
})->middleware('isLoggedIn');

Route::prefix('teacher')->group(function () {
    Route::resource('/page', TeacherController::class);
    Route::get('/{pages}' , [PageController::class , 'index'])->name('page');
    Route::resource('/faculty/lecture', LectureController::class);
    Route::resource('/faculty/lesson', LessonController::class);
})->middleware('isLoggedIn');

Route::prefix('student')->group(function () {
    Route::resource('/page', StudentController::class);
    Route::post('/pass/question', [QuestionController::class , 'index'])->name('question');
    Route::resource('/check/lecture', LectureController::class);
    Route::get('/{pages}' , [StudentPagesController::class , 'index'])->name('student.page');
})->middleware('isLoggedIn');

