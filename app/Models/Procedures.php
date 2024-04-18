<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedures extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'procedures';

    protected $guarded = ['id'];
	
}
