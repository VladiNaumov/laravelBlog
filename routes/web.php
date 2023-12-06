<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\User\IndexController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [IndexController::class, 'index'])->name('index');


/*
* Регистрация, вход в ЛК, восстановление пароля
*/

Route::group([
    'as' => 'auth.', // имя маршрута, например auth.index
    'prefix' => 'auth', // префикс маршрута, например auth/index
], function () {
    // форма регистрации
    Route::get('register', [RegisterController::class,'register'])
        ->name('register');
    // создание пользователя
    Route::post('register',  [RegisterController::class,'create'])
        ->name('create');
    // форма входа
    Route::get('login', [LoginController::class, 'login'])
        ->name('login');
    // аутентификация
    Route::post('login', [LoginController::class,'authenticate'])
        ->name('auth');
    // выход
    Route::get('logout', [LoginController::class,'logout'])
        ->name('logout');
    // форма ввода адреса почты
    Route::get('forgot-password', [ForgotPasswordController::class,'form'])
        ->name('forgot-form');
    // письмо на почту
    Route::post('forgot-password',  [ForgotPasswordController::class,'mail'])
        ->name('forgot-mail');
    // форма восстановления пароля
    Route::get(
        'reset-password/token/{token}/email/{email}',
        'Auth\ResetPasswordController@form'
    )->name('reset-form');
    // восстановление пароля
    Route::post('reset-password', [ResetPasswordController::class,'reset'])
        ->name('reset-password');
});

