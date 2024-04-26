<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratoryexams extends Model
{
    use HasFactory,Uuids;

	protected $table = 'laboratoryexams';

    protected $guarded = ['id'];

    public function examsrequests(){
        return $this->belongsToMany(ExamRequest::class,'rexam_laboratoryexams','exam_request_id','laboratoryexams_id');
    }

    // public function exam(){
    //     return $this->hasMany(RexamLaboratoryexams::class);
    // }
}
