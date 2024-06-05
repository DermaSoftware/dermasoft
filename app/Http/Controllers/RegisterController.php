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
use App\Models\Roles;

class RegisterController extends Controller
{

    public function index($company=null)
    {
        $comp = null;
        if (isset($company)) {
            $comp = Companies::where('uuid', $company)->first();
        }
        $comp = Companies::where('uuid', $company)->first();
        $data['title'] = 'Crear una cuenta';
        $data['company'] = $comp;
        return view('auth.register', $data);
    }

    public function store(CreateCompanyRequest $request, $company=null)
    {

        $comp = null;
        if (isset($company)) {
            $comp = Companies::where('uuid', $company)->first();
        }
        $data = $request->except(['_token', '_method']);
        $photo = '';
        $logo = '';
        $logo_pp = '';
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
        $o = null;
        if (empty($comp)) {
            $plan = Plans::where('id', 4)->first();
            $o_cy = Companies::create([
                'name' => $data['companies_name'],
                'contact_name' => $data['name'] . ' ' . $data['lastname'],
                'email' => $data['company_email'],
                'phone' => $data['company_phone'],
                'contact_phone' => $data['contact_phone'],
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
                'lastname' => $data['lastname'],
                'email' => $data['email'],
                'phone' => $data['contact_phone'],
                'gender' => $data['gender'],
                'email_verified_at' => now(),
                'twofa' => $twofa,
                'password' => Hash::make($data['password']),
                'photo' => $photo,
                'photo_pp' => $photo_pp,
                'company' => $o_cy->id,
                'campus' => $o_hs->id,
            ]);
        }
        else{
            $role = Roles::where('name','Paciente')->first();
            $twofa = !empty($data['twofa']) ? 'yes' : 'not';
            $o = User::create([
                'name' => $data['name'],
                'lastname' => $data['lastname'],
                'scd_name' => $data['scd_name'],
                'scd_lastname' => $data['scd_lastname'],
                'document_type' => $data['document_type'],
                'document_number' => $data['document_number'],
                'scd_lastname' => $data['scd_lastname'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'gender' => $data['gender'],
                'email_verified_at' => now(),
                'twofa' => $twofa,
                'password' => Hash::make($data['password']),
                'photo' => $photo,
                'photo_pp' => $photo_pp,
                'company' => $comp->id,
                'campus' => $comp->campus[0]->id,
                'role' => $role->id,
            ]);
        }

        $admin = User::query()->where(['role' => 1])->first();
        Mail::to($o->email)->send(new Ntfs('Nueva cuenta', 'Su cuenta ha sido registrada correctamente, para ingresar recuerde usar este correo y la contraseña con la cual se registró.', $o->name, $o->email));
        Mail::to($admin->email)->send(new Ntfs('Nueva cuenta de prueba', 'Su ha creado una nueva cuenta de prueba, con los siguientes datos ' . $o->name . ' ' . $o->email));
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
