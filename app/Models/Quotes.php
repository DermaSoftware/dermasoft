<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotes extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'quotes';

    protected $guarded = ['id'];
	
	public function getDoctor()
    {
        $o = User::where(['id' => $this->doctor])->first();
		return !empty($o->id)?$o->name.' '.$o->scd_name.' '.$o->lastname.' '.$o->scd_lastname:'No asignado';
    }
	
	public function user()
    {
        return $this->belongsTo(User::class, 'user');
    }
	
}
