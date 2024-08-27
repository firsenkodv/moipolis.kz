<div class="calc calc_property">

    <div class="calc_row">
        <div class="calc_row__flex w_100">
            <div class="calc_col w_50 pad_r16">

                <x-forms.text-label name="{{__('Страхования жизни для Юр. лиц')}}" class=""/>

                <div class="text_input">

                    <x-forms.text-input_fromLabel
                        type="text"
                        name="price"
                        placeholder="Страховая сумма"
                        value="{{ old('price')?:'10 000 000' }}"
                        required="true"
                        must="true"
                        class="input price"
                    />
                    <x-forms.error class="error_price"/>
                    <x-forms.currency name="{{ config('currency.currency.KZT') }}"/>


                </div>
            </div>
            <div class="calc_col w_50 pad_l16">
                <x-forms.text-label name="{{__('Страховой случай')}}" class=""/>
                <div class="text_input">

                    <select class="js-chosen" name="ob" placeholder="Выберите страховой случай">
                        <optgroup label="Выбрать страховой случай">

                            @foreach($calc['json_case'] as $k =>$object)
                                <option value="{{$object['json_case_text']}}">{{$object['json_case_label']}}</option>
                            @endforeach


                        </optgroup>
                    </select>
                </div>
            </div>
        </div>
        <div class="calc_row__flex w_100">
            <div class="calc_col w_50 pad_r16">
                <x-forms.text-label name="{{__('Страховой случай')}}" class=""/>
                <div class="text_input">

                    <select class="js-chosen" name="ob" placeholder="Выберите страховой случай">
                        <optgroup label="Выбрать страховой случай">

                            @foreach($calc['json_case2'] as $k =>$object)
                                <option value="{{$object['json_case_text2']}}">{{$object['json_case_label2']}}</option>
                            @endforeach


                        </optgroup>
                    </select>
                </div>
            </div>
            <div class="calc_col w_50 pad_l16">




            </div>
        </div>
    </div>
    @if(current($calc['json_moreoptions'])['json_moreoptions_text'])
    <div class="calc_row">
        <div class="calc_options">
            <div class="calc_title__options">{{ __('Выберите дополнительные опции:') }}</div>
            <div class="calc_options__flex">
                @foreach($calc['json_moreoptions'] as $k =>$moreoptions)


                    <div class="calc_option" data-option="{{$moreoptions['json_moreoptions_text']}}">
                        <div class="off__flex">
                            <span>{{calcOptionPersonalLegalName($moreoptions['json_moreoptions_label'])}}</span>
                            <div class="btn_plain"></div>
                        </div>
                        <div class="c_check"></div>

                    </div>

                @endforeach





            </div>
        </div>
    </div>
    @endif
    <div class="calc_row realy_button">
        <div class="calc_row__flex w_100 pad_t16 pad_b16">
            <div class="realy_button__left calc_col w_50 pad_r16"></div>
            <div class="realy_button__right calc_row w_50 pad_l16">
                <div class="text_input">
                    <input type="hidden" value="calcLife" name="calcname">
                    <input type="hidden" value="{{ $calc['coefficient']  }}" name="coefficient">
                    <x-forms.button_div class="button_normal calc__js">
                        {{__('Рассчитать')}}
                    </x-forms.button_div>
                </div>
            </div>
        </div>
    </div>


    <div class="calc_top_th color_grey pad_t36" id="MyscrollTop">
        <div class="c_r__company_flex">
            <div class="c_r__flex_1">
                  <div class="td">{{__('Страховая компания')}}</div>
            </div>
            <div class="c_r__flex_2">
                 <div class="c_r__month"><div class="td">{{__('Срок')}}</div></div>
                 <div class="c_r__price"><div class="td">{{__('Цена')}}</div></div>
                 <div class="c_r__button"></div>
            </div>
        </div>
    </div>
    <div class="calc_result" id="calc_result"></div>

</div>
