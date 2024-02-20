<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hclesion extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'hclesion';

    protected $guarded = ['id'];
	
}
