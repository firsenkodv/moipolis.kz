@extends('layouts.layout')
@section('class') zont @endsection
<x-seo.meta
    title="{{(isset($item->metatitle))?$item->metatitle:((isset($seo_title))?$seo_title:null)}}"
    description="{{(isset($item->description))?$item->description:((isset($seo_description))?$seo_description:null)}}"
    keywords="{{(isset($item->keywords))?$item->keywords:((isset($seo_keywords))?$seo_keywords:null)}}"
/>
@section('content')
    <main class="page_section">
        <section class="re_section">
            <div class="content_wrap_cat">
                <div class="content_cat">
                    <h1 class="h3__title"><span>Виды страхования  <i>Юридических лиц</i></span></h1>

                    @if($items)
                        <ul>
                            @foreach($items as $item)

                                <li class="content_cat__teaser"><a
                                        href="{{route('legalperson_page', $item->slug)}}">{{ $item->title }}</a></li>

                            @endforeach
                        </ul>
                    @endif


                </div>
            </div>
        </section>
    </main>
@endsection

