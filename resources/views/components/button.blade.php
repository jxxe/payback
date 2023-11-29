@props([
    'text',
    'color' => 'accent',
    'size' => 'md'
])

@php($tag = isset($attributs['href']) ? 'a' : 'button')

<{{ $tag }} {{ $attributes }}>
    <div @class([
        'glint font-semibold leading-none text-white text-sm shadow py-1.5 px-2.5 rounded border bg-gradient-to-b',
        'border-sky-800 from-sky-500 to-sky-600' => $color === 'blue',
        'border-accent-800 from-accent-500 to-accent-600' => $color === 'accent',
        'border-rose-800 from-rose-500 to-rose-600' => $color === 'red',
        'border-gray-600 from-gray-400 to-gray-500' => $color === 'gray'
    ]) style="text-shadow: rgba(0, 0, 0, 0.35) 0 1px 1px;">
        {{ $text }}
    </div>
</{{ $tag }}>