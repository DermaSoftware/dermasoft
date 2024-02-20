<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'orders';

    protected $guarded = ['id'];
	
	public function getCompany()
    {
        return Companies::findOrFail($this->company)->name;
    }
	
    public function company()
    {
        return $this->belongsTo(Companies::class,'company');
    }
	
	public function getPlan()
    {
        return Plans::findOrFail($this->plan)->name;
    }
	
    public function plan()
    {
        return $this->belongsTo(Plans::class,'plan');
    }
	
    public function getUser()
    {
        return User::findOrFail($this->user)->name;
    }
	
    public function user()
    {
        return $this->belongsTo(User::class,'user');
    }

    public function getCreatedAt()
    {
        return !empty($this->created_at)?date_format(date_create($this->created_at),"Y-m-d"):'';
    }
	
}
