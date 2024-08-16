<div class="F_form  F_form_order_mini" style="display: none; max-width: 600px" id="list_risks" >

    <div class="F_form__body new__temp">
        <div class="new__temp_top">

            <div class="F_form__flex">
                <div class="F_form__left">
                    <div class="F_h1"><span>{{ __('Класс риска. До 100 человек') }}</span></div>
                    <div class="F_h2"><span>{{__('Посмотреть свой класс')}}</span></div>
                </div>
            </div>


        </div><!--.new__temp_top-->


        <div class="new__temp_middle">

            <div class="alax_inputs">
                <div class="list_risks__title">{{ __('Отнесение видов экономической деятельности предприятий со списочной численностью от 101 человека и выше к классам профессионального риска.') }}</div>
                @foreach($list_risks as $k =>$object)
                    <div class="list_risk desc">
                        {!! $object['json_risk_text_text_do100']!!}
                    </div>
                @endforeach
                <br>
                <hr class="hr">
                <br>
                <div class="F_form__flex">
                    <div class="F_form__left">
                        <div class="F_h1"><span>{{ __('Класс риска. От 100 человек') }}</span></div>
                        <div class="F_h2"><span>{{__('Посмотреть свой класс')}}</span></div>
                    </div>
                </div>
                <div class="list_risks__title">{{ __('Отнесение видов экономической деятельности предприятий со списочной численностью от 101 человека и выше к классам профессионального риска.') }}</div>
                @foreach($list_risks as $k =>$object)
                    <div class="list_risk desc">
                        {!! $object['json_risk_text_text']!!}
                    </div>
                @endforeach

            </div><!--.alax_inputs-->

        </div><!--.new__temp_middle-->
    </div><!--.F_form__body-->
</div><!--.F_form-->

