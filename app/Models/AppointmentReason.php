<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentReason extends Model
{
    use HasFactory,Uuids;

	protected $table = 'appointment_reason';

    protected $guarded = ['id'];


    public function appointments(){
        return $this->belongsTo(Appointments::class);
    }
    public function dermatology(){
        return $this->belongsTo(Dermatology::class);
    }

    public function doctor_class(){
        return $this->belongsTo(User::class,'doctor');
    }
}
