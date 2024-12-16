{{-- <x-ts-select.styled label="Cargo"
                    select="label:name|value:id" :request="route('api.cargos')" wire:model.blur="form.cargo_id"/> --}}

<x-ts-select.styled placeholder="Selecione.." label="Cargo" wire:model="form.cargo_id"
    select="label:label|value:value" :options="[
        ['label' => 'ADI', 'value' => 8],
        ['label' => 'AEE', 'value' => 10],
        ['label' => 'Agente Administrativo', 'value' => 12],
        ['label' => 'Apoio', 'value' => 6],
        ['label' => 'Coordenador', 'value' => 3],
        ['label' => 'Diretor', 'value' => 5],
        ['label' => 'Inspetor', 'value' => 9],
        ['label' => 'Outro', 'value' => 15],
        ['label' => 'Professor Adjunto I', 'value' => 13],
        ['label' => 'Professor Adjunto II', 'value' => 14],
        ['label' => 'Professor Educação Infantil', 'value' => 16],
        ['label' => 'Professor PEB I', 'value' => 1],
        ['label' => 'Professor PEB II' ,'value' => 2],
        ['label' => 'Supervisor', 'value' => 7],
        ['label' => 'Vice-Diretor', 'value' => 4],
    ]" />
