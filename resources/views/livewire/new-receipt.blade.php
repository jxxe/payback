<div x-data="{ show: true }">
    <x-button text="Receipt" icon="receipt" x-ref="button" x-on:click="show = true"/>

    <x-popover anchor="button" show="show">
        <form class="p-2 space-y-2">
            <x-input placeholder="Store"/>

            <div class="flex gap-2">
                <x-input placeholder="Amount" prefix="$" inputmode="tel"/>

                <x-select placeholder="Category...">
                    @foreach(App\Models\Category::where('qualified', true)->get() as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
    
                    <hr>
    
                    @foreach(App\Models\Category::where('qualified', false)->get() as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </x-select>
            </div>

            <x-input placeholder="Description"/>

            <x-select placeholder="Envelope...">
                @foreach(App\Models\Envelope::unarchived()->get() as $envelope)
                    <option value="{{ $envelope->id }}">{{ $envelope->name }}</option>
                @endforeach
            </x-select>

            <x-button text="Create" class="w-full"/>
        </form>
    </x-popover>
</div>