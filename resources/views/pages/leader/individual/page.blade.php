@extends('layouts.layout')
<x-seo.meta
    title="{{(isset($item->metatitle))?$item->metatitle:((isset($seo_title))?$seo_title:null)}}"
    description="{{(isset($item->description))?$item->description:((isset($seo_description))?$seo_description:null)}}"
    keywords="{{(isset($item->keywords))?$item->keywords:((isset($seo_keywords))?$seo_keywords:null)}}"
/>
@section('content')
    <main class="page_section background_F5F5F7">
        <section class="re_section">
            <div class="block border_top_FFFFFF">
                <div class="brod">
                    <ul>
                        <li><a href="{{route('home')}}">{{__('Главная')}}</a> •</li>
                        <li><a href="{{route('individual_category')}}">{{__('Физичеcкие лица')}}</a> •</li>
                        <li><span>{{$item->title}}</span></li>
                    </ul>
                </div>

                <div class="page_title pad_t1_important">
                    <h1 class="h2__title">{{ $item->title }}</h1>

                    @if($item->subtitle)
                        <div class="page__subtitle">
                            {{ $item->subtitle  }}
                        </div>
                    @endif

                </div>




                <div class="re_section__flex">

                    <div class="re_section__left">

                        <div class="left_menu">
                                @if($items)
                                    <ul class="">
                                        @foreach($items as $it)
                                            <li class="{{ active_linkMenu(asset(route('individual_page', $it->slug))) }}">
                                                <a class=""
                                                   href="{{route('individual_page', $it->slug)}}">{{ ($it->title_menu)?:$it->title }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif

                        </div>


                    </div>
                    <div class="re_section__right">

                        @if($item->calc)
                            @foreach($item->calc as $name => $calc)
                                @include('pages.leader.individual.partial.'. $name, ['calc'=> $calc])
                            @endforeach
                        @endif


                </div>

            </div>


            </div>
        </section>
    </main>
@endsection
