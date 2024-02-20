<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Twofa;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Ntfs;

class AuthController extends Controller
{
    //private $o_model = User::class;
	
	public function __construct(){}
	
	public function index()
    {
		$data['title'] = 'Iniciar sesión';
		return view('auth.login',$data);
    }
	
	public function twofa()
    {
		$data['title'] = 'Iniciar sesión';
		return view('auth.twofa',$data);
    }

    public function store(Request $request)
    {
		$validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|exists:users',
            'password' => 'required'
        ],[
			'email.required' => 'El correo es requerido',
			'email.string' => 'El correo debe ser un texto',
			'email.email' => 'El correo debe ser una dirección de correo electrónico válido',
            'email.max' => 'El correo no debe exceder más de 255 caracteres',
            'email.exists' => 'El correo no está registrado',
			'password.required' => 'La contraseña es requerida',
		]);
		if ($validator->fails()) {
			return redirect('login')->withErrors($validator)->withInput();
		}
        //$data = request()->except(['_token','_method']);
		/*if (!Auth::attempt($data)) {
			$request->session()->flash('error_attempt', 'Las credenciales no son correctas');
			return redirect('login')->withErrors(['error_attempt' => 'Las credenciales no son correctas'])->withInput();
		}*/
		
		$credentials = request(['email', 'password']);
		$p = Hash::make($credentials['password']);
		$p = bcrypt($credentials['password']);
		$o = User::where(['email' => $credentials['email']])->first();
		if(!empty($o->id)){
			if (Hash::check($credentials['password'], $o->password)){
				if($o->twofa == 'yes'){
					//Eliminamos el factor basura
					$t_delete = Twofa::where(['user' => $o->id])->delete();
					//Aqui generamos el code aleatorio
					$code = $this->search_key();
					$codemd5 = md5($code);
					$twofa = Twofa::create(['user' => $o->id,'email' => $credentials['email'],'password' => $credentials['password'],'keyresponse' => $codemd5,'code' => $code]);
					//Enviamos el codigo
					Mail::to($o->email)->send(new Ntfs('Login Two Factor','Ha intentado iniciar sesión en nuestra plataforma. Para acceder debes validar el siguiente código: <b>'.$code.'</b>',$o->name,$o->email));
					//Retornamos la respuesta encriptada
					return redirect('twofa');
					//return $this->sendResponse(['access_code' => $codemd5,'message' => 'Enhorabuena!!! Ya estas a un paso de ingresar, debes validar el código de doble factor de autenticación.']);
				} else {
					$credentials = request(['email', 'password']);
					if (!$token = Auth::attempt($credentials)) {
						return redirect('login')->withErrors(['error_attempt' => 'Estas credenciales no coinciden con nuestros registros.'])->withInput();
					}
					//Login
					return redirect('/');
				}
			}
		}
		$request->session()->flash('error_attempt', 'Las credenciales no son correctas');
		return redirect('login')->withErrors(['error_attempt' => 'Las credenciales no son correctas'])->withInput();
    }
	
	public function twofactor(Request $request)
    {
		$o = Twofa::where(['code' => $request->code])->first();
		if(empty($o->id)){
			return redirect('twofa')->withErrors(['error_attempt' => 'El código proporcionado es incorrecto.'])->withInput();
		}
		$credentials = ['email' => $o->email, 'password' => $o->password];
        if (!$token = Auth::attempt($credentials)) {
            return redirect('twofa')->withErrors(['error_attempt' => 'Estas credenciales no coinciden con nuestros registros.'])->withInput();
        }
		Twofa::destroy($o->id);
        return redirect('/');
    }

    public function logout(Request $request)
    {
		Auth::logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();
		return redirect('/');
    }
	
	//Obtener codigo de two fa
	private function search_key($len = 8){
		$r = Str::random($len);
		$t = Twofa::where('code', $r)->count();
		while($t > 0){
			$r = Str::random($len);
			$t = Twofa::where('code', $r)->count();
		}
		return $r;
	}
}
