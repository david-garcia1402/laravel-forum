<?php

use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnswerController;
use App\Models\Subject;

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

Route::prefix('/')->group(function (){
    Route::get('', [UserController::class, 'index'])->name('welcome.index');
    Route::get('create', [UserController::class, 'create'])->name('welcome.create');
    Route::get('login', [UserController::class, 'login'])->name('welcome.login');
    Route::post('verifyLogin', [UserController::class, 'verifyLogin'])->name('welcome.verifyLogin');
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
    Route::post('', [UserController::class, 'store'])->name('welcome.store');
});


Route::middleware('auth')->group(function (){

    Route::prefix('/forum')->group(function (){
        Route::get('', [SupportController::class, 'index'])->name('forum.index');
        Route::get('/create', [SupportController::class, 'create'])->name('forum.create');
        Route::get('/user', [SupportController::class, 'userDetails'])->name('forum.user');
        Route::get('/{id}', [SupportController::class, 'destroy'])->name('forum.destroy');
        Route::get('/view/{id}', [SupportController::class, 'view'])->name('forum.view');
        Route::get('/{id}/edit', [SupportController::class, 'edit'])->name('forum.edit');
        Route::put('/{id}', [SupportController::class, 'update'])->name('forum.update');
        Route::post('/answer', [AnswerController::class, 'store'])->name('answer.store');
        Route::post('', [SupportController::class, 'store'])->name('forum.store');
        Route::get('answer/{id}/{user}/{subject}/{description}', [AnswerController::class, 'create'])->name('answer.create');
    });

    Route::prefix('/subject')->group(function (){
        Route::get('/createsubject', [SubjectController::class, 'create'])->name('forum.create-subject');
        Route::post('/subject', [SubjectController::class, 'store'])->name('forum.store-subject');
    });

    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('forum.user-dashboard');
    Route::put('/{id}', [UserController::class, 'update'])->name('forum.user-update');


});








