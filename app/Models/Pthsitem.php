<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pthsitem extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'pthsitem';

    protected $guarded = ['id'];
	
}
