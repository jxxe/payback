@props([
    'label' => 'Click or drag to upload a file'
])

<label x-init class="block">
    <button class="w-full" type="button" x-on:click="$refs.input.click()">
        <template x-if="$refs.input.files.length === 0">
            <div class="border p-4 border-dashed rounded text-gray-400 hover:border-gray-400 transition-colors">
                <div class="flex gap-2 items-center justify-center">
                    <x-icon class="w-4 h-4" name="upload"/>
                    <p class="text-sm">{{ $label }}</p>
                </div>
            </div>
        </template>

        <template x-if="$refs.input.files.length !== 0">
            <div class="border p-4 border-dashed rounded text-gray-400 hover:border-gray-400 transition-colors">
                <div class="flex gap-2 items-center justify-center">
                    <x-icon class="w-4 h-4" name="upload"/>
                    <p class="text-sm">Abc</p>
                </div>
            </div>
        </template>
    </button>
    
    <input hidden x-ref="input" type="file" {{ $attributes }}>
</label>