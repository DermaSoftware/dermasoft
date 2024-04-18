<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Mfsc
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        
		//$isM = env('COMINGSOON_FSC', "FALSE");
		//return $isM=="FALSE"?$next($request):redirect('comingsoon');
		return $next($request);
    }
}
