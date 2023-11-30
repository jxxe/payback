<div x-data="{ show: true }">
    <x-button text="Receipt" icon="receipt" x-ref="button" x-on:click="show = true"/>

    <x-popover anchor="button" show="show">
        <form class="p-2 space-y-2">
            <x-input placeholder="Name"/>
            <x-input placeholder="Store"/>
            <x-input placeholder="Amount" prefix="$" inputmode="tel"/>
            <x-input placeholder="Description"/>

            <select>
                <option value="" disabled selected hidden>Category...</option>

                @foreach(App\Models\Category::where('qualified', true)->get() as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach

                <hr>

                @foreach(App\Models\Category::where('qualified', false)->get() as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <select>
                <option value="" disabled selected hidden>Envelope...</option>

                @foreach(App\Models\Envelope::unarchived()->get() as $envelope)
                    <option value="{{ $envelope->id }}">{{ $envelope->name }}</option>
                @endforeach
            </select>

            <x-button text="Create"/>
        </form>
    </x-popover>
</div>