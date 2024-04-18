<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    private $r_name = 'home';
    private $c_name = 'Dashboard';
    private $c_names = 'Dashboard';

    public function index()
    {
		$data['menu'] = $this->r_name;
        $data['c_name'] = $this->c_name;
        $data['c_names'] = $this->c_names;
        $data['title'] = $this->c_names;
		return view('admin.index',$data);
    }
}
