{{--Переменная $legal_persons из app/View/Composers/MenuPersonLegalComposer.php--}}
<div class="block">
    <div class="ur_flex">
        <div class="ur_left">
            <div class="ur_left_label"><span>{{__('Для юридических лиц')}}</span>
            </div>
            <div class="ur_left__text">
                        <span>Мы всё сделаем
                            за Вас бесплатно</span>
            </div>
            <div class="ur_left__subtext">
                <span>Объявите тендер среди страховых компании и выберите самое лучшее предложение.</span>
            </div>
            <div class="ur_left__buttons">
                <a href="#" class="button_red"><span>Объявить тендер</span></a>
                <a class="button_white_red _call_me"  href="#call_me" data-fancybox><span>Перезвоните мне</span></a>
            </div>

        </div>
        <div class="ur_right ur_right__carusel">

            @if($legal_persons)

            <div class="slick_slider slick_slider__carusel">

                @foreach($legal_persons as $item)

                    <a href="{{route('legalperson_page', $item->slug)}}" class="ur_item__img slick_slide">
                    <div class="ur_item__title">
                        <div class="h4__title">
                           {{ $item->title }}
                        </div>
                    </div>
                    <div class="ur_item___img"  style="background-image: url('{{ asset(Storage::disk('moonshine')->url($item->img )) }}')"></div>
                    </a>

                @endforeach

            </div>

            @endif

        </div><!--.ur_right__carusel-->


    </div>



</div>
