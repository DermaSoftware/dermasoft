<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checklistsecurity extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'checklistsecurity';

    protected $guarded = ['id'];
	
}
