<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plans;

class PlansController extends Controller
{
	private $tag_the = 'El';
    private $tag_o = 'o';
    private $r_name = 'plans';
    private $c_name = 'Plan';
    private $c_names = 'Planes';
	private $list_tbl_fsc = ['name' => 'Nombre','price' => 'Precio','advance' => 'Anticipo','details' => 'Detalles','note' => 'Nota'];
	private $o_model = Plans::class;

	public function __construct(){
        $this->middleware('checkRole:list_'.$this->r_name, ['only' => ['index','o_table']]);
        $this->middleware('checkRole:create_'.$this->r_name, ['only' => ['create','store']]);
        $this->middleware('checkRole:menu_'.$this->r_name, ['only' => ['show']]);
        $this->middleware('checkRole:update_'.$this->r_name, ['only' => ['edit','update']]);
        $this->middleware('checkRole:delete_'.$this->r_name, ['only' => ['destroy']]);
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
                    if($thkey == 'price'){
						$valor = $row->getPrice();
					} else if($thkey == 'advance'){
						$valor = $row->getAdvance();
					}
					array_push($item,$valor);
				}
				$btns = '<div class="w-100 text-center"><div class="btn-group" role="group" aria-label="Basic example">';
				$btns .= '<a class="btn btn-info btn-sm" href="'.url($this->r_name.'/'.$row->id).'" title="Ver"><i class="flaticon-settings-1"></i></a>';
				$btns .= in_array('update_'.$this->r_name,$omp_fsc)?'<a class="btn btn-warning btn-sm" href="'.url($this->r_name.'/'.$row->id.'/edit').'" title="Editar"><i class="flaticon2-edit"></i></a>':'';
				$btns .= in_array('delete_'.$this->r_name,$omp_fsc)?'<a class="btn btn-danger btn-sm btn-delete-confirm" href="javascript:void(0)" data-href="'.url($this->r_name.'/'.$row->id).'" data-itemtag="' . $this->tag_the . '" data-itemselect="'. $this->tag_o .'" data-nameitem="' . $this->c_name . '" title="Eliminar"><i class="flaticon-delete"></i></a>':'';
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
		if($request->has('photo')){
			$data['photo'] = $request->file('photo')->store('uploads','public');
		}
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
        $data['title'] = 'Detalles de '.$this->c_name;
        $data['o'] = $o;
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
		if($request->has('photo')){
			$data['photo'] = $request->file('photo')->store('uploads','public');
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
        if(empty($id)){
			return false;
		}
		$o = $this->o_model::findOrFail($id);
		if(empty($o->id)){
			return false;
		}
		$this->o_model::destroy($id);
		echo 'ok';
    }
}
