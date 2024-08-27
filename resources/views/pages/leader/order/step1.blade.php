@extends('layouts.layout')
<x-seo.meta
    title=""
    description=""
    keywords=""
/>
@section('content')
    @php
        $password =  time();
    @endphp

    <main class="page_section background_F5F5F7">
        <section class="re_section">
            <div class="block border_top_FFFFFF">
                <div class="brod">
                    <ul>
                        <li><a href="{{route('home')}}">{{__('Главная')}}</a> •</li>
                        <li><a href="{{route('calculator_design_results')}}">{{__('Оформление')}}</a> •</li>
                        <li><span>Страховая компрания {{ $session_array['item']->company->title }}</span></li>
                    </ul>
                </div>

                <div class="page_title pad_t1_important">
                    <h1 class="h2__title">{{ __('Оформление') }}</h1>
                    <div class="page__subtitle">

                    </div>
                </div>


                <div class="re_section__flex @if(!$user) re_section__flex_calc_result @endif">
                    @if($user)
                    <div class="  @if($user) re_section__left_user @else re_section__left @endif">

                        <div class="left_menu">
                            @if($user)
                                <div class="cabinet_radius12_fff">
                                    @include('dashboard.left_bar.avatar')
                                </div>
                                <br>
                                <br>
                                <div class="cabinet_radius12_fff">
                                    @include('dashboard.left_bar.logout')
                                </div>
                            @endif
                        </div>
                    </div>
                    @endif



                    <div class="re_section__right">
                        <div class="c__title_subtitle">
                            <h3 class="F_h1">{{ __('Заполнение личых данных') }}</h3>
                            @if($user)
                                <div class="F_h2 pad_t5">
                                    <span>{{ __('Вы зарегистрированы, ваши личные данные подставятся автоматически.') }}</span>
                                </div>
                            @else
                                <div class="F_h2 pad_t5"><span>Для получения полиса и для удобства вы можете <a
                                            href="#modal_reg" data-fancybox >зарегистрироваться</a> или <a
                                            href="#modal_login" data-fancybox >воити</a>.</span></div>
                            @endif
                        </div>
                        <div class="formCabinet calc_form">
                            <x-forms.auth-calc-form
                                method="POST"
                                action="{{  $action }}"
                            >

                                @include('dashboard.forms.partial._inputs', ['fio_required' => 'true' ])
                                @guest()
                                    @include('dashboard.forms.partial._input_email')

                                @endguest

                                <div class="_calc_hr"></div>


                                <div class="step1__company">
                                    <div class="c__title_subtitle">
                                        <h3 class="F_h1 color_red">{{ $session_array['item']->company->title }}</h3>
                                    </div>


                                    @if(isset($session_array['inputs']))
                                        <div class="calc_title__options">{{ __('Выбранные основные опции:') }}</div>


                                        <div class="step1__st flex">
                                            <span class="step1_st__label">{{ __('Вид страхования') }}</span>
                                            <span class="step1_st__text">{{ $session_array['item']->title_calc }}</span>
                                        </div>


                                        @foreach($session_array['inputs']  as $input)
                                            <div class="step1__st flex">
                                                <span class="step1_st__label">{{ $input['title'] }}</span>
                                                <span class="step1_st__text">{{ $input['text'] }}</span>
                                            </div>
                                        @endforeach

                                        <div class="step1__st flex">
                                            <span class="step1_st__label">{{ __('Срок') }}</span>
                                            <span class="step1_st__text">{{ __('12 месяцев') }}</span>
                                        </div>

                                    @endif


                                    @if(isset($session_array['options']))

                                        <br>
                                        <div class="calc_title__options">{{ __('Выбранные дополнительные опции:') }}</div>


                                        @foreach($session_array['options']  as $option)
                                            <div class="step1__st flex">
                                                <span class="step1_st__label">{{ __('Дополнительно') }}</span>
                                                <span class="step1_st__text">{{ $option['title'] }}</span>
                                            </div>
                                        @endforeach
                                    @endif

                                </div>

                                <div class="_responce__calc">
                                    <div class="class__info">
                                        <div class="flashMassege__relative">
                                            {{ __('Стоимость страхового полиса в компании') }}
                                            <strong>{{ $session_array['item']->company->title }}</strong> за 12 месяцев
                                            составляет <strong>{{ $session_array['price'] }}</strong>
                                        </div>
                                    </div>
                                </div>

                                <div class="_calc_hr"></div>

                                <div class="slotButtons slotButtons__cbetween pad_t15 _calcR _calcR__js">

                                    <div class="slotButtons__cbetween_left">

                                        @if($user)
                                            <div class="text_input">
                                                <input type="hidden" value="{{ (isset($user->id))?$user->id:''  }}"
                                                       name="id">
                                                <x-forms.primary-button>
                                                    {{ __('Оформить полис') }}
                                                </x-forms.primary-button>
                                            </div>

                                        @else
                                            <div class="text_input">
                                                <x-forms.primary-button_white_red>
                                                    {{ __('Оформить полис') }}
                                                </x-forms.primary-button_white_red>
                                            </div>


                                            <div class=" text_input">
                                                <input type="hidden" value="{{ $password  }}" name="password">
                                                <input type="hidden" value="{{ $password  }}"
                                                       name="password_confirmation">
                                                <x-forms.primary-button_register>

                                                    {{ __('Оформить полис и зарегистрироваться') }}
                                                </x-forms.primary-button_register>
                                            </div>
                                        @endif


                                    </div>

                                    <div class="slotButtons__cbetween_right">
                                        <div class=" text_input _itog">
                                            <div class="_itog__text">{{ __('Итого') }}</div>
                                            <div class="_itog__price">{{ $session_array['price'] }}</div>
                                        </div>
                                    </div>

                                </div>

                            </x-forms.auth-calc-form>

                        </div>

                    </div>

                </div>


            </div>
        </section>
    </main>
    @include('include.modals.temp_forms.login')
    @include('include.modals.temp_forms.reg')

@endsection

