<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permissions;
use App\Models\Roles;

class RolesController extends Controller
{
	private $tag_the = 'El';
    private $tag_o = 'o';
    private $r_name = 'roles';
    private $c_name = 'Rol';
    private $c_names = 'Roles';
	private $list_tbl_fsc = ['name' => 'Nombre'];
	private $o_model = Roles::class;
	
	public function __construct(){
        $this->middleware('checkRole:list_'.$this->r_name, ['only' => ['index','o_table']]);
        $this->middleware('checkRole:create_'.$this->r_name, ['only' => ['create','store']]);
        $this->middleware('checkRole:menu_'.$this->r_name, ['only' => ['show']]);
        $this->middleware('checkRole:update_'.$this->r_name, ['only' => ['edit','update']]);
        $this->middleware('checkRole:delete_'.$this->r_name, ['only' => ['destroy']]);
        $this->middleware('checkRole:rolepms_'.$this->r_name, ['only' => ['rolepms']]);
    }
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$data['menu'] = $this->r_name;
        $data['tag_o'] = $this->tag_o;
        $data['tag_the'] = $this->tag_the;
        $data['c_name'] = $this->c_name;
        $data['c_names'] = $this->c_names;
        $data['list_tbl_fsc'] = $this->list_tbl_fsc;
        $data['title'] = 'Lista de '.$this->c_names;
		return view($this->r_name.'.index',$data);
    }
	
	public function o_table()
    {
		$omp_fsc = $this->getPermissions();
		$ax = [];
		$where = ['status' => 'active'];
		$o_all = $this->o_model::where($where)->orderBy('id', 'asc')->get();
		if($o_all->count() > 0){
			foreach($o_all as $key => $row){
				$nk = $key + 1;
				$item = [$nk];
				foreach($this->list_tbl_fsc as $thkey => $value){
					$valor = $row->$thkey;
					array_push($item,$valor);
				}
				$btns = '<div class="w-100 text-center"><div class="btn-group" role="group" aria-label="Basic example">';
				$btns .= in_array('rolepms_'.$this->r_name,$omp_fsc)?'<a class="btn btn-primary btn-sm" href="'.url($this->r_name.'/'.$row->id).'" title="Ver"><i class="flaticon-lock"></i></a>':'';
				$btns .= in_array('update_'.$this->r_name,$omp_fsc)?'<a class="btn btn-warning btn-sm" href="'.url($this->r_name.'/'.$row->id.'/edit').'" title="Editar"><i class="flaticon2-edit"></i></a>':'';
				$btns .= (in_array('delete_'.$this->r_name,$omp_fsc) AND  !in_array($row->id,[1,2,3]))?'<a class="btn btn-danger btn-sm btn-delete-confirm" href="javascript:void(0)" data-href="'.url($this->r_name.'/'.$row->id).'" data-itemtag="' . $this->tag_the . '" data-itemselect="'. $this->tag_o .'" data-nameitem="' . $this->c_name . '" title="Eliminar"><i class="flaticon-delete"></i></a>':'';
				$btns .= '</div></div>';
				array_push($item,$btns);
				array_push($ax,$item);
			}
		}
		echo json_encode(['data' => $ax],true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['menu'] = $this->r_name;
        $data['c_name'] = $this->c_name;
        $data['c_names'] = $this->c_names;
        $data['title'] = 'Agregar '.$this->c_name;
		return view($this->r_name.'.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->except(['_token','_method']);
		$validatedData = $request->validate([
			'name' => 'required|string',
		],[
			'name.required' => 'El nombre es requerido',
		]);
		$o = $this->o_model::create($data);
		$request->session()->flash('msj_success', $this->tag_the.' '.$this->c_name.' '.$request->name.' ha sido registrad'.$this->tag_o.' correctamente.');
		return redirect($this->r_name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(empty($id)){
			return redirect($this->r_name);
		}
		$o = $this->o_model::find($id);
		if(empty($o->id)){
			return redirect($this->r_name);
		}
		$data['menu'] = $this->r_name;
        $data['c_name'] = $this->c_name;
        $data['c_names'] = $this->c_names;
        $data['title'] = 'Permisos del '.$this->c_name.' '.$o->name;
        $data['o'] = $o;
		$actives = [];
		foreach($o->permissions as $row){
			$actives[] = $row->id;
		}
		$o_all = Permissions::where(['status' => 'active'])->orderBy('id', 'asc')->get();
        $data['o_all'] = $o_all;
        $data['actives'] = $actives;
		return view($this->r_name.'.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(empty($id)){
			return redirect($this->r_name);
		}
		$o = $this->o_model::find($id);
		if(empty($o->id)){
			return redirect($this->r_name);
		}
		$data['menu'] = $this->r_name;
        $data['c_name'] = $this->c_name;
        $data['c_names'] = $this->c_names;
        $data['title'] = 'Actualizar '.$this->c_name;
        $data['o'] = $o;
		return view($this->r_name.'.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
		$o = $this->o_model::find($id);
		if(empty($o->id)){
			return redirect($this->r_name);
		}
		$o->update($data);
		$request->session()->flash('msj_success', $this->tag_the.' '.$this->c_name.' '.$o->name.' ha sido actualizad'.$this->tag_o.' correctamente.');
		return redirect($this->r_name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(empty($id) OR in_array($id,[1,2,3])){
			return false;
		}
		$o = $this->o_model::findOrFail($id);
		if(empty($o->id)){
			return false;
		}
		$this->o_model::destroy($id);
		echo 'ok';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function rolepms()
    {
        $id = $_POST['role'];
		$idpm = $_POST['id'];
		$state = $_POST['state'];
		$o = $this->o_model::findOrFail($id);
		if(empty($o->id)){
			return false;
		}
		if($state == 'true'){
			$o->permissions()->attach($idpm);
		} else {
			$o->permissions()->detach($idpm);
		}
		echo 'ok';
    }
}
