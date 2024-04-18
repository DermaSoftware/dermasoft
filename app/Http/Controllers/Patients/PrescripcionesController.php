<?php

namespace App\Http\Controllers\Patients;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Companies;
use App\Models\Medicines;
use App\Models\Medicalp;
use App\Models\Mprescriptions;
use PDF;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\Ntfs;
use App\Mail\MpMail;

class PrescripcionesController extends Controller
{
	private $tag_the = 'El';
    private $tag_o = 'o';
    private $r_name = 'prescripciones';
    private $v_name = 'patients';
    private $c_name = 'Prescripción médica';
    private $c_names = 'Prescripciones médicas';
	private $list_tbl_fsc = ['name' => 'Nombre'];
	private $o_model = User::class;
	private $hc_view = 'medicalp';
	private $hc_type = 'Prescripción médica';
	
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
		$data = $this->gdata();
        $data['o'] = $o;
		$data['o_all'] = Medicalp::where(['user' => $o->id])->orderBy('id', 'asc')->get();
		return view($this->v_name.'.'.$this->r_name.'.records',$data);
    }
	
	//PDF
	public function hcpdf($id)
    {
        if(empty($id)){
			return redirect($this->r_name);
		}
		$o_obj_item = Medicalp::where(['uuid' => $id])->first();
		if(empty($o_obj_item->id)){
			return redirect($this->r_name);
		}
		$pdfFilePath = $this->getpdfhc($id,false);
    }
	private function getpdfhc($id, $save = false)
    {
		if(empty($id)){
			return null;
		}
		$o_obj_item = Medicalp::where(['uuid' => $id])->first();
		if(empty($o_obj_item->id)){
			return null;
		}
		$o = $this->o_model::where(['id' => $o_obj_item->user])->first();
		$o_doctor = $this->o_model::where(['id' => $o_obj_item->doctor])->first();
		$o_company = Companies::where(['id' => $o_obj_item->company])->first();
		$logo = !empty($o_company->logo_pp)?public_path($o_company->logo_pp):public_path('assets/images/favicon.png');
		$photo = !empty($o->photo_pp)?$o->photo_pp:public_path('assets/images/user.png');
		$signature = !empty($o_doctor->signature_pp)?$o_doctor->signature_pp:public_path('assets/images/firma.png');
		$all_items = Mprescriptions::where(['mp' => $o_obj_item->id])->orderBy('id', 'asc')->get();//Items
		
		$data['o'] = $o;
		$data['o_obj_item'] = $o_obj_item;
		$data['all_items'] = $all_items;
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
		if($save){
			$pdfFilePath = 'app/public/uploads/mp_'.$id.'.pdf';
			$pdf->save(storage_path($pdfFilePath));
			return $pdfFilePath;
		}
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
		$arr = [];
		$derm_all = Medicalp::where(['user' => $o->id])->orderBy('id', 'asc')->get();
		foreach($derm_all as $key => $o_obj_item){
			$o_doctor = $this->o_model::where(['id' => $o_obj_item->doctor])->first();
			$dfull_name = $o_doctor->name.' '.$o_doctor->scd_name.' '.$o_doctor->lastname.' '.$o_doctor->scd_lastname;
			$signature = !empty($o_doctor->signature_pp)?$o_doctor->signature_pp:public_path('assets/images/firma.png');
			$all_items = Mprescriptions::where(['mp' => $o_obj_item->id])->orderBy('id', 'asc')->get();//Items
			array_push($arr, ['o_obj_item' => $o_obj_item,'all_items' => $all_items,'o_doctor' => $o_doctor,'dfull_name' => $dfull_name,'signature' => $signature]);
		}
		$data['arr'] = $arr;
		$pdf = PDF::loadView('pdf.'.$this->hc_view.'all', $data);
		return $pdf->stream('document.pdf');
		exit();
    }
}
