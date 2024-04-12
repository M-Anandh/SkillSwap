<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController1;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AnnouncementController;

// use App\Http\Controllers\UserMeetingController;

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


Auth::routes();

Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    // Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/interest-skills', [UserIntrestController::class, 'index'])->name('user.interest.index');

});

Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    // Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'user-access:creator'])->group(function () {
  
    // Route::get('/creator/home', [HomeController::class, 'managerHome'])->name('manager.home');
    Route::get('/upcoming-and-completed-meetings', [UserMeetingController::class, 'upcomingAndCompletedMeetings'])->name('user.dash');

});





Route::get('/index/service', function () {
    return view('FrontEnd.service');
});

Route::get('/', function () {
    return view('FrontEnd.index');
});

Route::get('/index/about', function () {
    return view('FrontEnd.about');
});

Route::get('/index/contact', function () {
    return view('FrontEnd.contact');
});

Route::get('/index/login', function () {
    return view('Login.login');
});




Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('register');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Handle creator login attempts
// Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'creatorLogin'])->name('user.login.attempt');



Route::get('/creator/register', function () {
    return view('auth.creatorregister');
})->name('creator.register');

// Route::post('/creator/register', 'RegisterController@create')->name('creator.register');
Route::post('/creator/register', [App\Http\Controllers\Auth\RegisterController1::class, 'create'])->name('creator.register');

Route::get('/users/login', function () {
    return view('auth.logins');
})->name('logins');



// Display the creator login form
Route::get('/creator/login', function () {
    return view('auth.creatorlogin');
})->name('creator.login');

// Handle creator login attempts
Route::post('/creator/login', [App\Http\Controllers\Auth\LoginController::class, 'creatorLogin'])->name('creator.login.attempt');


Route::get('/logout', 'AuthController@logout')->name('logout');



use App\Http\Controllers\UserController;
Route::get('/user-details', [UserController::class, 'show'])->name('user.details')->middleware('auth');
Route::patch('/users/update', [UserController::class, 'update'])->name('user.update')->middleware('auth');

use App\Http\Controllers\CreatorController;
Route::get('/creator-details', [CreatorController::class, 'show'])->name('creator.details')->middleware('auth');
Route::patch('/creator/update', [CreatorController::class, 'update'])->name('creator.update')->middleware('auth');

use App\Http\Controllers\FileController;



Route::get('/upload-form', [FileController::class, 'showForm'])->name('upload-form')->middleware('auth');
Route::post('/upload', [FileController::class, 'upload']);
Route::get('/download/{id}', [FileController::class, 'download']);
Route::delete('/delete-file/{id}', [FileController::class, 'deleteFile'])->name('delete.file')->middleware('auth');

use App\Http\Controllers\FileListController;

Route::get('/file-list', [FileListController::class, 'index'])->name('file-list.index')->middleware('auth');
Route::get('/files/download/{id}', [FileController::class, 'download'])->name('files.download')->middleware('auth');


use App\Http\Controllers\AdminUserController;

Route::get('/admin/creatorapproval', [AdminUserController::class, 'index'])->name('admin.creatorapproval')->middleware('auth');
Route::post('/admin/creatorapproval/approve/{userId}', [AdminUserController::class, 'approve'])->name('admin.creatorapproval.approve');


use App\Http\Controllers\AdminFileController;

Route::get('/admin/showform', [AdminFileController::class, 'showForm'])->name('admin.showform')->middleware('auth');
Route::post('/admin/upload', [AdminFileController::class, 'upload'])->name('admin.upload');
Route::get('/admin/download/{id}', [AdminFileController::class, 'download'])->name('admin.download');
Route::delete('/admin/delete/{id}', [AdminFileController::class, 'delete'])->name('admin.delete');



use App\Http\Controllers\ManageUserController;

Route::group(['prefix' => 'manage'], function () {
    Route::get('users', [ManageUserController::class, 'index'])->name('manage.users.index');
    Route::delete('users/{id}', [ManageUserController::class, 'destroy'])->name('manage.users.destroy');
});


use App\Http\Controllers\UserSkillController;

Route::middleware(['auth'])->group(function () {
    Route::get('/user-skills', [UserSkillController::class, 'index'])->name('user.skills.index');
});

use App\Http\Controllers\UserIntrestController;
Route::middleware(['auth'])->group(function () {
    Route::get('/interest-skills', [UserIntrestController::class, 'index'])->name('user.interest.index');
});


use App\Http\Controllers\FeedbackController;

Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
Route::get('/feedback/create', [FeedbackController::class, 'create'])->name('feedback.create');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
Route::delete('/feedback/{id}', 'FeedbackController@destroy')->name('feedback.delete');





use App\Http\Controllers\ProfileController;

Route::get('/profile/show', [ProfileController::class, 'show'])->name('profile.show');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');


use App\Http\Controllers\UserMeetingController;
Route::middleware(['auth'])->group(function () {
    Route::post('/book-meeting/{bookedUser}', [UserMeetingController::class, 'bookMeeting'])->name('user.bookMeeting');
    // routes/web.php

    Route::get('/user/meetings', [UserMeetingController::class, 'myMeetings'])->name('user.meetings');
    Route::post('/user/meeting/update/{meeting}', [UserMeetingController::class, 'updateMeeting'])->name('user.meeting.update');
    Route::post('/user/meeting/cancel/{meeting}', [UserMeetingController::class, 'cancelMeeting'])->name('user.meeting.cancel');
    Route::get('/my-booked-meetings', [UserMeetingController::class, 'myBookedMeetings'])->name('user.myBookedMeetings');
    Route::get('/my-booked-meetings/{meeting}/update', [UserMeetingController::class, 'updateMeeting'])->name('user.updateMeeting');
    Route::get('/my-booked-meetings/{meeting}/cancel', [UserMeetingController::class, 'cancelMeeting'])->name('user.cancelMeeting');
    Route::get('/all-meetings', [UserMeetingController::class, 'allMeetings'])->name('user.allMeetings');

    Route::get('/upcoming-and-completed-meetings', [UserMeetingController::class, 'upcomingAndCompletedMeetings'])->name('user.dash');

});



Route::get('/annouce', [AnnouncementController::class, 'index'])->name('announcements.index');
Route::post('/announcements', [AnnouncementController::class, 'store'])->name('announcements.store');
Route::delete('/announcements/{announcement}', [AnnouncementController::class, 'destroy'])->name('announcements.destroy');
Route::get('/userannounce', [AnnouncementController::class, 'indexWithoutDelete'])
    ->name('announcements.without.delete');




