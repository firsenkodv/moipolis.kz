<header>
    <div class="block">
        <div class="flex_block_1 flex g_col">
            <div class="g_col__logo"><x-logo.logo /></div>
            <div class="g_col__menu">
                @include('include.menu.menu_top_header')
            </div>
            <div class="g_col__phone_translate">

                <div class="top_phone">
                    <a href="tel:{{ config('site.setting.phone') }}">{{ config('site.setting.phone') }}</a>

                </div>
                <div class="top_translate">
                    @include('include.translate.translate')
                </div>

            </div>


        </div>
    </div>

    <div class="background_F5F5F7">
        <div class="block">
            <div class="flex_block_2 flex g_col2">
                <div class="g_col2__menu">
                    @include('include.menu.menu_top')
                </div>
                <div class="g_col2__call_cabinet">
                    <div class="top_call">
                        @include('include.modules.top_call')
                    </div>
                    <div class="top_cabinet">
                        @include('include.modules.top_cabinet')
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
