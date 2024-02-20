<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plans;
use App\Models\Payments;

class PayController extends Controller
{
    public function payment($data = [])
    {
		if(empty($data['x_ref_payco'])){
			exit();
		}
		$p_cust_id_cliente = '19473';
		$p_key             = '1897ccc8f9ac215a76007312c996d7ab96334088';
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
		$user_id           = $data['x_extra1'];
		$plan_id           = $data['x_extra2'];
		$franchise         = $data['x_franchise'];
		$amount            = $data['x_amount_ok'];
		//Validamos la firma
		if ($x_signature == $signature) {
			$x_cod_response = $data['x_cod_response'];
			switch ((int) $x_cod_response) {
				case 1:
					$o_pay = Payments::where(['user' => $user_id,'plan' => $plan_id,'invoice' => $x_id_invoice])->first();
					if(empty($o_pay->id)){
						$o_plan = Plans::where(['id' => $plan_id])->first();
						$expiration = $this->plusMonth($o_plan->month);
						$o = Payments::create(['user' => $user_id,'plan' => $plan_id,'invoice' => $x_id_invoice,'amount' => $amount,'currency' => $x_currency_code,'response' => $x_response,'franchise' => $franchise,'date_init' => date('Y-m-d'),'expiration' => $expiration,'description' => $x_ref_payco]);
						//return $this->sendResponse($o, 'El pago fue creado exitosamente.');
					}
					break;
				case 2:
					//return $this->sendError('La transacción fue rechazada', null, 500);
					break;
				case 3:
					//return $this->sendError('La transacción esta pendiente', null, 500);
					break;
				case 4:
					//return $this->sendError('La transacción fue fallida', null, 500);
					break;
			}
		} else {
			die("Firma no valida");
		}
        return null;
    }
	
	private function plusMonth($m = 1) {
		$d = date('Y-m-d');
		$nd = strtotime ('+'.$m.' month', strtotime($d)) ;
		return date ('Y-m-d', $nd);
    }
}
