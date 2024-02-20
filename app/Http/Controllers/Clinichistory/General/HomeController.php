<?php

namespace App\Http\Controllers\Clinichistory\General;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Companies;
use App\Models\Medicines;
use App\Models\Diagnoses;
use App\Models\Procedures;
use App\Models\Vitalsigns;
use App\Models\Indications;
use App\Models\Dermatology;
use App\Models\Pathologies;
use App\Models\Diagnosestype;
use App\Models\Laboratoryexams;
use App\Models\Prescriptions;
use App\Models\Hcdermsolexams;
use App\Models\Hcdermsolpath;
use App\Models\Hcdermsolproc;
use App\Models\Hcdermdiagnostics;
use App\Models\Hcdermindications;
use PDF;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
//use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Str;
//use App\Mail\HabeasData;
use App\Mail\Ntfs;

class HomeController extends Controller
{
	private $tag_the = 'El';
    private $tag_o = 'o';
    private $r_name = 'clinichistory';
    private $v_name = 'clinichistory';
    private $c_name = 'Historia clínica';
    private $c_names = 'Historia clínica';
	private $list_tbl_fsc = ['name' => 'Nombre'];
	private $o_model = User::class;
	private $hc_type = 'Dermatología general';
	
	private function gdata($t = '')
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
        $this->middleware('checkRole:2_3');
    }

    public function index()
    {
        $data = $this->gdata();
		return view($this->v_name.'.index',$data);
    }
	
	public function dermatology($id)
    {
        if(empty($id)){
			return redirect($this->r_name);
		}
		$o = $this->o_model::where(['uuid' => $id])->first();
		if(empty($o->id)){
			return redirect($this->r_name);
		}
		$data = $this->gdata('HC - Dermatología general', false);
        $data['o'] = $o;
		$data['o_vitalsigns'] = Vitalsigns::where(['user' => $o->id])->orderBy('id', 'DESC')->first();
		$data['o_diagnoses'] = Diagnoses::where(['status' => 'active'])->orderBy('id', 'asc')->get();
		$data['o_diagnosesty'] = Diagnosestype::where(['status' => 'active'])->orderBy('id', 'asc')->get();
		$data['o_indications'] = Indications::where(['status' => 'active'])->orderBy('id', 'asc')->get();
		$data['o_medicines'] = Medicines::where(['status' => 'active'])->orderBy('id', 'asc')->get();
		$data['o_labexams'] = Laboratoryexams::where(['status' => 'active'])->orderBy('id', 'asc')->get();
		$data['o_procs'] = Procedures::where(['status' => 'active'])->orderBy('id', 'asc')->get();
		$data['o_paths'] = Pathologies::where(['status' => 'active'])->orderBy('id', 'asc')->get();
		
		//Historial
		$t = Dermatology::where(['user' => $o->id,'hc_type' => $this->hc_type])->count();
		$is_records = !empty($t)?$t > 0:false;
		if($is_records){
			$o_derm = Dermatology::where(['user' => $o->id,'hc_type' => $this->hc_type])->orderBy('id', 'DESC')->first();
			$data['o_derm'] = $o_derm;
		}
		$data['t_records'] = $t;
		$data['is_records'] = $is_records;
		
		return view($this->v_name.'.dermatology',$data);
    }
	
	public function sdermatology(Request $request, $id)
    {
        $data = request()->except(['_token','_method']);
		$validatedData = $request->validate([
			'external_cause' => 'required',
			'consultation_purpose' => 'required',
			'reason' => 'required',
			'current_illness' => 'required',
			'physical_exam' => 'required',
			'analysis' => 'required',
		],[
			'external_cause.required' => 'La Causa externa es requerida',
			'consultation_purpose.required' => 'La Finalidad consulta es requerida',
			'reason.required' => 'El Motivo de la consulta es requerido',
			'current_illness.required' => 'La Enfermedad actual es requerida',
			'physical_exam.required' => 'El Examen físico es requerido',
			'analysis.required' => 'El Análisis es requerido',
		]);
		if(empty($id)){
			return redirect($this->r_name);
		}
		$ox = $this->o_model::where(['uuid' => $id])->first();
		if(empty($ox->id)){
			return redirect($this->r_name);
		}
		//echo dd($data);exit();
		//echo var_dump($data);exit();
		//Creamos el HC - Dermatology
		$params = [];
		$params['user'] = $ox->id;
		$params['doctor'] = Auth::user()->id;
		$params['company'] = $ox->company;
		$params['campus'] = $ox->campus;
		$params['external_cause'] = $data['external_cause'];
		$params['consultation_purpose'] = $data['consultation_purpose'];
		$params['reason'] = $data['reason'];
		$params['current_illness'] = $data['current_illness'];
		$params['physical_exam'] = $data['physical_exam'];
		$params['analysis'] = $data['analysis'];
		$params['medical_history'] = $data['medical_history'];
		$params['surgical_history'] = $data['surgical_history'];
		$params['allergic_history'] = $data['allergic_history'];
		$params['drug_history'] = $data['drug_history'];
		$params['family_history'] = $data['family_history'];
		$params['other_history'] = $data['other_history'];
		//path_pdf
		$o = Dermatology::create($params);
		//Guardamos el diagnostico
		if(!empty($data['diagnostics'])){
			foreach($data['diagnostics'] as $key => $row){
				$aux_params = ['hc' => $o->id,'user' => $ox->id,'company' => $ox->company,'campus' => $ox->campus];
				$o_item = Diagnoses::where(['id' => $row])->first();
				$aux_params['code'] = !empty($o_item->id)?$o_item->code:'';//
				$aux_params['diagnostic'] = !empty($o_item->id)?$o_item->name:'';//
				$o_item = Diagnosestype::where(['id' => $data['diagnosticsty'][$key]])->first();
				$aux_params['type_diagnostic'] = !empty($o_item->id)?$o_item->name:'';//diagnosticsty
				$o_x = Hcdermdiagnostics::create($aux_params);
			}
		}
		//Guardamos las indicaciones
		$indd = '';
		if(!empty($data['indications'])){
			foreach($data['indications'] as $key => $row){
				$aux_params = ['hc' => $o->id,'user' => $ox->id,'company' => $ox->company,'campus' => $ox->campus,'indication' => $row];
				$o_x = Hcdermindications::create($aux_params);
				$indd .= '<br>'.$row;
			}
		}
		//Guardamos la prescripción médica
		if(!empty($data['prescription_med'])){
			foreach($data['prescription_med'] as $key => $row){
				$aux_params = ['hc' => $o->id,'user' => $ox->id,'company' => $ox->company,'campus' => $ox->campus];
				$aux_params['medicine'] = !empty($row)?$row:'';//
				$aux_params['dose'] = !empty($data['prescription_dose'][$key])?$data['prescription_dose'][$key]:'';//
				$aux_params['frequency'] = !empty($data['prescription_fre'][$key])?$data['prescription_fre'][$key]:'';//
				$aux_params['route_administration'] = !empty($data['prescription_via'][$key])?$data['prescription_via'][$key]:'';//
				$aux_params['duration'] = !empty($data['prescription_dur'][$key])?$data['prescription_dur'][$key]:'';//
				$aux_params['indications'] = !empty($data['prescription_ind'][$key])?$data['prescription_ind'][$key]:'';//
				$o_x = Prescriptions::create($aux_params);
			}
		}
		//Guardamos las Solicitudes de examenes
		if(!empty($data['solexams_exam'])){
			foreach($data['solexams_exam'] as $key => $row){
				$aux_params = ['hc' => $o->id,'user' => $ox->id,'company' => $ox->company,'campus' => $ox->campus];
				$o_item = Laboratoryexams::where(['id' => $row])->first();
				$aux_params['name'] = !empty($o_item->id)?$o_item->name:'';//
				$aux_params['description'] = !empty($o_item->id)?$o_item->description:'';//
				$o_x = Hcdermsolexams::create($aux_params);
			}
		}
		//Guardamos las Solicitudes de procedimientos
		if(!empty($data['solproc_proc'])){
			foreach($data['solproc_proc'] as $key => $row){
				$aux_params = ['hc' => $o->id,'user' => $ox->id,'company' => $ox->company,'campus' => $ox->campus];
				$o_item = Procedures::where(['id' => $row])->first();
				$aux_params['name'] = !empty($o_item->id)?$o_item->name:'';//
				$aux_params['description'] = !empty($o_item->id)?$o_item->description:'';//
				$o_x = Hcdermsolproc::create($aux_params);
			}
		}
		//Guardamos las Solicitudes de patalogías
		if(!empty($data['solpath_path'])){
			foreach($data['solpath_path'] as $key => $row){
				$aux_params = ['hc' => $o->id,'user' => $ox->id,'company' => $ox->company,'campus' => $ox->campus];
				$o_item = Pathologies::where(['id' => $row])->first();
				$aux_params['name'] = !empty($o_item->id)?$o_item->name:'';//
				$aux_params['description'] = !empty($o_item->id)?$o_item->description:'';//
				$o_x = Hcdermsolpath::create($aux_params);
			}
		}
		
		//creamos el PDF
		return redirect($this->r_name.'/hcdermpdf/'.$o->uuid);
		
		//notificamos al correo
		if(!empty($data['notification_email']) AND $data['notification_email'] == 'yes' AND !empty($indd)){
			Mail::to($ox->email)->send(new Ntfs('Indicaciones','Hola '.$ox->name.', en su consulta ha recibido las siguientes indicaciones: '.$indd,$ox->name,$ox->email));
		}
		//notificamos al whatsapp
		if(!empty($data['notification_whatsapp']) AND $data['notification_whatsapp'] == 'yes'){
			
		}
		
		$request->session()->flash('msj_success', 'El HC dermatológico ha sido registrado correctamente.');
		return redirect($this->r_name);
    }
	
	public function shdermatology()
    {
		$data = $this->gdata('Buscar paciente', false);
		return view($this->v_name.'.shdermatology',$data);
    }
	
	public function shvs_dermatology(Request $request)
    {
		$data = request()->except(['_token','_method']);
		$validatedData = $request->validate([
			'document_type' => 'required',
			'document_number' => 'required',
		],[
			'document_type.required' => 'El tipo de documento es requerido',
			'document_number.required' => 'El Número de documento es requerido',
		]);
		$data['company'] = Auth::user()->company;
		$o = $this->o_model::where($data)->first();
		if(!empty($o->id)){
			return redirect($this->r_name.'/dermatology/'.$o->uuid);
		}
		$request->session()->flash('msj_error', 'No se han encontrado resultados');
		return redirect($this->r_name.'/dermatology');
    }
	
	
	//PDF
	public function hcdermpdf($id)
    {
        if(empty($id)){
			return redirect($this->r_name);
		}
		$o_derm = Dermatology::where(['uuid' => $id])->first();
		if(empty($o_derm->id)){
			return redirect($this->r_name);
		}
		//$o = $this->o_model::where(['uuid' => $id])->first();
		$pdfFilePath = $this->getpdfhcderm($id,true);
		$pdfFilePath = storage_path($pdfFilePath);
		$path = Storage::disk('public')->putFile('temp', new File($pdfFilePath), 'public');
		$pdfFilePathTemp = './storage/app/public/uploads/hc_derm_'.$id.'.pdf';
		Storage::delete($pdfFilePathTemp);
		unlink($pdfFilePath);
		$attach_file = storage_path('app/public/' . $path);
		$fullpath = asset('storage/'.$path);
		$o_derm->update(['path_pdf' => $fullpath]);
		//$full_name = $o->name.' '.$o->scd_name.' '.$o->lastname.' '.$o->scd_lastname;
		//Mail::to($o->email)->send(new HabeasData($full_name,$attach_file));
		return redirect($fullpath);
    }
	
	private function getpdfhcderm($id, $save = false)
    {
		if(empty($id)){
			return null;
		}
		$o_derm = Dermatology::where(['uuid' => $id])->first();
		if(empty($o_derm->id)){
			return null;
		}
		
		$o = $this->o_model::where(['id' => $o_derm->user])->first();
		$o_doctor = $this->o_model::where(['id' => $o_derm->doctor])->first();
		$o_company = Companies::where(['id' => $o_derm->company])->first();
		$logo = !empty($o_company->logo_pp)?public_path($o_company->logo_pp):public_path('assets/images/favicon.png');
		$photo = !empty($o->photo_pp)?$o->photo_pp:public_path('assets/images/user.png');
		$signature = !empty($o_doctor->signature_pp)?$o_doctor->signature_pp:public_path('assets/images/firma.png');
		
		$data['o_vitalsigns'] = Vitalsigns::where(['user' => $o_derm->user])->orderBy('id', 'DESC')->first();
		$all_dgs = Hcdermdiagnostics::where(['hc' => $o_derm->id])->orderBy('id', 'asc')->get();//diagnosticos
		$all_ind = Hcdermindications::where(['hc' => $o_derm->id])->orderBy('id', 'asc')->get();//indicaciones
		$all_pre = Prescriptions::where(['hc' => $o_derm->id])->orderBy('id', 'asc')->get();//prescripción médica
		$all_sex = Hcdermsolexams::where(['hc' => $o_derm->id])->orderBy('id', 'asc')->get();//Solicitudes de examenes
		$all_spr = Hcdermsolproc::where(['hc' => $o_derm->id])->orderBy('id', 'asc')->get();//Solicitudes de procedimientos
		$all_spa = Hcdermsolpath::where(['hc' => $o_derm->id])->orderBy('id', 'asc')->get();//Solicitudes de patalogías
		//echo 'ok pdf';exit();
		
		$data['all_dgs'] = $all_dgs;
		$data['all_ind'] = $all_ind;
		$data['all_pre'] = $all_pre;
		$data['all_sex'] = $all_sex;
		$data['all_spr'] = $all_spr;
		$data['all_spa'] = $all_spa;
		$data['o'] = $o;
		$data['o_derm'] = $o_derm;
		$data['o_doctor'] = $o_doctor;
		$data['logo'] = $logo;
		$data['photo'] = $photo;
		$data['signature'] = $signature;
		$data['company_name'] = $o_company->name;
		$full_name = $o->name.' '.$o->scd_name.' '.$o->lastname.' '.$o->scd_lastname;
		$data['full_name'] = $full_name;
		$dfull_name = $o_doctor->name.' '.$o_doctor->scd_name.' '.$o_doctor->lastname.' '.$o_doctor->scd_lastname;
		$data['dfull_name'] = $dfull_name;
		$pdf = PDF::loadView('pdf.derm', $data);
		//retornamos el pdf
		/*if($save){
			$pdfFilePath = 'app/public/uploads/hc_derm_'.$id.'.pdf';
			$pdf->save(storage_path($pdfFilePath));
			return $pdfFilePath;
		}*/
		return $pdf->stream('document.pdf');
		exit();
    }
	
	
	//PDF Historial de todos las consultas
	public function listrecords($id)
    {
        if(empty($id)){
			return redirect($this->r_name);
		}
		$o = $this->o_model::where(['uuid' => $id])->first();
		if(empty($o->id)){
			return redirect($this->r_name);
		}
		$data = $this->gdata('HC - Historial de consultas - ', false);
        $data['o'] = $o;
		$data['o_all'] = Dermatology::where(['user' => $o->id,'hc_type' => $this->hc_type])->orderBy('id', 'asc')->get();
		return view($this->v_name.'.records',$data);
    }
	//PDF Historial de todos las consultas
	public function dermrecords($id)
    {
        if(empty($id)){
			return redirect($this->r_name);
		}
		$o = $this->o_model::where(['uuid' => $id])->first();//User
		if(empty($o->id)){
			return redirect($this->r_name);
		}
		$pdfFilePath = $this->allpdfhcderm($id);
    }
	
	private function allpdfhcderm($id)
    {
		if(empty($id)){
			return null;
		}
		$o = $this->o_model::where(['uuid' => $id])->first();
		$full_name = $o->name.' '.$o->scd_name.' '.$o->lastname.' '.$o->scd_lastname;
		$o_company = Companies::where(['id' => $o->company])->first();
		$logo = !empty($o_company->logo_pp)?public_path($o_company->logo_pp):public_path('assets/images/favicon.png');
		$photo = !empty($o->photo_pp)?$o->photo_pp:public_path('assets/images/user.png');
		$data['o'] = $o;
		$data['logo'] = $logo;
		$data['photo'] = $photo;
		$data['company_name'] = $o_company->name;
		$data['full_name'] = $full_name;
		$data['o_vitalsigns'] = Vitalsigns::where(['user' => $o->id])->orderBy('id', 'DESC')->first();
		
		$arr = [];
		$derm_all = Dermatology::where(['user' => $o->id,'hc_type' => $this->hc_type])->orderBy('id', 'asc')->get();
		foreach($derm_all as $key => $o_derm){
			$o_doctor = $this->o_model::where(['id' => $o_derm->doctor])->first();
			$dfull_name = $o_doctor->name.' '.$o_doctor->scd_name.' '.$o_doctor->lastname.' '.$o_doctor->scd_lastname;
			$signature = !empty($o_doctor->signature_pp)?$o_doctor->signature_pp:public_path('assets/images/firma.png');
			$all_dgs = Hcdermdiagnostics::where(['hc' => $o_derm->id])->orderBy('id', 'asc')->get();//diagnosticos
			$all_ind = Hcdermindications::where(['hc' => $o_derm->id])->orderBy('id', 'asc')->get();//indicaciones
			$all_pre = Prescriptions::where(['hc' => $o_derm->id])->orderBy('id', 'asc')->get();//prescripción médica
			$all_sex = Hcdermsolexams::where(['hc' => $o_derm->id])->orderBy('id', 'asc')->get();//Solicitudes de examenes
			$all_spr = Hcdermsolproc::where(['hc' => $o_derm->id])->orderBy('id', 'asc')->get();//Solicitudes de procedimientos
			$all_spa = Hcdermsolpath::where(['hc' => $o_derm->id])->orderBy('id', 'asc')->get();//Solicitudes de patalogías
			array_push($arr, ['o_derm' => $o_derm,'o_doctor' => $o_doctor,'dfull_name' => $dfull_name,'signature' => $signature,'all_dgs' => $all_dgs,'all_ind' => $all_ind,'all_pre' => $all_pre,'all_sex' => $all_sex,'all_spr' => $all_spr,'all_spa' => $all_spa]);
		}
		$data['arr'] = $arr;
		
		$pdf = PDF::loadView('pdf.dermall', $data);
		return $pdf->stream('document.pdf');
		exit();
    }
}
