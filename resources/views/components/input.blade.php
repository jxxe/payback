@props([
    'type' => 'text',
    'icon',
    'prefix',
    'suffix'
])

<div class="flex items-center gap-2 w-full focus-within:border-accent leading-none shadow-inner text-sm py-1 px-2.5 rounded border">
    @isset($icon)
        <x-icon class="w-4 h-4 text-gray-400" :name="$icon"/>
    @endisset

    @isset($prefix)
        <span>{{ $prefix }}</span>
    @endisset

    <input
        class="block w-full outline-none"
        type="{{ $type }}"
        {{ $attributes }}
    />

    @isset($suffix)
        <span>{{ $suffix }}</span>
    @endisset
</div>