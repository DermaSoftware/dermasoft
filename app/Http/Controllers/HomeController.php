<?php

namespace App\Http\Controllers;

use DateTime;
use App\Mail\Ntfs;
use App\Models\User;
use App\Models\Plans;
use App\Models\Orders;
use App\Models\Ticket;
use App\Models\Settings;
use App\Models\Ticketmsj;
use App\Models\Companies;
use App\Models\Payments;
use App\Models\Trainings;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    private $r_name = 'home';
    private $c_name = 'Dashboard';
    private $c_names = 'Dashboard';

    public function index()
    {
		$data['menu'] = $this->r_name;
        $data['c_name'] = $this->c_name;
        $data['c_names'] = $this->c_names;
        $data['title'] = $this->c_names;
		return view('general.home',$data);
    }

    public function membership()
    {
		$data['menu'] = 'membership';
        $data['c_name'] = $this->c_name;
        $data['c_names'] = $this->c_names;
        $data['title'] = $this->c_names;
		$data['o_all'] = Plans::where(['status' => 'active'])->orderBy('id', 'asc')->get();
        $data['has_mship'] = $this->last_membership(Auth::user()->id);
		$data['more_mb'] = 0;
		if($data['has_mship']){
			$mship = $this->get_last_membership(Auth::user()->id,true);
			$data['mship'] = $mship;
			$data['lastplan'] = $this->get_last_membership(Auth::user()->id);
			//Progreso
			$pg_mb = 100;
			$today = date('Y-m-d');
			$expn = strtotime($mship->expiration);
			$currentDate = strtotime($today);
			if($currentDate < $expn){
				//Calculamos el progreso
				$date_init = $mship->date_init;
				$date1 = new DateTime($today);
				$date2 = new DateTime($date_init);
				$date3 = new DateTime($mship->expiration);
				$tdays  = $date3->diff($date2)->format('%a');//Total
				$cdays  = $date3->diff($date1)->format('%a');//Faltan
				$tdays = intval($tdays);
				$cdays = intval($cdays);
				$rdays = $tdays-$cdays;
				$pg_mb = ($rdays*100)/$tdays;
				$pg_mb = intval($pg_mb);
			}
			$data['pg_mb'] = $pg_mb;
			$data['more_mb'] = Plans::where('score','>',$data['lastplan']->score)->orderBy('score', 'asc')->count();
			$data['o_all'] = Plans::where(['status' => 'active'])->where('score','>',$data['lastplan']->score)->orderBy('score', 'asc')->get();
		}
		return view('general.membership',$data);
    }

	public function planes()
    {
        $auth = Auth::user();
        $company = Companies::where(['id' => $auth->company])->first(); // Obtengo la compañia a que pertenece el usuario
		$data['company'] = $company;
		$data['menu'] = 'payments';
        $data['c_name'] = $this->c_name;
        $data['c_names'] = $this->c_names;
        $data['title'] = 'Planes';
		$data['o_all'] = Plans::where(['status' => 'active'])->orderBy('id', 'asc')->get();
		$data['o_setting'] = Settings::orderBy('id', 'DESC')->first();
		return view('general.planes',$data);
    }

    public function sale_planes()
    {
        $auth = Auth::user();
        $company = Companies::where(['id' => $auth->company])->first(); // Obtengo la compañia a que pertenece el usuario
		$data['company'] = $company;
		$data['menu'] = 'payments';
        $data['c_name'] = $this->c_name;
        $data['c_names'] = $this->c_names;
        $data['title'] = 'Planes';
		$data['o_all'] = Plans::where(['status' => 'active'])->orderBy('id', 'asc')->get();
		$data['o_setting'] = Settings::orderBy('id', 'DESC')->first();
		return view('sale_planes',$data);
    }

	public function payplan()
    {
		$data['title'] = 'Pago de membresía';
		return view('general.payplan',$data);
    }

    public function payajax()
    {
		$x_id_invoice = $_POST['referencia'];
		$o_pay = Payments::where(['invoice' => $x_id_invoice])->first();
		if(empty($o_pay->id)){
			$plan_uuid = $_POST['extra1'];//Plan
			$user_uuid = $_POST['extra2'];//Usuario


            $plan_uuid = $_POST['extra1'];
            $o_plan = Plans::where(['uuid' => $plan_uuid])->first();

            $company_id = $_POST['extra3'];//Empresa
            $o_comp = Companies::where(['id' => $company_id])->first();

            $o_comp->update(["plan_id" => $o_plan->id]);
			$o_user = User::where(['uuid' => $user_uuid])->first();
			$expiration = $this->plusMonth($o_plan->month);
			$amount = $_POST['monto'];
			$x_currency_code = $_POST['moneda'];
			$x_response = $_POST['respuesta'];
			$franchise = $_POST['franchise'];
			$x_ref_payco = $_POST['ref_payco'];
			$o = Payments::create(['user' => $o_user->id,'plan' => $o_plan->id,'company' => $o_comp->id,'invoice' => $x_id_invoice,'amount' => $amount,'currency' => $x_currency_code,'response' => $x_response,'franchise' => $franchise,'date_init' => date('Y-m-d'),'expiration' => $expiration,'description' => $x_ref_payco]);
		}
		echo 'ok';
    }

    public function payext($id = '')
    {
        if(empty($id)){
			return redirect('/');
		}
		$o = Orders::where(['uuid' => $id])->first();
        if(empty($o->id)){
			return redirect('/');
		}
		if($o->status == 'Completado'){
			return redirect('/');
		}
		$data['title'] = 'Pago de membresía';
		$data['o'] = $o;
		$data['o_plan'] = Plans::where(['id' => $o->plan])->first();
		return view('general.payext',$data);
    }

    public function payres()
    {
		$data['title'] = 'Pago de membresía';
		return view('general.payres',$data);
    }

    public function paycon()
    {
		$uuid = $_POST['extra1'];//Order
		$o_order = Orders::where(['uuid' => $uuid])->first();
		if(!empty($o_order->id) AND $o_order->status == 'Pendiente'){
			$o_plan = Plans::where(['id' => $o_order->plan])->first();
			$o_comp = Companies::where(['id' => $o_order->company])->first();
			$o_user = User::where(['id' => $o_comp->user])->first();
			if(!empty($o_user->id)){
				$password = Str::random(8);
				$o_user->update(['email' => $o_comp->email,'password' => Hash::make($password)]);
				Mail::to($o_user->email)->send(new Ntfs('Cuenta completada','Su cuenta ha sido completada correctamente, para ingresar debe introduccir su correo y la siguiente contraseña temporal: '.$password,$o_user->name,$o_user->email));
			}
			$o_comp->update(['state' => 'Completado']);
			$expiration = $this->plusMonth($o_plan->month);
			$x_id_invoice = $_POST['referencia'];
			$amount = $_POST['monto'];
			$x_currency_code = $_POST['moneda'];
			$x_response = $_POST['respuesta'];
			$franchise = $_POST['franchise'];
			$x_ref_payco = $_POST['ref_payco'];
			$o = Payments::create(['user' => $o_comp->user,'plan' => $o_order->plan,'company' => $o_order->company,'invoice' => $x_id_invoice,'amount' => $amount,'currency' => $x_currency_code,'response' => $x_response,'franchise' => $franchise,'date_init' => date('Y-m-d'),'expiration' => $expiration,'description' => $x_ref_payco]);
			$o_order->update(['status' => 'Completado']);
		}
		echo 'ok';
    }

	public function paymentres($data = [])
    {
		if(empty($data['x_ref_payco'])){
			exit();
		}
		$o_setting = Settings::orderBy('id', 'DESC')->first();
		$p_cust_id_cliente = !empty($o_setting->epaycoidc)?$o_setting->epaycoidc:env('EPAYCOIDC_FSC','19473');
		$p_key             = !empty($o_setting->epaycopri)?$o_setting->epaycopri:env('EPAYCOPRI_FSC','1897ccc8f9ac215a76007312c996d7ab96334088');
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
					//$x_id_invoice = $_POST['referencia'];
					$o_pay = Payments::where(['invoice' => $x_id_invoice])->first();
					if(empty($o_pay->id)){
						$o_plan = Plans::where(['uuid' => $x_extra1])->first();
						$o_comp = Companies::where(['id' => $x_extra3])->first();
						$o_user = User::where(['uuid' => $x_extra2])->first();
						$expiration = $this->plusMonth($o_plan->month);
						$o = Payments::create(['user' => $o_user->id,'plan' => $o_plan->id,'company' => $o_comp->id,'invoice' => $x_id_invoice,'amount' => $amount,'currency' => $x_currency_code,'response' => $x_response,'franchise' => $franchise,'date_init' => date('Y-m-d'),'expiration' => $expiration,'description' => $x_ref_payco]);
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

	public function payment($data = [])
    {
		if(empty($data['x_ref_payco'])){
			exit();
		}
		$p_cust_id_cliente = !empty($o_setting->epaycoidc)?$o_setting->epaycoidc:env('EPAYCOIDC_FSC','19473');
		$p_key             = !empty($o_setting->epaycopri)?$o_setting->epaycopri:env('EPAYCOPRI_FSC','1897ccc8f9ac215a76007312c996d7ab96334088');
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
					$o_order = Orders::where(['uuid' => $x_extra1])->first();
					if(!empty($o_order->id) AND $o_order->status == 'Pendiente'){
						$o_plan = Plans::where(['id' => $o_order->plan])->first();
						$o_comp = Companies::where(['id' => $o_order->company])->first();
						$o_user = User::where(['id' => $o_comp->user])->first();
						if(!empty($o_user->id)){
							$password = Str::random(8);
							$o_user->update(['email' => $o_comp->email,'password' => Hash::make($password)]);
							Mail::to($o_user->email)->send(new Ntfs('Cuenta completada','Su cuenta ha sido completada correctamente, para ingresar debe introduccir su correo y la siguiente contraseña temporal: '.$password,$o_user->name,$o_user->email));
						}
						$o_comp->update(['state' => 'Completado']);
						$expiration = $this->plusMonth($o_plan->month);
						$o = Payments::create(['user' => $o_comp->user,'plan' => $o_order->plan,'company' => $o_order->company,'invoice' => $x_id_invoice,'amount' => $amount,'currency' => $x_currency_code,'response' => $x_response,'franchise' => $franchise,'date_init' => date('Y-m-d'),'expiration' => $expiration,'description' => $x_ref_payco]);
						$o_order->update(['status' => 'Completado']);
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

	private function expiration($d = 30) {
		$fecha = date('Y-m-j');
		$nuevafecha = strtotime ( '+'.$d.' day' , strtotime ( $fecha ) ) ;
		$nuevafecha = date ( 'Y-m-d' , $nuevafecha );
		return $nuevafecha;
    }

	private function plusMonth($m = 1) {
		$d = date('Y-m-d');
		$nd = strtotime ('+'.$m.' month', strtotime($d)) ;
		return date ('Y-m-d', $nd);
    }

    public function orders()
    {
		$data['menu'] = 'orders';
        $data['c_name'] = $this->c_name;
        $data['c_names'] = $this->c_names;
        $data['title'] = 'Historial de pagos';
		$data['o_all'] = Orders::where(['company' => Auth::user()->company])->orderBy('id', 'asc')->get();
		return view('general.orders',$data);
    }

    public function payments()
    {
		$data['menu'] = 'payments';
        $data['c_name'] = $this->c_name;
        $data['c_names'] = $this->c_names;
        $data['title'] = 'Historial de pagos';
		$data['o_all'] = Payments::where(['company' => Auth::user()->company])->orderBy('id', 'asc')->get();
		return view('general.payments',$data);
    }

    public function trainings()
    {
		$data['menu'] = 'trainings';
        $data['c_name'] = $this->c_name;
        $data['c_names'] = $this->c_names;
        $data['title'] = 'Entrenamientos';
		$id = Auth::user()->id;
		$role = Auth::user()->role;
		$company = Auth::user()->company;
		if($company > 0){
			$company = ','.$company;
		}
		$sql = "SELECT t.* FROM trainings t LEFT JOIN trainingsroles tr on(tr.trainings_id = t.id) LEFT JOIN trainingsusers tu on(tu.trainings_id = t.id) WHERE t.status='active' AND t.company IN(0".$company.") AND (tr.roles_id=".$role." OR tu.user_id=".$id." OR t.directed_to='Todos') ORDER BY t.id ASC;";
		$o_all = DB::select($sql);
		$data['o_all'] = $o_all;
		//$data['o_all'] = Trainings::where(['status' => 'active'])->orderBy('id', 'DESC')->get();
		return view('general.trainings',$data);
    }

    public function contact()
    {
		$data['menu'] = 'contact';
        $data['c_name'] = $this->c_name;
        $data['c_names'] = $this->c_names;
        $data['title'] = $this->c_names;
		$data['o_all'] = Payments::where(['user' => Auth::user()->id])->orderBy('id', 'asc')->get();
		return view('general.contact',$data);
    }

    public function contactform(Request $request)
    {
		$data = request()->except(['_token','_method']);
		$validatedData = $request->validate([
			'name' => 'required|string',
			'email' => 'required|string|email|max:255',
			'message' => 'required',
		],[
			'name.required' => 'El nombre es requerido',
			'name.string' => 'El nombre debe ser un texto',
			'email.required' => 'El correo es requerido',
			'email.email' => 'El correo debe ser un correo válido',
			'email.string' => 'El correo debe ser un texto',
			'email.max' => 'El correo no debe exceder más de 255 caracteres',
			'message.required' => 'El mensaje es requerido',
		]);
		$msj = '<small>Ha resibido un nuevo mensaje de contacto.<br><br>Nombre:<br>'.$data['name'].'<br><br>Correo:<br>'.$data['email'].'<br><br>Mensaje:<br>'.$data['message'].'</small>';
		$email = env('MAILCONTAC_FSC','info@fullstackcolombia.com');
		Mail::to($email)->send(new Ntfs('Formulario de contacto',$msj,'Admin Display',$email));
        $request->session()->flash('msj_success', 'El formulario de contacto ha sido enviado correctamente.');
		return redirect('contact');
    }

    public function faqs($id = '')
    {
		$data['menu'] = 'faqs';
        $data['c_name'] = $this->c_name;
        $data['c_names'] = $this->c_names;
        $data['title'] = $this->c_names;
        $data['id_cat'] = $id;
		if(empty($id)){
			$data['f_all'] = Faqs::where(['status' => 'active'])->orderBy('id', 'asc')->get();
		} else {
			$data['f_all'] = Faqs::where(['status' => 'active','catfaq' => $id])->orderBy('id', 'asc')->get();
		}
		$data['c_all'] = Catfaqs::where(['status' => 'active'])->orderBy('id', 'asc')->get();
		return view('general.faqs',$data);
    }

    public function support()
    {
		$data['menu'] = 'support';
        $data['title'] = 'Soporte';
		$data['o_all'] = Ticket::with(['user','msjs'])->where(['user' => Auth::user()->id])->orderBy('id', 'DESC')->get();
		return view('general.support', $data);
    }
    public function supportnew()
    {
		$data['menu'] = 'support';
        $data['title'] = 'Soporte';
		return view('general.supportnew', $data);
    }
    public function addticket(Request $request)
    {
		$data = request()->except(['_token','_method']);
		$validator = Validator::make($data, [
            'title' => 'required',
            'description' => 'required',
        ],[
			'name.required' => 'El asunto es requerido',
			'description.required' => 'La descripción es requerida',
		]);
		if ($validator->fails()) {
			return redirect('support')->withErrors($validator)->withInput();
		}
		$user = Auth::user()->id;
		$date_init = date('Y-m-d H:i:s');
		$data['date_init'] = $date_init;
		$data['user'] = $user;
		$o = Ticket::create($data);
		$file = '';
		if ($request->hasFile('file')) {
            $path = $request->file('file')->store('uploads','public');
			$path = 'storage/'.$path;
            $file = asset($path);
        }
		$o_msj = Ticketmsj::create(['user' => $user,'ticket' => $o->id,'date_init' => $date_init,'title' => $data['title'],'description' => $data['description'],'file' => $file,'typemsj' => 'Cliente']);
		request()->session()->flash('msj_success', 'El ticket ha sido creado correctamente');
		//Notificar por correo
		Mail::to(Auth::user()->email)->send(new Ntfs('Nuevo ticket','Gracias por comunicarse con el equipo de soporte, en breve te contactaremos',Auth::user()->name,Auth::user()->email));
		//$o_config = Settings::find(1);
		$o_email = env('MAILCONTAC_FSC', 'info@fullstackcolombia.com');
		if(!empty($o_email)){
			Mail::to($o_email)->send(new Ntfs('Nuevo ticket','El usuario '.Auth::user()->name.' ha solicitado un nuevo ticket de soporte: '.$data['title'],'Administrador',$o_email));
		}
		return redirect('support');
    }
    public function supportshow($id = '')
    {
		$o = Ticket::with(['user','msjs'])->where(['id' => $id,'user' => Auth::user()->id])->first();
		if(empty($o->id)){
			return redirect('support');
		}
		$data['menu'] = 'support';
        $data['title'] = 'Soporte';
        $data['o'] = $o;
		$data['o_all'] = Ticketmsj::where(['ticket' => $id])->get();
		//$data['o_config'] = $o_config = Settings::find(1);
		return view('general.supportshow', $data);
    }
	public function supportup(Request $request,$id)
    {
		$o = Ticket::where(['id' => $id,'user' => Auth::user()->id])->first();
		if(empty($o->id)){
			return redirect('support');
		}
		$data = request()->except(['_token','_method']);
		$validator = Validator::make($data, [
            'title' => 'required',
            'description' => 'required',
        ],[
			'name.required' => 'El asunto es requerido',
			'description.required' => 'La descripción es requerida',
		]);
		if ($validator->fails()) {
			return redirect('support/'.$id)->withErrors($validator)->withInput();
		}

		$file = '';
		if ($request->hasFile('file')) {
            $path = $request->file('file')->store('uploads','public');
			$path = 'storage/'.$path;
            $file = asset($path);
        }
		$o_msj = Ticketmsj::create(['user' => Auth::user()->id,'ticket' => $id,'date_init' => date('Y-m-d H:i:s'),'title' => $data['title'],'description' => $data['description'],'file' => $file,'typemsj' => 'Cliente']);
		request()->session()->flash('msj_success', 'El ticket ha sido respondido correctamente');
		return redirect('support/'.$id);
    }
}
