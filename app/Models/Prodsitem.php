<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodsitem extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'prodsitem';

    protected $guarded = ['id'];
	
}
