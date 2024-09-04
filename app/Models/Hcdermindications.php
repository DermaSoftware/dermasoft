<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hcdermindications extends Model
{
    use HasFactory,Uuids;

	protected $table = 'hcdermindications';

    protected $guarded = ['id'];

    public function appointments()
    {
        return $this->belongsTo(Appointments::class);
    }
}
