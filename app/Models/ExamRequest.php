<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamRequest extends Model
{
    use HasFactory,Uuids;

	protected $table = 'exam_request';

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
    public function appointments()
    {
        return $this->belongsTo(Appointments::class);
    }

    public function doctor_class()
    {
        return $this->belongsTo(User::class, 'doctor');
    }
    public function laboratoryexams(){
        return $this->belongsToMany(Laboratoryexams::class,'rexam_laboratoryexams','exam_request_id','laboratoryexams_id');
    }
}
