<?php

namespace App\Http\Controllers\Admon;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Diagnoses;
use App\Models\Logmails;
use App\Models\Mattachs;
use App\Models\Tplmails;
use App\Models\user;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Mail\MsjlogmailsWithAttachments;
use App\Mail\Msjlogmails;
use App\Models\Companies;
use App\Models\Roles;
use Illuminate\Database\Eloquent\Builder;

class LogmailsController extends Controller
{
    private $tag_the = 'La';
    private $tag_o = 'a';
    private $r_name = 'admon/logmails';
    private $v_name = 'admon.logmails';
    private $c_name = 'Mensaje';
    private $c_names = 'Mensajes';
    private $list_tbl_fsc = ['subject' => 'Asunto', 'state' => 'Estado', 'date_programmed' => 'Fecha'];
    private $o_model = Logmails::class;

    private function gdata($t = 'Lista de')
    {
        $data['menu'] = $this->r_name;
        $data['tag_o'] = $this->tag_o;
        $data['tag_the'] = $this->tag_the;
        $data['v_name'] = $this->v_name;
        $data['c_name'] = $this->c_name;
        $data['c_names'] = $this->c_names;
        $data['list_tbl_fsc'] = $this->list_tbl_fsc;
        $data['title'] = $t . ' ' . $this->c_names;
        return $data;
    }

    public function __construct()
    {
        $this->middleware('checkRole:2');
    }

    public function index()
    {
        $data = $this->gdata();
        $data['o_all'] = $this->o_model::where(['company' => Auth::user()->company])->whereNotIn('status', ['deleted'])->orderBy('id', 'asc')->get();
        return view($this->v_name . '.index', $data);
    }

    public function create()
    {
        $data = $this->gdata('Agregar');
        $data['us_all'] = User::where(['company' => Auth::user()->company])->whereNotIn('status', ['deleted'])->orderBy('id', 'asc')->get();
        $data['dg_all'] = Diagnoses::where(['status' => 'active'])->orderBy('id', 'asc')->get();
        $data['o_all'] = Tplmails::where(['company' => Auth::user()->company])->whereNotIn('status', ['deleted'])->orderBy('id', 'asc')->get();
        return view($this->v_name . '.create', $data);
    }

    public function store(Request $request)
    {
        $data = request()->except(['_token', '_method']);
        $validatedData = $request->validate([
            'subject' => 'required|string',
            'msj' => 'required|string',
        ], [
            'subject.required' => 'El asunto es requerido',
            'msj.required' => 'El cuerpo del mensaje es requerido',
        ]);
        $data['company'] = Auth::user()->company;
        //$data['is_whatsapp'] = !empty($data['is_whatsapp'])?'si':'no';
        //$data['is_email_text'] = !empty($data['is_email_text'])?'si':'no';
        //$data['is_sms'] = !empty($data['is_sms'])?'si':'no';
        //$data['is_marketing'] = !empty($data['is_marketing'])?'si':'no';
        $data['is_marketing'] = 'si';
        if ($data['is_marketing'] == 'si') {
            $data['is_whatsapp'] = 'no';
            $data['is_email_text'] = 'no';
            $data['is_sms'] = 'no';
        }
        $data['date_programmed'] = !empty($data['date_programmed']) ? $data['date_programmed'] : date('Y-m-d');
        $optionsr = [0 => 'Todos', 2 => 'Administradores', 3 => 'Medicos', 4 => 'Administrativo', 5 => 'Pacientes'];
        $data['sel_users'] = !empty($data['sel_users']) ? $data['sel_users'] : 'Todos';

        if (isset($data['files'])) {
            unset($data['files']);
        }
        $o = $this->o_model::create($data);
        //ADJUNTOS
        if ($request->file('files')) {
            foreach ($request->file('files') as $key => $file) {
                $path = $file->store('uploads', 'public');
                $path = 'storage/' . $path;
                Mattachs::create(['mail_id' => $o->id, 'path_attach' => $path,'file_name' => $file->getClientOriginalName()]);
            }
        }
        //NOTIFICAR
        if ($data['is_marketing'] == 'si' and $data['is_programmed'] != 'si') {
            $email = Auth::user()->email;
            $subject = $data['subject'];
            if ($data['is_diagnostic'] == 'si' and $data['diagnostic'] > 0) {
                $o_dg = Diagnoses::where('id', $data['diagnostic'])->first();
                $subject = $o_dg->name;
            }
            //
            $w_us = ['company' => Auth::user()->company];
            //ROLES
            if ($data['sel_users'] != 0) {
                $w_us['role'] = $data['sel_users'];
            }
            /*if($data['user_id'] != 0){
				$w_us['id'] = $data['user_id'];
				$o_user = User::where('id', $data['user_id'])->first();
			}*/
            if ($data['sel_gender'] != 'Todos') {
                $w_us['gender'] = $data['sel_gender'];
            }
            $emails = [];
            if ($data['user_id'] != 0) {
                $w_us['id'] = $data['user_id'];
                $o_user = User::where('id', $data['user_id'])->first();
                $email = $o_user->email;
            } else {
                $emails = User::where($w_us)
                    ->where('id', '<>', Auth::user()->id)
                    ->whereNotIn('status', ['deleted'])
                    ->pluck('email')
                    ->toArray();
            }
            //Adjuntos
            $attachments = [];
            $attachs = Mattachs::where(['mail_id' => $o->id])->whereNotIn('status', ['deleted'])->orderBy('id', 'asc')->get();
            foreach ($attachs as $attach) {
                $path = str_replace('storage/', 'public/', $attach->path_attach);
                $attachments[] = public_path($attach->path_attach);
            }
            $this->sendMail($email, $subject, $data['msj'], $emails, $attachments);
        }
        $request->session()->flash('msj_success', $this->tag_the . ' ' . $this->c_name . ' ' . $request->subject . ' ha sido registrad' . $this->tag_o . ' correctamente.');
        return redirect($this->r_name);
    }


