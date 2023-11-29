@props(['envelope'])

<div class="flex gap-4 justify-between items-center">
    <div class="leading-none flex items-baseline gap-2">
        <p class="font-semibold">{{ $envelope->name }}</p>

        <p class="text-sm text-gray-500">
            {{ '$' . number_format($envelope->receipts()->sum('amount') / 100) }}
        </p>
    </div>

    <div class="flex gap-2" x-data="{ showDelete: false, showRename: false }">
        @unless($envelope->archived)
            <x-button
                icon="pencil"
                color="green"
                x-ref="renameButton"
                x-on:click="showRename = true"
            />

            <x-popover anchor="renameButton" show="showRename">
                <form wire:submit="rename" class="p-2 flex gap-2">
                    <x-input wire:model="newName" placeholder="New Name" icon="pencil"/>
                    <x-button text="Rename"/>
                </form>
            </x-popover>
        @endunless

        <x-button
            icon="{{ $envelope->archived ? 'unarchive' : 'archive' }}"
            color="orange"
            wire:click="$parent.archive({{ $envelope->id }})"
        />

        <x-button
            icon="trash"
            color="red"
            x-ref="deleteButton"
            x-on:click="showDelete = true"
        />

        <x-popover anchor="deleteButton" show="showDelete">
            <div class="p-2 flex gap-2">
                <x-button x-on:click="showDelete = false" text="Cancel" color="gray"/>
                <x-button wire:click="$parent.delete({{ $envelope->id }})" text="Delete" color="red" icon="trash"/>
            </div>
        </x-popover>
    </div>
</div>