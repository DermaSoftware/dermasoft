<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory,Uuids;

	protected $table = 'prescription';

    protected $guarded = ['id'];


    public function campus_class()
    {
        return $this->belongsTo(Headquarters::class, 'campus');
    }
    public function company_class()
    {
        return $this->belongsTo(Companies::class, 'company');
    }

    public function user_class()
    {
        return $this->belongsTo(User::class, 'user');
    }

    public function doctor_class()
    {
        return $this->belongsTo(User::class, 'doctor');
    }
    public function appointments()
    {
        return $this->belongsTo(Appointments::class);
    }
    public function dermatology()
    {
        return $this->belongsTo(Dermatology::class);
    }

    public function prescriptionmedicines()
    {
        return $this->hasMany(PrescriptionMedicine::class);
    }
    public function medicines()
    {
        return $this->belongsToMany(Medicines::class,'prescription_medicine','prescription_id','medicines_id')
            ->withPivot('medicine_name','dose','frequency','route_administration','duration','indications');
    }
}
