<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diaryqt extends Model
{
    use HasFactory;

	protected $table = 'diaryqt';

    protected $guarded = ['id'];

    public function diary()
    {
        return $this->belongsTo(Diary::class);
    }

    public function qt()
    {
        return $this->belongsTo(Querytypes::class);
    }
}
