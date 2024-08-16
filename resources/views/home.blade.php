@extends('layouts.layout')
<x-seo.meta
    title="{{(isset($item->metatitle))?$item->metatitle:((isset($seo_title))?$seo_title:null)}}"
    description="{{(isset($item->description))?$item->description:((isset($seo_description))?$seo_description:null)}}"
    keywords="{{(isset($item->keywords))?$item->keywords:((isset($seo_keywords))?$seo_keywords:null)}}"
/>
@section('content')
    <main class="home_section">

       <section class="home_section__slider h_sl">
              @include('include.blocks.home_section__slider')
        </section>


        <section class="home_benefit pad_t26 ">
            @include('modules.module_1')
         </section>

        <section class="home_partners  pad_b26">
            @include('modules.module_2')
        </section>

        <section class="home_agentcomapanies  pad_b26">
            @include('modules.module_3')

        </section>

        <section class="home_ur  pad_b26">
            @include('modules.module_5')
        </section>

        <section class="">
            @include('modules.module_4')
        </section>



    </main>
@endsection

