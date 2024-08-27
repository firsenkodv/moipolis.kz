@extends('layouts.layout')
<x-seo.meta
    title=""
    description=""
    keywords=""
/>
@section('content')

    <main class="page_section background_F5F5F7">
        <section class="re_section">
            <div class="block border_top_FFFFFF">
                <div class="re_section__flex re_section__flex_calc_result">
                    <div class="re_section__right">
                        <div class="responce_calc__top">

                            @include('include.modals.modal.responce.responce_calc')
                        </div>
                        <div class="responce_calc__bottom">
                        <div class="_calc_hr"></div>
                            <div class="c_wrapp_F_h1">
                                <h3 class="F_h1">Страхование имущества для Физ. лиц</h3>
                            </div>
                            </div>
                            <div class="c_r__company_flex c_r__company_flex__label color_grey ">
                                <div class="c_r__flex_1">
                                    <div class="td">Страховая компания</div>
                                </div>
                                <div class="c_r__flex_2">
                                    <div class="c_r__month"><div class="td">Срок</div></div>
                                    <div class="c_r__price"><div class="td">Цена</div></div>
                                </div>
                            </div>
                            <div class="c_r__company_flex cborder">
                                <div class="c_r__flex_1">
                                    <div class="c_r__img"
                                         style="background-image: url('{{ Storage::url($session_array['item']->company->img)  }}')"></div>
                                    <div class="c_r__title"> {{  $session_array['item']->company->title  }}</div>
                                </div>
                                <div class="c_r__flex_2">
                                    <div class="c_r__month">12 месяцев</div>
                                    <div class="c_r__price"><strong>{{ $session_array['price'] }}</strong></div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection


