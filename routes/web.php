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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/conference', [ConferenceController::class, 'list'])
    ->name('conference.list');

Route::get('/conference/entry/{id}', [ConferenceController::class, 'entry'])
    ->name('conference.entry');

Route::post('/conference/registration/', [ConferenceController::class, 'registration'])
    ->name('conference.registration');

Route::get('/conference/situation/{id}', [ConferenceController::class, 'situation'])
    ->name('conference.situation');

Route::get('/conference/attendance/{id}', [ConferenceController::class, 'attendance'])
    ->name('conference.attendance');

Route::post('/conference/attendanced', [ConferenceController::class, 'attendanced'])
    ->name('conference.attendanced');

Route::get('/conference/create', [ConferenceController::class, 'create'])
    ->name('conference.create');

Route::post('/conference/created', [ConferenceController::class, 'created'])
    ->name('conference.created');

Route::get('/personal_interview/create', [PersonalInterviewController::class, 'create'])
    ->name('personal_interview.created');

Route::post('/personal_interview/created', [PersonalInterviewController::class, 'created'])
    ->name('personal_interview.created');

require __DIR__ . '/auth.php';
