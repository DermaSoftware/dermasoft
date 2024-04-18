<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anamnesis extends Model
{
    use HasFactory,Uuids;

	protected $table = 'anamnesis';

    protected $guarded = ['id'];

    public function appointments(){
        return $this->belongsTo(Appointments::class,'appointments');
    }
    public function dermatology(){
        return $this->belongsTo(Dermatology::class);
    }

    public function doctor_class(){
        return $this->belongsTo(User::class,'doctor');
    }
}
