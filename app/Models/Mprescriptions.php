<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mprescriptions extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'mprescriptions';

    protected $guarded = ['id'];
	
}
