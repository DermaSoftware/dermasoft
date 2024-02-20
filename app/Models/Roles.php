<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'roles';
	
	protected $guarded = ['id'];
	
	public function permissions()
    {
        return $this->belongsToMany(Permissions::class, 'roles_permissions', 'roles_id', 'permissions_id');
    }
	
	public function trainings()
    {
        return $this->belongsToMany(Trainings::class,'trainingsroles');
    }
}
