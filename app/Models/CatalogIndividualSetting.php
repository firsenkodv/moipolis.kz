<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CatalogIndividualSetting extends Model
{
   protected $table = 'catalog_individual_settings';

    protected $fillable  = [
        'city',
        'phone',
        'sorting',

    ];


    protected static function boot()
    {
        parent::boot();


        static::created(function () {
            cache_clear();
        });

        static::updated(function () {
            cache_clear();
        });

        static::deleted(function () {
            cache_clear();
        });

    }
}
