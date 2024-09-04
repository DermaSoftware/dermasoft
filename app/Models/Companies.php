<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    use HasFactory,Uuids;

	protected $table = 'companies';

    protected $guarded = ['id'];

    public function plan()
    {
        return $this->belongsTo(Plans::class, 'plan_id');
    }

    public function campus()
    {
        return $this->hasMany(Headquarters::class, 'company');
    }
    public function users()
    {
        return $this->hasMany(User::class, 'company');
    }

}
