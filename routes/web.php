<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PoloController;

Route::middleware('guest')->group(function () {
    // Registro
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);

    // Login
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);

    // Esqueci Senha
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

    // Redefinir Senha
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
});

// Logout
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// 
// 
// 


use App\Http\Controllers\ProfileController;

Route::middleware('auth')->group(function () {
    Route::get('profiles/data', [App\Http\Controllers\ProfileController::class, 'data'])
        ->name('profiles.data');
    Route::resource('profiles', App\Http\Controllers\ProfileController::class);
});



// 
// 
// 

Route::middleware('auth')->group(function () {
    // endpoint AJAX para o DataTable
    Route::get('polos/data', [PoloController::class, 'data'])->name('polos.data');
    Route::resource('polos', PoloController::class);
});



// 
// 
// 

use App\Http\Controllers\CursoController;

Route::middleware('auth')->group(function () {
    Route::get('cursos/data', [CursoController::class, 'data'])->name('cursos.data');
    Route::resource('cursos', CursoController::class);
});


// 
// 
// 
use App\Http\Controllers\MatrizCurricularController;

Route::middleware('auth')->group(function () {
    Route::get('matrizes/data', [MatrizCurricularController::class, 'data'])->name('matrizes.data');
    Route::resource('matrizes', MatrizCurricularController::class)->parameters(['matrizes' => 'matriz']);
    ;
});