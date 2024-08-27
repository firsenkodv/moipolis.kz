<div class="c__flex">
    <div class="c__flex_50 c__flex_50_left">

        <div class="text_input">
            <x-forms.text-input_fromLabel
                type="text"
                id="registerName"
                name="name"
                placeholder="Имя"
                value="{{ (old('name'))?:((isset($user->name))?$user->name:'') }}"
                class="input name"
                required="true"
                :isError="$errors->has('name')"
            />
            <x-forms.error class="error_name"/>
        </div>
        <div class="text_input">
            <x-forms.text-input_fromLabel
                type="text"
                id="registerPhone"
                name="phone"
                placeholder="Номер телефона"
                required="true"
                class="input phone"
                value="{{ (old('phone'))?:((isset($user->phone))?$user->phone:'')  }}"
                :isError="$errors->has('phone')"
            />
            <x-forms.error class="error_phone"/>

        </div>

        <div class="text_input">
            <x-forms.text-input_fromLabel
                type="text"
                id="registerInn"
                name="inn"
                placeholder="ИНН"
                class="input inn"
                value="{{ (old('inn'))?:((isset($user->inn))?$user->inn:'')  }}"
                :isError="$errors->has('inn')"
            />
            <x-forms.error class="error_inn"/>

        </div>


    </div><!--.c__flex_50_left-->

    <div class="c__flex_50 c__flex_50_right">
        <div class="text_input">
            <x-forms.text-input_fromLabel
                type="text"
                id="registerFio"
                name="fio"
                placeholder="ФИО*"
                value="{{ (old('fio'))?:((isset($user->fio))?$user->fio:'')  }}"
                class="input fio"
                required="{{$fio_required}}"
                :isError="$errors->has('fio')"
            />
            <x-forms.error class="error_fio"/>
        </div>

        <div class="text_input pad_t8_important">

            <div class="birthdate_wrap">
                @if(isset($user->birthdate))
                    <div class="birthdate">
                        {{ __('Дата рождения') }}

                        <div class="birthdate_pic">
                            <input type="text" name="birthdate" class="datepicker-birthdate" value="{{ ((isset($user->birthdate))?$user->birthdate:'') }}" />
                            <a href="javascript:void(0);"  class="datepicker-birthdate_result" id="alternate">{{ rusdate3($user->birthdate) }}</a>
                        </div>
                    </div>
                @else
                    <div class="birthdate">

                        <span>{{ __('Дата рождения') }}</span>

                        <div class="birthdate_pic">
                            <input type="text" name="birthdate" class="datepicker-birthdate" value="1970-01-01" />
                            <a href="javascript:void(0);"  class="datepicker-birthdate_result" id="alternate">{{ __('Добавить') }}</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="text_input">
            <x-forms.text-input_fromLabel
                type="text"
                id="registerInn"
                name="bin"
                placeholder="БИН"
                class="input bin"
                value="{{ (old('bin'))?:((isset($user->bin))?$user->bin:'') }}"
                :isError="$errors->has('bin')"
            />
            <x-forms.error class="error_bin"/>

        </div>

    </div><!--.c__flex_50_right-->

</div><!--.c__flex-->

