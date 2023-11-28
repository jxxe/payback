@props(['envelope'])

@php
    $count = $envelope->receipts()->count();
    $count = $count . ' ' . Str::plural('receipt', $count);
@endphp

<div class="group">
    <div>
        
    </div>

    <div class="rounded-b-xl bg-gray-100 border p-4 leading-none">
        <div class="aspect-photo flex flex-col justify-center items-center gap-2">
            <p class="truncate font-semibold">{{ $envelope->name }}</p>
            <p class="text-sm text-gray-500">{{ $count }}</p>
        </div>
    </div>
</div>

{{-- <div>
    <button
        wire:click="$parent.delete({{ $envelope->id }})"
        wire:confirm="Are you sure you want to delete this envelope and any receipts within?"
    >Delete</button>

    <button
        x-on:click="
            const name = prompt('You are renaming “{{ $envelope->name }}”', '{{ $envelope->name }}');
            if(name) $wire.rename(name);
        "
    >Rename</button>

    <button wire:click="$parent.archive({{ $envelope->id }})">Archive</button>

    <hr>
</div>
 --}}