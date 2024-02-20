<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitude extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'solicitude';

    protected $guarded = ['id'];
	
	public function querytypes()
    {
        return $this->belongsTo(Querytypes::class, 'qt_id');
    }
	
	public function doctors()
    {
        return $this->belongsTo(User::class, 'doctor');
    }
	
}
