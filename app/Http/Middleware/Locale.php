<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Lang;
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
        if(session()->has('locale'))
            app()->setLocale(session()->get('locale'));
        else app()->setLocale('en');
        return $next($request);
    }
}
