@props([
    'label' => null,
    'campo' => null,
])

<x-label for="{{ $campo }}" label="{{ $label }}" />
<div class="flex mt-2">
    <div class="flex items-center me-4">
        <x-ts-radio id="1" value="1" wire:model.live="{{ $campo }}" class="-mt-1" color="blue" label="Sim"/>
    </div>
    <div class="flex items-center me-4">
        <x-ts-radio id="3" value="0" wire:model.live="{{ $campo }}" class="-mt-1" color="blue" label="Não"/>
    </div>
</div>
