@props([
    'type' => 'text'
])

<input
    class="block w-full outline-none focus:border-accent-500 leading-none shadow-inner text-sm py-1 px-2.5 rounded border"
    type="{{ $type }}"
    {{ $attributes }}
/>