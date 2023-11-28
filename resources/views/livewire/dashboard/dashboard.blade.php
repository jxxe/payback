<div>
    @foreach($envelopes as $envelope)
        @livewire('dashboard.envelope', $envelope)
    @endforeach
</div>
