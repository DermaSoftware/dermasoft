<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    use HasFactory,Uuids;

	protected $table = 'diary';

    protected $guarded = ['id'];

    public function user_class()
    {
        return $this->belongsTo(User::class, 'user');
    }
    public function querytypes()
    {
        return $this->belongsToMany(Querytypes::class,'diaryqt','diary_id','qt_id');
    }
}


