<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recovery extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'recovery';

    protected $guarded = ['id'];
	
	
    public function getUser()
    {
        return User::findOrFail($this->user)->name;
    }
	
    public function user()
    {
        return $this->hasOne(User::class,'user');
    }
}
