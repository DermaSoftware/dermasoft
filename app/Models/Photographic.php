<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photographic extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'photographic';

    protected $guarded = ['id'];
	
}
