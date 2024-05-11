<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Appointments;
use App\Models\Companies;
use App\Models\Locks;
use App\Models\User;

class PcitasController extends Controller
{
	private $tag_the = 'La';
    private $tag_o = 'a';
    private $r_name = 'citas';
    private $v_name = 'patients';
    private $c_name = 'Mis citas';
    private $c_names = 'Mis citas';
	private $list_tbl_fsc = ['name' => 'Nombre'];
	private $o_model = User::class;
	private $hc_view = 'citas';

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

	public function index()
    {
		$data = $this->gdata();
		$o = Companies::where(['id' => Auth::user()->company])->first();
		$str_days = '';//
		$locks_days = '';//
		//Agendas programadas
		$pts_all = Appointments::where(['user' => Auth::user()->id,'company' => Auth::user()->company])
            ->whereDate('date_quote', '>=', date('Y-m-d'))
            ->whereNotIn('status',['deleted'])->orderBy('id', 'asc')->get();
		if(count($pts_all) > 0){
			foreach($pts_all as $key => $row){
				$url = ", url: '".url('citas/'.$row->uuid)."'";
				$locks_event = "{id: '".$row->uuid."'".$url.",start: '".$row->date_quote."T".$row->time_quote.":00',title: 'Cita ".$row->query_type."',display: 'auto',backgroundColor: '#79f392',color: '#79f392'}";//Event
				$locks_days .= !empty($locks_days)?', '.$locks_event:$locks_event;
			}
		}
		if(!empty($locks_days)){
			$locks_days = 'events: [ '.$locks_days.' ],';
		}
		$data['o'] = $o;
		$data['str_days'] = $str_days;
		$data['locks_days'] = $locks_days;
		return view($this->v_name.'.'.$this->hc_view.'.index',$data);
    }

	public function show(Request $request, $id)
    {
		$o = Appointments::where(['uuid' => $id])->first();
		$o_user = User::where(['id' => $o->user])->first();
		$o_doctor = User::where(['id' => $o->doctor])->first();
		$url = '';
		$today = date('Y-m-d');
		if($o->modality == 'Teleconsulta' AND $o->date_quote == $today){
			$url = '<a href="https://meet.jit.si/'.$o->uuid.'" target="_blank" class="button is-primary is-raised">Iniciar</a>';
		}
		$pfull_name = $o_user->name.' '.$o_user->scd_name.' '.$o_user->lastname.' '.$o_user->scd_lastname;
		$dfull_name = $o_doctor->name.' '.$o_doctor->scd_name.' '.$o_doctor->lastname.' '.$o_doctor->scd_lastname;
		$photo = !empty($o->photo)?$o->photo:asset('assets/images/user.png');
		$img = '<img class="avatar" src="'.$photo.'" data-demo-src="'.$photo.'" alt="" data-user-popover="17">';
		$out = '<div class="card-head">';
		$out .= '<div class="left"><div class="tags"><span class="tag is-rounded is-solid">'.$o->query_type.'</span><span class="tag is-rounded is-success">'.$o->modality.'</span><span class="tag is-rounded is-solid">Costo: '.$o->amount.'</span></div></div>';
		$out .= '<div class="right">'.$url.'</div>';
		$out .= '</div>';
		$out .= '<div class="card-body"><p>Cita del paciente <b>'.$pfull_name.'</b> para el día <b>'.$o->date_quote.'</b> a la hora <b>'.$o->time_quote.'</b></p></div>';
		$out .= '<div class="card-foot"><div class="left">';
		$out .= '<div class="media-flex-center no-margin">';
		$out .= '<div class="h-avatar">'.$img.'</div>';
		$out .= '<div class="flex-meta"><span>'.$dfull_name.'</span><span>Doctor(a)</span></div></div></div><div class="right"></div></div>';
		echo $out;
    }
}
