<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable , HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'account_id',
        'category_id',
        'image',
        'phone',
        'address',
        'about'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeDoctors(Builder $query): Builder
    {
        return $query->role('Doctor');
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopePatients(Builder $query): Builder
    {
        return $query->role('Patient');
    }

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class , 'category_id' , 'id');
    }

    /**
     * @return BelongsToMany
     */
    public function myDoctors(): BelongsToMany
    {
        return $this->belongsToMany(User::class , 'doctor_patients' , 'patient_id' , 'doctor_id');
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class , 'user_id' , 'id');
    }

    /**
     * @return HasMany
     */
    public function doctorAppointments(): HasMany
    {
        return $this->hasMany(Appointment::class , 'doctor_id' , 'id');
    }

    /**
     * @return HasMany
     */
    public function patientAppointments(): HasMany
    {
        return $this->hasMany(Appointment::class , 'patient_id' , 'id');
    }

    /**
     * @return HasMany
     */
    public function doctorTreatments(): HasMany
    {
        return $this->hasMany(Treatment::class , 'doctor_id' , 'id');
    }

    /**
     * @return HasMany
     */
    public function patientTreatments(): HasMany
    {
        return $this->hasMany(Treatment::class , 'patient_id' , 'id');
    }

    /**
     * @return HasMany
     */
    public function doctorDiagnoses(): HasMany
    {
        return $this->hasMany(Diagnose::class , 'doctor_id' , 'id');
    }

    /**
     * @return HasMany
     */
    public function patientDiagnoses(): HasMany
    {
        return $this->hasMany(Diagnose::class , 'patient_id' , 'id');
    }
}
