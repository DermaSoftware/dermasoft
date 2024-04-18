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
use App\Models\Anamnesis;
use App\Models\Antecedente;
use App\Models\AppointmentReason;
use App\Models\Appointments;
use App\Models\Hcprocedure;
use App\Models\Hcsuture;
use App\Models\Hctumors;
use App\Models\Hprocedure;
use App\Models\Htreatment;
use App\Models\TipoAntecedente;
use Yajra\DataTables\DataTables;
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
    private $o_hctype = ['Dermatología general', 'Biopsías y/o procedimientos', 'Procedimientos Estéticos', 'Descripción Quirúrgica'];
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

	public function dermatology(Request $request, $id, $appointment)
    {
        if(empty($id)){
			return redirect($this->r_name);
		}
		$o = $this->o_model::where(['uuid' => $id])->first();
        $appoint = Appointments::find($appointment);
        $o_vitalsigns = Vitalsigns::where(['appointment_id' => $appointment])
                        ->where(['hc_type' => $appoint->hc_type])
                        ->orderBy('id', 'DESC')->first();
		if(empty($o->id)){
			return redirect($this->r_name);
		}
        if(empty($o_vitalsigns)){
            $request->session()->flash('msj_error', 'El paciente '.$o->name.'no tiene signos vitales registrados para esta consulta.');
			return redirect($this->r_name);
		}
		$data = $this->gdata('HC - Dermatología general', false);
        $data['o'] = $o;
        $data['appointment'] = $appointment;
		$data['o_vitalsigns'] = $o_vitalsigns;
		$data['o_diagnoses'] = Diagnoses::where(['status' => 'active'])->orderBy('id', 'asc')->get(['name','id','code']);
		$data['o_diagnosesty'] = Diagnosestype::where(['status' => 'active'])->orderBy('id', 'asc')->get(['name','id']);
		$data['o_indications'] = Indications::where(['status' => 'active'])->orderBy('id', 'asc')->get(['description','id','uuid']);
		$data['o_medicines'] = Medicines::where(['status' => 'active'])->orderBy('id', 'asc')->get(['name','id','description']);
		$data['o_labexams'] = Laboratoryexams::where(['status' => 'active'])->orderBy('id', 'asc')->get(['name','id','description']);
		$data['o_procs'] = Procedures::where(['status' => 'active'])->orderBy('id', 'asc')->get(['name','id','description']);
		$data['o_paths'] = Pathologies::where(['status' => 'active'])->orderBy('id', 'asc')->get(['name','id','description']);


		//Historial
		// $t = Dermatology::where(['user' => $o->id,'hc_type' => $this->hc_type])->count();
		$t = Dermatology::where(['user' => $o->id])->count();
		$is_records = !empty($t)?$t > 0:false;
		if($is_records){
			$o_derm = Dermatology::where(['user' => $o->id])->orderBy('id', 'DESC')->first();
            $data['hc_type'] = $appoint->hc_type;
			$data['o_derm'] = $o_derm;
		}
		$data['t_records'] = $t;
		$data['is_records'] = $is_records;

		return view($this->v_name.'.dermatology',$data);
    }

	public function sdermatology(Request $request, $id,$appointment)
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

        $o = Dermatology::where(['user' => $ox->id,'hc_type' => $this->hc_type])->orderBy('id', 'DESC')->first();
        if(!empty($o)){
            $o->fill($params);
        }
        else{
            $o = Dermatology::create($params);
        }

		//Guardamos el diagnostico
		if(!empty($data['diagnostics'])){
			foreach($data['diagnostics'] as $key => $row){
				$aux_params = ['hc' => $o->id,'user' => $ox->id,'company' => $ox->company,'campus' => $ox->campus];
				$o_item = Diagnoses::where(['code' => $row])->first();
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
        $data['o_hctype'] = $this->o_hctype;
		return view($this->v_name.'.shdermatology',$data);
    }

	public function shvs_dermatology(Request $request)
    {
		$data = request()->except(['_token','_method']);
		$validatedData = $request->validate([
			'document_type' => 'required',
			'document_number' => 'required',
			'hc_type' => 'required',
		],[
			'document_type.required' => 'El tipo de documento es requerido',
			'document_number.required' => 'El Número de documento es requerido',
			'hc_type.required' => 'El tipo de consulta es requerido',
		]);
		$data['company'] = Auth::user()->company;
		$o = $this->o_model::where('document_type',$data['document_type'])
                    ->where('document_number',$data['document_number'])
                    ->first();
        $appintment = null;
		if(!empty($o->id)){
            $o_vitalsigns = Vitalsigns::where(['user' => $o->id])
                            ->where(['hc_type' => $data['hc_type']])
                            ->orderBy('id', 'DESC')->first();

            if(!empty($o_vitalsigns)){
                if($o_vitalsigns->hc_type !== $o_vitalsigns->appointment->hc_type){
                    $request->session()->flash('msj_error', 'El usuario no tiene signos vitales definido para este  tipo de consulta');
		            return redirect($this->r_name.'/dermatology');
                }
                $appintment = $o_vitalsigns->appointment->id;
                return redirect($this->r_name.'/dermatology/'.$o->uuid.'/'.$appintment);
            }
            else{
                $request->session()->flash('msj_error', 'El usuario no tiene signos vitales definido para este  tipo de consulta');
		        return redirect($this->r_name.'/dermatology');
            }

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
        $appointment  = Appointments::with([
            'user_class' => function ($query) {
                $query->select('id','name','lastname'); # Uno a muchos
            },
            ])
            ->where('uuid',$id)
            ->orderBy('created_at','DESC')
            ->first(['id','uuid','user','hc_type']);
		$o_derm = Dermatology::where(['user' => $appointment->user])
        ->orderBy('created_at','DESC')
        ->first();
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
        $appointment  = Appointments::with([
            'doctor_class' => function ($query) {
                $query->select('id','name','lastname'); # Uno a muchos
            },
            'user_class' => function ($query) {
                $query->select('id','name','lastname'); # Uno a muchos
            },
            'campus_class' => function ($query) {
                $query->select('id','name'); # Uno a muchos
            }
            ])
            ->where('uuid',$id)
            ->orderBy('created_at','DESC')
            ->first(['id','uuid','date_quote','user','time_quote','doctor','campus','hc_type']);
		$o_derm = Dermatology::where(['user' => $appointment->user])->orderBy('created_at','DESC')->first();
		if(empty($o_derm->id)){
			return null;
		}

		$o = $this->o_model::where(['id' => $o_derm->user])->first();
		$o_doctor = $this->o_model::where(['id' => $o_derm->doctor])->first();
		$o_company = Companies::where(['id' => $o_derm->company])->first();
		$logo = !empty($o_company->logo_pp)?public_path($o_company->logo_pp):public_path('assets/images/favicon.png');
		$photo = !empty($o->photo_pp)?$o->photo_pp:public_path('assets/images/user.png');
		$signature = !empty($o_doctor->signature_pp)?$o_doctor->signature_pp:public_path('assets/images/firma.png');

		$data['o_vitalsigns'] = Vitalsigns::where(['user' => $o_derm->user])
                                ->where('appointment_id',$appointment->id)
                                ->where('hc_type',$appointment->hc_type)
                                ->orderBy('id', 'DESC')->first();
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

	// private function getpdfhcderm($id, $save = false)
    // {
	// 	if(empty($id)){
	// 		return null;
	// 	}
	// 	$o_derm = Dermatology::where(['uuid' => $id])->first();
	// 	if(empty($o_derm->id)){
	// 		return null;
	// 	}

	// 	$o = $this->o_model::where(['id' => $o_derm->user])->first();
	// 	$o_doctor = $this->o_model::where(['id' => $o_derm->doctor])->first();
	// 	$o_company = Companies::where(['id' => $o_derm->company])->first();
	// 	$logo = !empty($o_company->logo_pp)?public_path($o_company->logo_pp):public_path('assets/images/favicon.png');
	// 	$photo = !empty($o->photo_pp)?$o->photo_pp:public_path('assets/images/user.png');
	// 	$signature = !empty($o_doctor->signature_pp)?$o_doctor->signature_pp:public_path('assets/images/firma.png');

	// 	$data['o_vitalsigns'] = Vitalsigns::where(['user' => $o_derm->user])->orderBy('id', 'DESC')->first();
	// 	$all_dgs = Hcdermdiagnostics::where(['hc' => $o_derm->id])->orderBy('id', 'asc')->get();//diagnosticos
	// 	$all_ind = Hcdermindications::where(['hc' => $o_derm->id])->orderBy('id', 'asc')->get();//indicaciones
	// 	$all_pre = Prescriptions::where(['hc' => $o_derm->id])->orderBy('id', 'asc')->get();//prescripción médica
	// 	$all_sex = Hcdermsolexams::where(['hc' => $o_derm->id])->orderBy('id', 'asc')->get();//Solicitudes de examenes
	// 	$all_spr = Hcdermsolproc::where(['hc' => $o_derm->id])->orderBy('id', 'asc')->get();//Solicitudes de procedimientos
	// 	$all_spa = Hcdermsolpath::where(['hc' => $o_derm->id])->orderBy('id', 'asc')->get();//Solicitudes de patalogías
	// 	//echo 'ok pdf';exit();

	// 	$data['all_dgs'] = $all_dgs;
	// 	$data['all_ind'] = $all_ind;
	// 	$data['all_pre'] = $all_pre;
	// 	$data['all_sex'] = $all_sex;
	// 	$data['all_spr'] = $all_spr;
	// 	$data['all_spa'] = $all_spa;
	// 	$data['o'] = $o;
	// 	$data['o_derm'] = $o_derm;
	// 	$data['o_doctor'] = $o_doctor;
	// 	$data['logo'] = $logo;
	// 	$data['photo'] = $photo;
	// 	$data['signature'] = $signature;
	// 	$data['company_name'] = $o_company->name;
	// 	$full_name = $o->name.' '.$o->scd_name.' '.$o->lastname.' '.$o->scd_lastname;
	// 	$data['full_name'] = $full_name;
	// 	$dfull_name = $o_doctor->name.' '.$o_doctor->scd_name.' '.$o_doctor->lastname.' '.$o_doctor->scd_lastname;
	// 	$data['dfull_name'] = $dfull_name;
	// 	$pdf = PDF::loadView('pdf.derm', $data);
	// 	//retornamos el pdf
	// 	/*if($save){
	// 		$pdfFilePath = 'app/public/uploads/hc_derm_'.$id.'.pdf';
	// 		$pdf->save(storage_path($pdfFilePath));
	// 		return $pdfFilePath;
	// 	}*/
	// 	return $pdf->stream('document.pdf');
	// 	exit();
    // }


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
		// $data['o_all'] = Dermatology::where(['user' => $o->id,'hc_type' => $this->hc_type])->orderBy('id', 'asc')->get();
		$appointments  = Appointments::with([
            'doctor_class' => function ($query) {
                $query->select('id','name','lastname'); # Uno a muchos
            },
            'campus_class' => function ($query) {
                $query->select('id','name'); # Uno a muchos
            }
            ])
        ->where('user',$o->id)->get(['id','uuid','date_quote','time_quote','doctor','campus','hc_type']);
        $data['o_appoinments'] = $appointments;
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

    public function backgrounds(Request $request,$hc,$appointment){

        $backgrounds= Antecedente::with([
            'type_class' => function ($query) {
                $query->select('id','name'); # Uno a muchos
            }
        ])->where('hc',$hc)->get(['id','uuid','resumen','type_id' ,'created_at','updated_at']);

         return DataTables::of($backgrounds)->make(true);
    }
    public function add_backgrounds(Request $request,$hc,$appointment){

        if($request->method() === 'GET'){

            $data = [];
            $data['post_url'] = $this->r_name . '/backgrounds/' . $hc .'/' .$appointment. '/add';
            $data['types'] = TipoAntecedente::all();
            $data['obj'] = null;
            return view($this->v_name . '.form.modals.modal_antecedentes', $data);
        }
        else{
            $data = request()->except(['_token', '_method']);
            $data['hc'] = $hc;
            $background = Antecedente::create($data);

            return [
                "Success" => true,
                "Message" => "Adición exitosa"
            ];
        }
        $backgrounds= Antecedente::where('hc',$hc)->get();

        return !empty($backgrounds) ? $backgrounds : [];
    }
    public function edit_backgrounds(Request $request,$hc,$id,$appointment){

        if($request->method() === 'GET'){

            $background = Antecedente::find($id);
            $data = [];
            $data['post_url'] = $this->r_name . '/backgrounds/' . $hc . '/' . $id . '/edit';
            $data['types'] = TipoAntecedente::all();
            $data['obj'] = $background;
            return view($this->v_name . '.form.modals.modal_antecedentes', $data);
        }
        else{
            $background = Antecedente::find($id);

            $data = request()->except(['_token', '_method']);
            $background->update($data);
            return [
                "Success" => true,
                "Message" => "Adición exitosa"
            ];
        }
    }

    /////////////// DIAGNOSTICOS /////////////////////////
    public function diagnostics(Request $request,$hc,$appointment){

        $diagnostics= Hcdermdiagnostics::where('hc',$hc)->get(['id','uuid','code','diagnostic','type_diagnostic' ,'created_at','updated_at']);

         return DataTables::of($diagnostics)->make(true);
    }
    public function add_diagnostic(Request $request,$hc,$appointment){

        if($request->method() === 'GET'){

            $data = [];
            $derma= Dermatology::where('id',$hc)->first();
            $data['post_url'] = $this->r_name . '/diagnostics/' . $hc .'/' . $appointment . '/add';
            $data['o_diagnoses'] = Diagnoses::where(['status' => 'active'])->orderBy('id', 'asc')->get(['name','id','code']);
            $data['o_diagnosesty'] = Diagnosestype::where(['status' => 'active'])->orderBy('id', 'asc')->get(['name','id']);
            $data['obj'] = null;
            $data['derma'] = $derma;
            $data['is_records'] = false;
            return view($this->v_name . '.form.modals.modal_diagnostic', $data);
        }
        else{
            $data = request()->except(['_token', '_method']);
            $derma= Dermatology::where('id',$hc)->first();
            $aux_params = ['hc' => $hc,'user' => $derma->user,'company' => $derma->company,'campus' => $derma->campus];
			$o_item = Diagnoses::where(['id' => $data['diagnoses']])->first();
			$aux_params['code'] = !empty($o_item->id)?$o_item->code:'';//
			$aux_params['diagnostic'] = !empty($o_item->id)?$o_item->name:'';//
			$o_item = Diagnosestype::where(['id' =>$data['diagnosesty']])->first();
			$aux_params['type_diagnostic'] = !empty($o_item->id)?$o_item->name:'';//diagnosticsty
			$aux_params['skin_phototype'] = !empty($data['skin_phototype']) ? $data['skin_phototype'] : '';

            $appointment = Appointments::find($appointment);
            $aux_params['hc_type'] =  $appointment->hc_type;
            $aux_params['doctor'] =  Auth::user()->id;
            $aux_params['appointments_id'] =  $appointment->id;

            $diag = Hcdermdiagnostics::create($aux_params);
            return [
                "Success" => true,
                "Message" => "Adición exitosa"
            ];
        }
    }
    public function edit_diagnostic(Request $request,$hc,$id,$appointment){

        if($request->method() === 'GET'){

            $hcdermdiagnostics = Hcdermdiagnostics::find($id);
            $data = [];
            $data['post_url'] = $this->r_name . '/diagnostics/' . $hc . '/' . $id . '/edit';
            $data['o_diagnoses'] = Diagnoses::where(['status' => 'active'])->orderBy('id', 'asc')->get(['name','id','code']);
            $data['o_diagnosesty'] = Diagnosestype::where(['status' => 'active'])->orderBy('id', 'asc')->get(['name','id']);
            $data['obj'] = $hcdermdiagnostics;
            return view($this->v_name . '.form.modals.modal_diagnostic', $data);
        }
        else{
            $hcdermdiagnostics = Hcdermdiagnostics::find($id);

            $data = request()->except(['_token', '_method']);
            $aux_params = [];
            $o_item = Diagnoses::where(['id' => $data['diagnoses']])->first();
			$aux_params['code'] = !empty($o_item->id)?$o_item->code:'';//
			$aux_params['diagnostic'] = !empty($o_item->id)?$o_item->name:'';//
			$o_item = Diagnosestype::where(['id' =>$data['diagnosesty']])->first();
			$aux_params['type_diagnostic'] = !empty($o_item->id)?$o_item->name:'';//diagnosticsty
            $hcdermdiagnostics->update($aux_params);
            return [
                "Success" => true,
                "Message" => "Adición exitosa"
            ];
        }
    }

    /////////////// INDICATIONS /////////////////////////
    public function indications(Request $request,$hc,$appointment){

        $indications= Hcdermindications::where('hc',$hc)->get(['id','uuid','indication','created_at','updated_at']);

         return DataTables::of($indications)->make(true);
    }
    public function add_indication(Request $request,$hc,$appointment){

        if($request->method() === 'GET'){

            $data = [];
            $data['post_url'] = $this->r_name . '/indications/' . $hc .'/' .$appointment. '/add';
            $data['o_indications'] = Indications::where(['status' => 'active'])->orderBy('id', 'asc')->get(['id','description']);
            $data['obj'] = null;
            $data['is_other'] = false;
            return view($this->v_name . '.form.modals.modal_indication', $data);
        }
        else{
            $data = request()->except(['_token', '_method']);
            $appointment = Appointments::find($appointment);
            $derma= Dermatology::where('id',$hc)->first();
            $aux_params = ['hc' => $derma->id,'user' => $derma->id,'company' => $derma->company,
                        'campus' => $derma->campus,
                        'indication' => !empty($data["indication"]) ? $data["indication"] : $data["other_indication"],
                        'hc_type' => $appointment->hc_type];
			$o_x = Hcdermindications::create($aux_params);
            return [
                "Success" => true,
                "Message" => "Adición exitosa"
            ];
        }
    }
    public function edit_indication(Request $request,$hc,$id,$appointment){

        if($request->method() === 'GET'){

            $hcdermindication = Hcdermindications::find($id);
            $data = [];
            $data['post_url'] = $this->r_name . '/indications/' . $hc . '/' . $id . '/edit';
            $data['o_indications'] = Indications::where(['status' => 'active'])->orderBy('id', 'asc')->get(['id','description']);
            $resultado = array_map(function($elemento) use ($hcdermindication){
                return $elemento["description"] == $hcdermindication->indication;
            }, $data['o_indications']->toArray());

            $data['is_other'] = in_array(true,$resultado) ? false : true;
            $data['obj'] = $hcdermindication;
            return view($this->v_name . '.form.modals.modal_indication', $data);
        }
        else{
            $hcdermindication = Hcdermindications::find($id);

            $data = request()->except(['_token', '_method']);
            $ind_value = (!empty($data["indication"]) and $data["is_other"] === 'off') ? $data["indication"] : $data["other_indication"];
            $aux_params = ['indication' => $ind_value];
            $hcdermindication->update($aux_params);
            return [
                "Success" => true,
                "Message" => "Adición exitosa"
            ];
        }
    }

    /////////////// BIPSIES /////////////////////////
    public function biopsies(Request $request,$hc,$appointment){
        $appoint = Appointments::find($appointment);
        $biopsies= Hprocedure::with([
            'type_procedure_class' => function ($query) {
                $query->select('id','name','description'); # Uno a muchos
            },
            'hcsuture' => function ($query) {
                $query->select('id','suture_type','caliber','hprocedure_id'); # Uno a muchos
            },
            'diagnostic' => function ($query) {
                $query->select('id','code','diagnostic','hc_type'); # Uno a muchos
            }
            ])
            ->whereHas('diagnostic',function($q) use ($appoint){
                $q->where('hc_type',$appoint->hc_type);
            })
            ->where('hc',$hc)
            ->orderBy('created_at', 'desc')
            ->get(['id','uuid','diagnostic_id','type_procedure','created_at','updated_at']);

         return DataTables::of($biopsies)->make(true);
    }
    public function add_biopsie(Request $request,$hc,$appointment){

        if($request->method() === 'GET'){

            $appoint = Appointments::find($appointment);
            $diagnoses = Hcdermdiagnostics::where("hc",$hc)
                        ->where('hc_type',$appoint->hc_type)
                        ->where('appointments_id',$appointment)
                        ->where('hc',$hc)
                        ->get();

            $data = [];
            $data['post_url'] = $this->r_name . '/biopsies/' . $hc .'/' .$appointment. '/add';
            $data['o_medicines'] = Medicines::where(['status' => 'active'])->orderBy('id', 'asc')->get(['name','id','description']);
            $data['o_labexams'] = Laboratoryexams::where(['status' => 'active'])->orderBy('id', 'asc')->get(['name','id','description']);
            $data['o_procs'] = Procedures::where(['status' => 'active'])->orderBy('id', 'asc')->get(['name','id','description']);
            $data['o_paths'] = Pathologies::where(['status' => 'active'])->orderBy('id', 'asc')->get(['name','id','description']);
            $data['o_hcp'] = null;
            $data['is_other'] = false;
            $data['diagnoses'] = $diagnoses;
            return view($this->v_name . '.form.modals.modal_biopsie', $data);
        }
        else{
            $data = request()->except(['_token', '_method']);
            $derma= Dermatology::where('id',$hc)->first();
            $aux_params = ['hc' => $derma->id,'user' => $derma->user_class->id,'company' => $derma->company,'campus' => $derma->campus];
            $all_params = ['type_procedure','other_procedure','disinfection','antiseptic','anesthesia','type_anesthesia','other_anesthesia','hemostasis','other_hemostasis','procedure_time','complications','record_complications','participants','comments','biopsy_method','other_biopsy_method','biopsy_type','required_margin','how_much','body_area','body_area_other'];
            foreach($all_params as $key => $row){
                $aux_params[$row] = !empty($data[$row])?$data[$row]:'';
            }
            $aux_params['diagnostic_id'] = $data['diagnostic_id'];
            $aux_params['doctor'] = Auth::user()->id;
            $aux_params['appointments_id'] = $appointment;
            $o_hcpro = Hprocedure::create($aux_params);
            //HCSUTURE
            if(!empty($data['suture_type'])){
                foreach($data['suture_type'] as $key => $row){
                    $aux_params = ['hc' => $derma->id,'user' => $derma->user_class->id,'company' => $derma->company,'campus' => $derma->campus];
                    $aux_params['suture_type'] = !empty($row)?$row:'';
                    $aux_params['hprocedure_id'] = $o_hcpro->id;
                    $aux_params['caliber'] = !empty($data['caliber'][$key])?$data['caliber'][$key]:'';
                    $o_x = Hcsuture::create($aux_params);
                }
            }
            return [
                "Success" => true,
                "Message" => "Adición exitosa"
            ];
        }
    }
    public function edit_biopsie(Request $request,$hc,$id,$appointment){

        if($request->method() === 'GET'){

            $Hcprocedure = Hcprocedure::find($id);
            $data = [];
            $data['post_url'] = $this->r_name . '/biopsies/' . $hc . '/' . $id . '/edit';
            $data['o_medicines'] = Medicines::where(['status' => 'active'])->orderBy('id', 'asc')->get(['name','id','description']);
            $data['o_labexams'] = Laboratoryexams::where(['status' => 'active'])->orderBy('id', 'asc')->get(['name','id','description']);
            $data['o_procs'] = Procedures::where(['status' => 'active'])->orderBy('id', 'asc')->get(['name','id','description']);
            $data['o_paths'] = Pathologies::where(['status' => 'active'])->orderBy('id', 'asc')->get(['name','id','description']);
            $data['obj'] = $Hcprocedure;
            return view($this->v_name . '.form.modals.modal_biopsie', $data);
        }
        else{
            $o_hcpro = Hcprocedure::find($id);
            $derma= Dermatology::where('id',$hc)->first();
            $data = request()->except(['_token', '_method']);
            $all_params = ['type_procedure','other_procedure','disinfection','antiseptic','anesthesia','type_anesthesia','other_anesthesia','hemostasis','other_hemostasis','procedure_time','complications','record_complications','participants','comments','biopsy_method','other_biopsy_method','biopsy_type','required_margin','how_much','body_area','body_area_other'];
            foreach($all_params as $key => $row){
                $aux_params[$row] = !empty($data[$row])?$data[$row]:'';
            }
            $o_hcpro->update($aux_params);
            //HCSUTURE
            if(!empty($data['suture_type'])){
                $hcsu = $o_hcpro->hcsuture;
                foreach ($hcsu as $key => $value) {
                    $value->delete();
                }
                foreach($data['suture_type'] as $key => $row){
                    $aux_params = ['hc' => $derma->id,'user' => $derma->user_class->id,'company' => $derma->company,'campus' => $derma->campus];
                    $aux_params['suture_type'] = !empty($row)?$row:'';
                    $aux_params['hcprocedure_id'] = $o_hcpro->id;
                    $aux_params['caliber'] = !empty($data['caliber'][$key])?$data['caliber'][$key]:'';
                    $o_x = Hcsuture::create($aux_params);
                }
            }
            return [
                "Success" => true,
                "Message" => "Adición exitosa"
            ];
        }
    }

    /////////////// Cryotherapy /////////////////////////
    public function cryotherapies(Request $request,$hc,$appointment){

        $biopsies= Hprocedure::with([
            'type_procedure_class' => function ($query) {
                $query->select('id','name','description'); # Uno a muchos
            },
            'diagnostic' => function ($query) {
                $query->select('id','code','diagnostic','hc_type'); # Uno a muchos
            }
            ])
        ->where('hc',$hc)->get(['id','uuid','type_procedure','diagnostic_id','created_at','updated_at']);

         return DataTables::of($biopsies)->make(true);
    }
    public function add_cryotherapy(Request $request,$hc,$appointment){

        if($request->method() === 'GET'){

            $data = [];
            $diagnoses = Hcdermdiagnostics::where("hc",$hc)
                        ->whereNotNull("skin_phototype")
                        ->get();
            $data['post_url'] = $this->r_name . '/cryotherapies/' . $hc .'/' .$appointment. '/add';
            $data['obj'] = null;
            $data['is_records'] = false;
            $data['is_other'] = false;
            $data['diagnoses'] = $diagnoses;
            return view($this->v_name . '.form.modals.modal_crypy', $data);
        }
        else{
            $data = request()->except(['_token', '_method']);
            $derma= Dermatology::where('id',$hc)->first();
            $aux_params = ['hc' => $derma->id,'user' => $derma->user_class->id,'doctor' => Auth::user()->id];
            $all_params = ['lesion','body_area','disinfection','antiseptic','anesthesia','type_anesthesia','other_anesthesia','freeze_time_1','freeze_time_2','defrost_time_1','defrost_time_2','timex','technique','other_technique','procedure_time','complications','record_complications','participants','comments'];
            foreach($all_params as $key => $row){
                $aux_params[$row] = !empty($data[$row])?$data[$row]:'';
            }
            $aux_params['diagnostic_id'] = $data['diagnostic_id'];
            $aux_params['doctor'] = Auth::user()->id;
            $aux_params['appointments_id'] = $appointment;
            $o_hcpro = Hprocedure::create($aux_params);

            return [
                "Success" => true,
                "Message" => "Adición exitosa"
            ];
        }
    }

    /////////////// Aesthetic /////////////////////////
    public function aesthetics(Request $request,$hc,$appointment){

        $biopsies= Hprocedure::with([
            'type_procedure_class' => function ($query) {
                $query->select('id','name','description'); # Uno a muchos
            },
            'diagnostic' => function ($query) {
                $query->select('id','code','diagnostic'); # Uno a muchos
            },
            'htreatment' => function ($query) {
                $query->select('id','muscle','units','product_dates','product_name','lot','dilution','injectable','hprocedure_id'); # Uno a muchos
            }
            ])
        ->where('hc',$hc)->get(['id','uuid','type_procedure','diagnostic_id','created_at']);

         return DataTables::of($biopsies)->make(true);
    }
    public function add_aesthetic(Request $request,$hc,$appointment){

        if($request->method() === 'GET'){

            $data = [];
            $diagnoses = Hcdermdiagnostics::where("hc",$hc)
                        ->whereNotNull("skin_phototype")
                        ->get();
            $data['post_url'] = $this->r_name . '/aesthetics/' . $hc .'/' .$appointment. '/add';
            $data['obj'] = null;
            $data['is_records'] = false;
            $data['is_other'] = false;
            $data['diagnoses'] = $diagnoses;
            return view($this->v_name . '.form.modals.modal_aesthetic', $data);
        }
        else{
            $data = request()->except(['_token', '_method']);
            $derma= Dermatology::where('id',$hc)->first();

            $aux_params = ['hc' => $derma->id,'user' => $derma->user_class->id,'doctor' => Auth::user()->id];
            $all_params = ['lesion','body_area','disinfection','antiseptic','anesthesia','type_anesthesia','other_anesthesia','freeze_time_1','freeze_time_2','defrost_time_1','defrost_time_2','timex','technique','other_technique','procedure_time','complications','record_complications','participants','comments'];
            foreach($all_params as $key => $row){
                $aux_params[$row] = !empty($data[$row])?$data[$row]:'';
            }
            $aux_params['diagnostic_id'] = $data['diagnostic_id'];
            $aux_params['doctor'] = Auth::user()->id;
            $aux_params['appointments_id'] = $appointment;
            $o_hcpro = Hprocedure::create($aux_params);

            if (!empty($data['muscle'])) {
                foreach ($data['muscle'] as $key => $row) {
                    $aux_params = ['hprocedure_id' => $o_hcpro->id, 'user' => $derma->user];
                    $aux_params['muscle'] = !empty($row) ? $row : '';
                    $units = !empty($data['units'][$key]) ? $data['units'][$key] : 0;
                    $product_name = !empty($data['product_name'][$key]) ? $data['product_name'][$key] : 0;
                    $lot = !empty($data['lot'][$key]) ? $data['lot'][$key] : 0;
                    $dilution = !empty($data['dilution'][$key]) ? $data['dilution'][$key] : 0;
                    $injectable = !empty($data['injectable'][$key]) ? $data['injectable'][$key] : 0;
                    $aux_params['product_name'] = $product_name;
                    $aux_params['lot'] = $lot;
                    $aux_params['dilution'] = $dilution;
                    $aux_params['injectable'] = $injectable;
                    $aux_params['units'] = $units;
                    // $total += $units;
                    $o_x = Htreatment::create($aux_params);
                }
                // $o_hcpro->update(['total' => $total]);
            }
            return [
                "Success" => true,
                "Message" => "Adición exitosa"
            ];
        }
    }

    /////////////// SURGICALS /////////////////////////
    public function surgicals(Request $request,$hc,$appointment){

        $appoint = Appointments::find($appointment);
        $biopsies= Hprocedure::with([
            'type_procedure_class' => function ($query) {
                $query->select('id','name','description'); # Uno a muchos
            },
            'diagnostic' => function ($query) {
                $query->select('id','code','diagnostic','hc_type'); # Uno a muchos
            },
            'hctumors' => function ($query) {
                $query->select('id','tumors','size','margin','pathology','observations','hprocedure_id'); # Uno a muchos
            }
            ])
            ->whereHas('diagnostic',function($q) use ($appoint){
                $q->where('hc_type',$appoint->hc_type);
            })
            ->where('hc',$hc)
            ->orderBy('created_at', 'desc')
            ->get(['id','uuid','type_procedure','diagnostic_id','created_at']);

         return DataTables::of($biopsies)->make(true);
    }
    public function add_surgical(Request $request,$hc,$appointment){

        if($request->method() === 'GET'){

            $data = [];
            $appoint = Appointments::find($appointment);
            $diagnoses = Hcdermdiagnostics::where("hc",$hc)
                        ->where('hc_type',$appoint->hc_type)
                        ->where('hc',$hc)
                        ->where('appointments_id',$appointment)
                        ->get();
            $data['post_url'] = $this->r_name . '/surgicals/' . $hc .'/' .$appointment. '/add';
            $data['o_medicines'] = Medicines::where(['status' => 'active'])->orderBy('id', 'asc')->get(['name','id','description']);
            $data['o_labexams'] = Laboratoryexams::where(['status' => 'active'])->orderBy('id', 'asc')->get(['name','id','description']);
            $data['o_procs'] = Procedures::where(['status' => 'active'])->orderBy('id', 'asc')->get(['name','id','description']);
            $data['o_paths'] = Pathologies::where(['status' => 'active'])->orderBy('id', 'asc')->get(['name','id','description']);
            $data['obj'] = null;
            $data['is_records'] = false;
            $data['is_other'] = false;
            $data['diagnoses'] = $diagnoses;
            return view($this->v_name . '.form.modals.modal_surgical', $data);
        }
        else{
            $data = request()->except(['_token', '_method']);
            $derma= Dermatology::where('id',$hc)->first();
            $aux_params = [
                'hc' => $derma->id,
                'user' => $derma->user_class->id,
                'company' => $derma->company,
                'campus' => $derma->campus,
            ];
            $all_params = ['type_procedure','other_procedure','disinfection','antiseptic','anesthesia','type_anesthesia','other_anesthesia','hemostasis','other_hemostasis','procedure_time','complications','record_complications','participants','comments','biopsy_method','other_biopsy_method','biopsy_type','required_margin','how_much','body_area','body_area_other'];
            foreach($all_params as $key => $row){
                $aux_params[$row] = !empty($data[$row])?$data[$row]:'';
            }

            $aux_params['diagnostic_id'] = $data['diagnostic_id'];
            $aux_params['doctor'] = Auth::user()->id;
            $aux_params['appointments_id'] = $appointment;
            $o_hcpro = Hprocedure::create($aux_params);
            if(!empty($data['tumors'])){
                foreach($data['tumors'] as $key => $row){
                    $aux_params = ['hprocedure_id' => $o_hcpro->id, 'user' =>  $derma->user_class->id,'hc' => $derma->id,'company' => $derma->company,'campus' => $derma->user_class->campus];
                    $aux_params['tumors'] = !empty($row)?$row:'';
                    $aux_params['size'] = !empty($data['size'][$key])?$data['size'][$key]:'';
                    $aux_params['margin'] = !empty($data['margin'][$key])?$data['margin'][$key]:'';
                    $aux_params['pathology'] = !empty($data['pathology'][$key])?$data['pathology'][$key]:'';
                    $aux_params['observations'] = !empty($data['observations'][$key])?$data['observations'][$key]:'';
                    $o_x = Hctumors::create($aux_params);
                }
            }
            return [
                "Success" => true,
                "Message" => "Adición exitosa"
            ];
        }
    }

    /////////////// Appointment Reason /////////////////////////
    public function appointments_reason(Request $request,$hc,$appointment){

        $appointment_reason= AppointmentReason::with([
            'doctor_class' => function ($query) {
                $query->select('id','name','lastname'); # Uno a muchos
            }
            ])
        ->where('dermatology_id',$hc)->get(['id','doctor','consultation_purpose','external_cause','created_at']);

         return DataTables::of($appointment_reason)->make(true);
    }
    public function add_appointment_reason(Request $request,$hc,$appointment){

        if($request->method() === 'GET'){

            $data = [];
            $data['post_url'] = $this->r_name . '/appointments_reason/' . $hc .'/' .$appointment. '/add';

            $data['is_records'] = false;
            $data['is_other'] = false;
            return view($this->v_name . '.form.modals.modal_appointments_reason', $data);
        }
        else{
            $data = request()->except(['_token', '_method']);
            $derma= Dermatology::where('id',$hc)->first();
            $aux_params = [
                'dermatology_id' => $derma->id,
                'doctor' => Auth::user()->id,
                'appointments_id' => $appointment,
                'consultation_purpose' => $data['consultation_purpose'],
                'external_cause' => $data['external_cause'],
            ];
            $reason = AppointmentReason::create($aux_params);
            return [
                "Success" => true,
                "Message" => "Adición exitosa"
            ];
        }
    }

    /////////////// Appointment Reason /////////////////////////
    public function anamnesis(Request $request,$hc,$appointment){

        $anamnesis= Anamnesis::with([
            'doctor_class' => function ($query) {
                $query->select('id','name','lastname'); # Uno a muchos
            }
            ])
        ->where('dermatology_id',$hc)->get(['id','doctor','reason','current_illness','physical_exam',
                'analysis','medical_history','surgical_history','allergic_history','drug_history','family_history',
                    'other_history','evoluction','system_revition','is_control','created_at']);

         return DataTables::of($anamnesis)->make(true);
    }
    public function add_anamnesis(Request $request,$hc,$appointment){

        if($request->method() === 'GET'){

            $data = [];
            $data['post_url'] = $this->r_name . '/anamnesis/' . $hc .'/' .$appointment. '/add';
            $appoint = Appointments::where('id',$appointment)->first();
            $data["hc_type"] = $appoint->hc_type;
            $data['is_records'] = false;
            $data['is_other'] = false;
            return view($this->v_name . '.form.modals.modal_anamnesis', $data);
        }
        else{
            $data = request()->except(['_token', '_method']);
            $derma= Dermatology::where('id',$hc)->first();
            $appoint = Appointments::where('id',$appointment)->first();
            $aux_params = [
                'dermatology_id' => $derma->id,
                'doctor' => Auth::user()->id,
                'appointments_id' => $appointment,
                'is_control' => $appoint->hc_type == 'Dermatología general' ? false : true,
            ];
            $all_params = ['current_illness','reason','physical_exam','analysis','medical_history','surgical_history','allergic_history','drug_history','family_history','other_history','evoluction','system_revition'];
            foreach($all_params as $key => $row){
                $aux_params[$row] = !empty($data[$row])?$data[$row]:'';
            }

            $reason = Anamnesis::create($aux_params);
            return [
                "Success" => true,
                "Message" => "Adición exitosa"
            ];
        }
    }

}
