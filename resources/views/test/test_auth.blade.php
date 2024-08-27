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


                <div class="page_title pad_t1_important">
                    <h1 class="h2__title">{{ __('Оформление') }}</h1>
                    <div class="page__subtitle">

                    </div>
                </div>




                <div class="re_section__flex">

                    <div class="  re_section__left">

                        <div class="left_menu">

                        </div>


                    </div>
                    <div class="re_section__right">
                        <div class="c__title_subtitle">
                            <h3 class="F_h1">{{ __('Заполнение личых данных') }}</h3>

                        </div>
                        <div class="formCabinet">
                            <x-forms.auth-form
                                title=""
                                subtitle=""
                                action="{{ route('handle_test_auth') }}"
                                method="POST"
                            >

                                    @include('dashboard.forms.partial._inputs', ['fio_required' => 'true' ])
                                    @include('dashboard.forms.partial._input_email')




                                    <div class="slotButtons__cbetween_left">


                                            <div class=" text_input">
                                                <input type="hidden" value="{{ $password  }}" name="password">
                                                <input type="hidden" value="{{ $password  }}" name="password_confirmation">
                                                <x-forms.primary-button_register>

                                                    {{ __('Оформить полис и зарегистрироваться') }}
                                                </x-forms.primary-button_register>
                                            </div>



                                    </div>


                            </x-forms.auth-form>

                        </div>

                    </div>

                </div>


            </div>
        </section>
    </main>
@endsection


