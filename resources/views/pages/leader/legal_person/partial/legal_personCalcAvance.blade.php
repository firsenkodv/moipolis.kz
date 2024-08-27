<div class="calc calc_property">

    <div class="calc_row">
        <div class="calc_row__flex w_100">
            <div class="calc_col w_50 pad_r16">

                <x-forms.text-label name="{{__('Сумма страхования')}}" class=""/>

                <div class="text_input">

                    <x-forms.text-input_fromLabel
                        type="text"
                        name="price"
                        placeholder="Стоимость"
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
                <x-forms.text-label name="{{__('Выбрать контракт')}}" class=""/>

                <div class="text_input">

                    <select class="js-chosen" name="contract"
                            placeholder="Выберете контракт">
                        <optgroup label="Выбрать контракт">

                            @foreach($calc['json_contract'] as $k =>$item)
                                <option value="{{$item['json_contract_text']}}">{{$item['json_contract_label']}}</option>
                            @endforeach



                        </optgroup>

                    </select>


                </div>
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
                                <span>{{calcOptionIndividualName($moreoptions['json_moreoptions_label'])}}</span>
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
                    <input type="hidden" value="calcAvance" name="calcname">
                    <x-forms.button_div class="button_normal calc__js">
                        {{__('Рассчитать')}}
                    </x-forms.button_div>
                </div>
            </div>
        </div>
    </div>


    <div class="calc_top_th color_grey pad_t36" id="MyscrollTop">
        <div class="c_r__company_flex__label c_r__company_flex">
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
