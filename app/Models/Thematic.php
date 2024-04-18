<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thematic extends Model
{

	use HasFactory,Uuids;

    protected $table = 'thematic';

    protected $guarded = ['id'];

}
