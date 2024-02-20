<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hcaesthetic extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'hcaesthetic';

    protected $guarded = ['id'];
	
}
