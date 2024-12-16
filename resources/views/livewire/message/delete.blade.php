
<div>
    @if($modalDelete)

    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-20"
        wire:click.self="closeModalDelete()">

        <div class="bg-white rounded-md shadow-md ">
            <div class="p-8">
                <h1 class="text-2xl font-bold text-center text-red-500">ATENÇÃO</h1>
                <h1>Você tem certeza que deseja excluir essa mensagem?</h1>

            </div>
            <div class="flex justify-end gap-4 py-4 bg-gray-200 rounded-b-md">
                <x-ts-button class="hover:bg-black-50"  color="white" wire:click='closeModalDelete() '>Cancelar</x-ts-button>
                <x-ts-button  class="mr-8 " color="red"
                wire:click='delete()'>
                Deletar
                </x-ts-button>
            </div>
        </div>


    </div>
    @endif




</div>
