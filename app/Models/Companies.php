<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'companies';

    protected $guarded = ['id'];
	
}
