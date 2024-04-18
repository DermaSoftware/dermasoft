<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catfaqs;

class CatfaqsController extends Controller
{
	private $tag_the = 'La';
    private $tag_o = 'a';
    private $r_name = 'admin/catfaqs';
    private $v_name = 'admin.catfaqs';
    private $c_name = 'Categoría FAQ';
    private $c_names = 'Categorías FAQs';
	private $list_tbl_fsc = ['name' => 'Nombre'];
	private $o_model = Catfaqs::class;
	
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

    public function index(Request $request)
    {
        $data = $this->gdata();
		$per_page = !empty($request->get('per_page'))?$request->get('per_page'):env('PAGINATION_NUM', 10);
        $tb = $this->itemsPaginate($this->o_model, $per_page, []);
		$data['o_all'] = $tb['items'];
		$data['pagination'] = $tb['pagination'];
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
		$o = $this->o_model::create($data);
		$request->session()->flash('msj_success', $this->tag_the.' '.$this->c_name.' '.$request->name.' ha sido registrad'.$this->tag_o.' correctamente.');
		return redirect($this->r_name);
    }

    public function show($id)
    {
        if(empty($id)){
			return redirect($this->r_name);
		}
		$o = $this->o_model::find($id);
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
		$o = $this->o_model::find($id);
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
		$o = $this->o_model::find($id);
		if(empty($o->id)){
			return redirect($this->r_name);
		}
		$o->update($data);
		$request->session()->flash('msj_success', $this->tag_the.' '.$this->c_name.' '.$o->name.' ha sido actualizad'.$this->tag_o.' correctamente.');
		return redirect($this->r_name);
    }

    public function destroy($id)
    {
        if(empty($id)){
			return false;
		}
		$o = $this->o_model::findOrFail($id);
		if(empty($o->id)){
			return false;
		}
		$o->update(['status' => 'deleted']);
		return response()->json([
            'response' => 'ok'
        ], 200);
    }
}
