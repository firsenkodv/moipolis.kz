<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserPolicy extends Model
{
protected $table = 'user_policies';
    protected $fillable = [
        'title',
        'user_id',
        'company_id',
        'subtitle',
        'img',
        'price',
        'text',
        'files',
        'params',
        'published',
        'sorting',
        'sku',
        'user_name',
        'user_fio',
        'user_email',
        'user_phone',
        'user_inn',
        'user_bin',
        'user_birthdate'
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class,  'user_id');
    }

    public function company():BelongsTo
    {
        return $this->belongsTo(Company::class,  'company_id');
    }

    protected $casts = [
        'params' => 'collection',
        'files' => 'collection',
    ];

    protected static function boot()
    {
        parent::boot();


    }

}
