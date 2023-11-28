@props(['anchor', 'show'])

<div x-cloak x-show="{{ $show }}" x-anchor.offset.14="{{ '$refs.' . $anchor }}" x-on:click.outside="{{ $show }} = false">
    <div class="bg-white border rounded-xl p-2 max-w-sm arrow-top">
        {{ $slot }}
    </div>
</div>
