<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'products';

    protected $guarded = ['id'];
	
	public function category()
    {
        return $this->belongsTo(Categories::class, 'category');
    }
	
	public function subcategory()
    {
        return $this->belongsTo(Subcategories::class, 'subcategory');
    }
	
}
