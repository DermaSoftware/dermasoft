<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratoryexams extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'laboratoryexams';

    protected $guarded = ['id'];
	
}
