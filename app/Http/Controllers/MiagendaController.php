<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Diaryprocedures;
use App\Models\Headquarters;
use App\Models\Procedures;
use App\Models\Querytypes;
use App\Models\Diaryqt;
use App\Models\Diary;
use App\Models\Locks;
use App\Models\User;

class MiagendaController extends Controller
{
	private $tag_the = 'La';
    private $tag_o = 'a';
    private $r_name = 'miagenda';
    private $v_name = 'miagenda';
    private $c_name = 'Agenda';
    private $c_names = 'Agendas';
	private $list_tbl_fsc = ['name' => 'Nombre','lastname' => 'Apellidos','email' => 'Correo','phone' => 'Telefono'];
	private $o_model = Diary::class;
	
	private function gdata($t = 'Lista de')
    {
        $data['menu'] = $this->r_name;
        $data['tag_o'] = $this->tag_o;
        $data['tag_the'] = $this->tag_the;
        $data['v_name'] = $this->v_name;
        $data['c_name'] = $this->c_name;
        $data['c_names'] = $this->c_names;
        $data['list_tbl_fsc'] = $this->list_tbl_fsc;
        $data['title'] = $t.' '.$this->c_names;
		return $data;
    }

	public function __construct(){
        $this->middleware('checkRole:3');
    }

    public function index()
    {
        $id = Auth::user()->uuid;
		$o_us = User::where(['uuid' => $id])->first();
		if(empty($o_us->id)){
			return redirect($this->r_name);
		}
		$o = $this->o_model::where(['user' => $o_us->id])->first();
		if(empty($o->id)){
			$o = $this->o_model::create(['user' => $o_us->id,'company' => $o_us->company]);
		}
		$data = $this->gdata('Actualizar');
		$data['title'] = 'Mi agenda';
        $data['o'] = $o;
        $data['o_us'] = $o_us;
		//Bloqueos de agenda
		$data['o_all'] = Locks::where(['user' => $o_us->id,'company' => Auth::user()->company])->whereNotIn('status',['deleted'])->orderBy('id', 'asc')->get();
		$data['o_cps'] = Headquarters::where(['status' => 'active','company' => $o_us->company])->orderBy('id', 'asc')->get();
		$data['o_pcs'] = Querytypes::where(['status' => 'active','company' => $o_us->company])->orderBy('id', 'asc')->get();
		$data['o_ids'] = Diaryqt::where('diary_id', $o->id)->pluck('qt_id')->toArray();
		return view($this->v_name.'.edit',$data);
    }
}
