<div class="block">
    <h2 class="h2">Предложения от наших партнеров</h2>

    <div class="partners pad_t10 pad_b10 partners_flex">

        <div class="partners_left">
            <div class="slick_slider  slick_slider__partners">

                @if($companies_options)
                    @php
                        $i = 1;
                    @endphp
                    @foreach($companies_options as $company)

                        <div
                            class="partner__item p_item p_item_{{$i}}  @php $i++; @endphp    @if($loop->index>2) media__1600 @endif"
                            style="background-color: rgba(131, 35, 28, 0.04)">
                            <div class="p_item__content">
                                <div class="p_item__title h3__title"><span>{!! $company['title'] !!}</span></div>
                                <div class="p_item__img"><span
                                        style=" width:199px; height: 51px; display: block; background: url('{{ Storage::disk('moonshine')->url($company['img']) }}'); background-repeat: no-repeat;     background-size: contain;"></span>
                                </div>
                                @if($company['json'])
                                    <div class="p_options">
                                        @foreach($company['json'] as $json)

                                            <div class="p_option">
                                                <div class="p_label">
                                                    {{ $json['label'] }}
                                                </div>
                                                <div class="p_text">
                                                    {{ price($json['text']) }}
                                                    <span>{{ config('currency.currency.KZT') }}</span>
                                                </div>
                                            </div>

                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>

                    @endforeach
                @endif

                {{----}}

            </div>
        </div>
        <div class="partners_right">
            <div class="partner__item p_item p_item_last">
                <div class="p_item__content">
                    <div class="home_section__slider">

                        <div class="p_item__title h2__title"><span>{{ __('Стать партнером General Re') }}</span></div>
                        <div class="p_item__agent__wrap">
                            <div class="p_item__agent"><span>Для страховых агентов</span></div>
                        </div>
                        <div class="p_item__agent__text"><span>Станьте партнером нашего сервиса и предлагайте свои лучшие решения </span>
                        </div>


                    </div>


                </div>
            </div>
        </div>

    </div>
</div>
