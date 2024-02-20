<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Companies;
use App\Models\Headquarters;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\Ntfs;
use Illuminate\Support\Str;

class RegisterController extends Controller
{

    public function index()
    {
		$data['title'] = 'Crear una cuenta';
		return view('auth.register',$data);
    }
	
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required'
        ],[
			'name.required' => 'El nombre es requerido',
			'email.required' => 'El correo es requerido',
			'email.string' => 'El correo debe ser un texto',
			'email.email' => 'El correo debe ser una dirección de correo electrónico válido',
            'email.max' => 'El correo no debe exceder más de 255 caracteres',
            'email.unique' => 'El correo está registrado en una cuenta',
			'password.required' => 'La contraseña es requerida',
		]);
		if ($validator->fails()) {
			return redirect('register')->withErrors($validator)->withInput();
		}
		$data = $request->except(['_token','_method']);
		$photo = '';
		if (request()->hasFile('photo')) {
			$path = request()->file('photo')->store('uploads','public');
			$path = 'storage/'.$path;
			$photo_pp = $path;
			$photo = asset($path);
		}
		$cms = $this->search_key();
		$o_cy = Companies::create([
            'name' => $data['companies_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'logo' => $photo,
			'logo_pp' => $photo_pp,
            'cms' => $cms,
        ]);
		$o_hs = Headquarters::create([
            'name' => $data['companies_name'],
            'code' => '01',
            'email' => $data['email'],
            'phone' => $data['phone'],
            'responsible' => $data['name'],
            'responsible_email' => $data['email'],
            'responsible_phone' => $data['phone'],
            'company' => $o_cy->id,
        ]);
		$twofa = !empty($data['twofa'])?'yes':'not';
		$o = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'gender' => $data['gender'],
            'email_verified_at' => now(),
            'twofa' => $twofa,
            'password' => Hash::make($data['password']),
			'photo' => $photo,
			'photo_pp' => $photo_pp,
            'company' => $o_cy->id,
            'campus' => $o_hs->id,
        ]);
		Mail::to($o->email)->send(new Ntfs('Nueva cuenta','Su cuenta ha sido registrada correctamente, para ingresar recuerde usar este correo y la contraseña con la cual se registró.',$o->name,$o->email));
        return redirect('/');
    }
	
	//Obtener codigo de CMS
	private function search_key($len = 8){
		$r = Str::random($len);
		$t = Companies::where('cms', $r)->count();
		while($t > 0){
			$r = Str::random($len);
			$t = Companies::where('cms', $r)->count();
		}
		return $r;
	}
}
