<?php

namespace App\Livewire\Forms;

use App\Models\Category;
use App\Models\Envelope;
use App\Models\Receipt;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ReceiptForm extends Form
{
    #[Validate('required')]
    public $store = '';

    #[Validate('required|numeric|min:0')]
    public $amount = '';

    #[Validate('nullable')]
    public $description = '';

    #[Validate('nullable|image')]
    public $image = '';

    #[Validate('required|exists:App\Models\Category,id', as: 'category')]
    public $category_id = '';

    public $envelope_id = '';

    public function rules()
    {
        return [
            'envelope_id' => [
                'required',
                Rule::exists(Envelope::class, 'id')
                    ->where('user_id', auth()->user()->id)
            ]
        ];
    }

    public function update(Receipt $receipt): void
    {
        $receipt->update($this->all());
    }

    public function store(): Receipt
    {
        return Receipt::create($this->all());
    }
}