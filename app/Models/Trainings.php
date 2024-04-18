<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainings extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'trainings';

    protected $guarded = ['id'];
	
	public function roles()
    {
        return $this->belongsToMany(Roles::class,'trainingsroles');
    }
	
	public function users()
    {
        return $this->belongsToMany(User::class,'trainingsusers');
    }
	
}
