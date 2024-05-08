<?php

use App\Http\Controllers\progressCtr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\IdeController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\RecordsController;
use App\Http\Controllers\accountManagement;
use App\Http\Controllers\lessonManagement;
use App\Livewire\Quiz;

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

Route::view('/', 'login')->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/login', [AuthController::class, 'viewLogin'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::view('/guest', 'dashboard')->name('guest');
Route::get('/dashboard', [DashboardController::class, 'validateSession'])->name('dashboard');
Route::group(['middleware' => 'auth.student'], function() {
    Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
    Route::view('/settings', 'settings')->name('settings');
});


Route::get('/progress/{id}', [progressCtr::class, 'show'])->name('progressManagement');
Route::delete('/delete_progress/{id}', [progressCtr::class,'destroy'])->name('progress_delete');

Route::view('/topic', [TopicController::class, 'topic'])->name('topic');
Route::get('/topic/{value}', [TopicController::class, 'openDashboardTopic'])->name('dashboard.topic');
Route::view('/about', 'about')->name('about');
Route::view('/privacy', 'privacy')->name('privacy');
Route::view('/contact', 'contact')->name('contact');
Route::get('/open-topic/{value}', [TopicController::class, 'openTopic'])->name('open.topic');
Route::view('/topic_one', 'topic_one')->name('topic_one');
Route::view('/topic_three', 'topic_three')->name('topic_three');
Route::view('/topic_four', 'topic_four')->name('topic_four');
Route::view('/topic_five', 'topic_five')->name('topic_five');
Route::view('/topic_six', 'topic_six')->name('topic_six');
Route::view('/topic_seven', 'topic_seven')->name('topic_seven');
Route::view('/topic_eight', 'topic_eight')->name('topic_eight');
Route::get('/ide', [IdeController::class, 'loadCode'])->name('ide');
Route::get('/quiz', [QuizController::class, 'loadQuiz'])->name('quiz');
Route::post('/quiz', [QuizController::class, 'gradeQuiz'])->name('quiz.grade');
Route::get('/grade',[GradeController::class, 'loadGrade'])->name('grade.student');
Route::post('/topic_validate',[TopicController::class, 'isTopicCompleted'])->name('validate.topic');
Route::get('/topic_progress',[DashboardController::class, 'getAllTopicProgress'])->name('progress.dashboard');
Route::get('/settings_update', [SettingController::class,'updateAccount'])->name('update.settings');
Route::get('/records_grade', [RecordsController::class, 'retrieveGrade'])->name('grade.records');

Route::get('/account_management', [accountManagement::class, 'index'])->name('account_managementss');
Route::get('/account_edit/{id}', [accountManagement::class, 'edit'])->name('account_edit');
Route::put('/update_username/{id}', [accountManagement::class, 'updateUsername'])->name('account_username_update');
Route::put('/update_info/{id}', [accountManagement::class, 'updateUserData'])->name('account_info_update');
Route::delete('/delete_account/{id}', [accountManagement::class,'destroy'])->name('account_delete');
Route::put('/password_reset/{id}', [accountManagement::class,'resetPassword'])->name('account_reset');

Route::get('/lesson_management', [lessonManagement::class, 'index'])->name('lesson_managementss');
Route::post('/create_lesson', [lessonManagement::class, 'storeLesson'])->name('lesson_store');
Route::get('/web_builder/{id}', [lessonManagement::class, 'create'])->name('lesson_builder');
Route::post('/create_component/{id}', [lessonManagement::class, 'storeComponent'])->name('lesson_builder');
Route::post('/create_code/{id}', [lessonManagement::class, 'createCode'])->name('code_builder');

Route::put('/update_lesson_name/{id}', [lessonManagement::class, 'update_lesson_name'])->name('lesson_update_name');
Route::put('/update_component/{id}', [lessonManagement::class, 'update_component'])->name('update_component');
Route::delete('/delete_component/{id}', [lessonManagement::class,'delete_component'])->name('delete_component');
Route::get('/lesson_id/{id}', [lessonManagement::class,'show'])->name('show_lesson');
Route::post('create_question/{id}',[lessonManagement::class,'storeQuestion']);
Route::put('update_question/{id}',[lessonManagement::class,'updateQuestion']);
Route::get('/question_id/{id}', Quiz::class)->name('show_question');
Route::delete('/delete_lesson/{id}', [lessonManagement::class,'destroyLesson']);











