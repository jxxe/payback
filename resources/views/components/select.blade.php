@props([
    'placeholder'
])

<select @class([
    'py-1 px-2.5 glint w-full leading-none text-sm rounded border border-gray-300 outline-none',
    'bg-gradient-to-b from-gray-50 to-gray-200 cursor-pointer'
]) {{ $attributes }}>
    @isset($placeholder)
        <option value="" selected disabled hidden>{{ $placeholder }}</option>
    @endisset

    {{ $slot }}
</select>