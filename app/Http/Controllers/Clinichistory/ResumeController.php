<?php

namespace App\Http\Controllers\Clinichistory;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Companies;
use App\Models\Dermatology;
use PDF;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\Ntfs;

class ResumeController extends Controller
{
	private $tag_the = 'El';
    private $tag_o = 'o';
    private $r_name = 'clinichistory';
    private $v_name = 'clinichistory';
    private $c_name = 'Resumen de Historia clínica';
    private $c_names = 'Resumen de Historia clínica';
	private $list_tbl_fsc = ['name' => 'Nombre'];
	private $o_model = User::class;
	private $hc_view = 'resume';
	private $hc_type = 'Resumen';
	
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
	
	//PDF Historial de todos las consultas
	public function index($id)
    {
        if(empty($id)){
			return redirect($this->r_name);
		}
		$o = $this->o_model::where(['uuid' => $id])->first();
		if(empty($o->id)){
			return redirect($this->r_name);
		}
		$data = $this->gdata();
        $data['o'] = $o;
		$data['o_all'] = Dermatology::where(['user' => $o->id])->orderBy('id', 'asc')->get();
		return view($this->v_name.'.'.$this->hc_view.'.records',$data);
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
