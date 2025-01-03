<div class="p-12">

    <div class="p-4 bg-white rounded shadow-md">



        <table class="flex-col items-center hidden min-w-full px-8 divide-y divide-gray-200 md:table">
            <tr>
                <thead>
                    <x-table-th>
                        ID
                    </x-table-th>
                    <x-table-th>
                        Destinatário
                    </x-table-th>
                    <x-table-th>
                        Titulo
                    </x-table-th>
                    <x-table-th>
                        Vizualizar
                    </x-table-th>

                </thead>
                </tr>
                <tbody>

                        @foreach ($messages as $message)

                        @if($message->dataAt >= $dataAtual)


                        <tr>
                            @if($message->destinatario == "Gestor" || $message->destinatario == "professor" )
                                @can( 'diretor_access')
                                    <x-table-td>{{ $message->id }}</x-table-td>
                                    <x-table-td>{{ $message->destinatario }}</x-table-td>

                                    <x-table-td>{{ $message->titulo }}</x-table-td>
                                    <x-table-td>
                                        <x-ts-button icon="eye" color="black" outline @click="$dispatch('dispatch-message-table-vizualizacao', { id: '{{ $message->id}}' })"></x-ts-button>
                                    </x-table-td>
                                </tr>
                                @endcan


                            @endif

                            @if($message->destinatario == "pais de alunos")
                                @can('user_access')
                                        <x-table-td>{{ $message->id }}</x-table-td>
                                        <x-table-td>{{ $message->destinatario }}</x-table-td>

                                        <x-table-td>{{ $message->titulo }}</x-table-td>




                                        <x-table-td>
                                            <x-ts-button icon="eye" color="black" outline @click="$dispatch('dispatch-message-table-vizualizacao', { id: '{{ $message->id}}' })"></x-ts-button>
                                        </x-table-td>
                                    </tr>
                                @endcan
                            @endif
                            @if($message->destinatario == "todos")

                                        <x-table-td>{{ $message->id }}</x-table-td>
                                        <x-table-td>{{ $message->destinatario }}</x-table-td>

                                        <x-table-td>{{ $message->titulo }}</x-table-td>


                                        
                                        <x-table-td>
                                            <x-ts-button icon="eye" color="black" outline @click="$dispatch('dispatch-message-table-vizualizacao', { id: '{{ $message->id}}' })"></x-ts-button>
                                        </x-table-td>
                                    </tr>

                            @endif




                        @endif
                        @endforeach



                </tbody>

            </table>
            <div class="mt-4">
                {{ $messages->links() }}
            </div>
            <livewire:message.vizualizar/>


        </div>


</div>
