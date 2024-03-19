<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Charges extends Model
{
    use HasFactory,Uuids;

	protected $table = 'charges';

    protected $guarded = ['id'];

    public function users(){
        return $this->hasMany(User::class,'charge');
    }
}
