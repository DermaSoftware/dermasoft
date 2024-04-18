<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hcdermsolexams extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'hcdermsolexams';

    protected $guarded = ['id'];
	
}
