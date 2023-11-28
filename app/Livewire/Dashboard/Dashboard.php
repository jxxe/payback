<?php

namespace App\Livewire\Dashboard;

use App\Models\Envelope;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{
    #[Locked]
    public $envelopes = [];

    public function mount()
    {
        $this->envelopes = auth()->user()->envelopes;
    }

    public function delete(Envelope $envelope)
    {
        $this->authorize('delete', $envelope);
        $envelope->delete();
    }

    public function archive(Envelope $envelope)
    {
        $this->authorize('update', $envelope);
        $envelope->archived = !$envelope->archived;
        $envelope->update();
    }

    #[Title('Dashboard — Payback')]
    public function render()
    {
        return view('livewire.dashboard.dashboard');
    }
}
