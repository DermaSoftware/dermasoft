<?php

namespace App\Http\Controllers\Patients;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Habeas;
use App\Models\Companies;
use App\Models\Querytypes;
use App\Models\Vitalsigns;
use App\Models\Photographic;
use App\Models\Headquarters;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Mail\HabeasData;
use App\Mail\Ntfs;
use PDF;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class PatientsController extends Controller
{
	private $tag_the = 'El';
    private $tag_o = 'o';
    private $r_name = 'patients';
    private $v_name = 'patients';
    private $c_name = 'Paciente';
    private $c_names = 'Pacientes';
	private $list_tbl_fsc = ['name' => 'Nombre','document_type' => 'Tipo de documento','document_number' => 'Número de documento','email' => 'Correo','phone' => 'Telefono'];
	private $o_model = User::class;
	
	private function gdata($t = 'Historial de', $tfinal = true)
    {
        $data['menu'] = $this->r_name;
        $data['tag_o'] = $this->tag_o;
        $data['tag_the'] = $this->tag_the;
        $data['v_name'] = $this->v_name;
        $data['c_name'] = $this->c_name;
        $data['c_names'] = $this->c_names;
        $data['list_tbl_fsc'] = $this->list_tbl_fsc;
        $data['title'] = $tfinal?$t.' '.$this->c_names:$t;
		return $data;
    }

	public function __construct(){
        $this->middleware('checkRole:2_3');
    }

    public function index(Request $request)
    {
        $data = $this->gdata();
		$per_page = !empty($request->get('per_page'))?$request->get('per_page'):env('PAGINATION_NUM', 10);
        $w = ['company' => Auth::user()->company,'role' => 5];
		$c = Auth::user()->campus;
		if(!empty($c) AND $c > 0){
			$w['campus'] = $c;
		}
		$tb = $this->itemsPaginate($this->o_model, $per_page, $w);
		$data['o_all'] = $tb['items'];
		$data['pagination'] = $tb['pagination'];
		return view($this->v_name.'.records',$data);
    }

    public function create()
    {
        $data = $this->gdata('Agregar');
		return view($this->v_name.'.create',$data);
    }

    public function store(Request $request)
    {
        $data = request()->except(['_token','_method']);
		$validatedData = $request->validate([
			'name' => 'required|string',
			'email' => 'required|string|email|max:255|unique:users,email',
			'document_number' => 'required|max:255|unique:users,document_number',
		],[
			'name.required' => 'El nombre es requerido',
			'name.string' => 'El nombre debe ser un texto',
			'email.required' => 'El correo es requerido',
            'email.email' => 'El correo debe ser un correo válido',
            'email.string' => 'El correo debe ser un texto',
            'email.max' => 'El correo no debe exceder más de 255 caracteres',
            'email.unique' => 'El correo ya existe en la base de datos',
			'document_number.required' => 'El número de documento es requerido',
            'document_number.max' => 'El número de documento no debe exceder más de 255 caracteres',
            'document_number.unique' => 'El número de documento ya existe en la base de datos',
		]);
		$r = $data['urlredirect'];
		unset($data['urlredirect']);
		$data['role'] = 5;
		$data['company'] = Auth::user()->company;
		$data['campus'] = Auth::user()->campus;
		$password = Str::random(9);
		$data['password'] = Hash::make($password);
		$o = $this->o_model::create($data);
		Mail::to($o->email)->send(new Ntfs('Nueva cuenta','Su cuenta ha sido registrada correctamente, para ingresar recuerde usar este correo y la contraseña:<b>'.$password.'</b>',$o->name,$o->email));
		$request->session()->flash('msj_success', $this->tag_the.' '.$this->c_name.' '.$request->name.' ha sido registrad'.$this->tag_o.' correctamente.');
		$url = $r=='normal'?$this->r_name:$this->r_name.'/vitalsigns/'.$o->uuid;
		return redirect($url);
    }

    public function vitalsigns($id)
    {
        if(empty($id)){
			return redirect($this->r_name);
		}
		$o = $this->o_model::where(['uuid' => $id])->first();
		if(empty($o->id)){
			return redirect($this->r_name);
		}
		$data = $this->gdata('Registrar signos vitales', false);
        $data['o'] = $o;
		$data['o_qtys'] = Querytypes::where(['company' => Auth::user()->company,'status' => 'active'])->orderBy('id', 'asc')->get();
		return view($this->v_name.'.vitalsigns',$data);
    }
	
	public function svitalsigns(Request $request, $id)
    {
        $data = request()->except(['_token','_method']);
		$validatedData = $request->validate([
			'heart_rate' => 'required',
			'breathing_frequency' => 'required',
			'weight' => 'required',
			'blood_pressure' => 'required',
			'temperature' => 'required',
			'querytype' => 'required',
		],[
			'heart_rate.required' => 'La frecuencia cardiaca es requerida',
			'breathing_frequency.required' => 'La frecuencia respiratoria es requerida',
			'weight.required' => 'El peso es requerido',
			'blood_pressure.required' => 'La tensión arterial es requerida',
			'temperature.required' => 'La temperatura es requerida',
			'querytype.required' => 'El tipo de consulta es requerido',
		]);
		if(empty($id)){
			return redirect($this->r_name);
		}
		$ox = $this->o_model::where(['uuid' => $id])->first();
		if(empty($ox->id)){
			return redirect($this->r_name);
		}
		$data['user'] = $ox->id;
		$data['company'] = Auth::user()->company;
		$data['campus'] = Auth::user()->campus;
		$o = Vitalsigns::create($data);
		$request->session()->flash('msj_success', 'Los signos vitales han sido registrados correctamente.');
		return redirect($this->r_name.'/records');
    }

    public function shvitalsigns()
    {
		$data = $this->gdata('Buscar paciente', false);
		return view($this->v_name.'.shvitalsigns',$data);
    }

    public function shvs_search(Request $request)
    {
		$data = request()->except(['_token','_method']);
		$validatedData = $request->validate([
			'document_type' => 'required',
			'document_number' => 'required',
		],[
			'document_type.required' => 'El tipo de documento es requerido',
			'document_number.required' => 'El Número de documento es requerido',
		]);
		$o = $this->o_model::where($data)->first();
		if(!empty($o->id)){
			return redirect($this->r_name.'/vitalsigns/'.$o->uuid);
		}
		$request->session()->flash('msj_error', 'No se han encontrado resultados');
		return redirect($this->r_name.'/search_vitalsigns');
    }

    public function shgallery()
    {
		$data = $this->gdata('Buscar paciente', false);
		return view($this->v_name.'.shgallery',$data);
    }

    public function shgy_search(Request $request)
    {
		$data = request()->except(['_token','_method']);
		$validatedData = $request->validate([
			'document_type' => 'required',
			'document_number' => 'required',
		],[
			'document_type.required' => 'El tipo de documento es requerido',
			'document_number.required' => 'El Número de documento es requerido',
		]);
		$o = $this->o_model::where($data)->first();
		if(!empty($o->id)){
			return redirect($this->r_name.'/gallery/'.$o->uuid);
		}
		$request->session()->flash('msj_error', 'No se han encontrado resultados');
		return redirect($this->r_name.'/search_gallery');
    }
	
	public function gallery($id)
    {
        if(empty($id)){
			return redirect($this->r_name);
		}
		$o = $this->o_model::where(['uuid' => $id])->first();
		if(empty($o->id)){
			return redirect($this->r_name);
		}
		$data = $this->gdata('Registro fotográfico', false);
        $data['o'] = $o;
		$data['o_gallerys'] = Photographic::where(['user' => $o->id,'status' => 'active'])->orderBy('id', 'DESC')->get();
		return view($this->v_name.'.gallery',$data);
    }
	
	public function sgallery(Request $request, $id)
    {
        $data = request()->except(['_token','_method']);
		$validatedData = $request->validate([
			'photo' => 'required',
		],[
			'photo.required' => 'La foto es requerida',
		]);
		if(empty($id)){
			return redirect($this->r_name);
		}
		$ox = $this->o_model::where(['uuid' => $id])->first();
		if(empty($ox->id)){
			return redirect($this->r_name);
		}
		$data['user'] = $ox->id;
		$data['company'] = Auth::user()->company;
		$data['campus'] = Auth::user()->campus;
		if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('uploads','public');
			$path = 'storage/'.$path;
			$data['photo_pp'] = $path;
            $data['photo'] = asset($path);
        }
		$o = Photographic::create($data);
		$request->session()->flash('msj_success', 'El registro fotográfico ha sido agregado correctamente.');
		return redirect($this->r_name.'/gallery/'.$id);
    }

    public function suppdata($id)
    {
        if(empty($id)){
			return redirect($this->r_name);
		}
		$o = $this->o_model::where(['uuid' => $id])->first();
		if(empty($o->id)){
			return redirect($this->r_name);
		}
		$data = $this->gdata('Datos complementarios', false);
        $data['o'] = $o;
		$data['o_campus'] = Headquarters::where(['company' => Auth::user()->company,'status' => 'active'])->orderBy('id', 'asc')->get();
		return view($this->v_name.'.suppdata',$data);
    }

    public function ssuppdata(Request $request, $id)
    {
        $data = request()->except(['_token','_method']);
		$validatedData = $request->validate([
			'birth' => 'required',
			'gender' => 'required',
			'country' => 'required',
		],[
			'birth.required' => 'La fecha de nacimiento es requerida',
			'gender.required' => 'El género es requerido',
			'country.required' => 'El país es requerido',
		]);
		if(empty($id)){
			return redirect($this->r_name);
		}
		$o = $this->o_model::where(['uuid' => $id])->first();
		if(empty($o->id)){
			return redirect($this->r_name);
		}
		if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('uploads','public');
			$path = 'storage/'.$path;
			$data['photo_pp'] = $path;
            $data['photo'] = asset($path);
        }
		if ($request->hasFile('signature')) {
            $path = $request->file('signature')->store('uploads','public');
			$path = 'storage/'.$path;
            $data['signature_pp'] = $path;
            $data['signature'] = asset($path);
        }
		$o->update($data);
		$request->session()->flash('msj_success', $this->tag_the.' '.$this->c_name.' '.$o->name.' ha sido actualizad'.$this->tag_o.' correctamente.');
		return redirect($this->r_name.'/records');
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
		return view($this->v_name.'.edit',$data);
    }

    public function update(Request $request, $id)
    {
        $data = request()->except(['_token','_method']);
		if(empty($id)){
			return redirect($this->r_name);
		}
		$tag = is_numeric($id)?'id':'uuid';
		$o = $this->o_model::where([$tag => $id])->first();
		if(empty($o->id)){
			return redirect($this->r_name);
		}
		$validatedData = $request->validate([
			'name' => 'required|string',
			'email' => 'required|string|email|max:255|unique:users,email,'.$o->id,
		],[
			'name.required' => 'El nombre es requerido',
			'email.required' => 'El correo es requerido',
			'email.email' => 'El correo debe ser un correo válido',
            'email.string' => 'El correo debe ser un texto',
            'email.max' => 'El correo no debe exceder más de 255 caracteres',
            'email.unique' => 'El correo ya existe en la base de datos',
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

    public function habeasdata($id)
    {
        if(empty($id)){
			return redirect($this->r_name);
		}
		$o = $this->o_model::where(['uuid' => $id])->first();
		if(empty($o->id)){
			return redirect($this->r_name);
		}
		$pdfFilePath = $this->pdfhabeasdata($id,true);
		$pdfFilePath = storage_path($pdfFilePath);
		$path = Storage::disk('public')->putFile('temp', new File($pdfFilePath), 'public');
		$pdfFilePathTemp = './storage/app/public/uploads/h_'.$id.'.pdf';
		Storage::delete($pdfFilePathTemp);
		unlink($pdfFilePath);
		$attach_file = storage_path('app/public/' . $path);
		$fullpath = asset('storage/'.$path);
		$o->update(['habeas' => 'si','accept_habeas' => $fullpath]);
		$full_name = $o->name.' '.$o->scd_name.' '.$o->lastname.' '.$o->scd_lastname;
		Mail::to($o->email)->send(new HabeasData($full_name,$attach_file));
		return redirect($fullpath);
    }
	
	private function pdfhabeasdata($id, $save = false)
    {
		if(empty($id)){
			return null;
		}
		$o = $this->o_model::where(['uuid' => $id])->first();
		if(empty($o->id)){
			return null;
		}
		$o_habeas = Habeas::where(['id' => 1])->first();
		$o_company = Companies::where(['id' => Auth::user()->company])->first();
		$logo = !empty($o_company->logo_pp)?public_path($o_company->logo_pp):public_path('assets/images/favicon.png');
		$photo = !empty($o->photo_pp)?$o->photo_pp:public_path('assets/images/user.png');
		$signature = !empty($o->signature_pp)?$o->signature_pp:public_path('assets/images/firma.png');
		$data['o'] = $o;
		$data['logo'] = $logo;
		$data['photo'] = $photo;
		$data['signature'] = $signature;
		$data['company_name'] = $o_company->name;
		$data['habeasdatainfo'] = !empty($o_habeas->id)?nl2br($o_habeas->description):'';
		$full_name = $o->name.' '.$o->scd_name.' '.$o->lastname.' '.$o->scd_lastname;
		if($this->dateYears($o->birth)){
			$full_name = $o->name_attendant;
		}
		$data['full_name'] = $full_name;
		$pdf = PDF::loadView('pdf.habeas', $data);
		//retornamos el pdf
		if($save){
			//$pdfFilePath = './storage/app/public/'.$id.'.pdf';
			$pdfFilePath = 'app/public/uploads/h_'.$id.'.pdf';
			$pdf->save(storage_path($pdfFilePath));
			return $pdfFilePath;
		}
		return $pdf->stream('document.pdf');
		//return $pdf->getMpdf();
		//$pdf->showImageErrors = true;
		//$pdf->curlAllowUnsafeSslRequests = true;
		//return $pdf->stream('document.pdf');
		//$pdf = PDF::chunkLoadView('<html-separator/>', 'pdf.document', $data);
        //->save($pdfFilePath);
    }
	
	private function dateYears($date, $limit = 18){
		$date1 = $date;
		if(empty($date1)){
			$date1 = date('Y-m-d');
		}
		$date2 = date('Y-m-d');
		$diff = abs(strtotime($date2) - strtotime($date1));
		$years = floor($diff / (365*60*60*24));
		//$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
		//$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
		return $years < $limit;
	}
	
	//PDF
	public function pdfgallery($id, $save = false)
    {
		if(empty($id)){
			return redirect($this->r_name);
		}
		$o = $this->o_model::where(['uuid' => $id])->first();
		if(empty($o->id)){
			return redirect($this->r_name);
		}
		$o_company = Companies::where(['id' => Auth::user()->company])->first();
		$logo = !empty($o_company->logo_pp)?public_path($o_company->logo_pp):public_path('assets/images/favicon.png');
		$photo = !empty($o->photo_pp)?$o->photo_pp:public_path('assets/images/user.png');
		$data['o'] = $o;
		$data['logo'] = $logo;
		$data['photo'] = $photo;
		$data['company_name'] = $o_company->name;
		$full_name = $o->name.' '.$o->scd_name.' '.$o->lastname.' '.$o->scd_lastname;
		$data['full_name'] = $full_name;
		$data['o_gallerys'] = Photographic::where(['user' => $o->id,'status' => 'active'])->orderBy('id', 'DESC')->get();
		$pdf = PDF::loadView('pdf.gallery', $data);
		return $pdf->stream($id.'.pdf');
    }
}