    public function update(Request $request, $id)
    {

        if ($request->method() === "GET") {

            $object = Logmails::find($id);
            $mattachs = $object->mattachs;


            $data = $this->gdata('Modificar');
            $data['us_all'] = User::where(['company' => Auth::user()->company])->whereNotIn('status', ['deleted'])->orderBy('id', 'asc')->get();
            $data['dg_all'] = Diagnoses::where(['status' => 'active'])->orderBy('id', 'asc')->get();
            $data['o_all'] = Tplmails::where(['company' => Auth::user()->company])->whereNotIn('status', ['deleted'])->orderBy('id', 'asc')->get();
            $data['rol_all'] = Roles::all();
            $data["o"] = $object;
            if(isset($mattachs)){
                $data['mattachs'] = $mattachs;
            }
            return view($this->r_name . '.edit', $data);
        } else {
            $data = request()->except(['_token', '_method']);
            $validatedData = $request->validate([
                'subject' => 'required|string',
                'msj' => 'required|string',
            ], [
                'subject.required' => 'El asunto es requerido',
                'msj.required' => 'El cuerpo del mensaje es requerido',
            ]);
            $data['company'] = Auth::user()->company;
            //$data['is_whatsapp'] = !empty($data['is_whatsapp'])?'si':'no';
            //$data['is_email_text'] = !empty($data['is_email_text'])?'si':'no';
            //$data['is_sms'] = !empty($data['is_sms'])?'si':'no';
            //$data['is_marketing'] = !empty($data['is_marketing'])?'si':'no';
            $data['is_marketing'] = 'si';
            if ($data['is_marketing'] == 'si') {
                $data['is_whatsapp'] = 'no';
                $data['is_email_text'] = 'no';
                $data['is_sms'] = 'no';
            }
            $data['date_programmed'] = !empty($data['date_programmed']) ? $data['date_programmed'] : date('Y-m-d');
            $optionsr = [0 => 'Todos', 2 => 'Administradores', 3 => 'Medicos', 4 => 'Administrativo', 5 => 'Pacientes'];
            $data['sel_users'] = !empty($data['sel_users']) ? $data['sel_users'] : 'Todos';

            if (isset($data['files'])) {
                unset($data['files']);
            }
            $o = Logmails::find($id);
            $o->update($data);
            foreach ($o->mattachs as $key => $value) {
                $value->delete();
                Storage::disk('public')->delete($value->path_attach);
            }
            //ADJUNTOS
            if ($request->file('files')) {
                foreach ($request->file('files') as $key => $file) {
                    $path = $file->store('uploads', 'public');
                    $path = 'storage/' . $path;
                    Mattachs::create(['mail_id' => $o->id, 'path_attach' => $path,'file_name' => $file->getClientOriginalName()]);
                }
            }
            //NOTIFICAR
            if ($data['is_marketing'] == 'si' and $data['is_programmed'] != 'si') {
                $email = Auth::user()->email;
                $subject = $data['subject'];
                if ($data['is_diagnostic'] == 'si' and $data['diagnostic'] > 0) {
                    $o_dg = Diagnoses::where('id', $data['diagnostic'])->first();
                    $subject = $o_dg->name;
                }
                //
                $w_us = ['company' => Auth::user()->company];
                //ROLES
                if ($data['sel_users'] != 0) {
                    $w_us['role'] = $data['sel_users'];
                }
                /*if($data['user_id'] != 0){
				$w_us['id'] = $data['user_id'];
				$o_user = User::where('id', $data['user_id'])->first();
			}*/
                if ($data['sel_gender'] != 'Todos') {
                    $w_us['gender'] = $data['sel_gender'];
                }
                $emails = [];
                if ($data['user_id'] != 0) {
                    $w_us['id'] = $data['user_id'];
                    $o_user = User::where('id', $data['user_id'])->first();
                    $email = $o_user->email;
                } else {
                    $emails = User::where($w_us)
                        ->where('id', '<>', Auth::user()->id)
                        ->whereNotIn('status', ['deleted'])
                        ->pluck('email')
                        ->toArray();
                }
                //Adjuntos
                $attachments = [];
                $attachs = Mattachs::where(['mail_id' => $o->id])->whereNotIn('status', ['deleted'])->orderBy('id', 'asc')->get();
                foreach ($attachs as $attach) {
                    $path = str_replace('storage/', 'public/', $attach->path_attach);
                    $attachments[] = public_path($attach->path_attach);
                }
                $this->sendMail($email, $subject, $data['msj'], $emails, $attachments);
            }
            $request->session()->flash('msj_success', $this->tag_the . ' ' . $this->c_name . ' ' . $request->subject . ' ha sido registrad' . $this->tag_o . ' correctamente.');
           return redirect($this->r_name);
        }
    }

