<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hcconsent extends Model
{
    use HasFactory,Uuids;

	protected $table = 'hcconsent';

    protected $guarded = ['id'];

	public function getConsent()
    {
        $o = Consents::where(['id' => $this->consent])->first();
		return !empty($o->id)?$o->name:'---';
    }

	public function getDoctor()
    {
        $o = User::where(['id' => $this->doctor])->first();
		return !empty($o->id)?$o->name.' '.$o->scd_name.' '.$o->lastname.' '.$o->scd_lastname:'No asignado';
    }
    public function dermatology_class()
    {
        return $this->belongsTo(Dermatology::class, 'hc');
    }

}
