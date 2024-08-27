@props([
   'action' => '',
   'method' => 'post',
])
<div class="blockForm">
    <form class="form"
          action="{{ $action }}"
          method="{{ $method }}"
   >

        @csrf
        {{ $slot  }}
    </form>
</div><!--.blockForm-->

