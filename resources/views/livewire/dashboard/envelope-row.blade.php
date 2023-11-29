@props(['envelope'])

@php
    $count = $envelope->receipts()->count();
    $count = $count . ' ' . Str::plural('receipt', $count);

    $total = $envelope->receipts()->sum('amount');
    $total = number_format($total / 100, 2);
    $total = "$$total total";
@endphp

<div class="space-y-2 leading-none">
    <p class="font-semibold">{{ $envelope->name }}</p>

    <p class="text-sm text-gray-500">{{ $count }} ({{ $total }})</p>

    <div class="flex gap-2" x-data="{ showDelete: false, showRename: false }">
        <x-button
            icon="trash"
            color="red"
            x-ref="deleteButton"
            x-on:click="showDelete = true"
        />

        <x-popover anchor="deleteButton" show="showDelete">
            <div class="p-2 flex gap-2">
                <x-button x-on:click="showDelete = false" text="Cancel"/>
                <x-button wire:click="$parent.delete({{ $envelope->id }})" text="Delete" color="red" icon="trash"/>
            </div>
        </x-popover>

        <x-button
            icon="pencil"
            color="orange"
            x-ref="renameButton"
            x-on:click="showRename = true"
        />

        <x-popover anchor="renameButton" show="showRename">
            <form wire:submit="rename" class="p-2 flex gap-2">
                <x-input wire:model="newName" placeholder="Envelope Name"/>
                <x-button text="Rename"/>
            </form>
        </x-popover>

        <x-button
            icon="archive-box"
            color="green"
            wire:click="$parent.archive({{ $envelope->id }})"
        />
    </div>
</div>