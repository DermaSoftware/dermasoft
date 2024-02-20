<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hccrypy extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'hccrypy';

    protected $guarded = ['id'];
	
}
