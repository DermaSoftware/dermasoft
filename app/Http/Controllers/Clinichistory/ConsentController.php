<?php

namespace App\Http\Controllers\Clinichistory;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Companies;
use App\Models\Consents;
use App\Models\Hcconsent;
use PDF;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\Ntfs;
use App\Mail\ConsentMail;

class ConsentController extends Controller
{
	private $tag_the = 'El';
    private $tag_o = 'o';
    private $r_name = 'clinichistory';
    private $v_name = 'clinichistory';
    private $c_name = 'Consentimiento Informado';
    private $c_names = 'Consentimientos Informados';
	private $list_tbl_fsc = ['name' => 'Nombre'];
	private $o_model = User::class;
	private $hc_view = 'consent';
	private $hc_type = 'Consentimiento Informado';
	
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
		$data['o_cts'] = Consents::where(['status' => 'active'])->orderBy('id', 'asc')->get();
		//Doctores
		$data['o_dts'] = $this->o_model::where(['status' => 'active','role' => 3])->orderBy('id', 'asc')->get();
		
		//Historial
		$t = Hcconsent::where(['user' => $o->id])->count();
		$is_records = !empty($t)?$t > 0:false;
		$data['t_records'] = $t;
		$data['is_records'] = $is_records;
		return view($this->v_name.'.'.$this->hc_view.'.index',$data);
    }
	
	public function store(Request $request, $id)
    {
        $data = request()->except(['_token','_method']);
		$validatedData = $request->validate([
			'consent' => 'required',
			'note' => 'required',
			'doctor' => 'required',
			'tag' => 'required',
		],[
			'consent.required' => 'El Consentimiento es requerido',
			'note.required' => 'El Contenido es requerido',
			'doctor.required' => 'El Doctor es requerido',
			'tag.required' => 'El Tipo de procedimiento es requerido',
		]);
		if(empty($id)){
			return redirect($this->r_name);
		}
		$ox = $this->o_model::where(['uuid' => $id])->first();
		if(empty($ox->id)){
			return redirect($this->r_name);
		}
		//echo var_dump($data);exit();
		//Creamos el HCCONSENT
		$params = [];
		$params['user'] = $ox->id;
		$params['company'] = $ox->company;
		$params['campus'] = $ox->campus;
		$params['consent'] = !empty($data['consent'])?$data['consent']:'';//
		$params['note'] = !empty($data['note'])?$data['note']:'';//
		$params['comments'] = !empty($data['comments'])?$data['comments']:'';//
		$params['doctor'] = !empty($data['doctor'])?$data['doctor']:'';//
		$params['tag'] = !empty($data['tag'])?$data['tag']:'dermatology';//
		$typ = ['dermatology' => 'Dermatología general','biopsies' => 'Biopsías y/o procedimientos','crypy' => 'Crioterapia','aesthetic' => 'Procedimientos Estéticos','surgical' => 'Descripción Quirúrgica'];
		$params['hc_type'] = $typ[$params['tag']];//
		$params['patient_authorization'] = !empty($data['patient_authorization'])?$data['patient_authorization']:'';//
		$params['authorization'] = (!empty($params['patient_authorization']) AND $params['patient_authorization'] == 'Autoriza')?'Manifiesto que, habiendo recibido la información relacionada con el procedimiento, he decidido dar mi consentimiento':'Manifiesto que habiendo recibido la información relacionada con el procedimiento, he decidido NO dar mi consentimiento';//
		if ($request->hasFile('signature')) {
			$path = $request->file('signature')->store('uploads','public');
			$path = 'storage/'.$path;
			$params['signature_pp'] = $path;
            $params['signature'] = asset($path);
		}
		//path_pdf
		$o = Hcconsent::create($params);
		
		$pdfFilePath = $this->getpdfhc($o->uuid,true);
		$pdfFilePath = storage_path($pdfFilePath);
		$path = Storage::disk('public')->putFile('temp', new File($pdfFilePath), 'public');
		$pdfFilePathTemp = './storage/app/public/uploads/consent_'.$id.'.pdf';
		Storage::delete($pdfFilePathTemp);
		unlink($pdfFilePath);
		$attach_file = storage_path('app/public/' . $path);
		$fullpath = asset('storage/'.$path);
		$o->update(['path_pdf' => $fullpath]);
		
		//notificamos al correo
		if(!empty($data['notification_email']) AND $data['notification_email'] == 'yes'){
			$full_name = $ox->name.' '.$ox->scd_name.' '.$ox->lastname.' '.$ox->scd_lastname;
			Mail::to($ox->email)->send(new ConsentMail($full_name,$attach_file));
		}
		//notificamos al whatsapp
		if(!empty($data['notification_whatsapp']) AND $data['notification_whatsapp'] == 'yes'){
			
		}
		$request->session()->flash('msj_success', 'El '.$this->c_name.' ha sido registrado correctamente.');
		return redirect($this->r_name.'/'.$this->hc_view.'/list/'.$id);
    }
	
	public function show()
    {
		$data = $this->gdata('Buscar paciente');
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
		$o_obj_item = Hcconsent::where(['uuid' => $id])->first();
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
		$o_obj_item = Hcconsent::where(['uuid' => $id])->first();
		if(empty($o_obj_item->id)){
			return null;
		}
		$o = $this->o_model::where(['id' => $o_obj_item->user])->first();
		$o_doctor = $this->o_model::where(['id' => $o_obj_item->doctor])->first();
		$o_company = Companies::where(['id' => $o_obj_item->company])->first();
		$logo = !empty($o_company->logo_pp)?public_path($o_company->logo_pp):public_path('assets/images/favicon.png');
		$photo = !empty($o->photo_pp)?$o->photo_pp:public_path('assets/images/user.png');
		$signature = !empty($o_doctor->signature_pp)?$o_doctor->signature_pp:public_path('assets/images/firma.png');
		$signaturex = !empty($o_obj_item->signature_pp)?$o_obj_item->signature_pp:public_path('assets/images/firma.png');
		
		$data['o'] = $o;
		$data['o_obj_item'] = $o_obj_item;
		$data['o_doctor'] = $o_doctor;
		$data['logo'] = $logo;
		$data['photo'] = $photo;
		$data['signature'] = $signature;
		$data['signaturex'] = $signaturex;
		$data['company_name'] = $o_company->name;
		$full_name = $o->name.' '.$o->scd_name.' '.$o->lastname.' '.$o->scd_lastname;
		$data['full_name'] = $full_name;
		$dfull_name = $o_doctor->name.' '.$o_doctor->scd_name.' '.$o_doctor->lastname.' '.$o_doctor->scd_lastname;
		$data['dfull_name'] = $dfull_name;
		$pdf = PDF::loadView('pdf.'.$this->hc_view, $data);
		if($save){
			$pdfFilePath = 'app/public/uploads/consent_'.$id.'.pdf';
			$pdf->save(storage_path($pdfFilePath));
			return $pdfFilePath;
		}
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
		$data = $this->gdata();
        $data['o'] = $o;
		$data['o_all'] = Hcconsent::where(['user' => $o->id])->orderBy('id', 'asc')->get();
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
		$arr = [];
		$derm_all = Hcconsent::where(['user' => $o->id])->orderBy('id', 'asc')->get();
		foreach($derm_all as $key => $o_obj_item){
			$o_doctor = $this->o_model::where(['id' => $o_obj_item->doctor])->first();
			$dfull_name = $o_doctor->name.' '.$o_doctor->scd_name.' '.$o_doctor->lastname.' '.$o_doctor->scd_lastname;
			$signature = !empty($o_doctor->signature_pp)?$o_doctor->signature_pp:public_path('assets/images/firma.png');
			$signaturex = !empty($o_obj_item->signature_pp)?$o_obj_item->signature_pp:public_path('assets/images/firma.png');
			array_push($arr, ['o_obj_item' => $o_obj_item,'o_doctor' => $o_doctor,'dfull_name' => $dfull_name,'signature' => $signature,'signaturex' => $signaturex]);
		}
		$data['arr'] = $arr;
		$pdf = PDF::loadView('pdf.'.$this->hc_view.'all', $data);
		return $pdf->stream('document.pdf');
		exit();
    }
}
