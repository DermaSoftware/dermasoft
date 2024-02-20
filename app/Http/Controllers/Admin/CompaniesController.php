<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\Ntfs;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Headquarters;
use App\Models\Companies;
use App\Models\Payments;
use App\Models\Charges;
use App\Models\Orders;
use App\Models\Plans;
use App\Models\User;

class CompaniesController extends Controller
{
	private $tag_the = 'El';
    private $tag_o = 'o';
    private $r_name = 'admin/companies';
    private $v_name = 'admin.companies';
    private $c_name = 'Cliente';
    private $c_names = 'Clientes';
	private $list_tbl_fsc = ['name' => 'Nombre','nit' => 'NIT','phone' => 'Teléfono','email' => 'Correo','state' => 'Estado'];
	private $o_model = Companies::class;
	
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
		$data['o_all'] = $this->o_model::whereNotIn('status',['deleted'])->orderBy('id', 'asc')->get();
		return view($this->v_name.'.index',$data);
    }

    public function create()
    {
        $data = $this->gdata('Agregar');
        $data['o_charges'] = Charges::where(['status' => 'active'])->orderBy('id', 'asc')->get();
        $data['o_plans'] = Plans::where(['status' => 'active'])->orderBy('id', 'asc')->get();
		return view($this->v_name.'.create',$data);
    }

    public function store(Request $request)
    {
        $data = request()->except(['_token','_method']);
		$validatedData = $request->validate([
			'plan' => 'required|string',
			'name' => 'required|string',
			'email' => 'required|string|email|max:255|unique:users',
		],[
			'plan.required' => 'El plan es requerido',
			'name.required' => 'El nombre es requerido',
			'email.required' => 'El correo es requerido',
			'email.string' => 'El correo debe ser un texto',
			'email.email' => 'El correo debe ser una dirección de correo electrónico válido',
            'email.max' => 'El correo no debe exceder más de 255 caracteres',
            'email.unique' => 'El correo está registrado en una cuenta',
		]);
		$params = ['kind_person' => $data['kind_person'],'name' => $data['name'],'nit' => $data['nit'],'legal_representative' => $data['legal_representative'],'location' => $data['location'],'city' => $data['city'],'phone' => $data['phone'],'contact_name' => $data['contact_name'],'email' => $data['email'],'contact_phone' => $data['contact_phone'],'document_type' => $data['document_type'],'document_number' => $data['document_number'],'charge' => $data['charge']];
		if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('uploads','public');
			$path = 'storage/'.$path;
            $params['logo'] = asset($path);
        }
		$o = $this->o_model::create($params);
		
		$o_hs = Headquarters::create([
            'name' => $data['name'],
            'code' => '01',
            'email' => $data['email'],
            'phone' => $data['phone'],
            'responsible' => $data['legal_representative'],
            'responsible_email' => $data['email'],
            'responsible_phone' => $data['contact_phone'],
            'company' => $o->id,
        ]);
		
		$password = Str::random(12);
		$email = Str::random(4).'_temp_'.$data['email'];
		$us_params = ['name' => $data['legal_representative'],'main_address' => $data['location'],'city' => $data['city'],'phone' => $data['phone'],'document_type' => $data['document_type'],'document_number' => $data['document_number'],'charge' => $data['charge'],'email' => $email,'landline' => $data['contact_phone'],'twofa' => 'not','password' => Hash::make($password),'company' => $o->id,'campus' => $o_hs->id];
		if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('uploads','public');
			$path = 'storage/'.$path;
            $us_params['photo'] = asset($path);
        }
		$o_us = User::create($us_params);
		$o->update(['user' => $o_us->id]);
		//Buscar el amount
		$o_plan = Plans::where(['id' => $data['plan']])->first();
		$o_order = Orders::create(['plan' => $data['plan'],'company' => $o->id,'amount' => $o_plan->price]);
		$url = url('payext/'.$o_order->uuid);
		$link = '<br><a target="_blank" href="'.$url.'">'.$url.'</a>';
		Mail::to($o->email)->send(new Ntfs('Nueva orden de pago','Su cuenta ha sido pre-registrada correctamente, para continuar con el proceso de registro debe realizar en pago de la membresía en el siguiente enlace: '.$link,$o_us->name,$o->email));
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
		$data['o_charges'] = Charges::where(['status' => 'active'])->orderBy('id', 'asc')->get();
		$data['o_all'] = Payments::where(['company' => $o->id])->whereNotIn('status',['deleted'])->orderBy('id', 'desc')->get();
		//$data['o_sede'] = Headquarters::where(['company' => $o->id])->orderBy('id', 'asc')->first();
		//$data['o_plans'] = Plans::where(['status' => 'active'])->orderBy('id', 'asc')->get();
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
		$data['o_charges'] = Charges::where(['status' => 'active'])->orderBy('id', 'asc')->get();
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
