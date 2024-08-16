@extends('layouts.layout')
<x-seo.meta
    title="{{($item->metatitle)?:$item->title}}"
    description="{{$item->description}}"
    keywords="{{$item->keywords}}"
/>
@section('content')

    <main class="page_section">
        <section class="re_section">
            <div class="block">
                <div class="page_title">
                    <h1 class="h1">{{ $item->title }}</h1>
                    @if($item->subtitle)
                        <div class="page__subtitle">
                            {{ $item->subtitle  }}
                        </div>
                    @endif
                </div>

                @if($item->text)
                    <div class="desc page__desc">
                        {!!  $item->text  !!}
                    </div>
                @endif

                @if($item->img2)
                    <div class="page__img">
                        <img src="{{ asset(Storage::disk('moonshine')->url($item->img2)) }}" alt="Img" style="width: 100%; height: auto" loading="lazy" />
                    </div>
                @endif

            </div>


        </section>
        @if($item->array_modules)
            @foreach($item->array_modules as $k => $m)

                <div class="mod_ @if(!$loop->first) pad_t16 @endif

                         @if($loop->last  and $k !=4) pad_b36 @elseif($k == 4) pad_b0 @else  pad_b16 @endif ">
                    @include($m)
                </div>

            @endforeach
        @endif


    </main>

@endsection





