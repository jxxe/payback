@php
    $archived = $envelopes->where('archived');
    $active = $envelopes->where('archived', false);
@endphp

<div class="space-y-4" x-on:refresh-dashboard.window="$wire.$refresh()">
    @unless($active->isEmpty())
        <x-card class="divide-y">
            @foreach($active as $envelope)
                <div class="p-4" wire:key="{{ $envelope->id }}">
                    <livewire:dashboard.envelope-row :$envelope :key="$envelope->id"/>
                </div>
            @endforeach
        </x-card>
    @endunless

    @unless($archived->isEmpty())
        <x-card class="divide-y">
            @foreach($archived as $envelope)
                <div class="p-4" wire:key="{{ $envelope->id }}">
                    <livewire:dashboard.envelope-row :$envelope :key="$envelope->id"/>
                </div>
            @endforeach
        </x-card>
    @endunless
</div>