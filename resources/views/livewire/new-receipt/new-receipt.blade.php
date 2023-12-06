<div class="space-y-4">
    <x-card class="p-4">
        <div class="grid gap-4 grid-cols-[1fr,2fr]">
            <div class="space-y-2">
                <div class="aspect-[1/2] rounded border border-dashed p-2" wire:loading.class="animate-scan" wire:target="autofill">
                    <img class="w-full h-full object-cover" src="https://i.imgur.com/m1CpYfR.jpg" alt="">
                    {{-- @if($image)
                        <img class="w-full h-full object-cover" src="{{ $image->temporaryUrl() }}" alt="">
                    @else
                        <label class="h-full cursor-pointer text-gray-400 flex gap-2 flex-col items-center justify-center" role="button">
                            <input hidden type="file" wire:model.live="image" accept=".png,.jpg,.jpeg">
                            <x-icon name="upload" class="w-4 h-4"/>
                            <p class="text-sm">Click to add photo</p>
                        </label>
                    @endif --}}
                </div>

                @if($image || true)
                    <div class="flex gap-2">
                        <x-button wire:click="$set('image', '')" icon="trash" color="red"/>

                        @can('use-ai')
                            <div class="flex gap-2 items-center">
                                <x-button
                                    wire:click="autofill"
                                    text="Scan"
                                    icon="sparkles"
                                    color="purple"
                                    wire:target="autofill"
                                    :disabled="$autofillSuccess !== null"
                                />

                                @if($autofillCents && $autofillSeconds)
                                    <div class="leading-[1.1] text-[0.6rem] text-gray-400">
                                        <p>{{ number_format($autofillCents, 1) }}¢</p>
                                        <p>{{ number_format($autofillSeconds, 1) }}s</p>
                                    </div>
                                @endif
                            </div>
                        @endcan
                    </div>
                @endif
            </div>

            <div class="space-y-2">
                <x-input required wire:model="form.store" placeholder="Store"/>
                <x-input required wire:model="form.amount" type="number" placeholder="Amount" prefix="$"/>
                <x-input wire:model="form.description" placeholder="Description"/>

                <x-select required wire:model="form.category_id" placeholder="Category...">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </x-select>

                <x-select required wire:model="form.envelope_id" placeholder="Envelope...">
                    @foreach($envelopes as $envelope)
                        <option value="{{ $envelope->id }}">{{ $envelope->name }}</option>
                    @endforeach
                </x-select>
            </div>
        </div>
    </x-card>
</div>
