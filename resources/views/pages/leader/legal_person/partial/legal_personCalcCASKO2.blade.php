<div class="calc calc_property">

    <div class="calc_row">
        <div class="calc_row__flex w_100">
            <div class="calc_col w_50 pad_r16">

                <x-forms.text-label name="{{__('Страховая сумма')}}" class=""/>

                <div class="text_input">

                    <x-forms.text-input_fromLabel
                        type="text"
                        name="price"
                        placeholder="Стоимость"
                        value="{{ old('price')?:'4 000 000' }}"
                        required="true"
                        must="true"
                        class="input price"
                    />
                    <x-forms.error class="error_price"/>
                    <x-forms.currency name="{{ config('currency.currency.KZT') }}"/>


                </div>
            </div>
            <div class="calc_col w_50 pad_l16">
                <x-forms.text-label name="{{__('Франшиза по повреждению')}}" class=""/>

                <div class="text_input">

                    <select class="js-chosen" name="fra"
                            placeholder="Франшиза по повреждению">
                        <optgroup label="Франшиза по повреждению">

                            @foreach($calc['json_fra'] as $k =>$ob)
                                <option value="{{$ob['json_fra_text']}}">{{$ob['json_fra_label']}}</option>
                            @endforeach



                        </optgroup>

                    </select>


                </div>
            </div>
        </div>
        <div class="calc_row__flex w_100">
            <div class="calc_col w_50 pad_r16">
                <x-forms.text-label name="{{__('Франшиза по угону')}}" class=""/>
                <div class="text_input">

                    <select class="js-chosen" name="fra_ugon" placeholder="Выберите франшизу по угону">
                        <optgroup label="Выбрать франшизу по угону">

                            @foreach($calc['json_fra_ugon'] as $k =>$ob)
                                <option value="{{$ob['json_fra_ugon_text']}}">{{$ob['json_fra_ugon_label']}}</option>
                            @endforeach


                        </optgroup>
                    </select>
                </div>
            </div>
            <div class="calc_col w_50 pad_l16">

                <x-forms.text-label name="{{__('Тип транспорта')}}" class=""/>

                <div class="text_input">

                    <select class="js-chosen" name="fra" placeholder="Выберите тип транспорта" >
                        <optgroup label="Тип транспорта">

                            @foreach($calc['json_type'] as $k =>$ob)
                                <option value="{{$ob['json_type_text']}}">{{$ob['json_type_label']}}</option>
                            @endforeach


                        </optgroup>

                    </select>

                </div>


            </div>
        </div>
        <div class="calc_row__flex w_100">
            <div class="calc_col w_50 pad_r16">
                <x-forms.text-label name="{{__('Возраст транспорта')}}" class=""/>
                <div class="text_input">

                    <select class="js-chosen" name="auto" placeholder="Выберите возраст транспорта">
                        <optgroup label="Выбрать возраст транспорта">

                            @foreach($calc['json_auto'] as $k =>$ob)
                                <option value="{{$ob['json_auto_text']}}">{{$ob['json_auto_label']}}</option>
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
                    <input type="hidden" value="calcCASKO2" name="calcname">
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
