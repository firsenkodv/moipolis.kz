@props([
   'title' => '',
   'subtitle' => '',
   'action' => '',
   'method' => 'post',
   'buttons' => '',
])


    <div class="blockForm">
        <form class="form"
              action="{{ $action }}"
              method="{{ $method }}"
        >
            @csrf
            @honeypot
            {{ $slot  }}
            {{ $buttons  }}
        </form>
    </div><!--.blockForm-->
