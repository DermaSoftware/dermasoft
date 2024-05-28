<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedures extends Model
{
    use HasFactory,Uuids;

	protected $table = 'procedures';

    protected $guarded = ['id'];

    public function examsrequest(){
        return $this->belongsToMany(ProcedureRequest::class,'prequest_nprocedure','procedure_request_id','procedures_id');
    }
}
