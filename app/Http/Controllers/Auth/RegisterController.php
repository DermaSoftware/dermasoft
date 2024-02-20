<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Companies;
use App\Models\Headquarters;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
			'phone' => ['required', 'numeric']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
		$photo = '';
		$photo_pp = '';
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
            'twofa' => $twofa,
            'password' => Hash::make($data['password']),
			'photo' => $photo,
			'photo_pp' => $photo_pp,
            'company' => $o_cy->id,
            'campus' => $o_hs->id,
        ]);
		return $o;
    }
	
	//Obtener codigo de CMS
	private function search_key($len = 8){
		$r = Str::random($len);
		$r = strtolower($r);
		$t = Companies::where('cms', $r)->count();
		while($t > 0){
			$r = Str::random($len);
			$r = strtolower($r);
			$t = Companies::where('cms', $r)->count();
		}
		return $r;
	}
}
