<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hcdermdiagnostics extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'hcdermdiagnostics';

    protected $guarded = ['id'];
	
}
