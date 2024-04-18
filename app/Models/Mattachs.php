<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mattachs extends Model
{
    use HasFactory,Uuids;//Adjutos de mail

	protected $table = 'mattachs';

    protected $guarded = ['id'];

    public function mail(){
        return $this->belongsTo(Logmails::class);
    }
}
