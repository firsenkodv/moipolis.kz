<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function home()
    {
        $subject  = config('app.mail_admin');
        //flash()->info('Hello');

        return view('home');
    }


}
