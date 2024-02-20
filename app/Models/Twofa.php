<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Twofa extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'twofa';

    protected $guarded = ['id'];
	
    public function user()
    {
        return $this->hasOne(User::class,'id', 'user');
    }
}
