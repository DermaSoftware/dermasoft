<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habeas extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'habeas';

    protected $guarded = ['id'];
	
}
