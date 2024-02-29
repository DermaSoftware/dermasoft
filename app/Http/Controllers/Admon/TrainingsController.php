<?php

namespace App\Http\Controllers\Admon;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Trainingsroles;
use App\Models\Trainingsusers;
use App\Models\Trainings;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\Ntfs;

class TrainingsController extends Controller
{
	private $tag_the = 'El';
    private $tag_o = 'o';
    private $r_name = 'admon/trainings';
    private $v_name = 'admon.trainings';
    private $c_name = 'Entrenamiento';
    private $c_names = 'Entrenamientos';
	private $list_tbl_fsc = ['name' => 'Nombre','status' => 'Estado'];
	private $o_model = Trainings::class;

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
        $this->middleware('checkRole:2');
    }

    public function index()
    {
        $data = $this->gdata();
		$data['o_all'] = $this->o_model::where(['company' => Auth::user()->company])->whereNotIn('status',['deleted'])->orderBy('id', 'DESC')->get();
		return view($this->v_name.'.index',$data);
    }

    public function create()
    {
        $data = $this->gdata('Agregar');
		return view($this->v_name.'.create',$data);
    }

    public function store(Request $request)
    {
        $data = request()->except(['_token','_method']);
		$validatedData = $request->validate([
			'name' => 'required|string',
		],[
			'name.required' => 'El nombre es requerido',
		]);
		$data['user'] = Auth::user()->id;
		$data['company'] = Auth::user()->company;
		$data['status'] = 'inactive';
		$views = !empty($data['views'])?$data['views']:'';
		unset($data['views']);
		$vx = [];
		if($data['directed_to'] != 'Todos' AND !empty($views)){
			$aux = '';
			foreach($views as $key => $item){
				$aux .= $key==0?$item:','.$item;
				$vx[] = $item;
			}
			$data['views'] = $aux;
		}
		if($data['type_url'] == 'Archivo'){
			if ($request->hasFile('file')) {
				$path = $request->file('file')->store('uploads','public');
				$path = 'storage/'.$path;
				$data['url'] = asset($path);
			}
		} else {
			if(isset($data['file'])){
				unset($data['file']);
			}
		}
		$o = $this->o_model::create($data);
		if(!empty($vx) AND $data['directed_to'] == 'Roles'){
			$o->roles()->attach($vx);
		} else if(!empty($vx) AND $data['directed_to'] == 'Users'){
			$o->users()->attach($vx);
		}
		$request->session()->flash('msj_success', $this->tag_the.' '.$this->c_name.' '.$request->name.' ha sido registrad'.$this->tag_o.' correctamente.');
		return redirect($this->r_name);
    }

    public function show($id)
    {
        if(empty($id)){
			return redirect($this->r_name);
		}
		$tag = is_numeric($id)?'id':'uuid';
		$o = $this->o_model::where([$tag => $id])->first();
		if(empty($o->id)){
			return redirect($this->r_name);
		}
		$data = $this->gdata('Detalles de');
        $data['o'] = $o;
		return view($this->v_name.'.show',$data);
    }

    public function edit($id)
    {
        if(empty($id)){
			return redirect($this->r_name);
		}
		$tag = is_numeric($id)?'id':'uuid';
		$o = $this->o_model::where([$tag => $id])->first();
		if(empty($o->id)){
			return redirect($this->r_name);
		}
		$data = $this->gdata('Actualizar');
		$data['o'] = $o;
		return view($this->v_name.'.edit',$data);
    }

    public function update(Request $request, $id)
    {
        $data = request()->except(['_token','_method']);
		$validatedData = $request->validate([
			'name' => 'required|string',
		],[
			'name.required' => 'El nombre es requerido',
		]);
		if(empty($id)){
			return redirect($this->r_name);
		}
		$o = $this->o_model::where(['uuid' => $id])->first();
		if(empty($o->id)){
			return redirect($this->r_name);
		}
		$views = !empty($data['views'])?$data['views']:'';
		$vx = [];
		unset($data['views']);
		if($data['directed_to'] != 'Todos' AND !empty($views)){
			$aux = '';
			foreach($views as $key => $item){
				$aux .= $key==0?$item:','.$item;
				$vx[] = $item;
			}
			$data['views'] = $aux;
		}
		if($data['type_url'] == 'Archivo'){
			if ($request->hasFile('file')) {
				$path = $request->file('file')->store('uploads','public');
				$path = 'storage/'.$path;
				$data['url'] = asset($path);
			}
		} else {
			if(isset($data['file'])){
				unset($data['file']);
			}
		}
		$o->update($data);
		if(!empty($vx) AND $data['directed_to'] == 'Roles'){
			$o->roles()->sync($vx);
		} else if(!empty($vx) AND $data['directed_to'] == 'Users'){
			$o->users()->sync($vx);
		}
		$request->session()->flash('msj_success', $this->tag_the.' '.$this->c_name.' '.$o->name.' ha sido actualizad'.$this->tag_o.' correctamente.');
		return redirect($this->r_name);
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
		$o->update(['status' => 'deleted']);//$this->o_model::destroy($id);
		return response()->json(['response' => 'ok'], 200);
    }

    public function hidviews()
    {
        $id = !empty($_POST['val'])?$_POST['val']:'';
        $type = !empty($_POST['type'])?$_POST['type']:'Roles';
        $valtype = !empty($_POST['valtype'])?$_POST['valtype']:'Todos';
		$local_model = $type=='Roles'?Roles::class:User::class;
		$o_all = [];
		if($type=='Roles'){
			$o_all = $local_model::where(['status' => 'active'])->whereNotIn('id',[1])->orderBy('id', 'asc')->get();
		} else {
			$o_all = $local_model::where(['company' => Auth::user()->company,'status' => 'active'])->orderBy('id', 'asc')->get();
		}
		//$out = '<option value="" selected disabled>--Seleccione--</option>';
		$out = '';
		$ids = !empty($id)?explode(",",$id):[0];
		foreach($o_all as $row){
			$slc = ($valtype==$type AND !empty($id) AND in_array($row->id,$ids))?' selected':'';
			$out .= '<option value="'.$row->id.'"'.$slc.'>'.$row->name.'</option>';
		}
		echo $out;
    }

	public function resendpbr($id)
    {
		if(empty($id)){
			return redirect($this->r_name);
		}
		$o = $this->o_model::where(['uuid' => $id])->first();
		if(empty($o->id)){
			return redirect($this->r_name);
		}
		$o->update(['status' => 'active']);
		//Notificar
		$o_all = [];
		if($o->directed_to == 'Todos'){
			$o_all = User::where(['company' => Auth::user()->company,'status' => 'active'])->whereNotIn('status',['deleted'])->orderBy('id', 'asc')->get();
		} else if($o->directed_to == 'Roles'){
			$ids = Trainingsroles::where(['trainings_id' => $o->id])->pluck('roles_id')->toArray();
			$o_all = User::where(['company' => Auth::user()->company,'status' => 'active'])->whereIn('role',$ids)->orderBy('id', 'asc')->get();
		} else if($o->directed_to == 'Users'){
			$ids = Trainingsusers::where(['trainings_id' => $o->id])->pluck('users_id')->toArray();
			$o_all = User::where(['company' => Auth::user()->company,'status' => 'active'])->whereIn('id',$ids)->orderBy('id', 'asc')->get();
		}
		foreach($o_all as $key => $row){
			Mail::to($row->email)->send(new Ntfs('Nueva capacitación','Enhorabuena!!! Nos complace notificarte que se ha publicado la capacitación '.$o->name.', para visualizar el contenido te invitamos a ingresar a nuestra plataforma y acceder al módulo de capacitaciones.',$row->name,$row->email));
		}
		request()->session()->flash('msj_success', 'La capacitación ha sido publicada y notificada correctamente.');
		return redirect($this->r_name);
    }
}
