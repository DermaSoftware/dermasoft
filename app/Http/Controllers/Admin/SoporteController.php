<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ticket;
use App\Models\Ticketmsj;
use Illuminate\Support\Facades\Auth;

class SoporteController extends Controller
{
	private $tag_the = 'El';
    private $tag_o = 'o';
    private $r_name = 'admin/soporte';
    private $v_name = 'admin.soporte';
    private $c_name = 'Ticket';
    private $c_names = 'Tickets';
	private $list_tbl_fsc = ['user' => 'Usuario','date_init' => 'Fecha','title' => 'Asunto','status' => 'Estado'];
	private $o_model = Ticket::class;
	
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
		$data['o_all'] = $this->o_model::orderBy('id', 'DESC')->get();
		return view($this->v_name.'.index',$data);
    }

    public function show($id)
    {
        if(empty($id)){
			return redirect($this->r_name);
		}
		$tag = is_numeric($id)?'id':'uuid';
		$o = $this->o_model::where([$tag => $id])->first();
		if(empty($o->id)){
			return redirect($this->r_name);
		}
		$data = $this->gdata('Detalles de');
        $data['o'] = $o;
		$data['o_all'] = Ticketmsj::where(['ticket' => $o->id])->orderBy('id', 'DESC')->get();
		return view($this->v_name.'.show',$data);
    }

    public function edit($id)
    {
        if(empty($id)){
			return redirect($this->r_name);
		}
		$tag = is_numeric($id)?'id':'uuid';
		$o = $this->o_model::where([$tag => $id])->first();
		if(empty($o->id)){
			return redirect($this->r_name);
		}
		$data = $this->gdata(' ');
        $data['o'] = $o;
		$data['o_all'] = Ticketmsj::where(['ticket' => $o->id])->get();
		return view($this->v_name.'.edit',$data);
    }

    public function update(Request $request, $id)
    {
        $data = request()->except(['_token','_method']);
		$validatedData = $request->validate([
			'title' => 'required|string',
		],[
			'title.required' => 'El asunto es requerido',
		]);
		if(empty($id)){
			return redirect($this->r_name);
		}
		$tag = is_numeric($id)?'id':'uuid';
		$o = $this->o_model::where([$tag => $id])->first();
		if(empty($o->id)){
			return redirect($this->r_name);
		}
		$file = '';
		if ($request->hasFile('file')) {
            $path = $request->file('file')->store('uploads','public');
			$path = 'storage/'.$path;
            $file = asset($path);
        }
		$o->update(['status' => 'Respondido']);
		$o_msj = Ticketmsj::create(['user' => Auth::user()->id,'ticket' => $o->id,'date_init' => date('Y-m-d H:i:s'),'title' => $data['title'],'description' => $data['description'],'file' => $file,'typemsj' => 'Cliente']);
		$request->session()->flash('msj_success', $this->tag_the.' '.$this->c_name.' '.$o->name.' ha sido actualizad'.$this->tag_o.' correctamente.');
		return redirect($this->r_name);
    }

    public function destroy($id)
    {
        if(empty($id)){
			return response()->json(['response' => 'El ID es requerido'], 401);
		}
		$tag = is_numeric($id)?'id':'uuid';
		$o = $this->o_model::where([$tag => $id])->first();
		if(empty($o->id)){
			return response()->json(['response' => 'El ID no existe en la base de datos'], 401);
		}
		$o->update(['status' => 'Finalizado']);
		return response()->json(['response' => 'ok'], 200);
    }
}
