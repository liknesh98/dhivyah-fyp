<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
//student
use App\Http\Controllers\Students\StudentAnnouncementController;
use App\Http\Controllers\Students\StudyMaterialController;
//teacher
use App\Http\Controllers\Teacher\ManageStudyMaterialController;
//admin
use App\Http\Controllers\Admin\AdminAnnouncementController;
use App\Http\Controllers\Admin\AdminNotesController;
use App\Http\Controllers\Admin\FeesListController;
use App\Http\Controllers\Admin\StudentListController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\StaffController;

//General
use App\Http\Controllers\ProfileController;
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
Route::get('/student/exercise/{exercise_id}', [StudyMaterialController::class, 'get_exercise'])->name('g_exercise');
Route::get('/student/study/{year}/{subject}', [StudyMaterialController::class , 'index'])->name('g_study');
Route::get('/student/notes/{id}', [StudyMaterialController::class , 'getNotes']);


// Teacher
Route::get('/t_quest/{exercise_id}', [ManageStudyMaterialController::class, 'question'])->name('/teacher/question');
Route::get('/teacher/question_details/{question_id}', [ManageStudyMaterialController::class, 'question_details'])->name('teacher/question_details');
Route::post('/quest_store', [ManageStudyMaterialController::class, 'question_store'])->name('/quest_store');
Route::get('/quest_delete/{id}', [ManageStudyMaterialController::class, 'question_delete'])->name('quest_delete');
Route::get('/teacher/exercise',[ManageStudyMaterialController::class, 'exercise'])->name('/teacher/exercise');
Route::post('/teacher/exercise_store',[ManageStudyMaterialController::class, 'exercise_store'])->name('exercise_store');
Route::get('/teacher/exercise_delete/{exercise_id}', [ManageStudyMaterialController::class, 'exercise_delete'])->name('teacher/exercise_delete');
Route::get('/teacher/note',[ManageStudyMaterialController::class, 'notes'])->name('notes');
Route::get('/teacher/video',[ManageStudyMaterialController::class, 'videos'])->name('videos');

// Admin
Route::get('/a_announcement', [AdminAnnouncementController::class, 'index'])->name('a_announcement');
Route::post('/announcement_store', [AdminAnnouncementController::class, 'store'])->name('announcement_store');
Route::post('/announcement_update', [AdminAnnouncementController::class, 'update'])->name('announcement_update');
Route::get('/announcement_delete/{id}', [AdminAnnouncementController::class, 'delete'])->name('announcement_delete');
Route::get('/admin/student_list', [StudentListController::class, 'index'])->name('student_list');
Route::get('/admin/fees', [FeesListController::class, 'index'])->name('fees');
Route::get('/admin/registration', [RegisterController::class, 'index'])->name('registration');
Route::get('/admin/staff', [StaffController::class, 'index'])->name('staff');

Route::get('/a_note', [AdminNotesController::class, 'index'])->name('a_note');
Route::post('/note_store', [AdminNotesController::class, 'store'])->name('note_store');
Route::post('/note_update', [AdminNotesController::class, 'update'])->name('note_update');
Route::get('/note_delete/{id}', [AdminNotesController::class, 'delete'])->name('note_delete');


//General
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
