<?php

namespace App\Http\Controllers\Patients;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Habeas;
use App\Models\Companies;
use App\Models\Querytypes;
use App\Models\Vitalsigns;
use App\Models\Photographic;
use App\Models\Headquarters;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Mail\HabeasData;
use App\Mail\Ntfs;
use App\Models\Appointments;
use App\Models\Dermatology;
use App\Models\Diary;
use App\Models\Locks;
use App\Models\Solicitude;
use DateInterval;
use DateTime;
use PDF;
use Illuminate\Http\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isEmpty;

class PatientsController extends Controller
{
    private $tag_the = 'El';
    private $tag_o = 'o';
    private $r_name = 'patients';
    private $v_name = 'patients';
    private $c_name = 'Paciente';
    private $c_names = 'Pacientes';
    private $list_tbl_fsc = [
        'name' => 'Nombre', 'document_type' => 'Tipo de documento', 'document_number' => 'Número de documento',
        'email' => 'Correo', 'phone' => 'Telefono'
    ];
    private $o_model = User::class;
    private $hctype = ['Dermatología general', 'Biopsías y/o procedimientos', 'Procedimientos Estéticos', 'Descripción Quirúrgica'];

    private function gdata($t = 'Historial de', $tfinal = true)
    {
        $data['menu'] = $this->r_name;
        $data['tag_o'] = $this->tag_o;
        $data['tag_the'] = $this->tag_the;
        $data['v_name'] = $this->v_name;
        $data['c_name'] = $this->c_name;
        $data['c_names'] = $this->c_names;
        $data['list_tbl_fsc'] = $this->list_tbl_fsc;
        $data['title'] = $tfinal ? $t . ' ' . $this->c_names : $t;
        return $data;
    }

    public function __construct()
    {
        $this->middleware('checkRole:2_3');
    }

    public function index(Request $request)
    {
        $data = $this->gdata();
        $per_page = !empty($request->get('per_page')) ? $request->get('per_page') : env('PAGINATION_NUM', 10);
        $w = ['company' => Auth::user()->company, 'role' => 5];
        $c = Auth::user()->campus;
        if (!empty($c) and $c > 0) {
            $w['campus'] = $c;
        }
        $tb = $this->itemsPaginate($this->o_model, $per_page, $w);
        $data['o_all'] = $tb['items'];
        $data['pagination'] = $tb['pagination'];
        return view($this->v_name . '.records', $data);
    }

    public function create()
    {
        $data = $this->gdata('Agregar');
        return view($this->v_name . '.create', $data);
    }

