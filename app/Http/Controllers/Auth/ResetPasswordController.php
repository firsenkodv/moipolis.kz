<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordFormRequest;
use App\Models\MoonshineUser;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;


class ResetPasswordController extends Controller
{

    public function page(string $token)
    {


        return view('auth.reset-password',
            [ 'token' =>$token ] );
    }

    public function handle(ResetPasswordFormRequest $request)
    {



        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => bcrypt($password)
                ])->setRememberToken(str()->random(60));

                if($user->admin) { /* если админ */
                    /* дублируем в moonshone */
                    MoonshineUser::query()
                        ->where('email', $user->email)
                        ->update(['password' => bcrypt($password)]);
                }

                $user->save();
                event(new PasswordReset($user));
            }
        );

        if($status === Password::PASSWORD_RESET) {

            //   dd(Password::PASSWORD_RESET);

            flash()->info(__($status));

            return redirect()->route('login');
        }

        return back()->withErrors(['email' => __($status)]);


    }





}
