<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
	private $tag_the = 'El';
    private $tag_o = 'o';
    private $r_name = 'admin/users';
    private $v_name = 'admin.users';
    private $c_name = 'Usuario';
    private $c_names = 'Usuarios';
	private $list_tbl_fsc = ['name' => 'Nombre','lastname' => 'Apellidos','email' => 'Correo','phone' => 'Telefono','role' => 'Rol'];
	private $o_model = User::class;
	
	private function gdata($t = 'Lista de')
    {
        if (request()->session()->has('filter_email')) {
			$filter_email = session('filter_email');
			request()->session()->flash('filter_email', $filter_email);
		}
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

    public function search(Request $request)
    {
        $fts = ['name','email','phone'];
		foreach($fts as $row){
			if (request()->session()->has('filter_'.$row)) {
				$filter_x = session('filter_'.$row);
				request()->session()->flash('filter_'.$row, $filter_x);
			}
		}
		
		$data = request()->except(['_token','_method']);
		if(!empty($data['value'])){
			request()->session()->flash('filter_'.$data['field'], $data['value']);
		} else {
			if (request()->session()->has('filter_'.$data['field'])) {
				request()->session()->forget('filter_'.$data['field']);
			}
		}
		echo 'ok';
    }

    public function index(Request $request)
    {
		$data = $this->gdata();
		$filter_email = '';
		if (request()->session()->has('filter_email')) {
			$filter_email = session('filter_email');
			request()->session()->flash('filter_email', $filter_email);
		}
		$filter_name = '';
		if (request()->session()->has('filter_name')) {
			$filter_name = session('filter_name');
			request()->session()->flash('filter_name', $filter_name);
		}
		$filter_phone = '';
		if (request()->session()->has('filter_phone')) {
			$filter_phone = session('filter_phone');
			request()->session()->flash('filter_phone', $filter_phone);
		}
		$w = ['status' => 'active'];
		if(!empty($filter_email)){
			$w['email'] = $filter_email;
		}
		if(!empty($filter_phone)){
			$w['phone'] = $filter_phone;
		}
		$per_page = !empty($request->get('per_page'))?$request->get('per_page'):env('PAGINATION_NUM', 10);
        $tb = $this->o_model::where($w)->orderBy('id','asc')->paginate($per_page);
        if(!empty($filter_name)){
			$tb = $this->o_model::where($w)->where('name', 'like', '%'.$filter_name.'%')->orderBy('id','asc')->paginate($per_page);
		}
		$data['o_all'] = $tb->items();
		$data['pagination'] = $this->getStructurePaginate($tb);
		
		$data['filter_email'] = $filter_email;
		$data['filter_name'] = $filter_name;
		$data['filter_phone'] = $filter_phone;
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
			'email' => 'required|string|email|max:255|unique:users',
		],[
			'name.required' => 'El nombre es requerido',
			'email.required' => 'El correo es requerido',
			'email.string' => 'El correo debe ser un texto',
			'email.email' => 'El correo debe ser una dirección de correo electrónico válido',
            'email.max' => 'El correo no debe exceder más de 255 caracteres',
            'email.unique' => 'El correo está registrado en una cuenta',
		]);
		if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('uploads','public');
			$path = 'storage/'.$path;
            $data['photo_pp'] = $path;
            $data['photo'] = asset($path);
        }
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
		$tag = is_numeric($id)?'id':'uuid';
		$o = $this->o_model::where([$tag => $id])->first();
		if(empty($o->id)){
			return redirect($this->r_name);
		}
		if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('uploads','public');
			$path = 'storage/'.$path;
			$data['photo_pp'] = $path;
            $data['photo'] = asset($path);
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
		$tag = is_numeric($id)?'id':'uuid';
		$o = $this->o_model::where([$tag => $id])->first();
		if(empty($o->id)){
			return false;
		}
		//$this->o_model::destroy($id);
		$o->update(['status' => 'deleted']);
		return response()->json([
            'response' => 'ok'
        ], 200);
		//echo 'ok';
    }
}
