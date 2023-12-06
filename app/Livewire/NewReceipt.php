<?php

namespace App\Livewire;

use App\Livewire\Forms\ReceiptForm;
use Livewire\Component;

class NewReceipt extends Component
{
    public ReceiptForm $form;

    public function create()
    {
        $this->form->validate();
        $this->form->store();
    }

    public function render()
    {
        return '';
    }
}
