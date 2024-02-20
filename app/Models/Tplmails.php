<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tplmails extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'tplmails';

    protected $guarded = ['id'];
	
}
