@props([
    'type' => '',
    'value'=> '',
    'isError' => false,
    'placeholder' => '',
    'id' => '',
    'datamin' => '',
    'datamax' => '',
    'required' => ''
])
<input
    type="{{ $type  }}"
    {{ ($required == 'true')? ' required ' : ''  }}
    id="{{ $id }}"
    value="{{ $value  }}"
    data-min="{{ $datamin }}"
    data-max="{{ $datamax }}"
    {{ $attributes->class([
    '_is-error' => $isError,
    'inputClass'
]) }}
><label class="labelInput" for="{{ $id }}">{{ $placeholder }}</label>



