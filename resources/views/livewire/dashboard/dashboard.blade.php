<div class="space-y-4" x-on:refresh-dashboard.window="$wire.$refresh()">
    <x-card class="divide-y">
        @foreach($envelopes->where('archived', false) as $envelope)
            <div class="p-4" wire:key="{{ $envelope->id }}">
                <livewire:dashboard.envelope-row :$envelope :key="$envelope->id"/>
            </div>
        @endforeach
    </x-card>

    <x-card class="divide-y">
        @foreach($envelopes->where('archived') as $envelope)
            <div class="p-4" wire:key="{{ $envelope->id }}">
                <livewire:dashboard.envelope-row :$envelope :key="$envelope->id"/>
            </div>
        @endforeach
    </x-card>
</div>