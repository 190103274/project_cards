<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LanguageMiddleware
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
        if(session()->has('locale')){
            //dd(session('locale'));

            app()->setLocale(session('locale'));
        }else{ 
            app()->setLocale(config('app.locale'));
        }
        return $next($request);
    }
}
