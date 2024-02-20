<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hctumors extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'hctumors';

    protected $guarded = ['id'];
	
}
