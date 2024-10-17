<div class="block">
    <div class="___carusel">

        @if($individuals)
<div class="___carusel_wrap active">
            <div class="slick_slider slick_slider__carusel_ind_legal">

                @foreach($individuals as $item)

                    <a href="{{route('individual_page', $item->slug)}}" class="ur_item__img slick_slide">
                        <div class="ur_item__title">
                            <div class="h4__title">
                                {{ $item->title }}
                            </div>
                        </div>
                        <div class="ur_item___img"  style="background-image: url('{{ asset(Storage::disk('moonshine')->url($item->img )) }}')"></div>
                    </a>

                @endforeach

            </div>
</div>
        @endif

        @if($legal_persons)
                <div class="___carusel_wrap">

            <div class="slick_slider slick_slider__carusel_ind_legal">

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
                </div>
        @endif

    </div><!--.__carusel-->
</div>
