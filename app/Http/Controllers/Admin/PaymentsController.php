<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payments;

class PaymentsController extends Controller
{
	private $tag_the = 'El';
    private $tag_o = 'o';
    private $r_name = 'admin/payments';
    private $v_name = 'admin.payments';
    private $c_name = 'Pago';
    private $c_names = 'Pagos';
	private $list_tbl_fsc = ['invoice' => 'Factura','amount' => 'Monto','type_pay' => 'Tipo','franchise' => 'Metodo','date_init' => 'Fecha','expiration' => 'Expira'];
	private $o_model = Payments::class;
	
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
		$data['o_all'] = $this->o_model::whereNotIn('status',['deleted'])->orderBy('id', 'asc')->get();
		return view($this->v_name.'.index',$data);
    }
}
