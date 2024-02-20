<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faqs extends Model
{
    use HasFactory,Uuids;

    protected $table = 'faqs';

    protected $guarded = ['id'];
	
	public function getCat()
    {
        return (!empty($this->catfaq) AND $this->catfaq != 0)?Catfaqs::findOrFail($this->catfaq)->name:'';
    }
}
