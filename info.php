<?php

/* Посредники auth и guest
Сразу после установки Laravel доступны посредники auth (для аутентифицированных пользователй) и guest (для не аутентифицированных пользователей)
— они определены в файле app/Http/Kernel.php. Мы будем использовать эти посредники, чтобы защитить маршруты контроллеров.

class Kernel extends HttpKernel {

    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,

    ];
}
*/

/*
Если не аутентифицированный пользователь попробует перейти по маршруту, защищенному посредником auth, он будет перенаправлен на маршрут login.
У нас такого маршрута нет, вместо него у нас будет auth.login, так что вносим изменения в класс посредника Authenticate.

*/

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware {
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request) {
        if (! $request->expectsJson()) {
            // не аутентифицированных пользователей отправляем
            // на страницу формы входа в личный кабинет
            return route('auth.login');
        }
    }
}

/*

Если аутентифицированный пользователь попробует перейти по маршруту, защищенному посредником guest, он будет перенаправлен на RouteServiceProvider::HOME.
Но у нас такой страницы нет, так что вносим изменения в класс посредника RedirectIfAuthenticated.

*/

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null) {
        if (Auth::guard($guard)->check()) {
            // аутентифицированных пользователей отправляем
            // на главную страницу личного кабинета
            return redirect()->route('user.index');
        }
        return $next($request);
    }
}

/*
На этапе разработки письма отправлять не будем, вместо этого будем их записывать в log-файл. Для этого редактируем файл конфигурации .env:

MAIL_MAILER=log
MAIL_FROM_ADDRESS=noreply@example.com
MAIL_FROM_NAME="${APP_NAME}"

*/

/* Добавим сервис-провайдеров в файл конфигурации config/app.php:

return [

    'providers' => [

        App\Providers\RoleServiceProvider::class,
        App\Providers\PermissionServiceProvider::class,

    ],

];

*/

/* Перед использованием посредники нужно добавить в app/Http/Kernel.php: */

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel {
    protected $routeMiddleware = [

        'role' => \App\Http\Middleware\CheckUserRole::class,
        'perm' => \App\Http\Middleware\CheckUserPermission::class,
    ];
}

