<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id' , 'doctor_id' , 'schedule_id' , 'status' , 'date'];

    /**
     * @return BelongsTo
     */
    public function patient(): BelongsTo
    {
        return $this->belongsTo(User::class , 'patient_id' , 'id');
    }

    /**
     * @return BelongsTo
     */
    public function doctor(): BelongsTo
    {
        return $this->belongsTo(User::class , 'doctor_id' , 'id');
    }

    /**
     * @return BelongsTo
     */
    public function schedule(): BelongsTo
    {
        return $this->belongsTo(Schedule::class , 'schedule_id' , 'id');
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeRequested(Builder $query): Builder
    {
        return $query->where(['status' => 1])->where('date' ,'>=', Carbon::now()->toDateString());
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeAccepted(Builder $query): Builder
    {
        return $query->where(['status' => 2]);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeArchive(Builder $query): Builder
    {
        return $query->where(['status' => 3])->orWhere('date' ,'<', Carbon::now()->toDateString());
    }
}
