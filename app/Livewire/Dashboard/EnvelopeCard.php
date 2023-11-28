<?php

namespace App\Livewire\Dashboard;

use App\Models\Envelope;
use Livewire\Attributes\Locked;
use Livewire\Component;

class EnvelopeCard extends Component
{
    #[Locked]
    public Envelope $envelope;

    public string $newName;

    public function mount()
    {
        $this->newName = $this->envelope->name;
    }

    public function rename()
    {
        $this->authorize('update', $this->envelope);
        $this->envelope->update(['name' => $this->newName]);
    }

    public function render()
    {
        return view('livewire.dashboard.envelope-card');
    }
}
