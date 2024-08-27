<?php

namespace App\Http\Controllers\Calculation;

use App\Events\CreateUserEvent;
use App\Events\MessageAdminCreateUserEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\SignUpFormFullRequest;
use App\Http\Requests\UpdateFormRequest;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class TestAuthController extends Controller
{

public function page_test_auth() {
    return view('test.test_auth', []);
}


public function handle_test_auth(SignUpFormFullRequest $request):RedirectResponse
{

    $user = User::query()->create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'inn' => $request->inn,
        'bin' => $request->bin,
        'fio' => $request->fio,
        'birthdate' => $request->birthdate,
        'password' => bcrypt($request->password),
    ]);

    auth()->login($user, true); // залогинили

   return redirect('/');
}


}
