<div class="max-w-screen-sm mx-auto p-8">
    <div class="bg-gray-200 rounded-lg shadow-xl overflow-clip grid gap-[1px] grid-cols-2">
        @foreach($envelopes as $envelope)
            <div class="p-4 bg-white">
                <livewire:dashboard.envelope-row :$envelope :key="$envelope->id"/>
            </div>
        @endforeach
    </div>
</div>
