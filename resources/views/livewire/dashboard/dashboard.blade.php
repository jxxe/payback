<div class="max-w-screen-sm mx-auto p-8">
    <div class="grid gap-4 grid-cols-2">
        @foreach($envelopes as $envelope)
            <livewire:dashboard.envelope-card :$envelope :key="$envelope->id"/>
        @endforeach
    </div>
</div>
