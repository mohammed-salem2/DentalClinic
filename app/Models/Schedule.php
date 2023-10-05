<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = ['user_id' , 'day' , 'time'];

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }
}
