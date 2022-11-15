<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Students\StudentAnnouncementController;
use App\Http\Controllers\Admin\AdminAnnouncementController;
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

Route::get('/', function () {
    return view('welcome2');
});
Route::get('/contact', function () {
    return view('contact');
});


Auth::routes();
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Students
Route::get('/s_announcement', [StudentAnnouncementController::class, 'index'])->name('s_announcement');



// Admin
Route::get('/a_announcement', [AdminAnnouncementController::class, 'index'])->name('a_announcement');
Route::post('/announcement_store', [AdminAnnouncementController::class, 'store'])->name('announcement_store');
