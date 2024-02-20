<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eodiagnostics extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'eodiagnostics';

    protected $guarded = ['id'];
	
}
