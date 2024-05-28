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
        foreach ($permission as $key => $value) {
            $permission[$key] = intval($value);
        }
		$userRole = $request->user();
		$checkRole = in_array($userRole->role,[1,2,3,5]);
		return $checkRole?$next($request):abort(403);
    }
}
