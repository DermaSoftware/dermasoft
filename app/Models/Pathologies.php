<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pathologies extends Model
{
    use HasFactory,Uuids;

	protected $table = 'pathologies';

    protected $guarded = ['id'];

    public function pathologiesrequests()
    {
        return $this->belongsToMany(PathologyRequest::class, 'patology_request_pathologies','patology_request_id','pathologies_id');
    }
}
