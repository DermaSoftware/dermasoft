<?php

namespace App\Http\Controllers\Clinichistory;

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
use App\Models\Hccrypy;
use App\Models\Hclesion;
use App\Models\Hcdermdiagnostics;
use App\Models\Hcdermindications;
use PDF;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\Ntfs;
use App\Models\Appointments;
use App\Models\ExamRequest;
use App\Models\Hprocedure;
use App\Models\PathologyRequest;
use App\Models\Prescription;
use App\Models\ProcedureRequest;

class CrypyController extends Controller
{
	private $tag_the = 'El';
    private $tag_o = 'o';
    private $r_name = 'clinichistory';
    private $v_name = 'clinichistory';
    private $c_name = 'Historia clínica';
    private $c_names = 'Historia clínica';
	private $list_tbl_fsc = ['name' => 'Nombre'];
	private $o_model = User::class;
	private $hc_view = 'crypy';
	private $hc_type = 'Crioterapia';

	private function gdata($t = '')
    {
        $data['menu'] = $this->r_name;
        $data['tag_o'] = $this->tag_o;
        $data['tag_the'] = $this->tag_the;
        $data['v_name'] = $this->v_name.'.'.$this->hc_view;
        $data['hc_view'] = $this->hc_view;
        $data['c_name'] = $this->c_name;
        $data['c_names'] = $this->c_names;
        $data['list_tbl_fsc'] = $this->list_tbl_fsc;
        $data['title'] = $t.' - '.$this->c_names;
		return $data;
    }

	public function __construct(){
        $this->middleware('checkRole:2_3');
    }

	public function index(Request $request, $id)
    {
        if(empty($id)){
			return redirect($this->r_name);
		}
		$o = $this->o_model::where(['uuid' => $id])->first();
        $o_vitalsigns = Vitalsigns::where(['user' => $o->id])
                        // ->where(['hc_type' => 'Crioterapia'])
                        ->orderBy('id', 'DESC')->first();
		if(empty($o->id)){
			return redirect($this->r_name);
		}
        if(empty($o_vitalsigns)){
            $request->session()->flash('msj_error', 'El paciente '. $o->name. ' no tiene signos vitales registrados para esta consulta.');
			return redirect($this->r_name);
		}
		$data = $this->gdata('HC - '.$this->hc_type, false);
        $data['o'] = $o;
		$data['o_vitalsigns'] = $o_vitalsigns;
		$data['o_diagnoses'] = Diagnoses::where(['status' => 'active'])->orderBy('id', 'asc')->get(['name','id']);
		$data['o_diagnosesty'] = Diagnosestype::where(['status' => 'active'])->orderBy('id', 'asc')->get(['name','id']);
		$data['o_indications'] = Indications::where(['status' => 'active'])->orderBy('id', 'asc')->get(['description','id','uuid']);
		$data['o_medicines'] = Medicines::where(['status' => 'active'])->orderBy('id', 'asc')->get(['name','id']);
		$data['o_labexams'] = Laboratoryexams::where(['status' => 'active'])->orderBy('id', 'asc')->get(['name','id']);
		$data['o_procs'] = Procedures::where(['status' => 'active'])->orderBy('id', 'asc')->get(['name','id']);
		$data['o_paths'] = Pathologies::where(['status' => 'active'])->orderBy('id', 'asc')->get(['name','id']);

		//Historial
		$t = Dermatology::where(['user' => $o->id,'hc_type' => $this->hc_type])->count();
		$is_records = !empty($t)?$t > 0:false;
		if($is_records){
			$o_derm = Dermatology::where(['user' => $o->id,'hc_type' => $this->hc_type])->orderBy('id', 'DESC')->first();
			$data['o_derm'] = $o_derm;
			$o_hcp = Hccrypy::where(['hc' => $o_derm->id,'user' => $o->id])->orderBy('id', 'DESC')->first();
			$data['o_hcp'] = $o_hcp;
		}
		$data['t_records'] = $t;
		$data['is_records'] = $is_records;

		return view($this->v_name.'.'.$this->hc_view.'.index',$data);
    }

