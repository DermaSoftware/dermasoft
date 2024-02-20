<?php

namespace App\Http\Controllers\Patients;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Photographic;
use App\Models\Companies;
use App\Models\User;
use PDF;

class AlbumController extends Controller
{
	private $tag_the = 'El';
    private $tag_o = 'o';
    private $r_name = 'album';
    private $v_name = 'patients';
    private $c_name = 'Registro fotográfico';
    private $c_names = 'Registro fotográfico';
	private $list_tbl_fsc = ['name' => 'Nombre'];
	private $o_model = User::class;
	private $hc_view = 'album';
	
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
		$data['o_gallerys'] = Photographic::where(['user' => Auth::user()->id,'status' => 'active'])->orderBy('id', 'DESC')->get();
		return view($this->v_name.'.'.$this->hc_view.'.index',$data);
    }
	
	//PDF
	public function hcpdf()
    {
		$o = $this->o_model::where(['id' => Auth::user()->id])->first();
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
		return $pdf->stream($o->uuid.'.pdf');
    }
}
