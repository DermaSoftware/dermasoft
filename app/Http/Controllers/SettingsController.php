<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Companies;
use Illuminate\Support\Str;

class SettingsController extends Controller
{
	private $tag_the = 'La';
    private $tag_o = 'a';
    private $r_name = 'admon/settings';
    private $v_name = 'settings';
    private $c_name = 'Configuración';
    private $c_names = 'Configuraciones';
	private $list_tbl_fsc = ['name' => 'Nombre'];
	private $o_model = Companies::class;
	private $fields = [
		'name' => 'Primer nombre',
		'scd_name' => 'Segundo nombre',
		'lastname' => 'Primer apellido',
		'scd_lastname' => 'Segundo apellido',
		'birth' => 'Fecha de nacimiento',
		'gender' => 'Genero',
		'civil_status' => 'Estado civil',
		'blood_type' => 'Tipo de sangre',
		// 'vital_state' => 'Estado vital',
		// 'contact' => 'Información de contacto',
		// 'fix_phone' => 'Número de teléfono fijo',
		'phone' => 'Número de celular',
		'campus' => 'Sede asignada al paciente',
		'main_address' => 'Dirección principal',
		// 'secondary_address' => 'Dirección secundaria',
		'country' => 'País',
		'department' => 'Departamento',
		'city' => 'Ciudad de residencia',
		'email' => 'Correo electrónico',
		// 'social_security' => 'Seguridad social y afiliación',
		// 'affiliate_type' => 'Tipo de Afiliado',
		// 'affiliate_type_ssg' => 'Tipo de Afiliado SSG',
		'education' => 'Nivel de educación',
		'ethnic_group' => 'Grupo étnico',
		'population_group' => 'Grupo poblacional',
		'occupation' => 'Ocupación',
		'eps' => 'EPS',
		'date_affiliation' => 'Fecha de afiliación',
		'prepaid' => 'Prepagada',
		'benefits_plan' => 'Plan de beneficios',
		'health_care' => 'Prog. de Atención en salud',
		'notes' => 'Notas generales de atención',
		'photo' => 'Foto',
		// 'contract_number' => 'Número de contrato',
		'occupational_hazards' => 'Admin. de riesgos laborales',
		'pension_funds' => 'Admin. de fondos de pensiones',
		// 'attendant' => 'Acudiente',
		'name_attendant' => 'Nombre del acudiente',
		'relationship' => 'Parentesco del acudiente',
		'phone_attendant' => 'Teléfono del acudiente',

        // 'hours_quotes' => 'Cantidad de horas que tiene el paciente antes de la cita para pagar la consulta',
		// 'hours_scheduling_web' => 'Cantidad de horas antes para notificar recordatorio de pago de consulta cuando se toma cita por la web',
		// 'time_consultation' => 'Tiempo de duración de consulta',
		// 'time_consultation_text' => 'Texto de tiempo de duración de consulta',
		// 'hours_ntf' => 'Cantidad de horas antes para notificar recordatorio de cita por whatsapp, correo electrónico y mini mensaje de texto'
	];

	private function gdata($t = 'Lista de')
    {
        $data['menu'] = $this->r_name;
        $data['tag_o'] = $this->tag_o;
        $data['tag_the'] = $this->tag_the;
        $data['v_name'] = $this->v_name;
        $data['c_name'] = $this->c_name;
        $data['c_names'] = $this->c_names;
        $data['list_tbl_fsc'] = $this->list_tbl_fsc;
        $data['title'] = $t.' '.$this->c_names;
		return $data;
    }

	public function __construct(){
        $this->middleware('checkRole:2');
    }

    public function index()
    {
		$o = $this->o_model::where(['id' => Auth::user()->company])->orderBy('id', 'DESC')->first();
		if(empty($o->id)){
			return redirect('/');
		}
		$data = $this->gdata('Actualizar');
		if(empty($o->cms)){
			$cms = $this->search_key();
			$o->update(['cms' => $cms]);
		}
		$data['o'] = $o;
        $data['xfields'] = $this->fields;
		return view($this->v_name.'.edit',$data);
    }

    public function update(Request $request)
    {
		$data = request()->except(['_token','_method']);
		$validatedData = $request->validate([
			'name' => 'required',
		],[
			'name.required' => 'El nombre es requerido',
		]);
		$o = $this->o_model::where(['id' => Auth::user()->company])->orderBy('id', 'DESC')->first();
		if(empty($o->id)){
			return redirect('/');
		}
		if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('uploads','public');
			$path = 'storage/'.$path;
            $data['logo_pp'] = $path;
            $data['logo'] = asset($path);
        }
		foreach($this->fields as $key => $row){
			$tag = $key.'_active';
			$data[$tag] = !empty($data[$tag])?'si':'no';
			$tag = $key.'_required';
			$data[$tag] = !empty($data[$tag])?'si':'no';
		}
		$o->update($data);
		$request->session()->flash('msj_success', $this->tag_the.' '.$this->c_name.' '.$o->name.' ha sido actualizad'.$this->tag_o.' correctamente.');
		return redirect($this->r_name);
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
