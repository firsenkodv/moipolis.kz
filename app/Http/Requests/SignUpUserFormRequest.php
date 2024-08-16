<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class SignUpUserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string' , 'min:1'],
            'fio' => ['required', 'string' , 'min:1'],
            'phone' => ['required', 'string', 'min:5',  Rule::unique('users', 'phone')],
            'email' => ['required', 'email', 'email:dns', 'unique:users'],
             Rule::unique('moonshine_users', 'email'),
            'birthdate' => ['date'],
            'nationality' => ['string'],
            'iin' => ['string'],
            'sex' => ['required', 'string'],
            'personal' => ['required', 'integer','min:1', 'max:2'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ];


    }

    protected function prepareForValidation()
    {
        $this->merge(
            [
                'email' => str(request('email'))
                    ->squish()
                    ->lower()
                    ->value(),
                'phone' => phone($this->phone),
                'sex' => select($this->sex),
                'nationality' => select($this->nationality),

            ]
        );
    }
}
