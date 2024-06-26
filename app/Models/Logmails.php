<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logmails extends Model
{
    use HasFactory,Uuids;

	protected $table = 'logmails';

    protected $guarded = ['id'];

    public function mattachs(){
        return $this->hasMany(Mattachs::class,'mail_id');
    }
}
