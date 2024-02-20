<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'diary';

    protected $guarded = ['id'];
	
}
