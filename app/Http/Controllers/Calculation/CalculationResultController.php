<?php

namespace App\Http\Controllers\Calculation;

use App\Events\CreatePolicyEvent;
use App\Events\CreateUserEvent;
use App\Events\MessageAdminCreatePolicyEvent;
use App\Events\MessageAdminCreateUserEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\SignInFormRequest;
use App\Http\Requests\SignUpFormFullRequest;
use App\Http\Requests\SignUpFormRequest;
use App\Http\Requests\UpdateFormRequest;
use App\Models\Company;
use App\Models\User;
use App\Models\UserPolicy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Password;

class CalculationResultController extends Controller
{

    /**
     * @param Request $request
     * @return mixed
     * метод подучения данных с калькулятора и возможность войти, зарегистрироваться или просто получить полис без регистрации
     */
    public function designResults(Request $request)
    {

        if ($request->all()) {
            $new_array_input = [];
            $new_array_option = [];
            $form = json_decode($request->dataform);
            $inputs = $form->big_data[0]->inputs;
            $options = $form->big_data[0]->options;

            $price = price($form->price) . ' ' . config('currency.currency.KZT');
            $title = $form->title;
            $id = $form->id;
            $title_calc = $form->title_calc;

            $array['company'] = Company::find($id);
            $array['title_calc'] = $title_calc;
            $array['price'] = $price;
            if ($inputs) {
                foreach ($inputs as $k => $input) {
                    if ($input->name != 'calcname' and $input->name != 'coefficient') {

                        if ($input->name == 'price') {
                            $new_array_input[$k]['title'] = $input->title;
                            $new_array_input[$k]['text'] = $input->value . ' ' . config('currency.currency.KZT');
                        }
                        else if($input->name == 'radio'){

                        }
                        else if($input->name == 'fond') {
                            $new_array_input[$k]['title'] = $input->title;
                            $new_array_input[$k]['text'] = $input->value . ' ' . config('currency.currency.KZT');
                        }
                        else if($input->name == 'noname_value'){
                            $new_array_input[$k]['title'] = $input->title;
                            $new_array_input[$k]['text'] = $input->value;
                        }
                        else {
                            $new_array_input[$k]['title'] = $input->title;
                            $new_array_input[$k]['text'] = $input->text;
                        }
                    }



                }
            }

            if ($options) {
                foreach ($options as $k => $option) {
                    $new_array_option[$k]['title'] = $option->name;
                }
            }

            settype($inputs, "object");
            $inputs = (object)$new_array_input;

            settype($options, "object");
            $options = (object)$new_array_option;
            $item = (object)$array;


            /*   dump($request->all());
                  dump($id);
                  dump($inputs);
                  dump($price);
                  dump($title);
                  dd($options);   */

            $session_array = array('item' => $item, 'inputs' => $inputs, 'options' => $options, 'price' => $price,);
            // Store data in the session
            session(['calc_session' => $session_array]);


        } /*else {
            $calc_error = str_replace("{email}", config('app.mail_admin'), config('message_flash.alert.calc_error'));
            flash()->alert($calc_error);
            return redirect()->route('home');
        }*/


        $user = (auth()->user()) ?: null;
        if (auth()->check()) {
            $action = route('calcSignAuthUser');

        } else {
            $action = route('calcSignUp');
        }

        return view('pages.leader.order.step1',
            [
                'user' => $user,
                'session_array' => session('calc_session'),
                'action' => $action
            ]);
    }


    /**
     * @param SignUpFormFullRequest $request
     * @return RedirectResponse
     * метод регистрации нового пользователя (по его желанию) и отправки сообщения пользователю и админу.
     * создание нового порлиса и отправка полиса в письме админу и самому пользователю.
     */

    public function calcSignUp(SignUpFormFullRequest $request):RedirectResponse
    {

        /**
         * *
         * Не зарегистрированный, хочет зарегистрироваться и сразу войта
         *
         * */
        if ($request->registered) {
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

            /**
             * Событие отправка сообщения новому пользователю
             */

            CreateUserEvent::dispatch($request);

            /**
             * Событие отправка сообщения админу
             */

            MessageAdminCreateUserEvent::dispatch($request);

            auth()->login($user, true); // залогинили

           // dd(session('calc_session'));
            $this->createPilicy($user, session('calc_session'), $request); // запишем



        }

        /**
         * Событие, отправка полиса новому пользователю
         */
        CreatePolicyEvent::dispatch($request);


        /**
         * Событие отправка сообщения админу о полисе пользователя
         */
        MessageAdminCreatePolicyEvent::dispatch($request);


        return redirect()->route('calculator_step2');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * метод сохраниения полиса и отправки его админу и самому пользовтелю
     * пользователь обязательно зарегистрирован
     */
    public function calcSignAuthUser(Request $request):RedirectResponse
    {

        /**
         * Тут будем сохранять и отправлять письма
         * * ------------------------------------
         * */


        $this->createPilicy(auth()->user(), session('calc_session'), $request); // запишем


        /**
         * Событие, отправка полиса новому пользователю
         */
        CreatePolicyEvent::dispatch($request);


        /**
         * Событие отправка сообщения админу о полисе пользователя
         */
        MessageAdminCreatePolicyEvent::dispatch($request);

        return redirect()->route('calculator_step2');
    }


    /**
     * @param SignInFormRequest $request
     * @return RedirectResponse
     * метод входа на сайт непосредственно в калькуляторе
     *
     */

    public function calcLogin(SignInFormRequest $request):RedirectResponse
    {

        if (!auth()->attempt($request->validated())) {

            return back()->withErrors([
                'email' => 'Ошибка в поле E-mail или пароль',
            ])->onlyInput('email');
        }


        $request->session()->regenerate();
        return redirect()->route('calculator_design_results');

    }

    /**
     * @param SignUpFormRequest $request
     * @return RedirectResponse
     * метод регистрации пользователя непосредственно в калькуляторе
     */

    public function calcReg(SignUpFormRequest $request):RedirectResponse
    {
        $user = User::query()->create([

            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)

        ]);

        // event(new Registered($user)); // события
        /**
         * Событие отправка сообщения новому пользователю
         */

        CreateUserEvent::dispatch($request);

        /**
         * Событие отправка сообщения админу
         */

        MessageAdminCreateUserEvent::dispatch($request);

        auth()->login($user, true); // залогинили

        return redirect()->route('calculator_design_results');

    }


    /**
     * @return mixed
     * страница с конечным результатом, когда еже все посчитано и отправлено!
     *
     */

    public function calcStep2()
    {

        $user = (auth()->user()) ?: null;

        return view('pages.leader.order.step2',
            [
                'user' => $user,
                'session_array' => session('calc_session')
            ]);


    }


    /**
     * @return Model
     * метод добавления полиса
     *
     */
    public function createPilicy($user, $data, $request)
    {

     //   dd($request);

        $policy = UserPolicy::query()->create([
            'title' => $data['item']->title_calc,
            'user_id' => $user->id,
            'price' => $data['item']->price,
            'company_id' => $data['item']->company->id,
            'sku' => time(),
            'user_name' => ($request->name)?:$user->name,
            'user_fio' => ($request->fio)?:$user->fio,
            'user_inn' => ($request->inn)?:$user->inn,
            'user_bin' => ($request->bin)?:$user->bin,
            'user_phone' => ($request->phone)?:$user->phone,
            'user_email' => ($request->email)?:$user->email,
            'user_birthdate' => (birthdate($request->birthdate))?:birthdate($user->birthdate),
        ]);
        return $policy;
    }
}
