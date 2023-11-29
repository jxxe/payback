@props(['anchor', 'show'])

@php($ref = "\$refs.$anchor")

<div class="pt-4" x-cloak x-show="{{ $show }}" x-anchor="{{ $ref }}" x-on:click.outside="{{ $show }} = false">
    <div class="bg-white border p-1 max-w-sm">
        {{ $slot }}
    </div>
</div>

<div class="pt-2 px-4" x-cloak x-show="{{ $show }}" x-anchor="{{ $ref }}">
    <div class="relative">
        <svg width="1rem" height="0.5rem" viewBox="0 0 100 50">
            <polygon points="50,0 100,50 0,50" class="fill-gray-400"/>
        </svg>
    
        <svg class="absolute" style="top: calc(sqrt(2) * 1px)" width="1rem" height="0.5rem" viewBox="0 0 100 50">
            <polygon points="50,0 100,50 0,50" fill="white"/>
        </svg>
    </div>
</div>