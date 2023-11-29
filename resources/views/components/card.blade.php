@props([
    'class' => ''
])

<div @class(['rounded-lg shadow-xl overflow-clip bg-white', $class])>
    {{ $slot }}
</div>