<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedures extends Model
{
    use HasFactory,Uuids;

	protected $table = 'procedures';

    protected $guarded = ['id'];

    public function procedure_prequest(){
        return $this->belongsToMany(ProcedureRequest::class,'prequest_nprocedure','procedure_request_id','procedures_id');
    }
    public function procedures(){
        return $this->belongsTo(Procedures::class,);
    }
}
