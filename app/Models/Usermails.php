<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usermails extends Model
{
    use HasFactory,Uuids;
	
	protected $table = 'usermails';

    protected $guarded = ['id'];
	
	public function getMail()
    {
        return Logmails::where(['id' => $this->mail_id])->first();
    }
	
}
