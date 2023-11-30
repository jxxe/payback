@props(['anchor', 'show'])

@php($ref = "\$refs.$anchor")

<div x-transition class="pt-3 z-50" x-cloak x-show="{{ $show }}" x-anchor="{{ $ref }}" x-on:click.outside="{{ $show }} = false">
    <div class="bg-white rounded-lg shadow-lg border max-w-xs overflow-clip">
        {{ $slot }}
    </div>
</div>

<div x-transition class="pt-1 px-4 z-50" x-cloak x-show="{{ $show }}" x-anchor="{{ $ref }}">
    <div class="relative">
        <svg width="1rem" height="0.5rem" viewBox="0 0 100 50">
            <polygon points="50,0 100,50 0,50" class="fill-gray-200"/>
        </svg>
    
        <svg class="absolute" style="top: calc(sqrt(2) * 1px)" width="1rem" height="0.5rem" viewBox="0 0 100 50">
            <polygon points="50,0 100,50 0,50" fill="white"/>
        </svg>
    </div>
</div>