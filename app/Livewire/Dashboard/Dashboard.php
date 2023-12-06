<?php

namespace App\Livewire\Dashboard;

use App\Models\Envelope;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{
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
    #[Layout('components.layouts.default')]
    public function render()
    {
        return view('livewire.dashboard.dashboard', [
            'envelopes' => auth()->user()->envelopes
        ]);
    }
}
