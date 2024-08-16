@auth
            <a href="{{ route('cabinet') }}" class="flex _lc_flex">
                <div class="_lc_img"></div>
                <div class="_lc_text"><span>{{ __('Личный') }}</span>  {{ __('кабинет') }}</div>
            </a>

@endauth
@guest

    <a href="/login" class="flex _lc_flex">
        <div class="_lc_img"></div>
        <div class="_lc_text"><span>{{ __('Личный') }}</span>  {{ __('кабинет') }}</div>
    </a>

@endguest

