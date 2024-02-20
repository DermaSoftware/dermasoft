<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnoses extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'diagnoses';

    protected $guarded = ['id'];
	
}
