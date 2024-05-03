<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dermatology extends Model
{
    use HasFactory,Uuids;

	protected $table = 'dermatology';

    protected $guarded = ['id'];


    public function user_class()
    {
        return $this->belongsTo(User::class, 'user');
    }

	public function getCampus()
    {
        $o = Headquarters::where(['id' => $this->campus])->first();
		return !empty($o->id)?$o->name:'No asignado';
    }

	public function getDoctor()
    {
        $o = User::where(['id' => $this->doctor])->first();
		return !empty($o->id)?$o->name.' '.$o->scd_name.' '.$o->lastname.' '.$o->scd_lastname:'No asignado';
    }

	public function getTagUrl()
    {
        $url = url('clinichistory');
		if($this->hc_type == 'Procedimientos Estéticos'){
			$url = url('clinichistory/aesthetic/hcpdf/'.$this->uuid);
		} else if($this->hc_type == 'Biopsías y/o procedimientos'){
			$url = url('clinichistory/biopsies/hcpdf/'.$this->uuid);
		} else if($this->hc_type == 'Crioterapia'){
			$url = url('clinichistory/crypy/hcpdf/'.$this->uuid);
		} else if($this->hc_type == 'Descripción Quirúrgica'){
			$url = url('clinichistory/surgical/hcpdf/'.$this->uuid);
		}
		return $url;
    }

	public function getTagUrlTwo()
    {
        $url = url('consultas');
		if($this->hc_type == 'Procedimientos Estéticos'){
			$url = url('esteticos/hcpdf/'.$this->uuid);
		} else if($this->hc_type == 'Biopsías y/o procedimientos'){
			$url = url('biopsias/hcpdf/'.$this->uuid);
		} else if($this->hc_type == 'Crioterapia'){
			$url = url('crioterapia/hcpdf/'.$this->uuid);
		} else if($this->hc_type == 'Descripción Quirúrgica'){
			$url = url('quirurgica/hcpdf/'.$this->uuid);
		}
		return $url;
    }

    public function anamnesis(){

        return $this->hasMany(Anamnesis::class);
    }
    public function antecedentes(){

        return $this->hasMany(Antecedente::class,'hc');
    }


}
