<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConferenceController;
use App\Http\Controllers\PersonalInterviewController;

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
    return view('home');
})->middleware('auth')->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/conference', [ConferenceController::class, 'list'])
    ->middleware('auth')->name('conference.list');

Route::get('/qr/{id}', [ConferenceController::class, 'qr'])
    ->middleware('auth')->name('conference.qr');

Route::get('/conference/entry/{id}', [ConferenceController::class, 'entry'])
    ->middleware('auth')->name('conference.entry');

Route::post('/conference/registration/', [ConferenceController::class, 'registration'])
    ->middleware('auth')->name('conference.registration');

Route::get('/conference/situation/{id}', [ConferenceController::class, 'situation'])
    ->name('conference.situation');

Route::get('/conference/attendance/{id}', [ConferenceController::class, 'attendance'])
    ->middleware('auth')->name('conference.attendance');

Route::post('/conference/attendanced', [ConferenceController::class, 'attendanced'])
    ->middleware('auth')->name('conference.attendanced');

Route::get('/conference/create', [ConferenceController::class, 'create'])
    ->middleware('auth')->name('conference.create');

Route::post('/conference/created', [ConferenceController::class, 'created'])
    ->middleware('auth')->name('conference.created');

Route::get('/personal_interview', function () {
    return view('personal_interview.personal');
})->middleware('auth')->name('personal');

Route::get('/personal_interview/create', [PersonalInterviewController::class, 'create'])
    ->middleware('auth')->name('personal_interview.created');

Route::post('/personal_interview/created', [PersonalInterviewController::class, 'created'])
    ->middleware('auth')->name('personal_interview.created');

Route::get('/personal_interview/entry/{id}', [PersonalInterviewController::class, 'entry'])
    ->middleware('auth')->name('personal_interview.entry');

Route::post('/personal_interview/registration/', [PersonalInterviewController::class, 'registration'])
    ->middleware('auth')->name('personal_interview.registration');

Route::get('/personal_interview/situation/{id}', [PersonalInterviewController::class, 'situation'])
    ->middleware('auth')->name('personal_interview.situation');

Route::post('/personal_interview/situation/start', [PersonalInterviewController::class, 'start'])
    ->middleware('auth')->name('personal_interview.start');

Route::post('/personal_interview/situation/end', [PersonalInterviewController::class, 'end'])
    ->middleware('auth')->name('personal_interview.end');

require __DIR__ . '/auth.php';
