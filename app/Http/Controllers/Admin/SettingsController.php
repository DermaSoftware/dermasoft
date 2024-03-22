<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;

class SettingsController extends Controller
{
	private $tag_the = 'La';
    private $tag_o = 'a';
    private $r_name = 'admin/settings';
    private $v_name = 'admin.settings';
    private $c_name = 'Configuración';
    private $c_names = 'Configuraciones';
	private $list_tbl_fsc = ['hours_quotes' => 'Cantidad de horas que tiene el paciente antes de la cita para pagar la consulta'];
	private $o_model = Settings::class;

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
		// $validatedData = $request->validate([
		// 	'hours_quotes' => 'required',
		// ],[
		// 	'hours_quotes.required' => 'La Cantidad de horas es requerida',
		// ]);
		$o = $this->o_model::orderBy('id', 'DESC')->first();
		if(empty($o->id)){
			return redirect('/');
		}
		if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('uploads','public');
			$path = 'storage/'.$path;
			$data['logo_pp'] = $path;
            $data['logo'] = asset($path);
        }
		$o->update($data);
		$request->session()->flash('msj_success', $this->tag_the.' '.$this->c_name.' '.$o->name.' ha sido actualizad'.$this->tag_o.' correctamente.');
		return redirect($this->r_name);
    }
}
