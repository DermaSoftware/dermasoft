<?php

namespace App\Http\Controllers\Patients;

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
use App\Models\ExamRequest;
use App\Models\Hprocedure;
use App\Models\PathologyRequest;
use App\Models\Prescription;
use App\Models\ProcedureRequest;

class CrioterapiaController extends Controller
{
	private $tag_the = 'El';
    private $tag_o = 'o';
    private $r_name = 'crioterapia';
    private $v_name = 'patients';
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
        $this->middleware('checkRole:5');
    }

	//PDF Historial de todos las consultas
	public function index()
    {
		$o = $this->o_model::where(['id' => Auth::user()->id])->first();
		if(empty($o->id)){
			return redirect($this->r_name);
		}
		$data = $this->gdata('HC - Historial de consultas - '.$this->hc_type, false);
        $data['o'] = $o;
		$data['o_all'] = Dermatology::where(['user' => $o->id,'hc_type' => $this->hc_type])->orderBy('id', 'asc')->get();
		return view($this->v_name.'.'.$this->r_name.'.records',$data);
    }

	//PDF
	public function hcpdf($id)
    {
        if(empty($id)){
			return redirect($this->r_name);
		}
		$procedure = Hprocedure::where(['uuid' => $id])->first();
		$o_derm = Dermatology::where(['id' => $procedure->hc])->first();
		if(empty($o_derm->id)){
			return redirect($this->r_name);
		}
		$pdfFilePath = $this->getpdfhc($id,true);
		$pdfFilePath = storage_path($pdfFilePath);
		$path = Storage::disk('public')->putFile('temp', new File($pdfFilePath), 'public');
		$pdfFilePathTemp = './storage/app/public/uploads/hc_derm_'.$id.'.pdf';
		Storage::delete($pdfFilePathTemp);
		unlink($pdfFilePath);
		$attach_file = storage_path('app/public/' . $path);
		$fullpath = asset('storage/'.$path);
		$o_derm->update(['path_pdf' => $fullpath]);
		return redirect($fullpath);
    }
	private function getpdfhc($id, $save = false)
    {
		if(empty($id)){
			return null;
		}
		$procedure = Hprocedure::where(['uuid' => $id])->first();
        $appointment = $procedure->appointments;
		$o_derm = Dermatology::where(['id' => $procedure->hc])->first();
		if(empty($o_derm->id)){
			return null;
		}
		$o = $o_derm->user_class;
		$o_doctor = $procedure->doctor_class;
		$o_company = $procedure->doctor_class->company_class;
		$logo = !empty($o_company->logo_pp)?public_path($o_company->logo_pp):public_path('assets/images/favicon.png');
		$photo = !empty($o->photo_pp)?$o->photo_pp:public_path('assets/images/user.png');
		$signature = !empty($o_doctor->signature_pp)?$o_doctor->signature_pp:public_path('assets/images/firma.png');

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
            array_push($backgounds[$value->type_class->name],$value);
        }

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
	public function records()
    {
		$o = $this->o_model::where(['id' => Auth::user()->id])->first();//User
		if(empty($o->id)){
			return redirect($this->r_name);
		}
		$pdfFilePath = $this->allpdfhc($o->uuid);
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
