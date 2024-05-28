<?php

namespace App\Http\Controllers\Medical;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Appointments;
use App\Models\Companies;
use App\Models\Diary;
use App\Models\Locks;
use App\Models\User;
use App\Mail\Ntfs;

class DcitasController extends Controller
{
	private $tag_the = 'La';
    private $tag_o = 'a';
    private $r_name = 'dcitas';
    private $v_name = 'medical';
    private $c_name = 'Mis citas';
    private $c_names = 'Mis citas';
	private $list_tbl_fsc = ['name' => 'Nombre'];
	private $o_model = User::class;
	private $hc_view = 'dcitas';

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
        $this->middleware('checkRole:3');
    }

	public function index()
    {
		$data = $this->gdata();
		$o = Companies::where(['id' => Auth::user()->company])->first();
		$o_doctor = User::where(['id' => Auth::user()->id])->first();
		$o_diary = Diary::where(['user' => Auth::user()->id])->first();
		if(empty($o_diary->id)){
			$o_diary = Diary::create(['user' => Auth::user()->id,'company' => Auth::user()->company]);
		}
		//Buscamos los dias que trabaja
		$str_days = '';//
		for($i = 1;$i <= 7; $i++){
			$tag = 'day'.$i;
			if($o_diary->$tag == 'not'){
				$str_days .= !empty($str_days)?', '.$i:$i;
			}
		}
		if(!empty($str_days)){
			$str_days = 'hiddenDays: [ '.$str_days.' ],';
			$str_days = str_replace('7','0', $str_days);//hiddenDays: [ 6,0 ],
		}
		$locks_days = '';//
		//Agendas programadas
		$pts_all = Appointments::where(['doctor' => Auth::user()->id,'company' => Auth::user()->company])->whereDate('date_quote', '>=', date('Y-m-d'))->whereNotIn('status',['deleted'])->orderBy('id', 'asc')->get();
		if(count($pts_all) > 0){
			foreach($pts_all as $key => $row){
				//$url = ($row->modality == 'Teleconsulta')?",url: 'https://meet.jit.si/".$row->uuid."'":"";
				$url = ", url: '".url('dcitas/'.$row->uuid)."'";
				$locks_event = "{id: '".$row->uuid."'".$url.",start: '".$row->date_quote."T".$row->time_quote.":00',title: 'Cita ".$row->query_type."',display: 'auto',backgroundColor: '#79f392',color: '#79f392'}";//Event
				$locks_days .= !empty($locks_days)?', '.$locks_event:$locks_event;
			}
		}
		if(!empty($locks_days)){
			$locks_days = 'events: [ '.$locks_days.' ],';
		}

		$data['o'] = $o;
		$data['o_diary'] = $o_diary;
		$data['str_days'] = $str_days;
		$data['locks_days'] = $locks_days;
		return view($this->v_name.'.'.$this->hc_view.'.index',$data);
    }

	public function resend(Request $request,$id)
    {
		$o = Appointments::where(['uuid' => $id])->first();
		$o_user = User::where(['id' => $o->user])->first();
		Mail::to($o_user->email)->send(new Ntfs('Cita agendada','Hola '.$o_user->name.', su cita de '.$o->query_type.' ha sido agendada correctamente para el día '.$o->date_quote.' a la hora '.$o->time_quote.' en la modalidad '.$o->modality.', recuerde estar puntual y realizar el pago de forma precencial en el lugar de la cita.',$o_user->name,$o_user->email));
		$request->session()->flash('msj_success', 'La notificación ha sido re-enviada correctamente.');
		return redirect($this->hc_view);
    }

	public function show(Request $request, $id)
    {
		$o = Appointments::where(['uuid' => $id])->first();
		$o_user = User::where(['id' => $o->user])->first();
		$o_doctor = User::where(['id' => $o->doctor])->first();
		$url = '';
		//$today = date('Y-m-d');
		//if($o->modality == 'Teleconsulta' AND $o->date_quote == $today){
		if($o->modality == 'Teleconsulta'){
			$url = '<a href="https://meet.jit.si/'.$o->uuid.'" target="_blank" class="button is-primary is-raised">Iniciar</a>';
		}
		$resend = '<a href="'.url('dcitas/resend/'.$o->uuid).'" class="button is-info is-raised">Re-enviar</a>';
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
		$out .= '<div class="flex-meta"><span>'.$dfull_name.'</span><span>Doctor(a)</span></div></div></div><div class="right">'.$resend.'</div></div>';
		echo $out;
    }
}
