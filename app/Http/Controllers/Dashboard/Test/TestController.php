<?php

namespace App\Http\Controllers\Dashboard\Test;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateFormRequest;
use App\Http\Requests\UpdatePasswordFormRequest;
use App\Models\User;

use Illuminate\Http\RedirectResponse;

class TestController extends Controller
{
    public function page()
    {
        $user   = auth()->user();

        return view('dashboard.user_test.user_page',
            [
                'user' => $user
            ]);


    }





}
