<div class="social__flex">
    @if(isset($social_network))
    @foreach($social_network as $network)
        <a href="{!! ($network->url)? trim($network->url) : '#' !!}" class="social__link">
            <img src="{{ asset('/storage/'.$network->img) }}"
                 alt="{{($network->description)??''}}"
                 {!!  ($network->w)?'width="'. trim($network->w) .'"': ''!!}
                 {!! ($network->h)?'height="'. trim($network->h) .'"': ''!!}
                 loading="lazy"
            /></a>
    @endforeach
    @endif


</div>

