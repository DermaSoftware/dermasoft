<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\Xsliders;
use App\Models\Plans;
use App\Models\User;

class HomepageController extends Controller
{
	private $tag_the = 'El';
    private $tag_o = 'o';
    private $r_name = 'homepage';
    private $v_name = 'homepage';
    private $c_name = 'Pagina de inicio';
    private $c_names = 'Pagina de inicio';
	private $list_tbl_fsc = ['name' => 'Nombre'];
	private $o_model = User::class;

	private function gdata($t = 'Lista de')
    {
        $data['menu'] = $this->r_name;
        $data['tag_o'] = $this->tag_o;
        $data['tag_the'] = $this->tag_the;
        $data['c_name'] = $this->c_name;
        $data['c_names'] = $this->c_names;
        $data['list_tbl_fsc'] = $this->list_tbl_fsc;
        $data['title'] = $t.' '.$this->c_names;
		return $data;
    }

	public function __construct(){
    }

    public function index()
    {
		$data = $this->gdata();
		$o = Settings::first();
		if(empty($o->id)){
			return redirect('/');
		}
		$data['o'] = $o;
		$logo = !empty($o->logo)?$o->logo:asset('assets/images/favicon.png');
		$data['logo'] = $logo;
		$data['company_name'] = $o->name;
		//landing
		$data['sliders_all'] = Xsliders::whereNotIn('status',['deleted'])->orderBy('id', 'asc')->get();
		$data['o_all'] = Plans::whereNotIn('status',['deleted'])->orderBy('id', 'asc')->get();
		return view($this->v_name,$data);
    }

}
