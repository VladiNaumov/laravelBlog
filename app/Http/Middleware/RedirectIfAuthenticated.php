<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param  \Closure  $next
     * @param string|null $guard
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $guard = null) {
        if (Auth::guard($guard)->check()) {
            // аутентифицированных пользователей отправляем
            // на главную страницу личного кабинета
            return redirect()->route('user.index');
        }
        return $next($request);
    }
}
