@props([

    'class' => '',
    'name' => '',
])
<div class="calc_label @if($class) {{ $class }} @endif">
    <span>{{$name}}</span>
</div>


