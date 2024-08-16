<div class="calc calc_property">

    <div class="calc_row">
        <div class="calc_row__flex w_100">
            <div class="calc_col w_50 pad_r16">
                <x-forms.text-label name="{{__('Класс риска')}}" class=""/>
                <div class="text_input">

                    <select class="js-chosen js-chosen_risk_tarif__js" name="" placeholder="Выберите класс риска">
                        <optgroup label="Выбрать класс риска">

                            @foreach($calc['json_risk'] as $k =>$object)
                                @if ($loop->first)
                                    @php
                                        $first_risk = $object['json_risk_text'];
                                    @endphp
                                @endif

                                <option value="{{$object['json_risk_text']}}">{{$object['json_risk_label']}}</option>
                            @endforeach

                        </optgroup>
                    </select>
                </div>
            </div>
            <div class="calc_col w_50 pad_l16">
                <x-forms.text-label name="{{__('Тариф по классу риска')}}" class=""/>

                <div class="text_input">

                    <div class="json_risk__responce">
                        <div class="json_risk__flex">

                            <div class="json_risk_tarif">
                                <span class="_tarif_label">{{__('Тариф')}}</span>
                                <span class="_tarif_text risk_tarif__js">{{ $first_risk }}</span>
                            </div>
                            <div class="responce_wrapp">
                                <a href="#list_risks" data-fancybox class="list_risks responce_svg"></a>
                            </div>
                            <div class="json_risk_tarif">
                                <span class="_tarif_label">{{ 'МЗП на ' .  date("Y") . 'г.'}} </span>
                                <span class="_tarif_text ">{{ price($calc['mzp']) }} {{ config('currency.currency.KZT') }}</span>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
        <div class="calc_row__flex w_100">

            <div class="calc_col w_100 pad_r16">
                <x-forms.text-label name="{{__('Cтатистика несчастных случаев')}}" class=""/>
                <div class="text_input">
                    <div class="form_toggle accident_radio__js">
                        <div class="form_toggle-item item-1">
                            <input id="fid-1" type="radio" name="radio" value="off" checked>
                            <label for="fid-1">Нет</label>
                        </div>
                        <div class="form_toggle-item item-2">
                            <input id="fid-2" type="radio" name="radio" value="on">
                            <label for="fid-2">Были</label>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="accident_true display_none">
        <div class="calc_row__flex w_100">
            <div class="calc_col w_50 pad_r16">
                <x-forms.text-label name="{{__('Общее количество работников')}}" class=""/>
                <div class="text_input">

                    <select class="js-chosen js-chosen_work__js" id="qy55" name=""
                            placeholder="Выберите общее количество работников">
                        <optgroup label="Выбрать общее количество работников">
                            <option value="1" selected="selected">до 100</option>
                            <option value="2">от 101 до 500</option>
                            <option value="3">от 501 до 1000</option>
                            <option value="4" >от 1 001 до 10 000</option>
                            <option value="5">от 10 001 до 20 000</option>
                            <option value="6">более 20 000</option>
                        </optgroup>
                    </select>
                </div>
            </div>
            <div class="calc_col w_50 pad_l16">

                <x-forms.text-label name="{{__('Среднегодовое кол-во пострадавших')}}" class=""/>
                <div class="text_input">

                    <select class="js-chosen js-chosen_count__js" id="qy551" name=""
                            placeholder="Выберите среднегодовое кол-во пострадавших">
                        <optgroup label="Выбрать среднегодовое кол-во пострадавших">
                            <option value="1" selected="selected">от 2 до 9</option>
                            <option value="2">от 10 до 19</option>
                            <option value="3">от 20 до 49</option>
                            <option value="4">от 50 до 99</option>
                            <option value="5">от 100 до 199</option>
                            <option value="6">от 200 до 299</option>
                            <option value="7">от 300 и более</option>
                        </optgroup>
                    </select>
                </div>


            </div>
        </div>

        {{--display_none--}}
        <div class="calc_row__flex w_100 display_none">
            <div class="calc_col w_50 pad_r16">

            </div>

            <div class="calc_col w_50 pad_l16">
                <x-forms.text-label name="{{__('Коэффициент')}}" class=""/>
                <div class="text_input">
                    <div class="json_risk__responce">
                        <div class="json_risk__flex">

                            <div class="json_risk_tarif">
                                <span class="_tarif_label">{{__('Результат')}}</span>
                                <span id="koefy" class="_tarif_text ">3</span>
                            </div>
                            <div class="responce_wrapp">

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        </div>


        <div class="calc_row__flex w_100">

            <div class="calc_col w_50 pad_r16">
                <x-forms.text-label name="{{__('Кол-во персонала')}}" class=""/>
                <div class="text_input">

                    <x-forms.text-input_fromLabel
                        type="text"
                        name=""
                        placeholder="Кол-во персонала"
                        value="{{ old('personal')?:'1' }}"
                        required="true"
                        must="true"
                        class="input personal price input-range"
                        datamin="0"
                        datamax="20000"
                    />
                    <x-forms.error class="error_personal"/>

                </div>
            </div>

            <div class="calc_col w_50 pad_l16">

                <x-forms.text-label name="{{__('Годовой фонд оплаты труда')}}" class=""/>
                <div class="text_input">
<div class="mzp display_none" data-mzp="{{ $calc['mzp'] }}"></div>
                    <x-forms.text-input_fromLabel
                        type="text"
                        name=""
                        placeholder="Годовой фонд оплаты труда"
                        value="{{ old('fond')?:price($calc['mzp']*12) }}"
                        required="true"
                        must="true"
                        datamin="{{ $calc['mzp']*12 }}"
                        datamax="{{ $calc['mzp']*12*10 }}"
                        class="input fond price input-range input-range"
                    />
                    <div class="s_fond"><div class="s_fond__left">Мин. сумма <span class="mpz_min">{{ price($calc['mzp']*12) }}</span> {{ config('currency.currency.KZT') }}</div> <div class="s_fond__right">Макс. сумма <span  class="mpz_max">{{ price($calc['mzp']*10*12) }}</span> {{ config('currency.currency.KZT') }}</div></div>
                    <x-forms.error class="error_price"/>
                    <x-forms.currency name="{{ config('currency.currency.KZT') }}"/>

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
                    <input type="hidden" value="calcAccident" name="calcname">
                    <x-forms.button_div class="button_normal calc__js">
                        {{__('Расчитать')}}
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
                <div class="c_r__month">
                    <div class="td">{{__('Срок')}}</div>
                </div>
                <div class="c_r__price">
                    <div class="td">{{__('Цена')}}</div>
                </div>
                <div class="c_r__button"></div>
            </div>
        </div>
    </div>
    <div class="calc_result" id="calc_result"></div>

</div>
@include('include.modals.temp_forms.list_risks', ['list_risks' => $calc['json_risk']])
