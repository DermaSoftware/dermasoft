<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicines extends Model
{
    use HasFactory,Uuids;

	protected $table = 'medicines';

    protected $guarded = ['id'];

    public function prescriptions()
    {
        return $this->belongsToMany(Prescription::class);
    }
}
