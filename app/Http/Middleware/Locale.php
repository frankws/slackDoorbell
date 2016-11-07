<?php

namespace App\Http\Middleware;

use Session;
use App;
use Config;
use Closure;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Session::has('locale')) {
            Session::put('locale', Session::get('locale'));
        }

        app()->setLocale(Session::get('locale'));

        return $next($request);
    }
}