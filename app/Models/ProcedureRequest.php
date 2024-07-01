<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcedureRequest extends Model
{
    use HasFactory,Uuids;

	protected $table = 'procedure_request';

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
    public function appointments()
    {
        return $this->belongsTo(Appointments::class);
    }
    public function dermatology()
    {
        return $this->belongsTo(Dermatology::class);
    }

    public function procedures(){
        return $this->belongsToMany(Procedures::class,'prequest_nprocedure','procedure_request_id','procedures_id')
            ->withPivot('id','note','otro');
    }
}
