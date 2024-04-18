<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eoexams extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'eoexams';

    protected $guarded = ['id'];
	
}
