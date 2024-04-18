<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticketmsj extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'ticketmsj';

    protected $guarded = ['id'];
	
    public function user()
    {
        return $this->hasOne(User::class,'id', 'user');
    }
	
	public function ticket()
    {
        return $this->hasOne(Ticket::class,'id', 'ticket');
    }
	
	public function getUser()
    {
        return User::findOrFail($this->user);
    }
}
