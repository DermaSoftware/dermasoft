<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    private $tag_the = 'El';
    private $tag_o = 'o';
    private $r_name = 'payments';
    private $c_name = 'Pago';
    private $c_names = 'Pagos';
	private $list_tbl_fsc = ['booking_id' => 'Reserva','user_id' => 'Cliente','amount' => 'Monto','status' => 'Estado','created_at' => 'Fecha'];
	private $o_model = Payments::class;

	public function __construct(){
        $this->middleware('checkRole:menu_'.$this->r_name, ['only' => ['index','o_table']]);
    }

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['menu'] = $this->r_name;
        $data['tag_o'] = $this->tag_o;
        $data['tag_the'] = $this->tag_the;
        $data['c_name'] = $this->c_name;
        $data['c_names'] = $this->c_names;
        $data['list_tbl_fsc'] = $this->list_tbl_fsc;
        $data['title'] = 'Lista de '.$this->c_names;
		return view($this->r_name.'.index',$data);
    }

	public function o_table()
    {
		$omp_fsc = $this->getPermissions();
		$ax = [];
		$where = ['status' => 'active'];
		$o_all = $this->o_model::whereNotIn('status',['deleted'])->orderBy('id', 'asc')->get();
		if($o_all->count() > 0){
			foreach($o_all as $key => $row){
				$nk = $key + 1;
				$item = [$nk];
				foreach($this->list_tbl_fsc as $thkey => $value){
					$valor = $row->$thkey;
                    if($thkey == 'user_id'){
						$valor = $row->getUser();
					} else if($thkey == 'booking_id'){
						$valor = $row->getBooking();
					} else if($thkey == 'created_at'){
						$valor = $row->getCreatedAt();
					}
					array_push($item,$valor);
				}
				array_push($ax,$item);
			}
		}
		echo json_encode(['data' => $ax],true);
    }
}
