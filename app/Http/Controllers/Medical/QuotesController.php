<?php

namespace App\Http\Controllers\Medical;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Companies;
use App\Models\Quotes;
use App\Models\Products;
use App\Models\Services;
use App\Models\Quotesproducts;
use App\Models\Quotesservices;
use PDF;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\Ntfs;
use App\Mail\QuotesMail;

class QuotesController extends Controller
{
	private $tag_the = 'La';
    private $tag_o = 'a';
    private $r_name = 'invoices';
    private $v_name = 'medical';
    private $c_name = 'Cotización';
    private $c_names = 'Cotizaciones';
	private $list_tbl_fsc = ['name' => 'Nombre'];
	private $o_model = User::class;
	private $hc_view = 'quotes';
	
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
		
		$data['o_pds'] = Products::with(['category'])->where(['company' => Auth::user()->company,'status' => 'active'])->orderBy('id', 'asc')->get();
		$data['o_svs'] = Services::with(['category'])->where(['company' => Auth::user()->company,'status' => 'active'])->orderBy('id', 'asc')->get();
		//Historial
		$t = Quotes::where(['user' => $o->id])->count();
		$is_records = !empty($t)?$t > 0:false;
		$data['t_records'] = $t;
		$data['is_records'] = $is_records;
		return view($this->v_name.'.'.$this->hc_view.'.index',$data);
    }
	
	public function edit($id)
    {
        if(empty($id)){
			return redirect($this->r_name);
		}
		$o_fac = Quotes::where(['uuid' => $id])->first();
		if(empty($o_fac->id)){
			return redirect($this->r_name);
		}
		$o = $this->o_model::where(['id' => $o_fac->user])->first();
		if(empty($o->id)){
			return redirect($this->r_name);
		}
		$data = $this->gdata();
        $data['o'] = $o;
        $data['o_fac'] = $o_fac;
		
		$data['o_pds'] = Products::with(['category'])->where(['company' => Auth::user()->company,'status' => 'active'])->orderBy('id', 'asc')->get();
		$data['o_svs'] = Services::with(['category'])->where(['company' => Auth::user()->company,'status' => 'active'])->orderBy('id', 'asc')->get();
		
		$data['all_items'] = Quotesproducts::where(['quote' => $o_fac->id])->orderBy('id', 'asc')->get();//Items
		$data['all_servs'] = Quotesservices::where(['quote' => $o_fac->id])->orderBy('id', 'asc')->get();//Items
		
		return view($this->v_name.'.'.$this->hc_view.'.edit',$data);
    }
	
	public function delprods($id)
    {
        if(empty($id)){
			return redirect($this->r_name);
		}
		$o = Quotesproducts::where(['uuid' => $id])->first();
		if(empty($o->id)){
			return false;
		}
		$o_fac = Quotes::where(['id' => $o->quote])->first();
		$amount = $o_fac->amount - $o->total;
		$o_fac->update(['amount' => $amount]);
		Quotesproducts::destroy($o->id);
		echo $amount;
    }
	public function delservs($id)
    {
        if(empty($id)){
			return redirect($this->r_name);
		}
		$o = Quotesservices::where(['uuid' => $id])->first();
		if(empty($o->id)){
			return false;
		}
		$o_fac = Quotes::where(['id' => $o->quote])->first();
		$amount = $o_fac->amount - $o->total;
		$o_fac->update(['amount' => $amount]);
		Quotesservices::destroy($o->id);
		echo $amount;
    }
	
	public function update(Request $request, $id)
    {
        $data = request()->except(['_token','_method']);
		if(empty($id)){
			return redirect($this->r_name);
		}
		$o = Quotes::where(['uuid' => $id])->first();
		if(empty($o->id)){
			return redirect($this->r_name);
		}
		$ox = $this->o_model::where(['id' => $o->user])->first();
		if(empty($ox->id)){
			return redirect($this->r_name);
		}
		$amount = $o->amount;
		
		//Guardamos las Solicitudes de examenes
		//PRODSITEM
		if(!empty($data['product'])){
			foreach($data['product'] as $key => $row){
				$aux_params = ['quote' => $o->id];
				$o_item = Products::where(['uuid' => $row])->first();
				$aux_params['product'] = $o_item->id;//
				$aux_params['amount'] = !empty($data['pamount'][$key])?$data['pamount'][$key]:'';//
				$aux_params['price'] = $o_item->price;//
				$total = $o_item->price*$aux_params['amount'];
				$aux_params['total'] = $total;//
				$amount += $total;
				$o_x = Quotesproducts::create($aux_params);
			}
		}
		//QUOTESSERVICES
		if(!empty($data['service'])){
			foreach($data['service'] as $key => $row){
				$aux_params = ['quote' => $o->id];
				$o_item = Services::where(['uuid' => $row])->first();
				$aux_params['service'] = $o_item->id;//
				$aux_params['amount'] = !empty($data['samount'][$key])?$data['samount'][$key]:'';//
				$aux_params['price'] = $o_item->price;//
				$total = $o_item->price*$aux_params['amount'];
				$aux_params['total'] = $total;//
				$amount += $total;
				$o_x = Quotesservices::create($aux_params);
			}
		}
		$o->update(['amount' => $amount]);
		$pdfFilePath = $this->getpdfhc($o->uuid,true);
		$pdfFilePath = storage_path($pdfFilePath);
		$path = Storage::disk('public')->putFile('temp', new File($pdfFilePath), 'public');
		$pdfFilePathTemp = './storage/app/public/uploads/fac_'.$id.'.pdf';
		Storage::delete($pdfFilePathTemp);
		unlink($pdfFilePath);
		$attach_file = storage_path('app/public/' . $path);
		$fullpath = asset('storage/'.$path);
		$o->update(['path_pdf' => $fullpath]);
		//notificamos al correo
		if(!empty($data['notification_email']) AND $data['notification_email'] == 'yes'){
			$full_name = $ox->name.' '.$ox->scd_name.' '.$ox->lastname.' '.$ox->scd_lastname;
			Mail::to($ox->email)->send(new QuotesMail($full_name,$attach_file));
		}
		//notificamos al whatsapp
		if(!empty($data['notification_whatsapp']) AND $data['notification_whatsapp'] == 'yes'){
			
		}
		$request->session()->flash('msj_success', 'La '.$this->c_name.' ha sido guardada correctamente.');
		return redirect($this->hc_view.'/list/'.$ox->uuid);
    }
	
	public function getitem(Request $request)
    {
        $data = request()->except(['_token','_method']);
		$model = $data['xtype']=='product'?Products::class:Services::class;
		$tag_name = $data['xtype']=='product'?'pamount':'samount';
		$o = $model::where(['uuid' => $data['id']])->first();
		$out = '';
		if(!empty($o->id)){
			$out .= '<tr data-trid="'.$o->uuid.'">';
			$out .= '<td>'.$o->code.'</td>';
			$out .= '<td><input name="'.$data['xtype'].'[]" value="'.$o->uuid.'" type="hidden">'.$o->name.'</td>';
			$out .= '<td>'.$o->price.'</td>';
			$out .= '<td><input name="'.$tag_name.'[]" value="1" type="number" class="input amount_xps" data-truid="'.$o->uuid.'" data-price="'.$o->price.'"></td>';
			$out .= '<td class="total_td">'.$o->price.'</td>';
			$out .= '<td class="is-end"><div class="dark-inverted"><button data-id="" type="button" class="button is-danger is-circle is-elevated btn_trash_ppd_sv"><span class="icon is-small"><i data-feather="trash-2"></i></span></button></div></td>';
			$out .= '</tr>';
		}
		echo $out;
    }
	
	public function store(Request $request, $id)
    {
        $data = request()->except(['_token','_method']);
		/*$validatedData = $request->validate([
			'product' => 'required',
		],[
			'product.required' => 'El Doctor es requerido',
		]);*/
		if(empty($id)){
			return redirect($this->r_name);
		}
		$ox = $this->o_model::where(['uuid' => $id])->first();
		if(empty($ox->id)){
			return redirect($this->r_name);
		}
		//echo var_dump($data);exit();
		//Creamos el PRODS
		$params = [];
		$params['user'] = $ox->id;
		$params['company'] = $ox->company;
		$params['campus'] = $ox->campus;
		$params['doctor'] = Auth::user()->id;
		$params['amount'] = 0;
		$amount = 0;
		//path_pdf
		$o = Quotes::create($params);
		
		//Guardamos las Solicitudes de examenes
		//PRODSITEM
		if(!empty($data['product'])){
			foreach($data['product'] as $key => $row){
				$aux_params = ['quote' => $o->id];
				$o_item = Products::where(['uuid' => $row])->first();
				$aux_params['product'] = $o_item->id;//
				$aux_params['amount'] = !empty($data['pamount'][$key])?$data['pamount'][$key]:'';//
				$aux_params['price'] = $o_item->price;//
				$total = $o_item->price*$aux_params['amount'];
				$aux_params['total'] = $total;//
				$amount += $total;
				$o_x = Quotesproducts::create($aux_params);
			}
		}
		//QUOTESSERVICES
		if(!empty($data['service'])){
			foreach($data['service'] as $key => $row){
				$aux_params = ['quote' => $o->id];
				$o_item = Services::where(['uuid' => $row])->first();
				$aux_params['service'] = $o_item->id;//
				$aux_params['amount'] = !empty($data['samount'][$key])?$data['samount'][$key]:'';//
				$aux_params['price'] = $o_item->price;//
				$total = $o_item->price*$aux_params['amount'];
				$aux_params['total'] = $total;//
				$amount += $total;
				$o_x = Quotesservices::create($aux_params);
			}
		}
		$o->update(['amount' => $amount]);
		
		$pdfFilePath = $this->getpdfhc($o->uuid,true);
		$pdfFilePath = storage_path($pdfFilePath);
		$path = Storage::disk('public')->putFile('temp', new File($pdfFilePath), 'public');
		$pdfFilePathTemp = './storage/app/public/uploads/fac_'.$id.'.pdf';
		Storage::delete($pdfFilePathTemp);
		unlink($pdfFilePath);
		$attach_file = storage_path('app/public/' . $path);
		$fullpath = asset('storage/'.$path);
		$o->update(['path_pdf' => $fullpath]);
		
		//notificamos al correo
		if(!empty($data['notification_email']) AND $data['notification_email'] == 'yes'){
			$full_name = $ox->name.' '.$ox->scd_name.' '.$ox->lastname.' '.$ox->scd_lastname;
			Mail::to($ox->email)->send(new QuotesMail($full_name,$attach_file));
		}
		//notificamos al whatsapp
		if(!empty($data['notification_whatsapp']) AND $data['notification_whatsapp'] == 'yes'){
			
		}
		$request->session()->flash('msj_success', 'La '.$this->c_name.' ha sido registrada correctamente.');
		return redirect($this->hc_view.'/list/'.$id);
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
			return redirect($this->hc_view.'/'.$o->uuid);
		}
		$request->session()->flash('msj_error', 'No se han encontrado resultados');
		return redirect($this->hc_view);
    }
	
	
	//PDF
	public function hcpdf($id)
    {
        if(empty($id)){
			return redirect($this->r_name);
		}
		$o_obj_item = Quotes::where(['uuid' => $id])->first();
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
		$o_obj_item = Quotes::where(['uuid' => $id])->first();
		if(empty($o_obj_item->id)){
			return null;
		}
		$o = $this->o_model::where(['id' => $o_obj_item->user])->first();
		$o_doctor = $this->o_model::where(['id' => $o_obj_item->doctor])->first();
		$o_company = Companies::where(['id' => $o_obj_item->company])->first();
		$logo = !empty($o_company->logo_pp)?public_path($o_company->logo_pp):public_path('assets/images/favicon.png');
		$photo = !empty($o->photo_pp)?$o->photo_pp:public_path('assets/images/user.png');
		$signature = !empty($o_doctor->signature_pp)?$o_doctor->signature_pp:public_path('assets/images/firma.png');
		$all_items = Quotesproducts::where(['quote' => $o_obj_item->id])->orderBy('id', 'asc')->get();//Items
		$all_servs = Quotesservices::where(['quote' => $o_obj_item->id])->orderBy('id', 'asc')->get();//Items
		
		$data['o'] = $o;
		$data['o_obj_item'] = $o_obj_item;
		$data['all_items'] = $all_items;
		$data['all_servs'] = $all_servs;
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
			$pdfFilePath = 'app/public/uploads/fac_'.$id.'.pdf';
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
		$data['o_all'] = Quotes::where(['user' => $o->id])->orderBy('id', 'asc')->get();
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
		$derm_all = Quotes::where(['user' => $o->id])->orderBy('id', 'asc')->get();
		foreach($derm_all as $key => $o_obj_item){
			$o_doctor = $this->o_model::where(['id' => $o_obj_item->doctor])->first();
			$dfull_name = $o_doctor->name.' '.$o_doctor->scd_name.' '.$o_doctor->lastname.' '.$o_doctor->scd_lastname;
			$signature = !empty($o_doctor->signature_pp)?$o_doctor->signature_pp:public_path('assets/images/firma.png');
			$all_items = Quotesproducts::where(['quote' => $o_obj_item->id])->orderBy('id', 'asc')->get();//Items
			$all_servs = Quotesservices::where(['quote' => $o_obj_item->id])->orderBy('id', 'asc')->get();//Items
			array_push($arr, ['o_obj_item' => $o_obj_item,'all_items' => $all_items,'all_servs' => $all_servs,'o_doctor' => $o_doctor,'dfull_name' => $dfull_name,'signature' => $signature]);
		}
		$data['arr'] = $arr;
		$pdf = PDF::loadView('pdf.'.$this->hc_view.'all', $data);
		return $pdf->stream('document.pdf');
		exit();
    }
}
