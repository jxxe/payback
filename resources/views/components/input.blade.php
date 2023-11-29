@props([
    'type' => 'text',
    'icon'
])

<div class="flex items-center gap-2 w-full focus-within:border-accent leading-none shadow-inner text-sm py-1 px-2.5 rounded border">
    @isset($icon)
        <x-icon class="w-4 h-4 text-gray-400" :name="$icon"/>
    @endisset

    <input
        class="block w-full outline-none"
        type="{{ $type }}"
        {{ $attributes }}
    />
</div>