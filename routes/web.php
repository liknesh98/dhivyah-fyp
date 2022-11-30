<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Students\StudentAnnouncementController;
use App\Http\Controllers\Students\StudyMaterialController;

use App\Http\Controllers\Teacher\ManageStudyMaterialController;

use App\Http\Controllers\Admin\AdminAnnouncementController;
use App\Http\Controllers\Admin\AdminNotesController;
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
Route::get('/payment', function () {
    return view('payment');
});


Auth::routes();
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Students
Route::get('/s_announcement', [StudentAnnouncementController::class, 'index'])->name('s_announcement');
Route::get('/student/exercise', [StudyMaterialController::class, 'getExercise'])->name('g_exercise');
Route::get('/student/study/{year}', [StudyMaterialController::class , 'index'])->name('g_study');
Route::get('/student/notes/{id}', [StudyMaterialController::class , 'getNotes']);


// Teacher
Route::get('/t_quest/{exercise_id}', [ManageStudyMaterialController::class, 'question'])->name('/teacher/question');
Route::post('/quest_store', [ManageStudyMaterialController::class, 'store'])->name('quest_store');
Route::get('/teacher/exercise',[ManageStudyMaterialController::class, 'exercise'])->name('/teacher/exercise');
Route::post('/teacher/exercise_store',[ManageStudyMaterialController::class, 'exercise_store'])->name('exercise_store');
Route::get('/teacher/note',[ManageStudyMaterialController::class, 'notes'])->name('notes');
Route::get('/teacher/video',[ManageStudyMaterialController::class, 'videos'])->name('videos');

// Admin
Route::get('/a_announcement', [AdminAnnouncementController::class, 'index'])->name('a_announcement');
Route::post('/announcement_store', [AdminAnnouncementController::class, 'store'])->name('announcement_store');
Route::post('/announcement_update', [AdminAnnouncementController::class, 'update'])->name('announcement_update');
Route::get('/announcement_delete/{id}', [AdminAnnouncementController::class, 'delete'])->name('announcement_delete');

Route::get('/a_note', [AdminNotesController::class, 'index'])->name('a_note');
Route::post('/note_store', [AdminNotesController::class, 'store'])->name('note_store');
Route::post('/note_update', [AdminNotesController::class, 'update'])->name('note_update');
Route::get('/note_delete/{id}', [AdminNotesController::class, 'delete'])->name('note_delete');
