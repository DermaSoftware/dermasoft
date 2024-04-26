<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hprocedure extends Model
{
    use HasFactory,Uuids;

	protected $table = 'hprocedure';

    protected $guarded = ['id'];

	public function getTypeProcedure()
    {
        $o = Procedures::where(['id' => $this->type_procedure])->first();
		return !empty($o->id)?$o->description:'No asignado';
    }

    public function type_procedure_class(){
        return $this->belongsTo(Procedures::class,'type_procedure');
    }
    public function prequest_nprocedure(){
        return $this->belongsTo(PRequest_NProcedure::class);
    }

    public function hcsuture(){
        return $this->hasMany(Hcsuture::class);
    }
    public function htreatment(){
        return $this->hasMany(Htreatment::class);
    }
    public function Hctumors(){
        return $this->hasMany(Hctumors::class);
    }
}
