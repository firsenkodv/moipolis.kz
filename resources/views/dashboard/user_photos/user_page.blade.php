@extends('layouts.layout_cabinet')
@section('title', ($seo_title) ?? __('Кабинет пользователя / Фотогалерея') )
@section('description', ($seo_description)?? __('Кабинет пользователя / Фотогалерея') )
@section('keywords', ($seo_keywords)?? __('Кабинет пользователя / Фотогалерея') )
@section('cabinet')
    <div class="auth">
        <div class="cabinet">
            <div class="block">

                <div class="hbox__top pad_b1">
                    <h1>{{__('Личный кабинет')}}</h1>
                </div>

                <div class="cabinet__flex  height_100">
                    <div class="cabinet__left">
                        <div class="cl">

                            @include('dashboard.left_bar.left')

                        </div>
                    </div>

                    <div class="cabinet__right">

                        @include('dashboard.menu.cabinet_menu')

                        <div class="cabinet_radius12_fff">

                            <div class="c__title_subtitle">
                                <h3 class="F_h1">{{ __('Ваши фотографии') }}</h3>
                                <div class="F_h2 pad_t5">
                                    <span>{{__('Вы можете спмостоятельно загружать изображения на свою страницу.')}}</span>
                                </div>
                            </div>


                            <x-forms.form-multipart

                                action="{{ route('cabinet.photos.upload' , ['id' => auth()->user()->id]) }}"
                                method="POST"
                                enctype="multipart/form-data"
                                id="form_drob"
                            >


                                <div class="drob_container">
                                    <div class="camera"></div>
                                    <div class="camera_title"><span>{{ __('Перетащите изображение или') }}</span></div>

                                    <input type="file" id="upload-button" name="photos[]" multiple accept="image/*"/>
                                    <label for="upload-button"
                                    >
                                        <div class="camera_button">
                                            <div class="button  button_normal"><span>{{ __('Добавить') }}</span></div>
                                        </div>
                                    </label>
                                    <div class="camera_format">
                                        <span>{{ __('Поддерживаются изображения только в форматах jPG и PNG') }}</span>
                                    </div>
                                    <div id="error"></div>
                                    <div id="image-display"></div>

                                </div>


                            </x-forms.form-multipart>


                            @if(isset($items))
                                <div class="cabinet_ob_gallery pad_t20  pad_b20 ">

                                @foreach($items as $k => $item)
                                    <div class="mItem">
                                        <a href="{{ asset(Storage::disk('public')->url($item['img'])) }}"
                                           data-fancybox="gallery"><img class="pc_category_img" style="width: 244px; height: auto"
                                                                        loading="lazy"
                                                                        src="{{ asset(Storage::disk('public')->url($item['img'])) }}"
                                                                        alt="photo_{{ $k }}"></a></div>

                            @endforeach
                                </div>
                            @endif

                        </div>

                    </div>
                </div>

            </div>
        </div><!--.cabinet-->
    </div>
@endsection



