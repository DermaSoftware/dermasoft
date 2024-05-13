<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    use HasFactory,Uuids;

	protected $table = 'appointments';

    protected $guarded = ['id'];


    public function campus_class()
    {
        return $this->belongsTo(Headquarters::class, 'campus');
    }
    public function company_class()
    {
        return $this->belongsTo(Companies::class, 'company');
    }

    public function user_class()
    {
        return $this->belongsTo(User::class, 'user');
    }

    public function doctor_class()
    {
        return $this->belongsTo(User::class, 'doctor');
    }
    public function latestVitalsign()
    {
        return $this->hasOne(Vitalsigns::class,'appointment_id')->latestOfMany();
    }

    public function vitalsigns()
    {
        return $this->hasMany(Vitalsigns::class,'appointment_id');
    }
}
