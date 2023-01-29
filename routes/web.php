<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Faculty\PageController;
use App\Http\Controllers\Faculty\LectureController;




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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
route::redirect('/' , '/auth');
Route::get('/logout', [AuthController::class , 'logout'])->name('logout');

Route::resource('/auth', AuthController::class);

Route::prefix('admin')->group(function () {
    Route::resource('/', AdminController::class);
    Route::get('/{pages}' , [PagesController::class , 'index'])->name('admin.page');
    Route::resource('/department' , DepartmentController::class);
})->middleware('isLoggedIn');

Route::prefix('teacher')->group(function () {
    Route::resource('/', TeacherController::class);
    Route::resource('/faculty/lecture', LectureController::class);
    Route::get('/{pages}' , [PageController::class , 'index'])->name('faculty.page');


})->middleware('isLoggedIn');

Route::prefix('student')->group(function () {
    Route::resource('/', StudentController::class);
})->middleware('isLoggedIn');