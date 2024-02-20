<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consents extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'consents';

    protected $guarded = ['id'];
	
}
