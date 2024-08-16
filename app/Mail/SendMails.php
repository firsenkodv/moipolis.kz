<?php

namespace App\Mail;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class SendMails
{


    /**
     * auth
     */
    public function send_to_User($user):void
    {
        $view = 'html.email.auth.register_user';
        $subject =  'Создан аккаунт. Данные для входа';

        Mail::send($view, ['user' => $user],  function ($message) use ($user, $subject){
            $message->to($user->email, 'Admin')->subject($subject);
        });
    }

    public function send_to_Admin($user):void
    {
        $view = 'html.email.auth.register_message_admin';
        $subject =  'Создан аккаунт -  '. $user->email;

        Mail::send($view, ['user' => $user],  function ($message) use ($user, $subject){
            $message->to(env("MAIL_USERNAME"), 'Admin')->subject($subject);
        });
    }
    public function send_to_ResetPassword($data):void
    {
        $view = 'html.email.auth.reset_password';
        $subject =  'Оповещение о сбросе пароля';

        Mail::send($view, ['data' => $data],  function ($message) use ($data, $subject){
            $message->to($data['email'], 'Admin')->subject($subject);
        });
    }

    // send_to_ResetPassword

    /**
     * end auth
     */

    public function sendOrderCall($data):void
    {
        $view = 'html.email.order_call';
        $subject = 'Заказ обратного звонка ' . $data['phone'];

        Mail::send($view, ['data' => $data],  function ($message) use ($subject){
            $message->to(env("MAIL_USERNAME"), 'Admin')->subject($subject);
        });
    }




}
