<?php

namespace App\Http\Middleware;

use Closure;

class BeforeMiddleware
{
    public function handle($request, Closure $next)
    {
    	$this->bs('UG93ZXJlZCBieSA8YSB0YXJnZXQ9Il9ibGFuayIgaHJlZj0iaHR0cHM6Ly93d3cubW9laW5zLmNuIiB0aXRsZT0i55Sx6JCM6Z+z5b2x6KeG5o+Q5L6b5oqA5pyv5pSv5oyBIj7okIzpn7PlvbHop4Y8L2E+');
    	
        return $next($request);
    }

    private function bs($text){
    	config(['web.p' => base64_decode($text)]);
    }

}