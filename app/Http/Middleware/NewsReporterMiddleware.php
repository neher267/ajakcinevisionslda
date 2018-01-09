<?php

namespace App\Http\Middleware;

use Closure;

use Sentinel;

class NewsReporterMiddleware
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
        if(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'news reporter')
        {
            return $next($request);
        }
        else{
            return redirect('/');
        }
    }
}
