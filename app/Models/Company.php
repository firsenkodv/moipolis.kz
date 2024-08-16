<?php

namespace App\Models;

use Domain\Company\QueryBuilders\CompanyQueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected $table = 'companies';

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
        'options',
        'module',
        'metatitle',
        'description',
        'keywords',
        'sorting',
    ];

    protected $casts = [
        'params' => 'collection',
        'options' => 'collection',
        'module' => 'collection',
    ];


    /**
     * Создание метода вывода со своим CompanyQueryBuilder
     */
    public function newEloquentBuilder($query):CompanyQueryBuilder
    {
        return new CompanyQueryBuilder($query);
    }



    public function getArrayModulesAttribute()
    {

        $mod = [];
        if($this->module) {
            foreach ($this->module as $m) {
                if ($m['mod_id'] != 0) {

                    $mod[$m['mod_id']] = 'modules.module_' . $m['mod_id'];
                }
            }

        }
        return $mod; /* array_modules */
    }


    protected static function boot()
    {
        parent::boot();


        # Проверка данных пользователя перед сохранением
        static::saving(function ($Moonshine) {


            //    dd(json_decode($Moonshine->files));

            if (!$Moonshine->metatitle) {
                $metatitle = 'Страховая компания - ' . $Moonshine->title . ', партнер компании ТОО Центр Страхования General Re';

                $Moonshine->metatitle = $metatitle;


            }

            if (!$Moonshine->description) {
                if ($Moonshine->subtitle) {
                    $description = $Moonshine->subtitle . ' страховая компания в Казахстане';
                } else {
                    $description = 'Партнер компании ТОО Центр Страхования General Re ' . $Moonshine->title;
                }

                $Moonshine->description = $description;
            }


            if (!$Moonshine->keywords) {
                $keywords = 'Казахстан, Алматы, Астана, страховка, страховая компания, ' . $Moonshine->title;
                if ($Moonshine->subtitle) {
                    $keywords .= ', ' . $Moonshine->subtitle;
                }
                $Moonshine->keywords = $keywords;

            }

        });


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
