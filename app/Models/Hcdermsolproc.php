<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hcdermsolproc extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'hcdermsolproc';

    protected $guarded = ['id'];
	
}
