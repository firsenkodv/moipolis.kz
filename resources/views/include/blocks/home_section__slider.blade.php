<div class="block">
    <div class="h_sl__flex">
        <div class="h_sl__left">
            <div class="h_sl__left_text"><span>{{__('Оформим страховку на все случаи жизни')}}</span></div>
        </div>
        <div class="h_sl__right h_sl_right">
            <div class="h_sl_right__top flex">
                <div class="h_sl_right__item h_sl_item flex">
                    <div class="h_sl_item__img g_money"></div>
                    <div class="h_sl_item__text"><p>{{__('Выбор лучшей цены среди страховых компаний')}}</p>
                    </div>
                </div>
                <div class="h_sl_right__item h_sl_item flex">
                    <div class="h_sl_item__img g_online"></div>
                    <div class="h_sl_item__text"><p>{{__('Онлайн-страховка без посредников и наценок')}}</p>
                    </div>
                </div>
                <div class="h_sl_right__item h_sl_item flex">
                    <div class="h_sl_item__img g_mail "></div>
                    <div class="h_sl_item__text"><p>{{__('Полис сразу приходит на электронную почту')}}</p>
                    </div>
                </div>


            </div>
            <div class="h_sl_right__bottom">
                <div class="h_sl_item__buttoms">
                    <a href="#" class="button_white"><span>{{ __('Застраховать') }}</span></a>
                    <a href="#" class="button_red"><span>{{ __('Купить полис') }}</span></a>
                </div>

            </div>


        </div>

    </div>
    <div class="h_sl__flex2">
        <div class="h_sl__left2 h_sl_a2 h_sl_a2__js active"><p data-type="fl">
                <span>{{'Для Физических лиц'}}</span></p></div>
        <div class="h_sl__right2 h_sl_a2 h_sl_a2__js"><p data-type="yl">
                <span>{{'Для Юридических лиц'}}</span></p></div>
    </div>

    <div class="h_sl__flex3">

        <div class="g_type fl active">
            @if($individuals)
                @foreach($individuals as $individual)
                    <a href="{{asset(config('links.links.individuals').'/' . $individual->slug)}}"
                       @if($loop->first) class="active" @endif><span>{{$individual->title}}</span></a>
                @endforeach
            @endif
        </div>

        <div class="g_type yl">
            @if($legal_persons)
                @foreach($legal_persons as $legal_person)
                    <a href="{{asset(config('links.links.legal-persons').'/' . $legal_person->slug)}}" @if($loop->first) class="active" @endif><span>{{$legal_person->title}}</span></a>

                @endforeach
            @endif
        </div>

    </div>
</div>
