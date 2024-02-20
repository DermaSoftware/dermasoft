<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\Ntfs;
use Illuminate\Support\Str;
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
	private $list_tbl_fsc = ['name' => 'Nombre','phone' => 'Teléfono','email' => 'Correo'];
	private $o_model = User::class;
	
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
        $data = $this->gdata();
		$data['o_all'] = $this->o_model::where(['role' => 1])->whereNotIn('status',['deleted'])->orderBy('id', 'asc')->get();
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
		$password = Str::random(12);
		$data['password'] = Hash::make($password);
		$data['role'] = 1;
		$o = $this->o_model::create($data);
		Mail::to($o->email)->send(new Ntfs('Nueva cuenta','Su cuenta ha sido registrada correctamente. Para acceder debes ingresar con su correo y la contraseña: <b>'.$password.'</b>',$o->name,$o->email));
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
			'email' => 'required|string|email|max:255|unique:users,email,'.$id,
		],[
			'name.required' => 'El nombre es requerido',
			'email.required' => 'El correo es requerido',
			'email.email' => 'El correo debe ser un correo válido',
			'email.string' => 'El correo debe ser un texto',
			'email.max' => 'El correo no debe exceder más de 255 caracteres',
			'email.unique' => 'El correo ya existe en la base de datos',
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
		$email = Str::random(9).'_deleted_'.$o->email;
		$o->update(['email' => $email,'status' => 'deleted']);//$this->o_model::destroy($id);
		return response()->json(['response' => 'ok'], 200);
    }
}