	public function store(Request $request, $id)
    {
        $data = request()->except(['_token','_method']);
		$validatedData = $request->validate([
			'external_cause' => 'required',
			'consultation_purpose' => 'required',
		],[
			'external_cause.required' => 'La Causa externa es requerida',
			'consultation_purpose.required' => 'La Finalidad consulta es requerida',
		]);
		if(empty($id)){
			return redirect($this->r_name);
		}
		$ox = $this->o_model::where(['uuid' => $id])->first();
		if(empty($ox->id)){
			return redirect($this->r_name);
		}
		//echo var_dump($data);exit();
		//Creamos el HC - Dermatology
		$params = [];
		$params['user'] = $ox->id;
		$params['doctor'] = Auth::user()->id;
		$params['company'] = $ox->company;
		$params['campus'] = $ox->campus;
		$params['external_cause'] = $data['external_cause'];
		$params['consultation_purpose'] = $data['consultation_purpose'];
		//
		$params['medical_history'] = $data['medical_history'];
		$params['surgical_history'] = $data['surgical_history'];
		$params['allergic_history'] = $data['allergic_history'];
		$params['drug_history'] = $data['drug_history'];
		$params['family_history'] = $data['family_history'];
		$params['other_history'] = $data['other_history'];
		$params['hc_type'] = $this->hc_type;
		//path_pdf
		$o = Dermatology::create($params);

		//HCCRYPY
		$aux_params = ['hc' => $o->id,'user' => $ox->id,'company' => $ox->company,'campus' => $ox->campus];
		$all_params = ['skin_phototype','procedure_time','complications','record_complications','participants','comments'];
		foreach($all_params as $key => $row){
			$aux_params[$row] = !empty($data[$row])?$data[$row]:'';
		}
		$o_hcpro = Hccrypy::create($aux_params);
		//HCLESION
		if(!empty($data['lesion'])){
			foreach($data['lesion'] as $key => $row){
				$aux_params = ['hc' => $o->id,'user' => $ox->id,'company' => $ox->company,'campus' => $ox->campus];
				$aux_params['lesion'] = !empty($row)?$row:'';
				$arr_keys = ['body_area','disinfection','antiseptic','anesthesia','type_anesthesia','other_anesthesia','freeze_time_1','freeze_time_2','defrost_time_1','defrost_time_2','timex','technique','other_technique'];
				foreach($arr_keys as $krow){
					$aux_params[$krow] = !empty($data[$krow][$key])?$data[$krow][$key]:'';
				}
				$o_x = Hclesion::create($aux_params);
			}
		}

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
		//return redirect($this->r_name.'/hcdermpdf/'.$o->uuid);
		//notificamos al correo
		if(!empty($data['notification_email']) AND $data['notification_email'] == 'yes' AND !empty($indd)){
			Mail::to($ox->email)->send(new Ntfs('Indicaciones','Hola '.$ox->name.', en su consulta ha recibido las siguientes indicaciones: '.$indd,$ox->name,$ox->email));
		}
		//notificamos al whatsapp
		if(!empty($data['notification_whatsapp']) AND $data['notification_whatsapp'] == 'yes'){

		}
		$request->session()->flash('msj_success', 'El HC '.$this->hc_type.' ha sido registrado correctamente.');
		return redirect($this->r_name);
    }

	public function show()
    {
		$data = $this->gdata('Buscar paciente', false);
		return view($this->v_name.'.'.$this->hc_view.'.search',$data);
    }

