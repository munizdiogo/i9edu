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


use App\Http\Controllers\PerfilController;

Route::middleware('auth')->group(function () {
    Route::get('perfis/data', [PerfilController::class, 'data'])
        ->name('perfis.data');
    Route::resource('perfis', PerfilController::class)->parameters(['perfis' => 'perfil']);
    ;
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


// 
// 
// 

use App\Http\Controllers\TurmaController;

Route::middleware('auth')->group(function () {
    Route::get('turmas/data', [TurmaController::class, 'data'])->name('turmas.data');
    Route::resource('turmas', TurmaController::class);
});



// 
// 
// 


use App\Http\Controllers\PeriodoLetivoController;

Route::middleware('auth')->group(function () {
    Route::get('periodos/data', [PeriodoLetivoController::class, 'data'])->name('periodos.data');
    Route::resource('periodos', PeriodoLetivoController::class);
});