<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hcdermsolpath extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'hcdermsolpath';

    protected $guarded = ['id'];
	
}
