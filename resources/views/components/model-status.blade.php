@props([
    'label' => null,
    'campo' => null,
])

<x-ts-select.styled placeholder="Selecione.." label="{{ $label }}" wire:model.live="{{ $campo }}"
    select="label:label|value:value" :options="[
                        ['label' => 'Ativo', 'value' => 1],
                        ['label' => 'Inativo', 'value' => 2]
                    ]" />
