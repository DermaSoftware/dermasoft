<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'services';

    protected $guarded = ['id'];
	
	public function category()
    {
        return $this->belongsTo(Categories::class, 'category');
    }
	
}
