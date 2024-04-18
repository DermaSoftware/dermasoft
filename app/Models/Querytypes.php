<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Querytypes extends Model
{
    use HasFactory,Uuids;

	protected $table = 'querytypes';

    protected $guarded = ['id'];

    public function diaries()
    {
        return $this->belongsToMany(Diary::class,'diaryqt','diary_id','qt_id');
    }
}
