@props(['envelope'])

@php
    $count = $envelope->receipts()->count();
    $count = $count . ' ' . Str::plural('receipt', $count);

    $total = $envelope->receipts()->sum('amount');
    $total = number_format($total / 100, 2);
    $total = "$$total total";
@endphp

<div class="aspect-photo rounded-xl bg-gray-50 border gap-4 flex flex-col justify-between">
    <div class="space-y-1 leading-tight p-4">
        <p class="font-semibold">{{ $envelope->name }}</p>

        <div class="leading-none">
            <p class="text-sm text-gray-500">{{ $count }}</p>
            <p class="text-sm text-gray-500">{{ $total }}</p>
        </div>
    </div>

    <div class="flex gap-1 p-1" x-data="{ showDelete: false, showRename: false }">
        <button x-ref="deleteButton" x-on:click="showDelete = true" class="w-full rounded-l-lg p-3 bg-gray-100 border hover:border-gray-300 transition-colors">
            <x-icon name="trash" class="w-4 h-4 mx-auto"/>
        </button>

        <x-popover anchor="deleteButton" show="showDelete">
            <button x-on:click="showDelete = false" class="py-0.5 px-2 border bg-gray-100 rounded outline-none focus:border-gray-400">Cancel</button>
            <button wire:click="$parent.delete({{ $envelope->id }})" class="py-0.5 px-2 border bg-red-100 text-red-800 border-red-200 rounded outline-none focus:border-red-400">Delete</button>
        </x-popover>

        <button x-ref="renameButton" x-on:click="showRename = true" class="w-full p-3 bg-gray-100 border hover:border-gray-300 transition-colors">
            <x-icon name="pencil" class="w-4 h-4 mx-auto"/>
        </button>

        <x-popover anchor="renameButton" show="showRename">
            <form wire:submit="rename">
                <input class="w-48 py-0.5 px-2 outline-none border rounded focus:border-gray-400" type="text" wire:model="newName">
                <button class="py-0.5 px-2 border bg-gray-100 rounded outline-none focus:border-gray-400">Rename</button>
            </form>
        </x-popover>

        <button class="w-full rounded-r-lg p-3 bg-gray-100 border hover:border-gray-300 transition-colors">
            <x-icon name="archive-box" class="w-4 h-4 mx-auto"/>
        </button>
    </div>
</div>