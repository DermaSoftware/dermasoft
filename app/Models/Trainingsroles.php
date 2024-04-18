<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainingsroles extends Model
{
    use HasFactory;
	
	protected $table = 'trainingsroles';

    protected $guarded = ['id'];
	
}
