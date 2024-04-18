<?php

namespace App\Http\Controllers;

class ComingsoonController extends Controller
{
    private $r_name = 'comingsoon';
    private $c_name = 'Proximamente';
    private $c_names = 'Proximamente';

    public function index()
    {
        $isM = env('COMINGSOON_FSC', "FALSE");
		if($isM == "FALSE"){
			return redirect('/');
		}
		$data['title'] = $this->c_names;
		return view('layouts.comingsoon',$data);
    }
}
