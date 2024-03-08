<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use Billable, HasApiTokens, HasFactory, Notifiable,Uuids;

    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

	/**
     * Get the role_id associated with the roles.
     */
    public function getRole()
    {
        return Roles::findOrFail($this->role)->name;
    }

	/**
     * Get the role_id associated with the roles.
     */

	public function role_class()
    {
        return $this->belongsTo(Roles::class, 'role');
    }
	/**
     * Get the charge associated with the roles.
     */

	public function charge_class()
    {
        return $this->belongsTo(Charges::class,'charge');
    }

    public function company_class()
    {
        return $this->belongsTo(Companies::class, 'company');
    }

	public function getCampus()
    {
        $o = Headquarters::where(['id' => $this->campus])->first();
		return !empty($o->id)?$o->name:'No asignado';
    }

	public function getSpecialty()
    {
        $o = Specialties::where(['id' => $this->specialty])->first();
		return !empty($o->id)?$o->name:'No asignado';
    }

	public function trainings()
    {
        return $this->belongsToMany(Trainings::class,'trainingsusers');
    }
}
