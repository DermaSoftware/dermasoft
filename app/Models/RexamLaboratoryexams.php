<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RexamLaboratoryexams extends Model
{
    use HasFactory,Uuids;

	protected $table = 'rexam_laboratoryexams';

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

    public function exam(){
        return $this->belongsTo(Laboratoryexams::class,'laboratoryexams_id');
    }
}
