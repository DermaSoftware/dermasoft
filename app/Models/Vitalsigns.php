<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vitalsigns extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'vitalsigns';

    protected $guarded = ['id'];
	
}
