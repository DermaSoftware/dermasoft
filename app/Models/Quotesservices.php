<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotesservices extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'quotesservices';

    protected $guarded = ['id'];
	
	public function getService()
    {
        return Services::where(['id' => $this->service])->first();
    }
	
}
