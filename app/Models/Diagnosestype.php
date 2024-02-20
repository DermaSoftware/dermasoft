<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosestype extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'diagnosestype';

    protected $guarded = ['id'];
	
}
