<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hcsuture extends Model
{
    use HasFactory,Uuids;

	protected $table = 'hcsuture';

    protected $guarded = ['id'];

    public function hcprocedure(){
        return $this->belongsTo(Hcprocedure::class);
    }
    public function hprocedure(){
        return $this->belongsTo(Hprocedure::class);
    }
}
