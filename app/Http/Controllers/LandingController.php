<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Appointments;
use App\Models\Querytypes;//company,code,name,price
use App\Models\Solicitude;
use App\Models\Companies;
use App\Models\Sliders;
use App\Models\Diaryqt;
use App\Models\Diary;
use App\Models\Locks;
use App\Models\User;
use App\Mail\Ntfs;

class LandingController extends Controller
{
	private $tag_the = 'El';
    private $tag_o = 'o';
    private $r_name = 'landing';
    private $v_name = 'landing';
    private $c_name = 'Pagina de inicio';
    private $c_names = 'Pagina de inicio';
	private $list_tbl_fsc = ['name' => 'Nombre'];
	private $o_model = User::class;
	
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
    }

    public function index($id)
    {
        if(empty($id)){
			return redirect('/');
		}
		$data = $this->gdata();
		$o = Companies::where(['cms' => $id])->first();
		if(empty($o->id)){
			return redirect('/');
		}
		$data['o'] = $o;
		$logo = !empty($o->logo)?$o->logo:asset('assets/images/favicon.png');
		$data['logo'] = $logo;
		$data['company_name'] = $o->name;
		//landing
		$data['sliders_all'] = Sliders::where(['company' => $o->id])->whereNotIn('status',['deleted'])->orderBy('id', 'asc')->get();
		return view($this->v_name,$data);
    }
	//-----------------------------------------------------------------------------------
	//-----------------------------------------------------------------------------------
	//-----------------------------------------------------------------------------------
	//Aqui hacer la programacion
	//1 - Buscar paciente
	//2 - Seleccionar tipo de consulta (Querytypes)
	//3 - Buscar medicos disponibles
	//4 - Seleccionar medico
	//5 - Ajustar calendario para el medico seleccionado
    public function schedule($id)
    {
        if(empty($id)){
			return redirect('/');
		}
		$data = $this->gdata();
		$o = Companies::where(['cms' => $id])->first();
		if(empty($o->id)){
			return redirect('/');
		}
		$data['o'] = $o;
		$logo = !empty($o->logo)?$o->logo:asset('assets/images/favicon.png');
		$data['logo'] = $logo;
		$data['company_name'] = $o->name;
		$data['str_days'] = '';
		$data['locks_days'] = '';
		return view('agendar.schedule',$data);
    }
    //1 - Buscar paciente
	public function search(Request $request, $id)
    {
        if(empty($id)){
			return redirect('/');
		}
		$o = Companies::where(['uuid' => $id])->first();
		if(empty($o->id)){
			return redirect('/');
		}
		$data = request()->except(['_token','_method']);
		$validatedData = $request->validate([
			'document_type' => 'required',
			'document_number' => 'required',
		],[
			'document_type.required' => 'El tipo de documento es requerido',
			'document_number.required' => 'El Número de documento es requerido',
		]);
		$data['company'] = $o->id;//Validamos que el paciente sea de la empresa actual
		$o_user = User::where($data)->first();
		if(!empty($o_user->id)){
			//Creamos la pre-solicitud
			$params = ['user' => $o_user->id,'company' => $o->id];
			$o_x = Solicitude::create($params);
			return redirect('solicitude/'.$o_x->uuid);
		}
		$request->session()->flash('msj_error', 'No se han encontrado resultados');
		return redirect('schedule/'.$o->cms);
    }
	//2 - Seleccionar tipo de consulta (Querytypes)
	public function solicitude($id)
    {
        if(empty($id)){
			return redirect('/');
		}
		$o_sol = Solicitude::where(['uuid' => $id])->first();
		if(empty($o_sol->id)){
			return redirect('/');
		}
		$data = $this->gdata();
		$o = Companies::where(['id' => $o_sol->company])->first();
		$o_user = User::where(['id' => $o_sol->user])->first();
		$data['o_sol'] = $o_sol;
		$data['o'] = $o;
		$data['o_user'] = $o_user;
		$logo = !empty($o->logo)?$o->logo:asset('assets/images/favicon.png');
		$data['logo'] = $logo;
		$data['str_days'] = '';
		$data['locks_days'] = '';
		$data['o_all'] = Querytypes::where(['company' => $o_sol->company])->whereNotIn('status',['deleted'])->orderBy('id', 'asc')->get();
		return view('agendar.solicitude',$data);
    }
	//3 - Buscar medicos disponibles
	//4 - Seleccionar medico
	public function doctors($id)
    {
        if(empty($id)){
			return redirect('/');
		}
		$o_sol = Solicitude::where(['uuid' => $id])->first();
		if(empty($o_sol->id)){
			return redirect('/');
		}
		$data = $this->gdata();
		$o = Companies::where(['id' => $o_sol->company])->first();
		$o_user = User::where(['id' => $o_sol->user])->first();
		$data['o_sol'] = $o_sol;
		$data['o'] = $o;
		$data['o_user'] = $o_user;
		$logo = !empty($o->logo)?$o->logo:asset('assets/images/favicon.png');
		$data['logo'] = $logo;
		$data['str_days'] = '';
		$data['locks_days'] = '';
		$data['o_all'] = User::where(['role' => 3,'company' => $o_sol->company])->whereNotIn('status',['deleted'])->orderBy('id', 'asc')->get();
		//$data['o_ids'] = Diaryqt::where('diary_id', $o->id)->pluck('qt_id')->toArray();
		//tenemos que hacer filtro de los mmedicos que tengan disponibles los tipos de consulta seleccionado
		return view('agendar.doctors',$data);
    }
	//5 - Ajustar calendario para el medico seleccionado
	//6 - Seleccionar fechas y agregar nota
	public function clndrsh($id)
    {
        if(empty($id)){
			return redirect('/');
		}
		$o_sol = Solicitude::where(['uuid' => $id])->first();
		if(empty($o_sol->id)){
			return redirect('/');
		}
		$data = $this->gdata();
		$o = Companies::where(['id' => $o_sol->company])->first();
		$o_user = User::where(['id' => $o_sol->user])->first();
		$o_doctor = User::where(['id' => $o_sol->doctor])->first();
		$o_diary = Diary::where(['user' => $o_doctor->id])->first();
		if(empty($o_diary->id)){
			$o_diary = Diary::create(['user' => $o_doctor->id,'company' => $o->id]);
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
		//Bloqueos de agenda
		$locks_all = Locks::where(['user' => $o_doctor->id,'company' => $o->id])->whereDate('date_end', '>=', date('Y-m-d'))->whereNotIn('status',['deleted'])->orderBy('id', 'asc')->get();
		$locks_days = '';//
		if(count($locks_all) > 0){
			foreach($locks_all as $key => $row){
				$locks_event = "{id: '".$row->uuid."',start: '".$row->date_init."T".$row->time_init.":00', end: '".$row->date_end."T".$row->time_end.":00',overlap: false,title: 'Agenda bloqueada',display: 'auto',backgroundColor: '#ffb3a1',color: '#ffb3a1'}";//Event
				$locks_days .= !empty($locks_days)?', '.$locks_event:$locks_event;
			}
		}
		//Agendas programadas
		$pts_all = Appointments::where(['doctor' => $o_doctor->id,'company' => $o->id])->whereDate('date_quote', '>=', date('Y-m-d'))->whereNotIn('status',['deleted'])->orderBy('id', 'asc')->get();
		if(count($pts_all) > 0){
			foreach($pts_all as $key => $row){
				$locks_event = "{id: '".$row->uuid."',start: '".$row->date_quote."T".$row->time_quote.":00', end: '".$row->date_quote."T".$row->time_quote.":00',overlap: false,title: 'Cita ".$row->query_type."',display: 'auto',backgroundColor: '#79f392',color: '#79f392'}";//Event
				$locks_days .= !empty($locks_days)?', '.$locks_event:$locks_event;
			}
			
		}
		if(!empty($locks_days)){
			$locks_days = 'events: [ '.$locks_days.' ],';
		}
		
		$data['o_sol'] = $o_sol;
		$data['o'] = $o;
		$data['o_user'] = $o_user;
		$data['o_diary'] = $o_diary;
		$data['str_days'] = $str_days;
		$data['locks_days'] = $locks_days;
		$logo = !empty($o->logo)?$o->logo:asset('assets/images/favicon.png');
		$data['logo'] = $logo;
		return view('agendar.calendar',$data);
    }
	//7 - Pagar
	public function paymentsh($id)
    {
        if(empty($id)){
			return redirect('/');
		}
		$o_sol = Solicitude::where(['uuid' => $id])->first();
		if(empty($o_sol->id)){
			return redirect('/');
		}
		$data = $this->gdata();
		$o = Companies::where(['id' => $o_sol->company])->first();
		$o_user = User::where(['id' => $o_sol->user])->first();
		$o_qt = Querytypes::where(['id' => $o_sol->qt_id])->first();
		$data['o_sol'] = $o_sol;
		$data['o'] = $o;
		$data['o_user'] = $o_user;
		$data['o_qt'] = $o_qt;
		$logo = !empty($o->logo)?$o->logo:asset('assets/images/favicon.png');
		$data['logo'] = $logo;
		return view('agendar.paymentsh',$data);
    }
	//7 - Pagar
	public function finalized()
    {
		$data = $this->gdata();
		return view('agendar.finalized',$data);
    }
	//
	public function svsolicitude(Request $request, $id)
    {
        if(empty($id)){
			return redirect('/');
		}
		$o = Solicitude::where(['uuid' => $id])->first();
		if(empty($o->id)){
			return redirect('/');
		}
		$data = request()->except(['_token','_method']);
		$validatedData = $request->validate([
			'action_type' => 'required',
			'action_value' => 'required',
		],[
			'action_type.required' => 'El tipo de documento es requerido',
			'action_value.required' => 'El valor es requerido',
		]);
		
		$params = [$data['action_type'] => $data['action_value']];
		if($data['action_type'] == 'qt_id'){
			$o_qt = Querytypes::where(['id' => $data['action_value']])->first();
			$params['query_type'] = !empty($o_qt->id)?$o_qt->name:'';
		} else if($data['action_type'] == 'date_quote'){
			//$params['campus'] = $data['campus'];
			$params['time_quote'] = $data['time_quote'];
			$params['note'] = $data['note'];
			$params['modality'] = $data['modality'];//Presencial,Teleconsulta,Domiciliaria
		}
		$o->update($params);
		if($data['action_type'] == 'qt_id'){
			return redirect('doctors/'.$id);
		} else if($data['action_type'] == 'doctor'){
			return redirect('clndrsh/'.$id);
		} else if($data['action_type'] == 'date_quote'){
			if($data['modality'] == 'Teleconsulta'){
				$o->update(['status' => 'pending']);
				return redirect('paymentsh/'.$id);//modality
			} else {
				//crear cita en estado pendiente de pago
				//cambiamos estado de solicitud
				$o_qt = Querytypes::where(['id' => $o->qt_id])->first();
				$o->update(['status' => 'finalized']);
				//creamos la cita
				$data_apt = [
					'modality' => $o->modality,
					'user' => $o->user,
					'company' => $o->company,
					'campus' => $o->campus,
					'qt_id' => $o->qt_id,
					'query_type' => $o->query_type,
					'doctor' => $o->doctor,
					'date_quote' => $o->date_quote,
					'time_quote' => $o->time_quote,
					'note' => $o->note,
					'invoice' => uniqid(),
					'amount' => $o_qt->price,
					'currency' => 'COP',
					'response' => 'Pendiente',
					'franchise' => 'Efectivo',
					'date_init' => date('Y-m-d'),
				];
				$o_apt = Appointments::create($data_apt);
				//notificamos
				$o_user = User::where(['id' => $o->user])->first();
				Mail::to($o_user->email)->send(new Ntfs('Cita agendada','Hola '.$o_user->name.', su cita de '.$o->query_type.' ha sido agendada correctamente para el día '.$o->date_quote.' a la hora '.$o->time_quote.' en la modalidad '.$o->modality.', recuerde estar puntual y realizar el pago de forma precencial en el lugar de la cita.',$o_user->name,$o_user->email));
			}
			return redirect('finalized');//finalized
		}
		return redirect('/');
    }
	
	public function pyresp()
    {
		$data['title'] = 'Pago de membresía';
		return view('agendar.pyresp',$data);
    }
	
	public function pyconn()
    {
		$uuid = $_POST['extra1'];//SOLICITUD
		$o = Solicitude::where(['uuid' => $uuid])->first();
		if(!empty($o->id) AND $o->status == 'pending'){
			//cambiamos estado de solicitud
			$o->update(['status' => 'finalized']);
			//creamos la cita
			$data_apt = [
				'modality' => $o->modality,
				'user' => $o->user,
				'company' => $o->company,
				'campus' => $o->campus,
				'qt_id' => $o->qt_id,
				'query_type' => $o->query_type,
				'doctor' => $o->doctor,
				'date_quote' => $o->date_quote,
				'time_quote' => $o->time_quote,
				'note' => $o->note,
				'payment' => 'Pagado',
				'invoice' => $_POST['referencia'],
				'amount' => $_POST['monto'],
				'currency' => $_POST['moneda'],
				'response' => $_POST['respuesta'],
				'franchise' => $_POST['franchise'],
				'date_init' => date('Y-m-d'),
			];
			$o_apt = Appointments::create($data_apt);
			//notificamos
			$o_user = User::where(['id' => $o->user])->first();
			Mail::to($o_user->email)->send(new Ntfs('Cita agendada','Hola '.$o_user->name.', su cita de '.$o->query_type.' ha sido agendada correctamente para el día '.$o->date_quote.' a la hora '.$o->time_quote.' en la modalidad '.$o->modality.', recuerde estar puntual.',$o_user->name,$o_user->email));
		}
		echo 'ok';
    }
	
	public function payment($data = [])
    {
		if(empty($data['x_ref_payco'])){
			exit();
		}
		$p_cust_id_cliente = env('EPAYCOPRI_FSC','19473');
		$p_key             = env('EPAYCOPRI_FSC','1897ccc8f9ac215a76007312c996d7ab96334088');
		$x_ref_payco       = $data['x_ref_payco'];
		$x_transaction_id  = $data['x_transaction_id'];
		$x_amount          = $data['x_amount'];
		$x_currency_code   = $data['x_currency_code'];
		$x_signature       = $data['x_signature'];
		$signature         = hash('sha256', $p_cust_id_cliente . '^' . $p_key . '^' . $x_ref_payco . '^' . $x_transaction_id . '^' . $x_amount . '^' . $x_currency_code);
		$x_response        = $data['x_response'];
		$x_motivo          = $data['x_response_reason_text'];
		$x_id_invoice      = $data['x_id_invoice'];
		$x_autorizacion    = $data['x_approval_code'];
		$x_extra1          = $data['x_extra1'];
		$x_extra2          = $data['x_extra2'];
		$x_extra3          = $data['x_extra3'];
		$franchise         = $data['x_franchise'];
		$amount            = $data['x_amount_ok'];
		//Validamos la firma
		if ($x_signature == $signature) {
			$x_cod_response = $data['x_cod_response'];
			switch ((int) $x_cod_response) {
				case 1:
					$uuid = $x_extra1;//SOLICITUD
					$o = Solicitude::where(['uuid' => $uuid])->first();
					if(!empty($o->id) AND $o->status == 'pending'){
						//cambiamos estado de solicitud
						$o->update(['status' => 'finalized']);
						//creamos la cita
						$data_apt = [
							'modality' => $o->modality,
							'user' => $o->user,
							'company' => $o->company,
							'campus' => $o->campus,
							'qt_id' => $o->qt_id,
							'query_type' => $o->query_type,
							'doctor' => $o->doctor,
							'date_quote' => $o->date_quote,
							'time_quote' => $o->time_quote,
							'note' => $o->note,
							'payment' => 'Pagado',
							'invoice' => $x_id_invoice,
							'amount' => $amount,
							'currency' => $x_currency_code,
							'response' => $x_response,
							'franchise' => $franchise,
							'date_init' => date('Y-m-d'),
						];
						$o_apt = Appointments::create($data_apt);
						//notificamos
						$o_user = User::where(['id' => $o->user])->first();
						Mail::to($o_user->email)->send(new Ntfs('Cita agendada','Hola '.$o_user->name.', su cita de '.$o->query_type.' ha sido agendada correctamente para el día '.$o->date_quote.' a la hora '.$o->time_quote.' en la modalidad '.$o->modality.', recuerde estar puntual.',$o_user->name,$o_user->email));
					}
					break;
				case 2:
					break;
				case 3:
					break;
				case 4:
					break;
			}
		} else {
			die("Firma no valida");
		}
        return null;
    }
}
