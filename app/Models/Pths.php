<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pths extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'pths';

    protected $guarded = ['id'];
	
	public function getDoctor()
    {
        $o = User::where(['id' => $this->doctor])->first();
		return !empty($o->id)?$o->name.' '.$o->scd_name.' '.$o->lastname.' '.$o->scd_lastname:'No asignado';
    }
	
}
