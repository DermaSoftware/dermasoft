<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Roles;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,$permission = '1_2_3')
    {
        //$this->middleware('checkRole:1');
        //$this->middleware('checkRole:1', ['only' => ['index','o_table']]);
        //$this->middleware('checkRole:1_2', ['only' => ['index','o_table']]);
		$permission = explode('_',$permission);
		$userRole = $request->user();
		$checkRole = in_array($userRole->role,$permission);
		return $checkRole?$next($request):abort(403);
    }
}
