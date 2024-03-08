<?php

namespace App\Http\Controllers\Admon;

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

class DiaryController extends Controller
{
	private $tag_the = 'La';
    private $tag_o = 'a';
    private $r_name = 'admon/diary';
    private $v_name = 'admon.diary';
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
        $this->middleware('checkRole:2');
    }

	public function index()
    {
        $data = $this->gdata();
		$data['o_all'] = User::where(['role' => 3,'company' => Auth::user()->company])->whereNotIn('status',['deleted'])->orderBy('id', 'asc')->get();
		return view($this->v_name.'.index',$data);
    }

    public function edit($id)
    {
        if(empty($id)){
			return redirect($this->r_name);
		}
		$tag = is_numeric($id)?'id':'uuid';
		$o_us = User::where([$tag => $id])->first();
		if(empty($o_us->id)){
			return redirect($this->r_name);
		}
		$o = $this->o_model::where(['user' => $o_us->id])->first();
		if(empty($o->id)){
			$o = $this->o_model::create(['user' => $o_us->id,'company' => $o_us->company]);
		}
		$data = $this->gdata('Actualizar');
        $data['o'] = $o;
		$data['o_cps'] = Headquarters::where(['status' => 'active','company' => $o_us->company])->orderBy('id', 'asc')->get();
		$data['o_pcs'] = Querytypes::where(['status' => 'active','company' => $o_us->company])->orderBy('id', 'asc')->get();
		$data['o_ids'] = Diaryqt::where('diary_id', $o->id)->pluck('qt_id')->toArray();
		return view($this->v_name.'.edit',$data);
    }

    public function update(Request $request, $id)
    {
        $data = request()->except(['_token','_method']);
		$validatedData = $request->validate([
			'qts' => 'required',
		],[
			'qts.required' => 'El tipo de consulta es requerido',
		]);
		if(empty($id)){
			return redirect($this->r_name);
		}
		$tag = is_numeric($id)?'id':'uuid';
		$o = $this->o_model::where([$tag => $id])->first();
		if(empty($o->id)){
			return redirect($this->r_name);
		}
		$querytypes = $data['qts'];
		unset($data['qts']);
		for($i = 1;$i <= 7; $i++){
			$tag = 'day'.$i;
			$data[$tag] = !empty($data[$tag])?'yes':'not';
		}
		$o->update($data);
		$this->async_dp($o->id, $querytypes);
		$request->session()->flash('msj_success', $this->tag_the.' '.$this->c_name.' '.$o->uuid.' ha sido actualizad'.$this->tag_o.' correctamente.');
		return redirect($this->r_name);
    }

	private function async_dp($id, $ps){
		//Eliminamos los que no esten
		$o_all = Diaryqt::where(['diary_id' => $id])->whereNotIn('qt_id',$ps)->orderBy('id', 'asc')->get();
		if($o_all->count() > 0){
			foreach($o_all as $key => $row){
				Diaryqt::destroy($row->id);
			}
		}
		foreach($ps as $row){
			$o = Diaryqt::create(['diary_id' => $id,'qt_id' => $row]);
		}
	}
	//-------------------------------------------------------------------------------------
	//-------------------------------------------------------------------------------------
	//-------------------------------------------------------------------------------------
	//Bloqueos de agenda
	public function locks($id)
    {
        if(empty($id)){
			return redirect($this->r_name);
		}
		$o_us = User::where(['uuid' => $id])->first();
		if(empty($o_us->id)){
			return redirect($this->r_name);
		}
		$data = $this->gdata('Bloqueos de agenda');
		$data['o'] = $o_us;
		$data['o_all'] = Locks::where(['user' => $o_us->id,'company' => Auth::user()->company])->whereNotIn('status',['deleted'])->orderBy('id', 'asc')->get();
		return view($this->v_name.'.locks',$data);
    }
	public function create($id)
    {
        if(empty($id)){
			return redirect($this->r_name);
		}
		$o_us = User::where(['uuid' => $id])->first();
		if(empty($o_us->id)){
			return redirect($this->r_name);
		}
		$data = $this->gdata('Agregar');
		$data['title'] = 'Agregar bloqueo de agenda';
		$data['o'] = $o_us;
		return view($this->v_name.'.create',$data);
    }
    public function store(Request $request, $id)
    {
        if(empty($id)){
			return redirect($this->r_name);
		}
		$o_us = User::where(['uuid' => $id])->first();
		if(empty($o_us->id)){
			return redirect($this->r_name);
		}
		$data = request()->except(['_token','_method']);
		$validatedData = $request->validate([
			'date_init' => 'required',
			'date_end' => 'required',
		],[
			'date_init.required' => 'La fecha de inicio es requerido',
			'date_end.required' => 'La fecha de fin es requerido',
		]);
		$data['user'] = $o_us->id;
		$data['company'] = Auth::user()->company;
		$o = Locks::create($data);
		$request->session()->flash('msj_success', 'El bloqueo de agenda ha sido registrado correctamente.');
		return redirect($this->r_name.'/'.$id.'/locks');
    }
	public function destroy($id)
    {
        if(empty($id)){
			return response()->json(['response' => 'El ID es requerido'], 401);
		}
		$tag = is_numeric($id)?'id':'uuid';
		$o = $this->o_model::where([$tag => $id])->first();
		if(empty($o->id)){
			return response()->json(['response' => 'El ID no existe en la base de datos'], 401);
		}
		Locks::destroy($o->id);
		return response()->json(['response' => 'ok'], 200);
    }
}
