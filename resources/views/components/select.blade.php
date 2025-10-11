@props([
    'label' => '',
    'for' => '',
    'name' => '',
    'wire' => '',
    'options' => [],
    'placeholder' => 'Pilih salah satu...',
    'required' => false,
])

<div>
    @if ($label)
        <label for="{{ $for }}" class="block mb-2 text-sm font-medium text-gray-900">
            {{ $label }}
            @if ($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    <select
        {{ $attributes->merge([
            'class' =>
                'bg-gray-50 border border-gray-200 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5',
        ]) }}
        id="{{ $for }}"
        name="{{ $name }}"
        @if ($wire) wire:model.defer="{{ $wire }}" @endif
        @if ($required) required @endif
    >
        <option value="">{{ $placeholder }}</option>

        @foreach ($options as $value => $text)
            <option value="{{ $value }}">{{ $text }}</option>
        @endforeach
    </select>

    @error($wire)
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
