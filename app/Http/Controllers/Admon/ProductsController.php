<?php

namespace App\Http\Controllers\Admon;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Subcategories;
use App\Models\Categories;
use App\Models\Products;

class ProductsController extends Controller
{
	private $tag_the = 'El';
    private $tag_o = 'o';
    private $r_name = 'admon/products';
    private $v_name = 'admon.products';
    private $c_name = 'Producto';
    private $c_names = 'Productos';
	private $list_tbl_fsc = ['category' => 'Categoría','subcategory' => 'Sub-Categoría','code' => 'Código','name' => 'Nombre','price' => 'Precio','amount' => 'U/disponibles','stock' => 'Stock mínimo'];
	private $o_model = Products::class;
	
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
		$data['o_all'] = $this->o_model::with(['category'])->where(['company' => Auth::user()->company])->whereNotIn('status',['deleted'])->orderBy('id', 'asc')->get();
		return view($this->v_name.'.index',$data);
    }

    public function create()
    {
        $data = $this->gdata('Agregar');
		$data['o_categories'] = Categories::where(['status' => 'active'])->orderBy('id', 'asc')->get();
		$data['o_subcategories'] = Subcategories::where(['status' => 'active'])->orderBy('id', 'asc')->get();
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
		$data['company'] = Auth::user()->company;
		$o = $this->o_model::create($data);
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
		$data['o_categories'] = Categories::where(['status' => 'active'])->orderBy('id', 'asc')->get();
		$data['o_subcategories'] = Subcategories::where(['status' => 'active'])->orderBy('id', 'asc')->get();
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
		$data['o_categories'] = Categories::where(['status' => 'active'])->orderBy('id', 'asc')->get();
		$data['o_subcategories'] = Subcategories::where(['status' => 'active'])->orderBy('id', 'asc')->get();
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
		$tag = is_numeric($id)?'id':'uuid';
		$o = $this->o_model::where([$tag => $id])->first();
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
}
