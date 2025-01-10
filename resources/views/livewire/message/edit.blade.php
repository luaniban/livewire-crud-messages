
<div >
    @if($modalEdit)

    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-20"
        wire:click.self="closeModalEdit">

        <div class="bg-white rounded-md shadow-md "
         >
            <div class="gap-8 p-8">
                 <div class="flex w-full gap-4">
                    <h1 class="mb-6 text-3xl">Editar mensagem</h1>
                    <div class="mt-3">

                    @if($status == 1)
                        <x-ts-toggle label="Inativo/Ativo" wire:model='status' :checked=1 />
                    @endif

                    @if($status == 0)
                    <x-ts-toggle label="Inativo/Ativo" wire:model='status' />
                    @endif


                    </div>
                </div>
            <div class="flex">
                <div class="w-56">
                    <x-ts-select.native label="Destinatario *" wire:model='destinatario'>
                        <option wire:click="closeSearchUser()" >Selecione...</option>
                        <option wire:click="closeSearchUser()" value="Todos" >Todos</option>
                        <option wire:click="closeSearchUser()" value="Professor">Professor</option>
                        <option wire:click="closeSearchUser()" >Gestor</option>
                        <option wire:click="closeSearchUser()" value="Pais de alunos" >Pais de Alunos</option>
                        <option wire:click="pesquisarUsuario()">Pesquisar Usuario</option>
                    </x-ts-select.native>


                @if($searchUser)
                    <div>

                        <div class="flex items-center mt-8">
                            <x-ts-icon name="magnifying-glass" outline class="w-5 h-5 mr-2"/>

                            <x-ts-input icon="users" type="search" placeholder="Pesquisar..." aria-label="Search" wire:model.live="search" class="border-gray-300 rounded shadow-md "/>
                        </div>



                        <x-ts-select.native wire:model.live='name'>
                            <option value="">Selecione...</option>
                            @if(sizeof($pesquisarUsers) > 0)

                                @foreach($pesquisarUsers as $pesquisarUser)

                                <div class="bg-gray-200 w-62 ml-7">
                                    <option  class="text-center bg-gray-100" >{{ $pesquisarUser->name }}
                                    </option>

                                </div>
                                @endforeach

                            @endif
                        </x-ts-select.native>







                    </div>
                @endif
           </div>



                <div class="w-64 ml-8">
                    <x-ts-input  label="Titulo *" wire:model="titulo" hint="Insira o titulo"></x-ts-input>


                    <div class="mt-4">
                        <x-ts-textarea class="max-h-32" resize label="Descrição *" hint="Insira a descrição" wire:model="descricao"/>
                    </div>

                    <div>

                        <div>

                            <x-ts-upload wire:model='file' label="Anexar um arquivo">
                                <x-slot:footer>

                                </x-slot:footer>
                            </x-ts-upload>

                        </div>

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

