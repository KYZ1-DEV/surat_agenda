<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class ForceHttps
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(str_ends_with($request->getHost(), 'vercel.app') || str_ends_with($request->getHost(), 'trycloudflare.com')){
            URL::forceScheme('https');
        }
    
       if ($request->routeIs('export.users')) {
                return $next($request);
            }

        $request->merge(
            array_map(function ($value) {
                return $value === '' ? null : $value;
            }, $request->all())
        );

        return $next($request);


        

    }
}
