@props([
'name',
'label' => null,
'col' => null,
])

<div class="{{$col}}">
    <div class="mt-1">
        <label for="{{$name}}" class="block text-xs text-gray-700 dark:text-gray-200">{{$label}}</label>
        <div class="relative mt-1 rounded-md shadow-sm">
            <input type="text" wire:model.lazy="{{$name}}" name="{{$name}}" id="{{$name}}" {{ $attributes->class([
            'block w-full text-xs transition duration-100 ease-in-out border rounded-md shadow-sm
            placeholder-secondary-400
            dark:bg-secondary-800 dark:text-secondary-400 dark:placeholder-secondary-600 border-secondary-300
            focus:ring-blue-600 focus:border-blue-600 dark:border-secondary-600 form-input sm:text-sm
            focus:outline-none'
            ]) }}
            />
        </div>
    </div>
</div>

