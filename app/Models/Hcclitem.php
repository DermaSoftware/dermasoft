<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hcclitem extends Model
{
    use HasFactory,Uuids;

	protected $table = 'hcclitem';

    protected $guarded = ['id'];

    public function checklist_class()
    {
        return $this->belongsTo(Hcchecklist::class, 'checklist');
    }
}
