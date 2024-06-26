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
use App\Models\Hcprocedure;
use App\Models\Hcsuture;
use App\Models\Hcdermdiagnostics;
use App\Models\Hcdermindications;
use PDF;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\Ntfs;

class BiopsiasController extends Controller
{
	private $tag_the = 'El';
    private $tag_o = 'o';
    private $r_name = 'biopsias';
    private $v_name = 'patients';
    private $c_name = 'Historia clínica';
    private $c_names = 'Historia clínica';
	private $list_tbl_fsc = ['name' => 'Nombre'];
	private $o_model = User::class;
	private $hc_view = 'biopsies';
	private $hc_type = 'Biopsías y/o procedimientos';
	
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
		$o_derm = Dermatology::where(['uuid' => $id])->first();
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
		$data['o_hcpro'] = Hcprocedure::where(['hc' => $o_derm->id])->first();
		$all_sut = Hcsuture::where(['hc' => $o_derm->id])->orderBy('id', 'asc')->get();//Suture
		$all_dgs = Hcdermdiagnostics::where(['hc' => $o_derm->id])->orderBy('id', 'asc')->get();//diagnosticos
		$all_ind = Hcdermindications::where(['hc' => $o_derm->id])->orderBy('id', 'asc')->get();//indicaciones
		$all_pre = Prescriptions::where(['hc' => $o_derm->id])->orderBy('id', 'asc')->get();//prescripción médica
		$all_sex = Hcdermsolexams::where(['hc' => $o_derm->id])->orderBy('id', 'asc')->get();//Solicitudes de examenes
		$all_spr = Hcdermsolproc::where(['hc' => $o_derm->id])->orderBy('id', 'asc')->get();//Solicitudes de procedimientos
		$all_spa = Hcdermsolpath::where(['hc' => $o_derm->id])->orderBy('id', 'asc')->get();//Solicitudes de patalogías
		
		$data['all_sut'] = $all_sut;
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
			$o_hcpro = Hcprocedure::where(['hc' => $o_derm->id])->first();
			$all_sut = Hcsuture::where(['hc' => $o_derm->id])->orderBy('id', 'asc')->get();//Suture
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
