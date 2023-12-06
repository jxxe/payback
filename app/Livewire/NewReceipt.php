<?php

namespace App\Livewire;

use OpenAI;
use Livewire\WithFileUploads;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Str;
use Exception;
use App\Models\Category;
use App\Livewire\Forms\ReceiptForm;

class NewReceipt extends Component
{
    use WithFileUploads;

    public ReceiptForm $form;
    
    /** @var \Illuminate\Http\UploadedFile $image */
    #[Validate('image|max:3000')] // 3MB
    public $image;

    public float $autofillCents;
    public ?bool $autofillSuccess;
    public float $autofillSeconds;

    public function autofill()
    {
        $this->authorize('use-ai');
        $this->autofillSuccess = null;
        $startTime = microtime(true);

        // $url = sprintf(
        //     'https://wsrv.nl/?url=%s&w=512&h=512',
        //     urlencode($this->image->temporaryUrl())
        // );
        $url = 'https://i.imgur.com/m1CpYfR.jpg';

        $categories = Category::all()
            ->map(fn($category) => "`$category->slug`: $category->keywords")
            ->join("; ");

        $client = OpenAI::client(config('apis.openai'));
        $response = $client->chat()->create([
            'model' => 'gpt-4-vision-preview',
            'max_tokens' => 1000,
            // 'response_format' => ['type' => 'json_object'],
            'messages' => [
                [
                    'role' => 'system',
                    'content' => [
                        [
                            'type' => 'text',
                            'text' => 'Return only JSON without any Markdown formatting or additional text.'
                        ]
                    ]
                ],
                [
                    'role' => 'user',
                    'content' => [
                        [
                            'type' => 'text',
                            'text' => "
                                Extract data from this receipt.
                                Return only JSON, without any additional text or Markdown formatting.

                                Return the data as a JSON object with the following keys:
                                - `store`: The name of the business or store the receipt is from. Correct it if it isn't properly spelled or capialized.
                                - `amount`: The grand total of the receipt without commas or currency symbols. If you are unsure, set this to an empty string; do not attempt to calculate it.
                                - `description`: A general description of what was purchased.
                                - `category`: Whichever category is most appropriate ($categories).

                                If you are unsure about any values, set them to an empty string.
                            "
                        ],
                        [
                            'type' => 'image_url',
                            'image_url' => [
                                'url' => $url,
                                'detail' => 'low'
                            ]
                        ]
                    ]
                ]
            ]
        ]);

        try {
            $json = $response->choices[0]->message->content;
            $json = Str::markdown($json);
            $json = strip_tags($json);
            $json = html_entity_decode($json);
            $data = json_decode($json, true);

            $this->form->store = $data['store'] ?? '';
            $this->form->amount = $data['amount'] ?? '';
            $this->form->description = $data['description'] ?? '';
            $this->form->category_id = Category::where('slug', $data['category'])->first()->id;

            $this->autofillSuccess = true;
        } catch(Exception) {
            $this->autofillSuccess = false;
        }
        
        // https://help.openai.com/en/articles/7127956-how-much-does-gpt-4-cost
        $this->autofillCents = ($response->usage->promptTokens * 3/1000) + ($response->usage->completionTokens * 6/1000);
        $this->autofillSeconds = microtime(true) - $startTime;
    }

    public function store()
    {
        $this->form->image = $this->image->storePublicly('receipts');
        $this->form->validate();
        $this->form->store();
    }

    #[Title('Add Receipt — Payback')]
    #[Layout('components.layouts.default')]
    public function render()
    {
        return view('livewire.new-receipt', [
            'envelopes' => auth()->user()->envelopes,
            'categories' => Category::all()
        ]);
    }
}
