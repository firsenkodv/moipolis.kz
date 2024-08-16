<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogPersonLegal extends Model
{
    protected $table = 'catalog_person_legals';

    protected $fillable = [
        'title',
        'slug',
        'subtitle',
        'img',

        'smalltext',
        'gallery',
        'img2',
        'text',
        'published',
        'params',
        'metatitle',
        'description',
        'keywords',
        'sorting',
    ];

    protected $casts = [
        'params' => 'collection',
    ];

    public function getCalcAttribute()
    {
        $arrt = [];
        if($this->params) {
            foreach ($this->params as $f) {
                $arrt[$f] = config('moonshine.legal_person.' . $f );
            }
        }


        return $arrt;
    }


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
