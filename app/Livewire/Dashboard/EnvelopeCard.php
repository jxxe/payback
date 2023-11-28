<?php

namespace App\Livewire\Dashboard;

use App\Models\Envelope;
use Livewire\Attributes\Locked;
use Livewire\Component;

class EnvelopeCard extends Component
{
    #[Locked]
    public Envelope $envelope;

    public function rename(string $name)
    {
        $this->authorize('update', $this->envelope);
        $this->envelope->update(['name' => $name]);
    }

    public function render()
    {
        return view('livewire.dashboard.envelope-card');
    }
}
