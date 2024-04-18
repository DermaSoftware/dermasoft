<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vitalsigns extends Model
{
    use HasFactory,Uuids;

	protected $table = 'vitalsigns';

    protected $guarded = ['id'];

    public function user_class()
    {
        return $this->belongsTo(User::class,'user');
    }
    public function appointment()
    {
        return $this->belongsTo(Appointments::class);
    }
}
