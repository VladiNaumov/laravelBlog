<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
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

// https://tokmakov.msk.ru/blog/item/601

Route::get('/', [IndexController::class, 'index'])->name('index');

//Route::get('/', 'IndexController')->name('index');


/*
 * Личный кабинет пользователя
 */
Route::group([
    'as' => 'user.', // имя маршрута, например user.index
    'prefix' => 'user', // префикс маршрута, например user/index
    'namespace' => 'User', // пространство имен контроллеров
    'middleware' => ['auth'] // один или несколько посредников
], function () {
    /*
    * Главная страница личного кабинета
    */
   Route::get('index', [IndexController::class, 'UserIndex'])->name('index');
});


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
    // сообщение о необходимости проверки адреса почты
    Route::get('verify-message', [VerifyEmailController::class, 'message'])
        ->name('verify-message');
    // подтверждение адреса почты нового пользователя
    Route::get('verify-email/token/{token}/id/{id}', [VerifyEmailController::class, 'verify'])
        ->where('token', '[a-f0-9]{32}')
        ->where('id', '[0-9]+')
        ->name('verify-email');
});

/*
 * Блог: все посты, посты категории, посты тега, страница поста
 */
Route::group([
    'as' => 'blog.', // имя маршрута, например blog.index
    'prefix' => 'blog', // префикс маршрута, например blog/index
], function () {
    // главная страница (все посты)
    Route::get('index', [BlogController::class, 'index'])
        ->name('index');
    // категория блога (посты категории)
    Route::get('category/{category:slug}', [BlogController::class, 'category'])
        ->name('category');
    // тег блога (посты с этим тегом)
    Route::get('tag/{tag:slug}', [BlogController::class, 'tag'])
        ->name('tag');
    // страница поста блога
    Route::get('post/{post:slug}', [BlogController::class, 'post'])
        ->name('post');
});


Route::group(['middleware' => 'role:admin'], function() {
    Route::get('/admin/index', function() {
        return 'Это панель управления сайта';
    });
});
