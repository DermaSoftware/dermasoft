<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dermatology;
use App\Models\ExamRequest;
use App\Models\Hprocedure;
use App\Models\PathologyRequest;
use App\Models\Prescription;
use App\Models\ProcedureRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ServicesController extends Controller
{
	private $tag_the = 'El';
    private $tag_o = 'o';
    private $r_name = 'patients';
    private $v_name = 'patients';
    private $c_name = 'Paciente';
    private $c_names = 'Pacientes';
	private $list_tbl_fsc = ['name' => 'Nombre'];
	private $o_model = null;

	private function gdata($t = '')
    {
        $data['menu'] = $this->r_name;
        $data['tag_o'] = $this->tag_o;
        $data['tag_the'] = $this->tag_the;
        $data['v_name'] = $this->v_name;
        $data['c_name'] = $this->c_name;
        $data['c_names'] = $this->c_names;
        $data['list_tbl_fsc'] = $this->list_tbl_fsc;
        $data['title'] = $t.' '.$this->c_names;
		return $data;
    }

	// public function __construct(){
    //     $this->middleware('checkRole:2_3');
    // }


    /////////////// Medical Prescription /////////////////////////
    public function medical_prescription(Request $request){

        $data = request()->except(['_token', '_method']);
        $user = Auth::user();
        $hc = Dermatology::where('user',$user->id)->orderBy('created_at','desc')
            ->first();
        $prescriptions= Prescription::with([
            'doctor_class' => function ($query) {
                $query->select('id','uuid','name','lastname'); # Uno a muchos
            },
            'appointments' => function ($query) {
                $query->select('id','uuid','date_quote','time_quote'); # Uno a muchos
            },
            'prescriptionmedicines' => function ($query) {
                $query->select('id','uuid','medicine_name','prescription_id','dose','frequency',
                'route_administration','duration','indications'); # Uno a muchos
            }
            ])
        ->where('dermatology_id',$hc->id)
        ->orderBy('created_at','DESC')
        ->orderBy('updated_at','DESC')
        ->get(['id','doctor','appointments_id','validity','uuid','created_at']);

         return DataTables::of($prescriptions)->make(true);
    }

    public function exam_request(Request $request){

        $data = request()->except(['_token', '_method']);
        $user = Auth::user();
        $hc = Dermatology::where('user',$user->id)->orderBy('created_at','desc')
            ->first();
        $exams= ExamRequest::with([
            'doctor_class' => function ($query) {
                $query->select('id','uuid','name','lastname'); # Uno a muchos
            },
            'appointments' => function ($query) {
                $query->select('id','uuid','date_quote','time_quote'); # Uno a muchos
            },
            'laboratoryexams'
            ])
        ->where('dermatology_id',$hc->id)
        ->orderBy('created_at','DESC')
        ->orderBy('updated_at','DESC')
        ->get(['id','doctor','appointments_id','total','uuid','created_at']);

         return DataTables::of($exams)->make(true);
    }

    public function procedure_request(Request $request){

        $data = request()->except(['_token', '_method']);
        $user = Auth::user();
        $hc = Dermatology::where('user',$user->id)->orderBy('created_at','desc')
            ->first();
        $procedures_requests= ProcedureRequest::with([
            'doctor_class' => function ($query) {
                $query->select('id','uuid','name','lastname'); # Uno a muchos
            },
            'appointments' => function ($query) {
                $query->select('id','uuid','date_quote','time_quote'); # Uno a muchos
            },
            'procedures'
            ])
        ->where('dermatology_id',$hc->id)
        ->orderBy('created_at','DESC')
        ->orderBy('updated_at','DESC')
        ->get(['id','doctor','appointments_id','uuid','created_at']);

         return DataTables::of($procedures_requests)->make(true);
    }

    public function patology_request(Request $request){

        $data = request()->except(['_token', '_method']);
        $user = Auth::user();
        $hc = Dermatology::where('user',$user->id)->orderBy('created_at','desc')
            ->first();
        $path_r= PathologyRequest::with([
            'doctor_class' => function ($query) {
                $query->select('id','uuid','name','lastname'); # Uno a muchos
            },
            'appointments' => function ($query) {
                $query->select('id','uuid','date_quote','time_quote'); # Uno a muchos
            },
            'pathologies'
            ])
        ->where('dermatology_id',$hc->id)
        ->orderBy('created_at','DESC')
        ->orderBy('updated_at','DESC')
        ->get(['id','doctor','annexes','appointments_id','uuid','created_at']);

         return DataTables::of($path_r)->make(true);
    }

    /////////////// BIPSIES /////////////////////////
    public function biopsies(Request $request){
        $data = request()->except(['_token', '_method']);
        $user = Auth::user();
        $hc = Dermatology::where('user',$user->id)->orderBy('created_at','desc')
            ->first();
        $biopsies= Hprocedure::with([
            'doctor_class' => function ($query) {
                $query->select('id','name','lastname'); # Uno a muchos
            },
            'appointments' => function ($query) {
                $query->with(['campus_class'])->select('id','uuid','doctor',
                    'date_quote','time_quote','created_at','campus'); # Uno a muchos
            },
            ])
            ->where('hc',$hc->id);
        if(isset($data['hc_type'])){
            $biopsies = $biopsies->where('hc_type',$data['hc_type']);
        }
        $biopsies = $biopsies->orderBy('created_at', 'desc')
            ->get(['id','uuid','doctor','appointments_id','hc_type','updated_at','created_at']);

         return DataTables::of($biopsies)->make(true);
    }
    // public function add_biopsie(Request $request,$hc,$appointment = null){
    //     $appoint = Appointments::find($appointment);
    //     if($request->method() === 'GET'){
    //         $procedures_requests= ProcedureRequest::with([
    //             'procedures'
    //             ])
    //         ->where('dermatology_id',$hc)
    //         ->orderBy('created_at','DESC')
    //         ->orderBy('updated_at','DESC')
    //         ->get(['id','uuid','created_at']);

    //         $data = [];
    //         $data['post_url'] = $this->r_name . '/biopsies/' . $hc .'/' .$appointment. '/add';
    //         $data['o_medicines'] = Medicines::where(['status' => 'active'])->orderBy('id', 'asc')->get(['name','id','description']);
    //         $data['o_labexams'] = Laboratoryexams::where(['status' => 'active'])->orderBy('id', 'asc')->get(['name','id','description']);
    //         $data['o_procs'] = Procedures::where(['status' => 'active'])->orderBy('id', 'asc')->get(['name','id','description']);
    //         $data['o_paths'] = Pathologies::where(['status' => 'active'])->orderBy('id', 'asc')->get(['name','id','description']);
    //         $data['o_hcp'] = null;
    //         $data['is_other'] = false;
    //         $data['procedures_requests'] = $procedures_requests;
    //         return view($this->v_name . '.form.modals.modal_biopsie', $data);
    //     }
    //     else{
    //         $data = request()->except(['_token', '_method']);
    //         $derma= Dermatology::where('id',$hc)->first();
    //         $aux_params = ['hc' => $derma->id,'user' => $derma->user_class->id,'company' => $derma->company,'campus' => $derma->campus];
    //         $all_params = ['type_procedure','other_procedure','disinfection','antiseptic','anesthesia','type_anesthesia','other_anesthesia','hemostasis','other_hemostasis','procedure_time','complications','record_complications','participants','comments','biopsy_method','other_biopsy_method','biopsy_type','required_margin','how_much','body_area','body_area_other'];
    //         foreach($all_params as $key => $row){
    //             $aux_params[$row] = !empty($data[$row])?$data[$row]:'';
    //         }
    //         $aux_params['prequest_nprocedure_id'] = $data['prequest_nprocedure_id'];
    //         $aux_params['doctor'] = Auth::user()->id;
    //         $aux_params['appointments_id'] = $appointment;
    //         $aux_params['hc_type'] = $appoint->hc_type;
    //         $o_hcpro = Hprocedure::create($aux_params);
    //         //HCSUTURE
    //         if(!empty($data['suture_type'])){
    //             foreach($data['suture_type'] as $key => $row){
    //                 $aux_params = ['hc' => $derma->id,'user' => $derma->user_class->id,'company' => $derma->company,'campus' => $derma->campus];
    //                 $aux_params['suture_type'] = !empty($row)?$row:'';
    //                 $aux_params['hprocedure_id'] = $o_hcpro->id;
    //                 $aux_params['caliber'] = !empty($data['caliber'][$key])?$data['caliber'][$key]:'';
    //                 $o_x = Hcsuture::create($aux_params);
    //             }
    //         }
    //         return [
    //             "Success" => true,
    //             "Message" => "Adición exitosa"
    //         ];
    //     }
    // }
    // public function edit_biopsie(Request $request,$hc,$id,$appointment){

    //     if($request->method() === 'GET'){

    //         $Hcprocedure = Hcprocedure::find($id);
    //         $data = [];
    //         $data['post_url'] = $this->r_name . '/biopsies/' . $hc . '/' . $id . '/edit';
    //         $data['o_medicines'] = Medicines::where(['status' => 'active'])->orderBy('id', 'asc')->get(['name','id','description']);
    //         $data['o_labexams'] = Laboratoryexams::where(['status' => 'active'])->orderBy('id', 'asc')->get(['name','id','description']);
    //         $data['o_procs'] = Procedures::where(['status' => 'active'])->orderBy('id', 'asc')->get(['name','id','description']);
    //         $data['o_paths'] = Pathologies::where(['status' => 'active'])->orderBy('id', 'asc')->get(['name','id','description']);
    //         $data['obj'] = $Hcprocedure;
    //         return view($this->v_name . '.form.modals.modal_biopsie', $data);
    //     }
    //     else{
    //         $o_hcpro = Hcprocedure::find($id);
    //         $derma= Dermatology::where('id',$hc)->first();
    //         $data = request()->except(['_token', '_method']);
    //         $all_params = ['type_procedure','other_procedure','disinfection','antiseptic','anesthesia','type_anesthesia','other_anesthesia','hemostasis','other_hemostasis','procedure_time','complications','record_complications','participants','comments','biopsy_method','other_biopsy_method','biopsy_type','required_margin','how_much','body_area','body_area_other'];
    //         foreach($all_params as $key => $row){
    //             $aux_params[$row] = !empty($data[$row])?$data[$row]:'';
    //         }
    //         $o_hcpro->update($aux_params);
    //         //HCSUTURE
    //         if(!empty($data['suture_type'])){
    //             $hcsu = $o_hcpro->hcsuture;
    //             foreach ($hcsu as $key => $value) {
    //                 $value->delete();
    //             }
    //             foreach($data['suture_type'] as $key => $row){
    //                 $aux_params = ['hc' => $derma->id,'user' => $derma->user_class->id,'company' => $derma->company,'campus' => $derma->campus];
    //                 $aux_params['suture_type'] = !empty($row)?$row:'';
    //                 $aux_params['hcprocedure_id'] = $o_hcpro->id;
    //                 $aux_params['caliber'] = !empty($data['caliber'][$key])?$data['caliber'][$key]:'';
    //                 $o_x = Hcsuture::create($aux_params);
    //             }
    //         }
    //         return [
    //             "Success" => true,
    //             "Message" => "Adición exitosa"
    //         ];
    //     }
    // }

    /////////////// Cryotherapy /////////////////////////
    public function cryotherapies(Request $request){

        $data = request()->except(['_token', '_method']);
        $user = Auth::user();
        $hc = Dermatology::where('user',$user->id)->orderBy('created_at','desc')
            ->first();
        $biopsies= Hprocedure::with([
            'type_procedure_class' => function ($query) {
                $query->select('id','name','description'); # Uno a muchos
            },
            'prequest_nprocedure' => function ($query) {
                $query->select('id','procedures_id'); # Uno a muchos
            },
            'appointments' => function ($query) {
                $query->select('id','uuid','date_quote','time_quote','created_at'); # Uno a muchos
            },
            ])
        ->where('hc',$hc)
        ->orderBy('created_at','DESC')
        ->orderBy('updated_at','DESC')
        ->get(['id','uuid','type_procedure','prequest_nprocedure_id','created_at','updated_at','appointments_id']);

         return DataTables::of($biopsies)->make(true);
    }
    // public function add_cryotherapy(Request $request,$hc,$appointment = null){
    //     $appoint = Appointments::find($appointment);
    //     if($request->method() === 'GET'){

    //         $data = [];
    //         $procedures_requests= ProcedureRequest::with([
    //             'procedures'
    //             ])
    //         ->where('dermatology_id',$hc)
    //         ->orderBy('created_at','DESC')
    //         ->orderBy('updated_at','DESC')
    //         ->get(['id','uuid','created_at']);
    //         $data['post_url'] = $this->r_name . '/cryotherapies/' . $hc .'/' .$appointment. '/add';
    //         $data['obj'] = null;
    //         $data['is_records'] = false;
    //         $data['is_other'] = false;
    //         $data['procedures_requests'] = $procedures_requests;
    //         return view($this->v_name . '.form.modals.modal_crypy', $data);
    //     }
    //     else{
    //         $data = request()->except(['_token', '_method']);
    //         $derma= Dermatology::where('id',$hc)->first();
    //         $aux_params = ['hc' => $derma->id,'user' => $derma->user_class->id,'doctor' => Auth::user()->id];
    //         $all_params = ['lesion','body_area','disinfection','antiseptic','anesthesia','type_anesthesia','other_anesthesia','freeze_time_1','freeze_time_2','defrost_time_1','defrost_time_2','timex','technique','other_technique','procedure_time','complications','record_complications','participants','comments'];
    //         foreach($all_params as $key => $row){
    //             $aux_params[$row] = !empty($data[$row])?$data[$row]:'';
    //         }
    //         $aux_params['prequest_nprocedure_id'] = $data['prequest_nprocedure_id'];
    //         $aux_params['doctor'] = Auth::user()->id;
    //         $aux_params['appointments_id'] = $appointment;
    //         $aux_params['hc_type'] = $appoint->hc_type;
    //         $o_hcpro = Hprocedure::create($aux_params);

    //         return [
    //             "Success" => true,
    //             "Message" => "Adición exitosa"
    //         ];
    //     }
    // }

    /////////////// Aesthetic /////////////////////////
    public function aesthetics(Request $request){

        $data = request()->except(['_token', '_method']);
        $user = Auth::user();
        $hc = Dermatology::where('user',$user->id)->orderBy('created_at','desc')
            ->first();
        $biopsies= Hprocedure::with([
            'type_procedure_class' => function ($query) {
                $query->select('id','name','description'); # Uno a muchos
            },
            'prequest_nprocedure' => function ($query) {
                $query->select('id','procedures_id'); # Uno a muchos
            },
            'htreatment' => function ($query) {
                $query->select('id','muscle','units','product_dates','product_name','lot','dilution','injectable','hprocedure_id'); # Uno a muchos
            },
            'appointments' => function ($query) {
                $query->select('id','uuid','date_quote','time_quote','created_at'); # Uno a muchos
            },
            ])
        ->where('hc',$hc)
        ->orderBy('created_at','DESC')
        ->orderBy('updated_at','DESC')
        ->get(['id','uuid','type_procedure','prequest_nprocedure_id','created_at','appointments_id']);

         return DataTables::of($biopsies)->make(true);
    }
    // public function add_aesthetic(Request $request,$hc,$appointment = null){
    //     $appoint = Appointments::find($appointment);
    //     if($request->method() === 'GET'){

    //         $data = [];
    //         $procedures_requests= ProcedureRequest::with([
    //             'procedures'
    //             ])
    //         ->where('dermatology_id',$hc)
    //         ->orderBy('created_at','DESC')
    //         ->orderBy('updated_at','DESC')
    //         ->get(['id','uuid','created_at']);
    //         $data['post_url'] = $this->r_name . '/aesthetics/' . $hc .'/' .$appointment. '/add';
    //         $data['obj'] = null;
    //         $data['is_records'] = false;
    //         $data['is_other'] = false;
    //         $data['procedures_requests'] = $procedures_requests;
    //         return view($this->v_name . '.form.modals.modal_aesthetic', $data);
    //     }
    //     else{
    //         $data = request()->except(['_token', '_method']);
    //         $derma= Dermatology::where('id',$hc)->first();

    //         $aux_params = ['hc' => $derma->id,'user' => $derma->user_class->id,'doctor' => Auth::user()->id];
    //         $all_params = ['lesion','body_area','disinfection','antiseptic','anesthesia','type_anesthesia','other_anesthesia','freeze_time_1','freeze_time_2','defrost_time_1','defrost_time_2','timex','technique','other_technique','procedure_time','complications','record_complications','participants','comments'];
    //         foreach($all_params as $key => $row){
    //             $aux_params[$row] = !empty($data[$row])?$data[$row]:'';
    //         }
    //         $aux_params['prequest_nprocedure_id'] = $data['prequest_nprocedure_id'];
    //         $aux_params['doctor'] = Auth::user()->id;
    //         $aux_params['appointments_id'] = $appointment;
    //         $aux_params['hc_type'] = $appoint->hc_type;
    //         $o_hcpro = Hprocedure::create($aux_params);

    //         if (!empty($data['muscle'])) {
    //             foreach ($data['muscle'] as $key => $row) {
    //                 $aux_params = ['hprocedure_id' => $o_hcpro->id, 'user' => $derma->user];
    //                 $aux_params['muscle'] = !empty($row) ? $row : '';
    //                 $units = !empty($data['units'][$key]) ? $data['units'][$key] : 0;
    //                 $product_name = !empty($data['product_name'][$key]) ? $data['product_name'][$key] : 0;
    //                 $lot = !empty($data['lot'][$key]) ? $data['lot'][$key] : 0;
    //                 $dilution = !empty($data['dilution'][$key]) ? $data['dilution'][$key] : 0;
    //                 $injectable = !empty($data['injectable'][$key]) ? $data['injectable'][$key] : 0;
    //                 $aux_params['product_name'] = $product_name;
    //                 $aux_params['lot'] = $lot;
    //                 $aux_params['dilution'] = $dilution;
    //                 $aux_params['injectable'] = $injectable;
    //                 $aux_params['units'] = $units;
    //                 // $total += $units;
    //                 $o_x = Htreatment::create($aux_params);
    //             }
    //             // $o_hcpro->update(['total' => $total]);
    //         }
    //         return [
    //             "Success" => true,
    //             "Message" => "Adición exitosa"
    //         ];
    //     }
    // }

    /////////////// SURGICALS /////////////////////////
    public function surgicals(Request $request){
        $data = request()->except(['_token', '_method']);
        $user = Auth::user();
        $hc = Dermatology::where('user',$user->id)->orderBy('created_at','desc')
            ->first();
        $biopsies= Hprocedure::with([
            'type_procedure_class' => function ($query) {
                $query->select('id','name','description'); # Uno a muchos
            },
            'prequest_nprocedure' => function ($query) {
                $query->select('id','procedures_id'); # Uno a muchos
            },
            'hctumors' => function ($query) {
                $query->select('id','tumors','size','margin','pathology','observations','hprocedure_id'); # Uno a muchos
            },
            'appointments' => function ($query) {
                $query->select('id','uuid','date_quote','time_quote','created_at'); # Uno a muchos
            },
            ])
            ->where('hc',$hc)
            ->orderBy('created_at', 'desc')
            ->get(['id','uuid','type_procedure','prequest_nprocedure_id','created_at','appointments_id']);


         return DataTables::of($biopsies)->make(true);
    }
    // public function add_surgical(Request $request,$hc,$appointment = null){
    //     $appoint = Appointments::find($appointment);
    //     if($request->method() === 'GET'){

    //         $data = [];
    //         $appoint = Appointments::find($appointment);
    //         $procedures_requests= ProcedureRequest::with([
    //             'procedures'
    //             ])
    //         ->where('dermatology_id',$hc)
    //         ->orderBy('created_at','DESC')
    //         ->orderBy('updated_at','DESC')
    //         ->get(['id','uuid','created_at']);
    //         $data['post_url'] = $this->r_name . '/surgicals/' . $hc .'/' .$appointment. '/add';
    //         $data['o_medicines'] = Medicines::where(['status' => 'active'])->orderBy('id', 'asc')->get(['name','id','description']);
    //         $data['o_labexams'] = Laboratoryexams::where(['status' => 'active'])->orderBy('id', 'asc')->get(['name','id','description']);
    //         $data['o_procs'] = Procedures::where(['status' => 'active'])->orderBy('id', 'asc')->get(['name','id','description']);
    //         $data['o_paths'] = Pathologies::where(['status' => 'active'])->orderBy('id', 'asc')->get(['name','id','description']);
    //         $data['obj'] = null;
    //         $data['is_records'] = false;
    //         $data['is_other'] = false;
    //         $data['procedures_requests'] = $procedures_requests;
    //         return view($this->v_name . '.form.modals.modal_surgical', $data);
    //     }
    //     else{
    //         $data = request()->except(['_token', '_method']);
    //         $derma= Dermatology::where('id',$hc)->first();
    //         $aux_params = [
    //             'hc' => $derma->id,
    //             'user' => $derma->user_class->id,
    //             'company' => $derma->company,
    //             'campus' => $derma->campus,
    //         ];
    //         $all_params = ['type_procedure','other_procedure','disinfection','antiseptic','anesthesia','type_anesthesia','other_anesthesia','hemostasis','other_hemostasis','procedure_time','complications','record_complications','participants','comments','biopsy_method','other_biopsy_method','biopsy_type','required_margin','how_much','body_area','body_area_other'];
    //         foreach($all_params as $key => $row){
    //             $aux_params[$row] = !empty($data[$row])?$data[$row]:'';
    //         }

    //         $aux_params['prequest_nprocedure_id'] = $data['prequest_nprocedure_id'];
    //         $aux_params['doctor'] = Auth::user()->id;
    //         $aux_params['appointments_id'] = $appointment;
    //         $aux_params['hc_type'] = $appoint->hc_type;
    //         $o_hcpro = Hprocedure::create($aux_params);
    //         if(!empty($data['tumors'])){
    //             foreach($data['tumors'] as $key => $row){
    //                 $aux_params = ['hprocedure_id' => $o_hcpro->id, 'user' =>  $derma->user_class->id,'hc' => $derma->id,'company' => $derma->company,'campus' => $derma->user_class->campus];
    //                 $aux_params['tumors'] = !empty($row)?$row:'';
    //                 $aux_params['size'] = !empty($data['size'][$key])?$data['size'][$key]:'';
    //                 $aux_params['margin'] = !empty($data['margin'][$key])?$data['margin'][$key]:'';
    //                 $aux_params['pathology'] = !empty($data['pathology'][$key])?$data['pathology'][$key]:'';
    //                 $aux_params['observations'] = !empty($data['observations'][$key])?$data['observations'][$key]:'';
    //                 $o_x = Hctumors::create($aux_params);
    //             }
    //         }
    //         return [
    //             "Success" => true,
    //             "Message" => "Adición exitosa"
    //         ];
    //     }
    // }
}
