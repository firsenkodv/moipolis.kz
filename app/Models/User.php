<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Events\ResetPasswordEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    /**
     * Замена стандартного сброса пароля
     */

    public function sendPasswordResetNotification($token)
    {

        settype($data, "array");
        $data['email'] = $this->getEmailForPasswordReset();
        $data['token'] = $token;

        /**
         * Событие отправка сообщения о сбросе пароля
         */

        ResetPasswordEvent::dispatch($data);
    }

    protected static function boot()
    {
        parent::boot();

        # Проверка данных пользователя перед сохранением
        static::saving(function ($Moonshine) {
            $Moonshine->phone =  phone($Moonshine->phone);
        });



    }
}
