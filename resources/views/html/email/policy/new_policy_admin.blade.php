@extends('html.email.layouts.layout_default_mail')
@section('title', '')
@section('description', '')
@section('content')

    <p style="word-wrap: break-word; font-size: 22px; margin-bottom: 10px"><b style="color: #282828">{{ $data['calc_session']['item']->title_calc }}</b></p>

    <p style="word-wrap: break-word;"><b style="color: #282828">{{__('Страховая компания')}}</b><br><span style="color: #EF533F"> {{ $data['calc_session']['item']->company->title }}</span></p>

    @if(isset($data['calc_session']['inputs']))
        <p style="word-wrap: break-word;">{{ __('Опции') }}</p>
        <p style="word-wrap: break-word;">
            @foreach($data['calc_session']['inputs']  as $input)
                <b>{{ $input['title'] }}: </b><span style="color: #282828">{{ $input['text'] }}</span><br>
            @endforeach
        </p>
    @endif
    @if(isset($data['calc_session']['options']))
        <div style="width: 100%; height: 2px;margin: 20px 0 20px 0;background: #E0E0E0;"></div>
        <p style="word-wrap: break-word;">

            @foreach($data['calc_session']['options']  as $option)
                <b>{{ __('Дополнительно') }}: </b><span style="color: #282828">{{ $option['title'] }}</span><br>
            @endforeach
        </p>

    @endif

    <p style="word-wrap: break-word; padding-top: 7px">{{ __('Личные данные страхователя ') }}</p>
    <p style="word-wrap: break-word;">
        <b>{{ __('ФИО') }}: </b><span style="color: #282828">{{ $data['request']->fio }}</span><br>
        <b>{{ __('Email') }}: </b><span style="color: #282828">{{ (isset($data['request']->email))? $data['request']->email : $data['user']->email }}</span><br>
        <b>{{ __('Телефон') }}: </b><span style="color: #282828">{{ phone($data['request']->phone) }}</span><br>
        @if(isset($data['request']->inn))
            <b>{{ __('ИНН') }}: </b><span style="color: #282828">{{ $data['request']->inn }}</span><br>
        @endif
        @if(isset($data['request']->bin))
            <b>{{ __('БИН') }}: </b><span style="color: #282828">{{ $data['request']->bin }}</span><br>
        @endif
    </p>

    <div style="width: 100%; height: 2px;margin: 20px 0 20px 0;background: #E0E0E0;"></div>
    <div style="text-align: right">{{ __('Итого') }} <b style="color: #282828">{{ $data['calc_session']['price'] }}</b><br><span style="font-size: 13px">12 месяцев</span></div>
    @if(isset($data['user']))
        <br>
        <p style="color:#EF533F ">{{__('Клиент получил уведомление на email, в личном кабинете сформировалась запись, необходимо загрузить туда полис.')}}</p>
    @else
        <br>
        <p style="color:#EF533F ">{{__('Клиент получил уведомление на email, но не стал регистрироваться. Необходимо связаться  с ним по указанным данным.')}}</p>
    @endif

@endsection



