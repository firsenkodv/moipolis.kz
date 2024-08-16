@extends('layouts.layout')
@section('title', ($seo_title) ?? null)
@section('description', ($seo_description)??null)
@section('keywords', ($seo_keywords)??null)
@section('content')

    <section class="unitedStates catalogContacts our-services pad_b1">
        <div class="block">
            <div class="brod">
                <ul>
                    <li><a href="{{route('home')}}">{{__('Главная')}}</a> • </li>
                    <li><span>{{__('Контакты')}}</span></li>
                </ul>
            </div>

            <div class="page_title pad_t1_important">
                <h1 class="h2__title">{{__('Контакты для связи')}}</h1>

            </div>

            <div class="catalogContacts__tabs contactTabs">
                <div class="contactTabs__top">

                    @foreach($contacts as $k=>$contact)

                        <div data-tab="G_tab{{$k}}" class="G_tab{{$k}}
                         @if($session_city)
                                 @if($session_city == $contact->city->city)
                                 active
                                 @endif
                             @elseif($k==0)
                             active
                         @endif

                         contactTabs__tab contactTabs__tab__js">
                            <span class="nursul">{{$contact->city->city}}</span>
                        </div><!--.G_tab{{$k}}-->

                    @endforeach
                </div>

                <div class="contactTabs__bottom contactTabsBody contactTabsBody__js">
                    @foreach($contacts as $k=>$contact)
                        <div
                            class="G_tab{{$k}}
                              @if($session_city)
                                 @if($session_city == $contact->city->city)
                                 active
                                 @endif
                             @elseif($k==0)
                             active
                             @endif
                            contact_area contact_area__js contactTabsBody__tab">
                            <div class="contact_area__flex">
                                <div class="contact_area__left">
                                    <div class="color_grey_16 color_grey  contact_area__label">{{__('Телефон:')}}</div>
                                    @foreach($contact->data_phone as $k => $property)
                                        <div class="property">{{$property['jt1']}}</div>
                                    @endforeach
                                </div>
                                <div class="contact_area__center">
                                    @if($contact->address)
                                        <div
                                            class="color_grey_16 color_grey  contact_area__label">{{__('Адрес:')}}</div>
                                        <div class="property">{{$contact->address}}</div>
                                    @else
                                        <div
                                            class="color_grey_16 color_grey  contact_area__label">{{__('Координатор:')}}</div>
                                        <div class="property">г. {{$contact->city->city}}</div>
                                    @endif
                                </div>
                                <div class="contact_area__right">
                                    @foreach($contact->data_email as $k => $property)
                                        <div
                                            class="color_grey_16 color_grey contact_area__label">{{__('E-mail:')}}</div>
                                        <div class="property">{{$property['jt1']}}</div>
                                    @endforeach
                                    <div class="contact_area__fsite_social fsite_social" >
                                        <x-contacts.shared/>
                                    </div>
                                </div>
                            </div>

                        </div><!--.G_tab{{$k}}-->

                    @endforeach


                </div>

            </div>
        </div>
    </section>

    <div style="background:#949491" id="loader_wrapper" class="loader_wrapper active ">
        <div style="color:#ffffff" class="loader_map">Loading...</div>
    </div>
    @php
        foreach ($contacts as $k=>$contact)
        {
            if($session_city == $contact->city->city)
                {
                    $point = $contact->yandex_map;
                }
        }
    @endphp
    <div class="JFormFieldMap_wrapper">
        <div id="JFormFieldMap" class="JFormFieldMap" style="width: 100%; height: 450px"></div>
    </div>
    <script>
        var myMap;
        function getYaMap() {
            var myMap = new ymaps.Map("JFormFieldMap", {
                center: [{{(isset($point))?$point:'48.6525, 67.5158'}}],
                zoom: 5,
                controls: ['zoomControl', 'typeSelector', 'fullscreenControl']
            }, {searchControlProvider: 'yandex#search'});


            @foreach($contacts as $k=>$contact)
                myPlacemark{{$k}} = new ymaps.Placemark([{{$contact->yandex_map}}], {balloonContent: '<h5>{{$contact->city->city}}</h5>@foreach($contact->data_phone as $k => $property)<p class="jt_ph">{{$property['jt1']}}</p>@endforeach @if($contact->address)<p class="jt_ph">{{$contact->address}}</p>@endif'}, {
                iconLayout: 'default#image',
                iconImageHref: '{{ asset('/storage/contacts/myIcon.svg') }}',
                iconImageSize: [58, 55],
                iconImageOffset: [-28, -48]
            });
            @endforeach



            @foreach($contacts as $k=>$contact)
            $("body").on("click", ".contactTabs__top  .G_tab{{$k}}", function (event) {


                myMap.panTo([{{$contact->yandex_map}}], {
                    //    delay:  9000,
                    duration: 1000,
                    checkZoomRange: true
                });
                $('.contactTabs__tab__js').removeClass('active'); // remove tab
                $(this).addClass('active');// add tab
                $('.contact_area__js').removeClass('active'); // remove result
                $('.' + $(this).data('tab')).addClass('active'); // add result

            });
            @endforeach



            myMap.geoObjects
            @foreach($contacts as $k=>$contact)
                .add(myPlacemark{{$k}})
            @endforeach
            ;
        }

/*        setTimeout(function () {
            var elem = document.createElement('script');
            elem.type = 'text/javascript';
            elem.src = '//api-maps.yandex.ru/2.1/?apikey=b2e3bd40-cf77-4290-9124-3f999631fbec&package.standard&lang=ru_RU&onload=getYaMap';
            document.getElementsByTagName('body')[0].appendChild(elem);
            document.getElementById('loader_wrapper').style.visibility = 'hidden';
        }, 2000);*/

    </script>

@endsection