	public function search(Request $request)
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
			return redirect($this->r_name.'/'.$this->hc_view.'/'.$o->uuid);
		}
		$request->session()->flash('msj_error', 'No se han encontrado resultados');
		return redirect($this->r_name.'/'.$this->hc_view);
    }


	//PDF
	public function hcpdf($id)
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
		$pdfFilePath = $this->getpdfhc($id,true);
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
	private function getpdfhc($id, $save = false)
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
            },
            'latestVitalsign'
            ])
            ->where('uuid',$id)
            ->orderBy('created_at','DESC')
            ->first(['id','uuid','date_quote','user','time_quote','doctor','campus','hc_type']);
        $o_derm = Dermatology::with(['latestAppointmentReason'])->where(['user' => $appointment->user])->orderBy('created_at', 'DESC')->first();
		if(empty($o_derm->id)){
			return null;
		}
		$o = $this->o_model::where(['id' => $o_derm->user])->first();
		$o_doctor = $this->o_model::where(['id' => $o_derm->doctor])->first();
		$o_company = Companies::where(['id' => $o_derm->company])->first();
		$logo = !empty($o_company->logo_pp)?public_path($o_company->logo_pp):public_path('assets/images/favicon.png');
		$photo = !empty($o->photo_pp)?$o->photo_pp:public_path('assets/images/user.png');
		$signature = !empty($o_doctor->signature_pp)?$o_doctor->signature_pp:public_path('assets/images/firma.png');

		$data['o_vitalsigns'] = $appointment->latestVitalsign;

		$all_dgs= Hcdermdiagnostics::where('appointments_id',$appointment->id)
        ->orderBy('created_at','DESC')
        ->orderBy('updated_at','DESC')
        ->get(['id','uuid','code','diagnostic','type_diagnostic' ,'created_at','updated_at']);

		$all_ind = Hcdermindications::with([
            'appointments' => function ($query) {
                $query->select('id','uuid','date_quote','time_quote','created_at'); # Uno a muchos
            },
        ])
        ->where('appointments_id',$appointment->id)
        ->orderBy('created_at','DESC')
        ->orderBy('updated_at','DESC')
        ->get(['id','uuid','indication','created_at','updated_at','appointments_id','hc_type']);

        $all_pre = Prescription::with([
            'doctor_class' => function ($query) {
                $query->select('id','uuid','name','lastname','scd_name','scd_lastname','signature_pp'); # Uno a muchos
            },
            'medicines']
            )
            ->where('appointments_id',$appointment->id)
            ->orderBy('id','ASC')
            ->get(['doctor','id','uuid','validity','created_at']);

        $all_sex = ExamRequest::with([
            'doctor_class' => function ($query) {
                $query->select('id','uuid','name','lastname','scd_name','scd_lastname','signature_pp'); # Uno a muchos
            },
            'hcdermdiagnostics' => function ($query) {
                $query->select('id','uuid','code','diagnostic'); # Uno a muchos
            },
            'laboratoryexams'
            ]
            )
            ->where('appointments_id',$appointment->id)
            ->orderBy('id','ASC')
            ->get(['doctor','id','uuid','hcdermdiagnostics_id','total','created_at']);

		$all_spr = ProcedureRequest::with([
            'doctor_class' => function ($query) {
                $query->select('id','uuid','name','lastname','scd_name','scd_lastname','signature_pp'); # Uno a muchos
            },
            'procedures']
            )
            ->where('appointments_id',$appointment->id)
            ->orderBy('id','ASC')
            ->get(['doctor','id','uuid','created_at']);

        // $all_spr = Hcdermsolproc::where(['hc' => $o_derm->id])->orderBy('id', 'asc')->get();//Solicitudes de procedimientos
        $all_spa = PathologyRequest::with([
            'doctor_class' => function ($query) {
                $query->select('id','uuid','name','lastname','scd_name','scd_lastname','signature_pp'); # Uno a muchos
            },
            'hcdermdiagnostics' => function ($query) {
                $query->select('id','uuid','code','diagnostic'); # Uno a muchos
            },
            'pathologies'
            ]
            )
            ->where('appointments_id',$appointment->id)
            ->orderBy('id','ASC')
            ->get(['doctor','id','uuid','hcdermdiagnostics_id','annexes','created_at']);

        $data['o_hcpro'] = Hprocedure::with([
            'type_procedure_class' => function ($query) {
                $query->select('id','name','description'); # Uno a muchos
            },
            'prequest_nprocedure' => function ($query) {
                $query->select('id','procedures_id'); # Uno a muchos
            }
            ])
            ->where('appointments_id',$appointment->id)
            ->orderBy('created_at','DESC')
            ->orderBy('updated_at','DESC')
            ->get();

        $data['o_vitalsigns'] = $appointment->latestVitalsign;
        $all_back = $o_derm->antecedentes;
        $backgounds = [
            "Antecedente medico"=>[],
            "Antecedentes médicos"=>[],
            "Antecedentes quirúrgicos"=>[],
            "Antecedentes alérgicos"=>[],
            "Antecedentes farmacológicos"=>[],
            "Antecedentes familiares"=>[],
            "Otros antecedentes"=>[],
        ];
        foreach ($all_back as $key => $value) {
            if(isset($value->type_class)){
                array_push($backgounds[$value->type_class->name],$value);
            }
            // array_push($backgounds[$value->type_class->name],$value);
        }
		// $data['o_vitalsigns'] = Vitalsigns::where(['user' => $o_derm->user])->orderBy('id', 'DESC')->first();
		// $data['o_hcpro'] = Hccrypy::where(['hc' => $o_derm->id])->first();
		// $all_sut = Hclesion::where(['hc' => $o_derm->id])->orderBy('id', 'asc')->get();//Suture
		// $all_dgs = Hcdermdiagnostics::where(['hc' => $o_derm->id])->orderBy('id', 'asc')->get();//diagnosticos
		// $all_ind = Hcdermindications::where(['hc' => $o_derm->id])->orderBy('id', 'asc')->get();//indicaciones
		// $all_pre = Prescriptions::where(['hc' => $o_derm->id])->orderBy('id', 'asc')->get();//prescripción médica
		// $all_sex = Hcdermsolexams::where(['hc' => $o_derm->id])->orderBy('id', 'asc')->get();//Solicitudes de examenes
		// $all_spr = Hcdermsolproc::where(['hc' => $o_derm->id])->orderBy('id', 'asc')->get();//Solicitudes de procedimientos
		// $all_spa = Hcdermsolpath::where(['hc' => $o_derm->id])->orderBy('id', 'asc')->get();//Solicitudes de patalogías

		// $data['all_sut'] = $all_sut;
        $data['all_back'] = $backgounds;
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
		$pdf = PDF::loadView('pdf.'.$this->hc_view, $data);
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
		$data = $this->gdata('HC - Historial de consultas - '.$this->hc_type, false);
        $data['o'] = $o;
		$data['o_all'] = Dermatology::where(['user' => $o->id,'hc_type' => $this->hc_type])->orderBy('id', 'asc')->get();
		return view($this->v_name.'.'.$this->hc_view.'.records',$data);
    }
	//PDF Historial de todos las consultas
	public function records($id)
    {
        if(empty($id)){
			return redirect($this->r_name);
		}
		$o = $this->o_model::where(['uuid' => $id])->first();//User
		if(empty($o->id)){
			return redirect($this->r_name);
		}
		$pdfFilePath = $this->allpdfhc($id);
    }
	private function allpdfhc($id)
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
			$o_hcpro = Hccrypy::where(['hc' => $o_derm->id])->first();
			$all_sut = Hclesion::where(['hc' => $o_derm->id])->orderBy('id', 'asc')->get();//Suture
			$all_dgs = Hcdermdiagnostics::where(['hc' => $o_derm->id])->orderBy('id', 'asc')->get();//diagnosticos
			$all_ind = Hcdermindications::where(['hc' => $o_derm->id])->orderBy('id', 'asc')->get();//indicaciones
			$all_pre = Prescriptions::where(['hc' => $o_derm->id])->orderBy('id', 'asc')->get();//prescripción médica
			$all_sex = Hcdermsolexams::where(['hc' => $o_derm->id])->orderBy('id', 'asc')->get();//Solicitudes de examenes
			$all_spr = Hcdermsolproc::where(['hc' => $o_derm->id])->orderBy('id', 'asc')->get();//Solicitudes de procedimientos
			$all_spa = Hcdermsolpath::where(['hc' => $o_derm->id])->orderBy('id', 'asc')->get();//Solicitudes de patalogías
			array_push($arr, ['o_derm' => $o_derm,'o_doctor' => $o_doctor,'dfull_name' => $dfull_name,'signature' => $signature,'o_hcpro' => $o_hcpro,'all_sut' => $all_sut,'all_dgs' => $all_dgs,'all_ind' => $all_ind,'all_pre' => $all_pre,'all_sex' => $all_sex,'all_spr' => $all_spr,'all_spa' => $all_spa]);
		}
		$data['arr'] = $arr;
		$pdf = PDF::loadView('pdf.'.$this->hc_view.'all', $data);
		return $pdf->stream('document.pdf');
		exit();
    }
}
