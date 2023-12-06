@props([
    'text',
    'color' => 'accent',
    'icon'
])

@php
    $tag = isset($attributes['href']) ? 'a' : 'button';

    if($attributes['wire:target']) {
        $attributes['wire:loading.class'] = 'opacity-50 pointer-events-none';
    }
@endphp

<{{ $tag }} {{ $attributes }} class="transition-opacity disabled:pointer-events-none disabled:opacity-50">
    <div @class([
        'glint squish py-1.5 px-2.5 rounded border bg-gradient-to-b',
        'font-semibold leading-none text-white text-sm',
        'border-sky-800 from-sky-500 to-sky-600' => $color === 'blue',
        'border-accent-800 from-accent-500 to-accent-600' => $color === 'accent',
        'border-rose-800 from-rose-500 to-rose-600' => $color === 'red',
        'border-amber-800 from-amber-500 to-amber-600' => $color === 'orange',
        'border-purple-800 from-purple-500 to-purple-600' => $color === 'purple',
        'border-green-800 from-green-500 to-green-600' => $color === 'green',
        'border-gray-600 from-gray-400 to-gray-500' => $color === 'gray'
    ]) style="text-shadow: #00000080 0 1px 1px">
        <div class="flex gap-2 items-center justify-center">
            @isset($icon)
                <x-icon :name="$icon" class="w-3.5 h-3.5" style="filter: drop-shadow(0 1px 1px #00000080)"/>
            @endisset

            @isset($text)
                {{ $text }}
            @endisset
        </div>
    </div>
</{{ $tag }}>