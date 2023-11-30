<div x-data="{ show: false }">
    <x-button text="Receipt" icon="receipt" x-ref="button" x-on:click="show = true"/>

    <x-popover anchor="button" show="show">
        <form wire:submit="create" class="p-2 space-y-2">
            <x-input wire:model="form.store" placeholder="Store"/>

            <div class="flex gap-2">
                <x-input wire:model="form.amount" placeholder="Amount" prefix="$" inputmode="tel"/>

                <x-select wire:model="form.category_id" placeholder="Category...">
                    @foreach(App\Models\Category::where('qualified', true)->get() as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
    
                    <hr>
    
                    @foreach(App\Models\Category::where('qualified', false)->get() as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </x-select>
            </div>

            <x-input wire:model="form.description" placeholder="Description"/>

            <x-select wire:model="form.envelope_id" placeholder="Envelope...">
                @foreach(App\Models\Envelope::unarchived()->get() as $envelope)
                    <option value="{{ $envelope->id }}">{{ $envelope->name }}</option>
                @endforeach
            </x-select>

            <x-button text="Create" class="w-full"/>
        </form>
    </x-popover>
</div>