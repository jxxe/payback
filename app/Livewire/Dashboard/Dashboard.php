<?php

namespace App\Livewire\Dashboard;

use Illuminate\Http\Request;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{
    #[Locked]
    public array $envelopes = [];

    public function mount()
    {
        $this->envelopes = auth()->user()->envelopes;
    }

    public function deleteEnvelope(Envelope $envelope)
    {
        $this->authorize('delete', $envelope);
        $envelope->delete();
    }

    public function archiveEnvelope(Envelope $envelope, bool $newValue)
    {
        $this->authorize('update', $envelope);
        $envelope->update(['archived' => $newValue]);
    }

    public function renameEnvelope(Envelope $envelope, string $newName)
    {
        $this->authorize('update', $envelope);
        $envelope->update(['name' => $newName]);
    }

    #[Title('Dashboard — Payback')]
    public function render()
    {
        return view('livewire.dashboard.dashboard');
    }
}
