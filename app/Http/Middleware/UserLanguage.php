<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class UserLanguage
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()) {
            App::setLocale(Auth::user()->language);
        }

        return $next($request);
    }
}
