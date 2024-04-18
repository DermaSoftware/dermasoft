<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Chatuser;
use App\Models\Chatmsj;
use App\Models\Chat;
use App\Models\User;
use App\Models\Lessons;
use App\Models\Schedule;

class ChatController extends Controller
{
    public function index()
    {
		
    }
	
	//Agregar chat si no existe
    public function ad($id)
    {
		$o = Chat::where(['lesson' => $id])->first();
		if(empty($o->id)){
			$o_new = Chat::create(['lesson' => $id]);
		}
    }
	
	//Ingresar usuario a chat si no existe
    public function adus($id)
    {
		$o = Chatuser::where(['chat_id' => $id,'user' => Auth::user()->id])->first();
		if(empty($o->id)){
			$o_new = Chatuser::create(['chat_id' => $id,'user' => Auth::user()->id]);
		}
    }
	
	//Agregar mensaje
    public function admsj($id)
    {
		$us = $_POST['us'];
		$body = $_POST['body'];
		$row = Chatmsj::create(['chat_id' => $id,'from_id' => Auth::user()->id,'to_id' => $us,'body' => $body]);
		$out = '';
		$cls = Auth::user()->id == $row->from_id?'sender':'repaly';
		$out .= '<li class="'.$cls.'">';
		$out .= '<p>'.$row->body.'</p>';
		$out .= '<span class="time">'.$row->created_at.'</span>';
		$out .= '</li>';
		echo $out;
    }
	
	//Agregar mensaje
    public function seenmsj($id)
    {
		//seen
		$o = Chatmsj::where(['id' => $id])->first();
		$o->update(['seen' => 'yes']);
    }
	
	//Obtener usuarios
    public function getusers($id)
    {
		$out = '';
		$us = Auth::user()->id;
		/*$o_chat = Chat::where(['id' => $id])->first();
		if(!empty($o_chat->id)){
			$o_les = Lessons::where(['id' => $o_chat->lesson])->first();
			if(!empty($o_les->id)){
				if(!empty($o_les->instructor) AND $o_les->instructor > 0 AND $o_les->instructor != Auth::user()->id){
					$o = User::where(['id' => $o_les->instructor])->first();
					$photo = !empty($o->photo)?$o->photo:asset('assets/images/avatar/01.jpg');
					$out .= '<a href="javascript:void(0)" class="d-flex align-items-center user_chat_fsc" data-id="'.$o->id.'">';
					$out .= '<div class="flex-shrink-0"><img class="img-fluid" src="'.$photo.'" alt="user img" style="max-width: 40px;"><span class="active"></span></div>';
					$out .= '<div class="flex-grow-1 ms-3"><h3>'.$o->name.'</h3><p>'.$o->getRole().'</p></div>';
					$out .= '</a>';
				}
			}
		}*/
		
		/*if(Auth::user()->role == 3){
			$o_chat = Chat::where(['id' => $id])->first();
			$o_les = Lessons::where(['id' => $o_chat->lesson])->first();
			$group = Auth::user()->group;
			$o_sh = Schedule::where(['course' => $o_les->course,'chapter' => $o_les->chapter,'lesson' => $o_les->id,'group' => $group])->orderBy('id', 'DESC')->first();
			
		}*/
		
		
		$group = Auth::user()->group;
		$o_all = Chatuser::where(['chat_id' => $id])->whereNotIn('user',[Auth::user()->id])->orderBy('id', 'asc')->get();
		foreach($o_all as $row){
			$w_us = ['id' => $row->user];
			if(Auth::user()->role == 3){
				$w_us['group'] = $group;
			}
			$o = User::where($w_us)->first();
			if(!empty($o->id)){
				$photo = !empty($o->photo)?$o->photo:asset('assets/images/avatar/01.jpg');
				$sql = "SELECT COUNT(*) as total FROM `chatmsj` WHERE seen='not' && chat_id=".$id." && ((from_id=".$us." && to_id=".$row->user.") OR (from_id=".$row->user." && to_id=".$us.")) limit 1";
				$o_total = DB::select($sql)[0]->total;
				$out .= '<a href="javascript:void(0)" class="d-flex align-items-center user_chat_fsc" data-id="'.$o->id.'" data-tmsj="'.$o_total.'">';
				$out .= '<div class="flex-shrink-0"><img class="img-fluid" src="'.$photo.'" alt="user img" style="max-width: 40px;"><span class="active"></span></div>';
				$out .= '<div class="flex-grow-1 ms-3"><h3>'.$o->name.'</h3><p>'.$o->getRole().'</p></div>';
				$out .= '</a>';
			}
		}
		echo $out;
    }
	
	//Obtener usuario de chat
    public function getuser($id)
    {
		$out = '';
		$o = User::where(['id' => $id])->first();
		$photo = !empty($o->photo)?$o->photo:asset('assets/images/avatar/01.jpg');
		$out .= '<span class="chat-icon" style="display: inline-block !important;"><img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/arroleftt.svg" alt="image title"></span>';
		$out .= '<div class="flex-shrink-0"><img class="img-fluid" src="'.$photo.'" alt="user img" style="max-width: 40px;"></div>';
		$out .= '<div class="flex-grow-1 ms-3"><h3 class="user_current_chat_fsc" data-id="'.$id.'">'.$o->name.'</h3><p>'.$o->getRole().'</p></div>';
		echo $out;
    }
	
	//Obtener usuario de chat
    public function gettmsjuser($id,$user)
    {
		$us = Auth::user()->id;
		$sql = "SELECT COUNT(*) as total FROM `chatmsj` WHERE chat_id=".$id." && ((from_id=".$us." && to_id=".$user.") OR (from_id=".$user." && to_id=".$us.")) limit 1";
		$o_total = DB::select($sql)[0]->total;
		echo $o_total;
    }
	
	//Obtener mensajes
    public function getmsjs($id,$user)
    {
		$data = request()->except(['_token','_method']);
		//$id = $data['id'];
		$us = Auth::user()->id;
		//$user = $data['user'];
		
		$sql = "SELECT * FROM `chatmsj` WHERE chat_id=".$id." && ((from_id=".$us." && to_id=".$user.") OR (from_id=".$user." && to_id=".$us.")) ORDER BY id ASC";
		$o_all = DB::select($sql);
		
		$out = '';
		//$o_all = Chatmsj::where(['chat_id' => $id,'from_id' => Auth::user()->id,'to_id' => $user])->orWhere(['chat_id' => $id,'from_id' => $user,'to_id' => Auth::user()->id])->orderBy('id', 'asc')->get();
		foreach($o_all as $row){
			$cls = Auth::user()->id == $row->from_id?'sender':'repaly';
			$out .= '<li class="'.$cls.'">';
			$out .= '<p>'.$row->body.'</p>';
			$out .= '<span class="time">'.$row->created_at.'</span>';
			$out .= '</li>';
			if(Auth::user()->id == $row->to_id){
				$o = Chatmsj::where(['id' => $row->id])->first();
				$o->update(['seen' => 'yes']);
			}
		}
		echo $out;
    }
}
