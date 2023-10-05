<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'email' , 'password' , 'type' , 'phone' , 'address'];

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeRegistration(Builder $query): Builder
    {
        return $query->where(['status' => 0]);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeArchived(Builder $query): Builder
    {
        return $query->where('status' ,'!=', 0);
    }
}
