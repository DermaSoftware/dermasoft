<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\Auth;
use App\Models\Permissions;
use App\Models\Roles;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	/*public function getPermissions(){
		$a = [];
		foreach(Roles::findOrFail(Auth::user()->role)->permissions as $row){
			$a[] = $row->tag;
		}
		return $a;
	}*/
	
	public function itemsPaginate($model, $per_page = 10, $where = [], $with = null, $active = TRUE, $order_field = 'id', $order = 'desc')
    {
		$w = $active?[['status' ,'=', 'active']]:[];
		if(!empty($where)){
			foreach($where as $key => $row){
				$w[] = [$key,'=',$row];
			}
		}
		$o = count($w) > 0?$model::where($w)->orderBy($order_field, $order)->paginate($per_page):$model::orderBy($order_field, $order)->paginate($per_page);
        if(!empty($with)){
			$o = count($w) > 0?$model::with($with)->where($w)->orderBy($order_field, $order)->paginate($per_page):$model::orderBy($order_field, $order)->paginate($per_page);
		}
		$pagination = [
            'current_page' => $o->currentPage(),
            'per_page' => $o->perPage(),
            'from' => $o->firstItem(),
            'to' => $o->lastItem(),
            'total' => $o->total(),
            'last_page' => $o->lastPage(),
            'path' => $o->path(),
            'first_page_url' => $o->url(1),
            'prev_page_url' => $o->previousPageUrl(),
            'next_page_url' => $o->nextPageUrl(),
            'last_page_url' => $o->url($o->lastPage()),
            'hasPages' => $o->hasPages(),
            'hasMorePages' => $o->hasMorePages()
        ];
        $items = $o->items();
        /*if (!empty($with)) {
            $items = $o->load($with);
        }*/
        return ['items' => $items, 'pagination' => $pagination];
    }
	
	public function getStructurePaginate($o)
    {
        $pagination = [
            'current_page' => $o->currentPage(),
            'per_page' => $o->perPage(),
            'from' => $o->firstItem(),
            'to' => $o->lastItem(),
            'total' => $o->total(),
            'last_page' => $o->lastPage(),
            'path' => $o->path(),
            'first_page_url' => $o->url(1),
            'prev_page_url' => $o->previousPageUrl(),
            'next_page_url' => $o->nextPageUrl(),
            'last_page_url' => $o->url($o->lastPage()),
            'hasPages' => $o->hasPages(),
            'hasMorePages' => $o->hasMorePages()
        ];
        return $pagination;
    }
}