    public function detail($id){

        $obj = Logmails::find($id);
        $data = $this->gdata('Detalles');
        $data['obj'] = $obj;
        return view($this->r_name . '.detail', $data);
    }
    public function resend($id)
    {
        $data = $this->o_model::where(['uuid' => $id])->first();

        $email = Auth::user()->email;
        $subject = $data->subject;
        if ($data->is_diagnostic == 'si' and $data->diagnostic > 0) {
            $o_dg = Diagnoses::where('id', $data->diagnostic)->first();
            $subject = $o_dg->name;
        }
        //
        $w_us = ['company' => $data->company];
        //ROLES
        if ($data->sel_users != 0) {
            $w_us['role'] = $data->sel_users;
        }
        if ($data->sel_gender != 'Todos') {
            $w_us['gender'] = $data->sel_gender;
        }
        $emails = [];
        if ($data->user_id != 0) {
            $w_us['id'] = $data->user_id;
            $o_user = User::where('id', $data->user_id)->first();
            $email = $o_user->email;
        } else {
            $emails = User::where($w_us)
                ->where('id', '<>', Auth::user()->id)
                ->whereNotIn('status', ['deleted'])
                ->pluck('email')
                ->toArray();
        }
        //Adjuntos
        $attachments = [];
        $attachs = Mattachs::where(['mail_id' => $data->id])->whereNotIn('status', ['deleted'])->orderBy('id', 'asc')->get();
        foreach ($attachs as $attach) {
            $path = str_replace('storage/', 'public/', $attach->path_attach);
            $attachments[] = public_path($attach->path_attach);
        }
        $this->sendMail($email, $subject, $data->msj, $emails, $attachments);
        request()->session()->flash('msj_success', 'El mensaje ha sido re-enviado correctamente.');
        return redirect($this->r_name);
    }

    public function show(Request $request, $id)
    {
        $o = Tplmails::where(['id' => $id])->first();
        echo !empty($o->id) ? $o->description : '';
    }

    public function uss(Request $request, $id)
    {
        $data = request()->except(['_token', '_method']);
        $w = ['company' => Auth::user()->company];
        if ($id > 0) {
            $w['role'] = $id;
        }
        $user_authenticated = Auth::user();
        $company = Companies::where('id',$user_authenticated->company)->first();
        $users_filtererd = User::where('company',$company->id)
                            ->whereNotIn('status', ['deleted'])
                            ->orderBy('id', 'asc')
                            ->whereHas('role_class',function($q) use ($id) {
                                $q->where('name',$id);
                            });
        if(isset($data['diagnost']) && $data['diagnost'] != "0" && $id == 'Paciente' && $data['is_diagnostic'] == 'si' ){
            $diag = Diagnoses::find($data['diagnost']);
            $users_filtererd = $users_filtererd->whereHas('diagnotics',function($q) use ($diag) {
                $q->where('code',$diag->code);
            });
        }

        $users_filtererd = $users_filtererd->get(['id','uuid','name','lastname','scd_lastname','scd_name','email']);
        // $o_all = User::where($w)->whereNotIn('status', ['deleted'])->orderBy('id', 'asc')->get();
        $out = '<option value="0" selected >--Todos--</option>';
        foreach ($users_filtererd as $key => $row) {
            $full_name = $row->name . ' ' . $row->scd_name . ' ' . $row->lastname . ' ' . $row->scd_lastname;
            $out .= '<option value="' . $row->id . '">' . $full_name . ' (' . $row->email . ')</option>';
        }
        echo $out;
    }

    private function sendMail($email, $subject, $html, $emails = [], $attachments = [])
    {
        if (!empty($attachments)) {
            if (!empty($emails)) {
                Mail::to($email)->bcc($emails)->send(new MsjlogmailsWithAttachments($subject, $html, $attachments));
            } else {
                Mail::to($email)->send(new MsjlogmailsWithAttachments($subject, $html, $attachments));
            }
        } else {
            if (!empty($emails)) {
                Mail::to($email)->bcc($emails)->send(new Msjlogmails($subject, $html));
            } else {
                Mail::to($email)->send(new Msjlogmails($subject, $html));
            }
        }
    }

    // public function get_users(Request $request)
    // {
    //     $data = request()->except(['_token', '_method']);
    //     $user_authenticated = Auth::user();
    //     $company = Companies::where('id',$user_authenticated->company)->first();
    //     $users_filtererd = User::where('company',$company->id)
    //                         ->whereHas('role_class',function($q) use ($data) {
    //                             $q->where('name',$data['rol']);
    //                         })->get(['id','uuid','name']);
    //     return empty($users_filtererd ? [] : $users_filtererd);
    // }
}
