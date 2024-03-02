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
use App\Http\Requests\CreateCompanyRequest;
use App\Models\Plans;

class RegisterController extends Controller
{

    public function index()
    {
        $data['title'] = 'Crear una cuenta';
        return view('auth.register', $data);
    }

    public function store(CreateCompanyRequest $request)
    {

        $data = $request->except(['_token', '_method']);
        $photo = '';
        $logo = '';
        if (request()->hasFile('photo')) {
            $path = request()->file('photo')->store('uploads', 'public');
            $path = 'storage/' . $path;
            $photo_pp = $path;
            $photo = asset($path);
        }
        if (request()->hasFile('logo')) {
            $path = request()->file('logo')->store('uploads', 'public');
            $path = 'storage/' . $path;
            $logo_pp = $path;
            $logo = asset($path);
        }
        $cms = $this->search_key();
        $plan = Plans::where('id', 4)->first();
        $o_cy = Companies::create([
            'name' => $data['companies_name'],
            'email' => $data['company_email'],
            'phone' => $data['company_phone'],
            'nit' => $data['nit'],
            'kind_person' => $data['kind_person'],
            'location' => $data['location'],
            'city' => $data['city'],
            'logo' => $logo,
            'logo_pp' => $logo_pp,
            'cms' => $cms,
            'plan_id' => $plan->id
        ]);
        $o_hs = Headquarters::create([
            'name' => $data['companies_name'],
            'code' => '01',
            'email' => $data['email'],
            'phone' => $data['company_phone'],
            'responsible' => $data['name'],
            'responsible_email' => $data['email'],
            'responsible_phone' => $data['company_phone'],
            'company' => $o_cy->id,
        ]);
        $twofa = !empty($data['twofa']) ? 'yes' : 'not';
        $o = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['company_phone'],
            'gender' => $data['gender'],
            'email_verified_at' => now(),
            'twofa' => $twofa,
            'password' => Hash::make($data['password']),
            'photo' => $photo,
            'photo_pp' => $photo_pp,
            'company' => $o_cy->id,
            'campus' => $o_hs->id,
        ]);
        $admin= User::query()->find()->where(['role'=>1])->first();
        Mail::to($o->email)->send(new Ntfs('Nueva cuenta','Su cuenta ha sido registrada correctamente, para ingresar recuerde usar este correo y la contraseña con la cual se registró.',$o->name,$o->email));
        Mail::to($admin->email)->send(new Ntfs('Nueva cuenta de prueba','Su ha creado una nueva cuenta de prueba, con los siguientes datos '.$o->name.' '.$o->email));
        return redirect('/');
    }

    //Obtener codigo de CMS
    private function search_key($len = 8)
    {
        $r = Str::random($len);
        $t = Companies::where('cms', $r)->count();
        while ($t > 0) {
            $r = Str::random($len);
            $t = Companies::where('cms', $r)->count();
        }
        return $r;
    }
}
