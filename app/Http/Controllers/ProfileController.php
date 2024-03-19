<?php

namespace App\Http\Controllers;

use App\Models\Charges;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Specialties;
use App\Models\User;

class ProfileController extends Controller
{
    private $tag_the = 'El';
    private $tag_o = 'o';
    private $r_name = 'profile';
    private $c_name = 'Perfil';
    private $c_names = 'Perfil';
	private $list_tbl_fsc = ['name' => 'Nombre','username' => 'Usuario','email' => 'Correo','phone' => 'Tel&eacute;fono','group' => 'Grupo','city' => 'Ciudad','birth' => 'Fecha de nacimiento','role' => 'Rol'];
	private $o_model = User::class;
    private $documents_type = ["cédula de ciudadanía","pasaporte","cédula de extranjería"];


	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
		$o = $this->o_model::find($id);
        $charges = Charges::all();

		$data['menu'] = $this->r_name;
        $data['c_name'] = $this->c_name;
        $data['c_names'] = $this->c_names;
        $data['title'] = 'Mi perfil';
        $data['o'] = $o;
        $data['charges'] = $charges;
        $data['documents_type'] = $this->documents_type;
		$data['o_specialties'] = Specialties::where(['status' => 'active'])->orderBy('id', 'asc')->get();
		return view($this->r_name,$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = Auth::user()->id;
		$data = request()->except(['_token','_method']);
		$validatedData = $request->validate([
			'name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:users,email,'.$id,
			'password' => 'required|string|min:6',
		],[
			'name.required' => 'El nombre es requerido',
			'name.string' => 'El nombre debe ser un texto',
			'name.max' => 'El nombre no debe exceder más de 255 caracteres',
			'email.required' => 'El correo es requerido',
			'email.email' => 'El correo debe ser un correo válido',
			'email.string' => 'El correo debe ser un texto',
			'email.max' => 'El correo no debe exceder más de 255 caracteres',
			'email.unique' => 'El correo ya existe en la base de datos',
			'password.required' => 'Se requiere la nueva contraseña',
			'password.min' => 'La contraseña debe tener al menos 6 caracteres',
		]);
		$o = $this->o_model::find($id);
		if ($request->hasFile('photo')) {
			$path = $request->file('photo')->store('uploads','public');
			$path = 'storage/'.$path;
			$data['photo_pp'] = $path;
            $data['photo'] = asset($path);
		}
		if ($request->hasFile('signature')) {
			$path = $request->file('signature')->store('uploads','public');
			$path = 'storage/'.$path;
			$data['signature_pp'] = $path;
            $data['signature'] = asset($path);
		}
		$data['password'] = Hash::make($data['password']);
		$data['twofa'] = !empty($data['twofa'])?'yes':'no';
		$o->update($data);
		$request->session()->flash('msj_success', 'El perfil ha sido actualizado correctamente.');
		return redirect($this->r_name);
    }
}
