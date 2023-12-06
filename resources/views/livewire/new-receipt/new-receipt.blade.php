<div class="space-y-4">
    <x-card class="p-4">
        <div class="grid gap-4 grid-cols-[1fr,2fr]">
            <div class="space-y-2">
                <div class="aspect-[1/2] rounded border border-dashed p-2">
                    @if($image)
                        <img class="w-full h-full object-cover" src="{{ $image->temporaryUrl() }}" alt="">
                    @else    
                        <label class="h-full cursor-pointer text-gray-400 flex gap-2 flex-col items-center justify-center" role="button">
                            <input hidden type="file" wire:model.live="image" accept=".png,.jpg,.jpeg">
                            <x-icon name="upload" class="w-4 h-4"/>
                            <p class="text-sm">Click to add photo</p>
                        </label>
                    @endif
                </div>

                @if($image)
                    <div class="flex gap-2">
                        <x-button wire:click="$set('image', '')" icon="trash" color="red"/>

                        @can('use-ai')
                            <x-button
                                wire:click="autofill"
                                text="Scan"
                                icon="sparkles"
                                color="purple"
                                wire:target="autofill"
                                :disabled="$autofillSuccess !== null"
                            />
                        @endcan
                    </div>
                @endif
            </div>

            <div>
                <pre>@json($form, JSON_PRETTY_PRINT)</pre>
                <hr>
                <p>Cost: ${{ number_format($autofillCost, 3) }}</p>
            </div>
        </div>
    </x-card>
</div>
