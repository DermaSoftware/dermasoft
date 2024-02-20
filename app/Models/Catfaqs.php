<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catfaqs extends Model
{
    use HasFactory,Uuids;

    protected $table = 'catfaqs';

    protected $guarded = ['id'];
}
