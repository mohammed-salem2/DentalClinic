<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public static function boot ()
    {
        parent::boot();
        self::deleting(function (Category $event) {
            $event->doctors()->get()
                ->each(function ($doctor) {
                    $doctor->update(['category_id' => null]);
                });
        });
    }

    /**
     * @return HasMany
     */
    public function doctors(): HasMany
    {
        return $this->hasMany(User::class , 'category_id' , 'id');
    }
}
