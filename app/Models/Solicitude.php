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

	public function company_class()
    {
        return $this->belongsTo(Companies::class, 'company');
    }

    public function user_class()
    {
        return $this->belongsTo(User::class, 'user');
    }

    public function campus_class()
    {
        return $this->belongsTo(Headquarters::class, 'campus');
    }

    public function qt_id_class()
    {
        return $this->belongsTo(Querytypes::class, 'qt_id');
    }
}
