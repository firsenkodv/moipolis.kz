<?php

namespace App\Mail;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class SendMails
{


    /**
     * policy
     */
    public function send_to_User_new_Policy($data):void
    {
        $view = 'html.email.policy.new_policy_user';
        $subject =  'Страховой полис. ' . $data['calc_session']['item']->title_calc;

        Mail::send(
            $view,
            ['data' => $data],
            function ($message) use ($data, $subject)
            {
            $message->to(($data['request']->email)?:$data['user']->email, 'Admin')->subject($subject);
             }
        );
    }
    public function send_to_Admin_new_Policy($data):void
    {
        $view = 'html.email.policy.new_policy_admin';
        $subject =  'Создан страховой полис. ' . $data['calc_session']['item']->title_calc;

        Mail::send(
            $view,
            ['data' => $data],
            function ($message) use ($data, $subject)
            {
            $message->to(config('app.mail_username'), 'Admin')->subject($subject);
             }
        );
    }

    /**
     * policy
     */

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
            $message->to(config('app.mail_username'), 'Admin')->subject($subject);
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
            $message->to(config('app.mail_username'), 'Admin')->subject($subject);
        });
    }




}
