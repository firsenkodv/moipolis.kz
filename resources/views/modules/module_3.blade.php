<div class="block company_slider">
    <h2 class="h2">{{ __('Страховые компании') }}</h2>

    @if($companies)
        <div class="slick_slider slick_slider__carusel">
            @foreach($companies as $company)
                <div class="p_item__img slick_slide"><a href="{{ route('company', ['slug' => $company->slug]) }}"><img src="{{ Storage::disk('moonshine')->url($company->img) }}" alt="{{ $company->title  }}"></a></div>
            @endforeach
        </div>
    @endif

</div>
