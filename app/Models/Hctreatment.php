<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hctreatment extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'hctreatment';

    protected $guarded = ['id'];
	
}
