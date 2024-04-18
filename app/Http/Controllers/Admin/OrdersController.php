<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Companies;
use Illuminate\Support\Facades\Mail;
use App\Mail\Ntfs;

class OrdersController extends Controller
{
	private $tag_the = 'El';
    private $tag_o = 'o';
    private $r_name = 'admin/orders';
    private $v_name = 'admin.orders';
    private $c_name = 'Orden de pago';
    private $c_names = 'Ordenes de pagos';
	private $list_tbl_fsc = ['plan' => 'Plan','company' => 'Empresa','amount' => 'Monto'];
	private $o_model = Orders::class;
	
	private function gdata($t = 'Lista de')
    {
        $data['menu'] = $this->r_name;
        $data['tag_o'] = $this->tag_o;
        $data['tag_the'] = $this->tag_the;
        $data['c_name'] = $this->c_name;
        $data['c_names'] = $this->c_names;
        $data['list_tbl_fsc'] = $this->list_tbl_fsc;
        $data['title'] = $t.' '.$this->c_names;
		return $data;
    }

	public function __construct(){
        $this->middleware('checkRole:1');
    }

    public function index()
    {
        $data = $this->gdata();
		$data['o_all'] = $this->o_model::orderBy('id', 'asc')->get();
		return view($this->v_name.'.index',$data);
    }
	
	public function show($id)
    {
        if(empty($id)){
			return redirect($this->r_name);
		}
		$tag = is_numeric($id)?'id':'uuid';
		$o = $this->o_model::where([$tag => $id])->first();
		if(empty($o->id)){
			return redirect($this->r_name);
		}
		//Companies
		$o_comp = Companies::where(['id' => $o->company])->first();
		$url = url('payext/'.$o->uuid);
		$link = '<br><a target="_blank" href="'.$url.'">'.$url.'</a>';
		Mail::to($o_comp->email)->send(new Ntfs('Nueva orden de pago','Un gusto informarle que usted tiene una orden de pago pendiente, para proceder al pago de la membresía ingrese en el siguiente enlace: '.$link,$o_comp->legal_representative,$o_comp->email));
		request()->session()->flash('msj_success', 'El correo ha sido re-enviado correctamente.');
		return redirect($this->r_name);
    }
}
