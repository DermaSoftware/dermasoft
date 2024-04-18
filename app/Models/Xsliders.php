<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Xsliders extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'xsliders';

    protected $guarded = ['id'];
	
}
