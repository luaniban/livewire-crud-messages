
<div >
    @if($modalEdit)

    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-20"
        wire:click.self="closeModal">

        <div class="bg-white rounded-md shadow-md "
         >
            <div class="p-8">
                <h1 class="mb-8 text-2xl">Editar mensagem</h1>
                <div class="flex gap-4">
                <x-ts-select.styled placeholder="Selecione.." label="Destinatário *" wire:model="cargo"

                select="label:label|value:value"
                :options="[
                    ['label' => 'Professor', 'value' => 'Professor'],
                    ['label' => 'Gestor', 'value' => 'Gestor'],
                ]"/>

                <x-ts-textarea class="w-96" resize label="Mensagem *" hint="Insira a mensagem" wire:model="descricao"/>
                </div>
            </div>
            <div class="flex justify-end gap-4 py-4 bg-gray-200 rounded-b-md">
                <x-ts-button  color="white" wire:click='closeModal' class="hover:bg-black-50">Cancelar</x-ts-button>
                <x-button  class="mr-8 "
                wire:click='update()'>
                Salvar
                </x-button>
            </div>
        </div>


    </div>
    @endif




</div>