    public function store(Request $request)
    {
        $data = request()->except(['_token', '_method']);
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users,email',
            'document_number' => 'required|max:255|unique:users,document_number',
        ], [
            'name.required' => 'El nombre es requerido',
            'name.string' => 'El nombre debe ser un texto',
            'email.required' => 'El correo es requerido',
            'email.email' => 'El correo debe ser un correo válido',
            'email.string' => 'El correo debe ser un texto',
            'email.max' => 'El correo no debe exceder más de 255 caracteres',
            'email.unique' => 'El correo ya existe en la base de datos',
            'document_number.required' => 'El número de documento es requerido',
            'document_number.max' => 'El número de documento no debe exceder más de 255 caracteres',
            'document_number.unique' => 'El número de documento ya existe en la base de datos',
        ]);
        $r = $data['urlredirect'];
        unset($data['urlredirect']);
        $data['role'] = 5;
        $data['company'] = Auth::user()->company;
        $data['campus'] = Auth::user()->campus;
        $password = Str::random(9);
        $data['password'] = Hash::make($password);
        $o = $this->o_model::create($data);
        Mail::to($o->email)->send(new Ntfs('Nueva cuenta', 'Su cuenta ha sido registrada correctamente, para ingresar recuerde usar este correo y la contraseña:<b>' . $password . '</b>', $o->name, $o->email));
        $request->session()->flash('msj_success', $this->tag_the . ' ' . $this->c_name . ' ' . $request->name . ' ha sido registrad' . $this->tag_o . ' correctamente.');
        $url = $r == 'normal' ? $this->r_name : $this->r_name . '/vitalsigns/' . $o->uuid;
        return redirect($url);
    }

    public function vitalsigns($id, $appointment)
    {
        if (empty($id)) {
            return redirect($this->r_name);
        }
        $o = $this->o_model::where(['uuid' => $id])->first();
        if (empty($o->id)) {
            return redirect($this->r_name);
        }
        $data = $this->gdata('Registrar signos vitales', false);
        $data['o'] = $o;
        $data['o_qtys'] = Querytypes::where(['company' => Auth::user()->company, 'status' => 'active'])->orderBy('id', 'asc')->get();
        $data['o_hctype'] = $this->hctype;
        $data['o_appointment'] = $appointment;
        return view($this->v_name . '.vitalsigns', $data);
    }

    public function svitalsigns(Request $request, $id, $appointment)
    {
        $data = request()->except(['_token', '_method']);
        $validatedData = $request->validate([
            'heart_rate' => 'required',
            'breathing_frequency' => 'required',
            'weight' => 'required',
            'blood_pressure' => 'required',
            'temperature' => 'required',
            'querytype' => 'required',
        ], [
            'heart_rate.required' => 'La frecuencia cardiaca es requerida',
            'breathing_frequency.required' => 'La frecuencia respiratoria es requerida',
            'weight.required' => 'El peso es requerido',
            'blood_pressure.required' => 'La tensión arterial es requerida',
            'temperature.required' => 'La temperatura es requerida',
            'querytype.required' => 'El tipo de consulta es requerido',
        ]);
        if (empty($id)) {
            return redirect($this->r_name);
        }
        $ox = $this->o_model::where(['uuid' => $id])->first();
        if (empty($ox->id)) {
            return redirect($this->r_name);
        }
        $data['user'] = $ox->id;
        $data['company'] = Auth::user()->company;
        $o_appointment = Appointments::where(['uuid' => $appointment])->first(['id']);
        $hc = Dermatology::where('user',$ox->id)->first();
        if(empty($hc)){
            $params = [];
            $params['user'] = $ox->id;
            $params['doctor'] = Auth::user()->id;
            $params['company'] = $ox->company;
            $params['campus'] = $ox->campus;
            $params['hct_type'] = $data["hc_type"];
            $o = Dermatology::create($params);
        }
        else{
            $hc->update(["hc_type"=>$data["hc_type"]]);
        }
        $data['appointment_id'] = $o_appointment->id;
        $o = Vitalsigns::create($data);
        $o_appointment->update(["hc_type"=>$data["hc_type"]]);
        $request->session()->flash('msj_success', 'Los signos vitales han sido registrados correctamente.');
        return redirect($this->r_name . '/records');
    }

    public function shvitalsigns()
    {
        $data = $this->gdata('Buscar paciente', false);
        return view($this->v_name . '.shvitalsigns', $data);
    }

    public function shvs_search(Request $request)
    {
        $data = request()->except(['_token', '_method']);
        $validatedData = $request->validate([
            'document_type' => 'required',
            'document_number' => 'required',
        ], [
            'document_type.required' => 'El tipo de documento es requerido',
            'document_number.required' => 'El Número de documento es requerido',
        ]);
        $o = $this->o_model::where($data)->first();
        if (!empty($o->id)) {
            return redirect($this->r_name . '/vitalsigns/' . $o->uuid);
        }
        $request->session()->flash('msj_error', 'No se han encontrado resultados');
        return redirect($this->r_name . '/search_vitalsigns');
    }

    public function shgallery()
    {
        $data = $this->gdata('Buscar paciente', false);
        return view($this->v_name . '.shgallery', $data);
    }

    public function shgy_search(Request $request)
    {
        $data = request()->except(['_token', '_method']);
        $validatedData = $request->validate([
            'document_type' => 'required',
            'document_number' => 'required',
        ], [
            'document_type.required' => 'El tipo de documento es requerido',
            'document_number.required' => 'El Número de documento es requerido',
        ]);
        $o = $this->o_model::where($data)->first();
        if (!empty($o->id)) {
            return redirect($this->r_name . '/gallery/' . $o->uuid);
        }
        $request->session()->flash('msj_error', 'No se han encontrado resultados');
        return redirect($this->r_name . '/search_gallery');
    }

    public function gallery($id)
    {
        if (empty($id)) {
            return redirect($this->r_name);
        }
        $o = $this->o_model::where(['uuid' => $id])->first();
        if (empty($o->id)) {
            return redirect($this->r_name);
        }
        $data = $this->gdata('Registro fotográfico', false);
        $data['o'] = $o;
        $data['o_gallerys'] = Photographic::where(['user' => $o->id, 'status' => 'active'])->orderBy('id', 'DESC')->get();
        return view($this->v_name . '.gallery', $data);
    }

    public function sgallery(Request $request, $id)
    {
        $data = request()->except(['_token', '_method']);
        $validatedData = $request->validate([
            'photo' => 'required',
        ], [
            'photo.required' => 'La foto es requerida',
        ]);
        if (empty($id)) {
            return redirect($this->r_name);
        }
        $ox = $this->o_model::where(['uuid' => $id])->first();
        if (empty($ox->id)) {
            return redirect($this->r_name);
        }
        $data['user'] = $ox->id;
        $data['company'] = Auth::user()->company;
        $data['campus'] = Auth::user()->campus;
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('uploads', 'public');
            $path = 'storage/' . $path;
            $data['photo_pp'] = $path;
            $data['photo'] = asset($path);
        }
        $o = Photographic::create($data);
        $request->session()->flash('msj_success', 'El registro fotográfico ha sido agregado correctamente.');
        return redirect($this->r_name . '/gallery/' . $id);
    }

    public function suppdata(Request $request, $id)
    {
        if (empty($id)) {
            return redirect($this->r_name);
        }
        $o = $this->o_model::where(['uuid' => $id])->first();
        $company = $o->company_class;

        if (empty($o->id)) {
            return redirect($this->r_name);
        }
        $data = $this->gdata('Datos complementarios', false);
        $data['o'] = $o;
        $data['url_preview'] = strpos(url()->previous(), 'patients') ? '' : url()->previous() ;
        $data['company'] = $company;
        $data['o_campus'] = Headquarters::where(['company' => Auth::user()->company, 'status' => 'active'])->orderBy('id', 'asc')->get();
        return view($this->v_name . '.suppdata', $data);
    }

    public function ssuppdata(Request $request, $id)
    {
        $data = request()->except(['_token', '_method']);
        $validatedData = $request->validate([
            'birth' => 'required',
            'gender' => 'required',
            'country' => 'required',
        ], [
            'birth.required' => 'La fecha de nacimiento es requerida',
            'gender.required' => 'El género es requerido',
            'country.required' => 'El país es requerido',
        ]);
        if (empty($id)) {
            return redirect($this->r_name);
        }
        $o = $this->o_model::where(['uuid' => $id])->first();
        if (empty($o->id)) {
            return redirect($this->r_name);
        }
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('uploads', 'public');
            $path = 'storage/' . $path;
            $data['photo_pp'] = $path;
            $data['photo'] = asset($path);
        }
        if ($request->hasFile('signature')) {
            $path = $request->file('signature')->store('uploads', 'public');
            $path = 'storage/' . $path;
            $data['signature_pp'] = $path;
            $data['signature'] = asset($path);
        }
        $o->update($data);
        $request->session()->flash('msj_success', $this->tag_the . ' ' . $this->c_name . ' ' . $o->name . ' ha sido actualizad' . $this->tag_o . ' correctamente.');

        if(!empty($data['url_preview'])){
            return redirect($data['url_preview']);
        }
        return redirect($this->r_name . '/records');
    }

    public function edit($id)
    {
        if (empty($id)) {
            return redirect($this->r_name);
        }
        $tag = is_numeric($id) ? 'id' : 'uuid';
        $o = $this->o_model::where([$tag => $id])->first();
        if (empty($o->id)) {
            return redirect($this->r_name);
        }
        $data = $this->gdata('Actualizar');
        $data['o'] = $o;
        return view($this->v_name . '.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $data = request()->except(['_token', '_method']);
        if (empty($id)) {
            return redirect($this->r_name);
        }
        $tag = is_numeric($id) ? 'id' : 'uuid';
        $o = $this->o_model::where([$tag => $id])->first();
        if (empty($o->id)) {
            return redirect($this->r_name);
        }
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users,email,' . $o->id,
        ], [
            'name.required' => 'El nombre es requerido',
            'email.required' => 'El correo es requerido',
            'email.email' => 'El correo debe ser un correo válido',
            'email.string' => 'El correo debe ser un texto',
            'email.max' => 'El correo no debe exceder más de 255 caracteres',
            'email.unique' => 'El correo ya existe en la base de datos',
        ]);
        if (empty($id)) {
            return redirect($this->r_name);
        }
        $tag = is_numeric($id) ? 'id' : 'uuid';
        $o = $this->o_model::where([$tag => $id])->first();
        if (empty($o->id)) {
            return redirect($this->r_name);
        }
        $o->update($data);
        $request->session()->flash('msj_success', $this->tag_the . ' ' . $this->c_name . ' ' . $o->name . ' ha sido actualizad' . $this->tag_o . ' correctamente.');
        return redirect($this->r_name);
    }

    public function destroy($id)
    {
        if (empty($id)) {
            return response()->json(['response' => 'El ID es requerido'], 401);
        }
        $tag = is_numeric($id) ? 'id' : 'uuid';
        $o = $this->o_model::where([$tag => $id])->first();
        if (empty($o->id)) {
            return response()->json(['response' => 'El ID no existe en la base de datos'], 401);
        }
        $o->update(['status' => 'deleted']); //$this->o_model::destroy($id);
        return response()->json(['response' => 'ok'], 200);
    }

    public function habeasdata($id)
    {
        if (empty($id)) {
            return redirect($this->r_name);
        }
        $o = $this->o_model::where(['uuid' => $id])->first();
        if (empty($o->id)) {
            return redirect($this->r_name);
        }
        $pdfFilePath = $this->pdfhabeasdata($id, true);
        $pdfFilePath = storage_path($pdfFilePath);
        $path = Storage::disk('public')->putFile('temp', new File($pdfFilePath), 'public');
        $pdfFilePathTemp = './storage/app/public/uploads/h_' . $id . '.pdf';
        Storage::delete($pdfFilePathTemp);
        unlink($pdfFilePath);
        $attach_file = storage_path('app/public/' . $path);
        $fullpath = asset('storage/' . $path);
        $o->update(['habeas' => 'si', 'accept_habeas' => $fullpath]);
        $full_name = $o->name . ' ' . $o->scd_name . ' ' . $o->lastname . ' ' . $o->scd_lastname;
        Mail::to($o->email)->send(new HabeasData($full_name, $attach_file));
        return redirect($fullpath);
    }

    private function pdfhabeasdata($id, $save = false)
    {
        if (empty($id)) {
            return null;
        }
        $o = $this->o_model::where(['uuid' => $id])->first();
        if (empty($o->id)) {
            return null;
        }
        $o_habeas = Habeas::where(['id' => 1])->first();
        $o_company = Companies::where(['id' => Auth::user()->company])->first();
        $logo = !empty($o_company->logo_pp) ? public_path($o_company->logo_pp) : public_path('assets/images/favicon.png');
        $photo = !empty($o->photo_pp) ? $o->photo_pp : public_path('assets/images/user.png');
        $signature = !empty($o->signature_pp) ? $o->signature_pp : public_path('assets/images/firma.png');
        $data['o'] = $o;
        $data['logo'] = $logo;
        $data['photo'] = $photo;
        $data['signature'] = $signature;
        $data['company_name'] = $o_company->name;
        $data['habeasdatainfo'] = !empty($o_habeas->id) ? nl2br($o_habeas->description) : '';
        $full_name = $o->name . ' ' . $o->scd_name . ' ' . $o->lastname . ' ' . $o->scd_lastname;
        if ($this->dateYears($o->birth)) {
            $full_name = $o->name_attendant;
        }
        $data['full_name'] = $full_name;
        $pdf = PDF::loadView('pdf.habeas', $data);
        //retornamos el pdf
        if ($save) {
            //$pdfFilePath = './storage/app/public/'.$id.'.pdf';
            $pdfFilePath = 'app/public/uploads/h_' . $id . '.pdf';
            $pdf->save(storage_path($pdfFilePath));
            return $pdfFilePath;
        }
        return $pdf->stream('document.pdf');
        //return $pdf->getMpdf();
        //$pdf->showImageErrors = true;
        //$pdf->curlAllowUnsafeSslRequests = true;
        //return $pdf->stream('document.pdf');
        //$pdf = PDF::chunkLoadView('<html-separator/>', 'pdf.document', $data);
        //->save($pdfFilePath);
    }

    private function dateYears($date, $limit = 18)
    {
        $date1 = $date;
        if (empty($date1)) {
            $date1 = date('Y-m-d');
        }
        $date2 = date('Y-m-d');
        $diff = abs(strtotime($date2) - strtotime($date1));
        $years = floor($diff / (365 * 60 * 60 * 24));
        //$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        //$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        return $years < $limit;
    }

    //PDF
    public function pdfgallery($id, $save = false)
    {
        if (empty($id)) {
            return redirect($this->r_name);
        }
        $o = $this->o_model::where(['uuid' => $id])->first();
        if (empty($o->id)) {
            return redirect($this->r_name);
        }
        $o_company = Companies::where(['id' => Auth::user()->company])->first();
        $logo = !empty($o_company->logo_pp) ? public_path($o_company->logo_pp) : public_path('assets/images/favicon.png');
        $photo = !empty($o->photo_pp) ? $o->photo_pp : public_path('assets/images/user.png');
        $data['o'] = $o;
        $data['logo'] = $logo;
        $data['photo'] = $photo;
        $data['company_name'] = $o_company->name;
        $full_name = $o->name . ' ' . $o->scd_name . ' ' . $o->lastname . ' ' . $o->scd_lastname;
        $data['full_name'] = $full_name;
        $data['o_gallerys'] = Photographic::where(['user' => $o->id, 'status' => 'active'])->orderBy('id', 'DESC')->get();
        $pdf = PDF::loadView('pdf.gallery', $data);
        return $pdf->stream($id . '.pdf');
    }

    //Obtener doctores disponibles segun el tipo de consulta
    public function get_doctors(Request $request, $qt)
    {

        $user = Auth::user();
        $doctores = DB::table('users')
            ->join('diary', 'users.id', '=', 'diary.user')
            ->join('diaryqt', 'diaryqt.diary_id', '=', 'diary.id')
            ->join('querytypes', 'querytypes.id', '=', 'diaryqt.qt_id')
            ->where('querytypes.id', '=', $qt);
        if ($user->role_class->name === 'Medico') {
            $doctores = $doctores->where('user', $user->id);
        }
        $doctores = $doctores->select('users.id', 'users.name')
            ->distinct()->get(['id', 'name']);
        return $doctores;
    }

    // Obtener citas de un paciente
    public function appointments(Request $request, $uuid)
    {

        $user = User::where('uuid', $uuid)->first();

        $appointments = Appointments::with([
            'company_class' => function ($query) {
                $query->select('id', 'name');
            },
            'doctor_class' => function ($query) {
                $query->select('id', 'name');
            },
            'campus_class' => function ($query) {
                $query->select('id', 'name');
            },
            'user_class' => function ($query) {
                $query->select('id', 'name');
            }
        ])->where('user', $user->id)
            ->where('company', Auth::user()->company);

        if (Auth::user()->role_class->name == 'Doctor') {
            $appointments = $appointments->where('doctor', Auth::user()->id);
        }
        $appointments = $appointments->get();
        $data = $this->gdata('Citas');
        $data['user'] = $user;
        $data['appointments'] = $appointments;

        return view($this->v_name . '.citas.citas_records', $data);;
    }

    public function update_appointment(Request $request, $id)
    {

        if ($request->method() === 'GET') {
            if (empty($id)) {
                return redirect($this->r_name);
            }
            $o_apppoint = Appointments::where(['uuid' => $id])->first();
            if (empty($o_apppoint->id)) {
                return redirect($this->r_name);
            }
            $user = Auth::user();
            $data = $this->gdata('Actualizar');
            $campus = $user->company_class->campus;
            $data['query_types'] = Querytypes::where(['company' => $user->company])->whereNotIn('status', ['deleted'])->orderBy('id', 'asc')->get(['id', 'name']);
            $data['campus'] = $campus;
            $data['patient'] = $o_apppoint->user_class;
            $data['title'] = 'Actualizar bloqueo de agenda';
            $data['o'] = $o_apppoint;
            return view($this->v_name . '.citas.update_appointment', $data);
        } else {
            $o = Appointments::where(['uuid' => $id])->first();
            if (empty($o->id)) {
                return redirect('/');
            }
            $data = request()->except(['_token', '_method']);
            $validatedData = $request->validate([
                'action_type' => 'required',
                'action_value' => 'required',
            ], [
                'action_type.required' => 'El tipo de documento es requerido',
                'action_value.required' => 'El valor es requerido',
            ]);
            if ($data['action_type'] == 'date_quote') {
                if ($data['modality'] == 'Teleconsulta') {
                    return redirect('paymentsh/' . $o->id); //modality
                } else {
                    //Actualizamos la cita
                    $o_qt = Querytypes::where(['id' => $data['query_type']])->first();
                    //creamos la cita
                    $data_apt = [
                        'modality' => $data['modality'],
                        'campus' => $data['campus'],
                        'qt_id' => $data['query_type'],
                        'query_type' => !empty($o_qt->id) ? $o_qt->name : '',
                        'doctor' => $data['doctor'],
                        'date_quote' => $data['action_value'],
                        'time_quote' => $data['time_quote'],
                        'note' => $data['note'],
                        'invoice' => uniqid(),
                        'amount' => $o_qt->price,
                        'currency' => 'COP',
                        'response' => 'Pendiente',
                        'franchise' => 'Efectivo',
                        'date_init' => date('Y-m-d'),
                    ];
                    $o_apt = $o->update($data_apt);
                    //notificamos
                    $o_user = User::where(['id' => $o->user])->first();
                    Mail::to($o_user->email)->send(new Ntfs('Cita agendada', 'Hola ' . $o_user->name . ', su cita de ' . $o->query_type . ' ha sido agendada correctamente para el día ' . $o->date_quote . ' a la hora ' . $o->time_quote . ' en la modalidad ' . $o->modality . ', recuerde estar puntual y realizar el pago de forma precencial en el lugar de la cita.', $o_user->name, $o_user->email));
                }
                return redirect($this->r_name . '/appointments/' . $o->user); //finalized
            }
            return redirect('/');
        }
    }
    // Agendar consulta
    public function make_cita(Request $request, $uuid, $uuid_s = null)
    {

        if ($request->method() === "GET") {
            $data = $this->gdata('Agendar cita');
            $patient = User::where(['uuid' => $uuid])->first();


            $params_s = [
                'user' => $patient->id,
                'company' => $patient->company
            ];
            $last_sol = Solicitude::where(
                'user',
                $patient->id
            )
                ->where('company', $patient->company)
                ->where('status', 'active')
                ->latest()
                ->first(['uuid']);
            if (!empty($last_sol)) {
                $data['o_sol'] = $last_sol;
            } else {
                $data['o_sol'] = Solicitude::create($params_s);
            }

            $user = Auth::user();
            $campus = $user->company_class->campus;
            // $data['doctores'] = User::where(['role' => 3, 'company' => $user->company])->whereNotIn('status', ['deleted'])->orderBy('id', 'asc')->get();
            $data['query_types'] = Querytypes::where(['company' => $user->company])->whereNotIn('status', ['deleted'])->orderBy('id', 'asc')->get(['id', 'name']);
            $data['patient'] = $patient;
            $data['campus'] = $campus;
            return view($this->v_name . '.citas.make_cita', $data);
        } else {
            $o = Solicitude::where(['uuid' => $uuid_s])->first();
            if (empty($o->id)) {
                return redirect('/');
            }
            $data = request()->except(['_token', '_method']);
            $validatedData = $request->validate([
                'action_type' => 'required',
                'action_value' => 'required',
            ], [
                'action_type.required' => 'El tipo de documento es requerido',
                'action_value.required' => 'El valor es requerido',
            ]);

            $params = [$data['action_type'] => $data['action_value']];
            if ($data['action_type'] == 'qt_id') {
                $o_qt = Querytypes::where(['id' => $data['action_value']])->first();
                $params['query_type'] = !empty($o_qt->id) ? $o_qt->name : '';
            } else if ($data['action_type'] == 'date_quote') {
                //$params['campus'] = $data['campus'];
                $o_qt = Querytypes::where(['id' => $data['query_type']])->first();
                $params['query_type'] = !empty($o_qt->id) ? $o_qt->name : '';
                $params['time_quote'] = $data['time_quote'];
                $params['note'] = $data['note'];
                $params['modality'] = $data['modality']; //Presencial,Teleconsulta,Domiciliaria
                $params['qt_id'] = $data['query_type']; //Presencial,Teleconsulta,Domiciliaria
                $params['doctor'] = $data['doctor']; //Presencial,Teleconsulta,Domiciliaria
                $params['campus'] = $data['campus']; //Presencial,Teleconsulta,Domiciliaria
            }
            $o->update($params);
            if ($data['action_type'] == 'qt_id') {
                return redirect('doctors/' . $o->id);
            } else if ($data['action_type'] == 'doctor') {
                return redirect('clndrsh/' . $o->id);
            } else if ($data['action_type'] == 'date_quote') {
                if ($data['modality'] == 'Teleconsulta') {
                    $o->update(['status' => 'pending']);
                    return redirect('paymentsh/' . $o->id); //modality
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
                    Mail::to($o_user->email)->send(new Ntfs('Cita agendada', 'Hola ' . $o_user->name . ', su cita de ' . $o->query_type . ' ha sido agendada correctamente para el día ' . $o->date_quote . ' a la hora ' . $o->time_quote . ' en la modalidad ' . $o->modality . ', recuerde estar puntual y realizar el pago de forma precencial en el lugar de la cita.', $o_user->name, $o_user->email));
                }
                return redirect('finalized'); //finalized
            }
            return redirect('/');
        }
    }
    public function get_habailable_days(Request $request)
    {

        $data = request()->except(['_token', '_method']);
        $o_doctor = User::with([
            'company_class' => function ($query) {
                $query->select('id', 'name'); # Uno a muchos
            }
        ])
            ->where(['id' => $data["doctor"]])
            ->first(['id', 'name', 'company']);
        $o_diary = Diary::where(['user' => $o_doctor->id])->first();
        if (empty($o_diary->id)) {
            $o_diary = Diary::create(['user' => $o_doctor->id, 'company' => $o_doctor->company]);
        }
        //Buscamos los dias que trabaja
        $businessHours = [];
        $locks_days = ''; //
        $str_days = ''; //
        for ($i = 1; $i <= 7; $i++) {
            $tag = 'day' . $i;
            $time_init = 'time_init' . $i;
            $time_end = 'time_end' . $i;
            $tag_campus = 'campus' . $i;
            if ($o_diary->$tag == 'not' || $o_diary->$tag_campus != intval($data['campus'])) {
                $str_days .= !empty($str_days) ? ', ' . $i : $i;
            } else {
                // array_push(
                //     $businessHours,
                //     [
                //         "daysOfWeek" => [$i],
                //         "startTime" => $o_diary->$time_init,
                //         "endTime" => $o_diary->$time_end
                //     ]
                // );
                $event = '{
                    "daysOfWeek": [' . $i . '],
                    "startTime" :"' . '00:00' . '",
                    "title" :"' . 'Agenda bloqueada' . '",
                    "endTime" :"' . $o_diary->$time_init . '",
                    "color" :"#dcdcdc"
                    },' . '{
                        "daysOfWeek": [' . $i . '],
                        "startTime" :"' . $o_diary->$time_end . '",
                        "endTime" :"' . '23:59' . '",
                        "title" :"' . 'Agenda bloqueada' . '",
                        "color" :"#dcdcdc"
                        }';
                $locks_days .= !empty($locks_days) ? ', ' . $event : $event;
            }
        }
        if (!empty($str_days)) {
            $str_days = '[ ' . $str_days . ' ]';
            $str_days = str_replace('7', '0', $str_days); //hiddenDays: [ 6,0 ],
        }
        //Bloqueos de agenda
        $locks_all = Locks::where(['user' => $o_doctor->id, 'company' => $o_doctor->company])->whereDate('date_end', '>=', date('Y-m-d'))->whereNotIn('status', ['deleted'])->orderBy('id', 'asc')->get();
        // $locks_days = ''; //
        if (count($locks_all) > 0) {
            foreach ($locks_all as $key => $row) {
                $date = new DateTime($row->date_quote . ' ' . $row->time_quote);
                // $date_end = $date->add(new DateInterval('PT30M'));
                $locks_event = '{"id": "' . $row->uuid . '","start": "' . $row->date_init . 'T' . $row->time_init . ':00", "end": "' . $row->date_end . 'T' . $row->time_end . ':00"'  . ',"overlap": false,"title": "Agenda bloqueada","display": "auto","backgroundColor": "#dcdcdc","color": "#dcdcdc"}'; //Event
                $locks_days .= !empty($locks_days) ? ', ' . $locks_event : $locks_event;
            }
        }
        //Agendas programadas
        $pts_all = Appointments::where(['doctor' => $o_doctor->id, 'company' => $o_doctor->company])->whereDate('date_quote', '>=', date('Y-m-d'))->whereNotIn('status', ['deleted'])->orderBy('id', 'asc')->get();
        if (count($pts_all) > 0) {
            foreach ($pts_all as $key => $row) {
                $date = new DateTime($row->date_quote . ' ' . $row->time_quote);
                $date_end = $date->add(new DateInterval('PT30M'));
                $locks_event = '{"id": "' . $row->uuid . '","start": "' . $row->date_quote . 'T' . $row->time_quote . ':00", "end": "' . $date_end->format('Y-m-d H:i:s') . '","overlap": false,"title": "Cita ' . $row->query_type . '","display": "auto","backgroundColor": "#79f392","color": "#79f392"}'; //Event
                $locks_days .= !empty($locks_days) ? ', ' . $locks_event : $locks_event;
            }
        }
        if (!empty($locks_days)) {
            $locks_days = '[' . $locks_days . ']';
        }

        $data['str_days'] = $str_days;
        $data['locks_days'] = $locks_days;
        // $data['businessHours'] = $businessHours;
        return $data;
    }

    public function appointments_calendar(Request $request)
    {
        $doctors = DB::table('users')
                ->join('roles', function ($join) {
                    $join->on('users.role', '=', 'roles.id')
                        ->where('roles.name', '=', 'Medico');
                })
                ->get(['users.id', 'users.name']);
        $campus = Headquarters::all();

        $data = $this->gdata('Agenda de citas');
        $data['doctors'] = $doctors;
        $data['campus'] = $campus;
        return view($this->v_name . '.appointments_calendar', $data);
    }

    public function appointments_calendar_events(Request $request)
    {
        if ($request->method() === 'POST') {
            $data = request()->except(['_token', '_method']);
            $locks_days = ''; //
            //Agendas programadas
            $pts_all = Appointments::whereNotIn('status', ['deleted'])->orderBy('id', 'asc');
            if (!empty($data['doctor']) && $data['doctor'] !== '0') {
                $pts_all = $pts_all->where(['doctor' => $data['doctor']]);
            }
            if(!empty($data['sede']) && $data['sede'] !== '0') {
                $pts_all = $pts_all->where(['campus' => $data['sede']]);
            }
            $pts_all = $pts_all->get(['uuid','date_quote','time_quote','doctor','campus','query_type']);
            if (count($pts_all) > 0) {
                foreach ($pts_all as $key => $row) {
                    $date = new DateTime($row->date_quote . ' ' . $row->time_quote);
                    $resourceId = '[' . $row->doctor . ',' . $row->campus . ']';
                    $date_end = $date->add(new DateInterval('PT30M'));
                    $locks_event = '{"id": "' . $row->uuid . '","start": "' . $row->date_quote . 'T' . $row->time_quote . ':00", "end": "' . $date_end->format('Y-m-d H:i:s') . '","overlap": false,"title": "Cita ' . $row->query_type . '","display": "auto","backgroundColor": "#79f392","color": "#79f392","resourceId":' . $resourceId . '}'; //Event
                    $locks_days .= !empty($locks_days) ? ', ' . $locks_event : $locks_event;
                }
            }
            if (!empty($locks_days)) {
                $locks_days = '[' . $locks_days . ']';
            } else {
                $locks_days = '[]';
            }
            $data['locks_days'] = $locks_days;
            return $data;
        }
        return redirect('/');
    }
}
