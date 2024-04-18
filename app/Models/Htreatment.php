<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Htreatment extends Model
{
    use HasFactory,Uuids;

	protected $table = 'htreatment';

    protected $guarded = ['id'];


    public function procedure(){
        return $this->belongsTo(Hprocedure::class);
    }

}
