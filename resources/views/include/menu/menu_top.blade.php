<nav>
    <ul class="top_menu">

        <li class="{{ active_linkMenu(config('app.app_url')) }}"><a class="add__mobile_menu  {{ active_linkMenu(config('app.app_url')) }}" href="{{config('app.app_url')}}">{{ __('Главная') }}</a></li>

        <li class="{{ active_linkMenu(route('individual_category'), 'find') }}"><a href="{{route('individual_category')}}" class="add__mobile_menu @if($individuals) down @endif">{{ __('Физические лица') }}</a>
            @if($individuals)
                <ul class="submenu">
                @foreach($individuals as $item)
                        <li class="{{ active_linkMenu(asset(route('individual_page', $item->slug))) }}"><a class="" href="{{route('individual_page', $item->slug)}}">{{ ($item->title_menu)?:$item->title }}</a></li>
                @endforeach
                </ul>
            @endif

        </li>
        <li class="{{ active_linkMenu(route('legalperson_category'), 'find') }}"><a href="{{route('legalperson_category')}}" class="add__mobile_menu @if($legal_persons) down @endif">{{ __('Юридические лица') }}</a>
            @if($legal_persons)
                <ul class="submenu">
                @foreach($legal_persons as $item)
                        <li class="{{ active_linkMenu(asset(route('legalperson_page', $item->slug))) }}"><a class="" href="{{route('legalperson_page', $item->slug)}}">{{ ($item->title_menu)?:$item->title }}</a></li>
                @endforeach
                </ul>
            @endif
        </li>

        <li class="{{ active_linkMenu(asset('/general-re')) }}"><a class="add__mobile_menu " href="{{ asset('/general-re') }}">{{ __('О компании') }}</a>
        <li class="{{ active_linkMenu(asset('/contacts')) }}"><a class="add__mobile_menu " href="{{ asset('/contacts') }}">{{ __('Контакты') }}</a>

        </li>
    </ul>
</nav>
