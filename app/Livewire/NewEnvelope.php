<?php

namespace App\Livewire;

use Livewire\Component;

class NewEnvelope extends Component
{
    public string $name = '';

    public function store()
    {
        if(!$this->name) return;
        auth()->user()->envelopes()->create(['name' => $this->name]);
        $this->name = '';
        return $this->dispatch('refresh-dashboard');
    }

    public function render()
    {
        return <<<'BLADE'
            <div x-data="{ show: false }">
                <x-button
                    x-ref="button"
                    x-on:click="show = true"
                    text="Envelope"
                    color="gray"
                    icon="envelope-open"
                />

                <x-popover anchor="button" show="show">
                    <form wire:submit="store" class="p-2 flex gap-2">
                        <x-input wire:model="name" placeholder="New Envelope..." icon="envelope-open"/>
                        <x-button text="Create"/>
                    </form>
                </x-popover>
            </div>
        BLADE;
    }
}
