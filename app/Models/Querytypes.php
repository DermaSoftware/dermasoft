<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Querytypes extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'querytypes';

    protected $guarded = ['id'];
	
}
