<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locks extends Model
{
    use HasFactory,Uuids;

	protected $table = 'locks';

    protected $guarded = ['id'];

    public function user_class() {

        return $this->belongsTo(User::class,'user');
    }
}
