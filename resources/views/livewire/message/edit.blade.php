
<div >
    @if($modalEdit)

    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-20"
        wire:click.self="closeModalEdit">

        <div class="bg-white rounded-md shadow-md "
         >
            <div class="gap-8 p-8">
                 <div class="flex w-full gap-4">
                    <h1 class="mb-6 text-3xl">Criar mensagem</h1>
                    <div class="mt-3">
                        <x-ts-toggle label="Inativo/Ativo" wire:model='status' class=""/>
                    </div>
                </div>
            <div class="flex">
                <div class="w-56 ">
                    <x-ts-select.styled placeholder="Selecione.." label="Destinatário *" wire:model="destinatario" class=""

                    select="label:label|value:value"
                    :options="[
                        ['label' => 'Todos', 'value' => 'todos'],
                        ['label' => 'Professor', 'value' => 'professor'],
                        ['label' => 'Gestor', 'value' => 'gestor'],
                        ['label' => 'Pais de Alunos', 'value' => 'pais de alunos'],
                        ['label' => 'Pesquisar Usuário', 'value' => 'usuario'],
                    ]"/>

                </div>




                <div class="w-64 ml-8">
                    <x-ts-input  label="Titulo *" wire:model="titulo" hint="Insira o titulo"></x-ts-input>


                    <div class="mt-4">
                        <x-ts-textarea resize label="Descrição *" hint="Insira a descrição" wire:model="descricao"/>
                    </div>

                    <div class="mt-4">
                        <x-ts-upload wire:model="file" label="Upload" hint="Arquivo ou imagem de até 2MB">
                            <x-slot:footer>

                            </x-slot:footer>
                        </x-ts-upload>
                    </div>

                    <div class="mt-4">
                        <x-ts-date label="Data *" hint="Data de envio da mensagem" wire:model='dataAt'/>
                    </div>
                </div>
            </div>
        </div>

            <div class="flex justify-end gap-4 py-4 bg-gray-200 rounded-b-md">
                <x-ts-button  color="white" wire:click='closeModalEdit' class="hover:bg-black-50">Cancelar</x-ts-button>

                <x-button  class="mr-8 "
                wire:click=' update()'>
                Salvar
                </x-button>

            </div>
        </div>


    </div>
    @endif





</div>

