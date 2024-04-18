<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'ticket';

    protected $guarded = ['id'];
	
	public function getUser()
    {
        return User::findOrFail($this->user)->name;
    }
	
	public function user()
    {
        return $this->hasOne(User::class,'id', 'user');
    }
	
	public function msjs()
    {
        return $this->hasMany(Ticketmsj::class,'ticket');
    }
}
