<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Habeas;

class HabeasController extends Controller
{
	private $tag_the = 'El';
    private $tag_o = 'o';
    private $r_name = 'admin/habeas';
    private $v_name = 'admin.habeas';
    private $c_name = 'Habeas';
    private $c_names = 'Habeas';
	private $list_tbl_fsc = ['description' => 'Descripción'];
	private $o_model = Habeas::class;
	
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
        $this->middleware('checkRole:1');
    }

    public function index()
    {
		$o = $this->o_model::orderBy('id', 'DESC')->first();
		if(empty($o->id)){
			return redirect('/');
		}
		$data = $this->gdata('Actualizar');
        $data['o'] = $o;
		return view($this->v_name.'.edit',$data);
    }

    public function update(Request $request)
    {
		$data = request()->except(['_token','_method']);
		$validatedData = $request->validate([
			'description' => 'required',
		],[
			'description.required' => 'La descripción es requerida',
		]);
		$o = $this->o_model::orderBy('id', 'DESC')->first();
		if(empty($o->id)){
			return redirect('/');
		}
		$o->update($data);
		$request->session()->flash('msj_success', $this->tag_the.' '.$this->c_name.' '.$o->name.' ha sido actualizad'.$this->tag_o.' correctamente.');
		return redirect($this->r_name);
    }
}
