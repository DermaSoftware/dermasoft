<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotesproducts extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'quotesproducts';

    protected $guarded = ['id'];
	
	public function getProduct()
    {
        return Products::where(['id' => $this->product])->first();
    }
	
}
