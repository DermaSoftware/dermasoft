<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diaryprocedures extends Model
{
    use HasFactory;
	
	protected $table = 'diaryprocedures';

    protected $guarded = ['id'];
	
}
