<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainingsusers extends Model
{
    use HasFactory;
	
	protected $table = 'trainingsusers';

    protected $guarded = ['id'];
	
}
