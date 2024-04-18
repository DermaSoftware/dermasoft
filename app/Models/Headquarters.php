<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Headquarters extends Model
{
    use HasFactory,Uuids;

	protected $table = 'headquarters';

    protected $guarded = ['id'];

    public function company_class()
    {
        return $this->belongsTo(Companies::class, 'company');
    }

    public function patients()
    {
        return $this->belongsToMany(User::class,'solicitude','campus','user');
    }
}
