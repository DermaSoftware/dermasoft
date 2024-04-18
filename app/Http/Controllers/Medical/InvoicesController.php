<?php

namespace App\Http\Controllers\Medical;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Companies;
use App\Models\Quotes;
use App\Models\Quotesproducts;
use App\Models\Quotesservices;
use PDF;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class InvoicesController extends Controller
{
	private $tag_the = 'La';
    private $tag_o = 'a';
    private $r_name = 'invoices';
    private $v_name = 'medical';
    private $c_name = 'Cotización';
    private $c_names = 'Cotizaciones';
	private $list_tbl_fsc = ['name' => 'Nombre'];
	private $o_model = User::class;
	private $hc_view = 'invoices';
	
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
	
	public function index()
    {
		$data = $this->gdata();
		$data['o_all'] = Quotes::where(['status' => 'active'])->orderBy('id', 'asc')->get();
		return view($this->v_name.'.'.$this->hc_view.'.index',$data);
    }
	public function facend($id)
    {
        if(empty($id)){
			return redirect($this->r_name);
		}
		$o = Quotes::where(['uuid' => $id])->first();
		if(empty($o->id)){
			return redirect($this->hc_view);
		}
		$o->update(['state' => 'FACTURA']);
		request()->session()->flash('msj_success', 'La factura ha sido aprobada correctamente.');
		return redirect($this->hc_view);
    }
	//PDF
	public function facpdf($id)
    {
        if(empty($id)){
			return redirect($this->r_name);
		}
		$o_obj_item = Quotes::where(['uuid' => $id])->first();
		if(empty($o_obj_item->id)){
			return redirect($this->r_name);
		}
		$pdfFilePath = $this->getpdfhc($id);
    }
	private function getpdfhc($id)
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
		$pdf = PDF::loadView('pdf.quotes', $data);
		return $pdf->stream('document.pdf');
		exit();
    }
}
