<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';

    protected $fillable = [
        'title',
        'slug',
        'subtitle',
        'img',

        'smalltext',
        'img2',
        'text',
        'published',
        'params',
        'module',
        'metatitle',
        'description',
        'keywords',
        'sorting',
    ];

    protected $casts = [
        'params' => 'collection',
        'module' => 'collection',
    ];


    //             @include('include.blocks.home_benefit')

    public function getArrayModulesAttribute()
    {
/*
        1  =>     'Наши преимущества',
        2 =>      'Предложения от наших партнеров',
        3 =>      'Страховые компании',
        4 =>      'Всё в одном мобильном приложении',*/
        if($this->module) {

            $mod = [];
            foreach ($this->module as $m) {
                if ($m['mod_id'] != 0) {

                    $mod[$m['mod_id']] = 'modules.module_' . $m['mod_id'];
                }
            }

        }

        return  $mod;
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
