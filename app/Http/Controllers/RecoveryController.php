<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Recovery;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\Ntfs;

class RecoveryController extends Controller
{
	//Solicitud
    public function index()
    {
		$data['title'] = 'Recuperar contraseña';
		return view('auth.recovery',$data);
    }
	public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|exists:users',
        ],[
			'email.required' => 'El correo es requerido',
			'email.string' => 'El correo debe ser un texto',
			'email.email' => 'El correo debe ser una dirección de correo electrónico válido',
            'email.max' => 'El correo no debe exceder más de 255 caracteres',
            'email.exists' => 'El correo no está registrado',
		]);
		if ($validator->fails()) {
			return redirect('recovery')->withErrors($validator)->withInput();
		}
		$data = $request->except(['_token','_method']);
        $o = User::where(['email' => $data['email']])->first();
		$key = Str::random(6);
        $o_new = Recovery::create(['user' => $o->id,'key' => $key]);
		Mail::to($o->email)->send(new Ntfs('Recuperación de contraseña','La recuperación de la contraseña ha sido solicitada exitosamente. Para seguir con el proceso debes validar el siguiente código: '.$key,$o->name,$o->email));
        return redirect('recovery/verify');
	}
	
	//Verificación
	public function verify()
    {
		$data['title'] = 'Recuperar contraseña';
		return view('auth.verify',$data);
    }
	public function checkkey(Request $request)
    {
		$validator = Validator::make($request->all(), [
			'key' => 'required|exists:recovery',
        ],[
			'key.required' => 'El código es requerido',
			'key.exists' => 'El código no es válido',
		]);
		if ($validator->fails()) {
			return redirect('recovery/verify')->withErrors($validator)->withInput();
		}
		$data = $request->except(['_token','_method']);
		$o = Recovery::where(['key' => $data['key']])->first();
		session(['keyrecovery' => $data['key']]);
		return redirect('recovery/new');
    }
	
	//Reseteo
	public function newpassword()
    {
		if (request()->session()->has('keyrecovery')) {
			$key = session('keyrecovery');
			$o = Recovery::where(['key' => $key])->first();
			if(empty($o->id)){
				return redirect('/');
			}
		}
		$data['title'] = 'Recuperar contraseña';
		return view('auth.newpassword',$data);
    }
    public function update(Request $request)
    {
		$validator = Validator::make($request->all(), [
			'password' => 'required',
        ],[
			'password.required' => 'La contraseña es requerida',
		]);
		if ($validator->fails()) {
			return redirect('recovery/new')->withErrors($validator)->withInput();
		}
		$data = $request->except(['_token','_method']);
		if (request()->session()->has('keyrecovery')) {
			$key = session('keyrecovery');
			$o = Recovery::where(['key' => $key])->first();
			if(!empty($o->id)){
				$o_us = User::where(['id' => $o->user])->first();
				$o_us->update(['password' => Hash::make($data['password'])]);
				Recovery::destroy($o->id);
			}
			$request->session()->forget('keyrecovery');
		}
		return redirect('/');
    }
}
