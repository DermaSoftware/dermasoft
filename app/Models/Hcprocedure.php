<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hcprocedure extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'hcprocedure';

    protected $guarded = ['id'];
	
	public function getTypeProcedure()
    {
        $o = Procedures::where(['id' => $this->type_procedure])->first();
		return !empty($o->id)?$o->description:'No asignado';
    }
	
}
