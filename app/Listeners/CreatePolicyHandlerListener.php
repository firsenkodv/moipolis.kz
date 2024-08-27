<?php

namespace App\Listeners;

use App\Events\CreatePolicyEvent;
use App\Mail\SendMails;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class CreatePolicyHandlerListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     * сообщение user о новом полисе
     */
    public function handle(CreatePolicyEvent $event): void
    {
        $data['user']  = $event->user;
        $data['calc_session'] = $event->calc_session;
        $data['request'] = $event->request;
       // Log::info('Listener - CreatePolicyHandlerListener ' . rand(10000, 100) );  // в логи


     //   dd($data);
                $sendMail =  new SendMails();
                $sendMail->send_to_User_new_Policy($data);

    }
}
