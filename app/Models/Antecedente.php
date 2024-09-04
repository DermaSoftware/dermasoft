<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antecedente extends Model
{
    use HasFactory,Uuids;

	protected $table = 'antecedentes';

    protected $guarded = ['id'];

    public function type_class()
    {
        return $this->belongsTo(TipoAntecedente::class, 'type_id');
    }
    public function hc_class()
    {
        return $this->belongsTo(Dermatology::class, 'hc');
    }
    public function appointments(){
        return $this->belongsTo(Appointments::class);
    }
}
