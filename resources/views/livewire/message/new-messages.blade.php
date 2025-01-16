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

                        @foreach ($users as $key => $user)
                        @if($key == 0)
                        <tr>
                                @if(in_array(strtolower($message->destinatario), ['gestor', 'professor']))
                                    @can('diretor_access')
                                        <x-table-td>{{ $message->id }}</x-table-td>
                                        <x-table-td>{{ $message->destinatario }}</x-table-td>
                                        <x-table-td>{{ $message->titulo }}</x-table-td>
                                        <x-table-td>
                                            <x-ts-button icon="eye" color="black" outline
                                            @click="$dispatch('dispatch-message-table-vizualizacao', { id: '{{ $message->id }}', user_id: '{{ $user->id }}' })">
                                        </x-ts-button>
                                        </x-table-td>
                                    @endcan
                                    @endif

                                    @if(in_array(strtolower($message->destinatario), ['pais de alunos']))
                                    @can('user_access')
                                    <x-table-td>{{ $message->id }}</x-table-td>
                                    <x-table-td>{{ $message->destinatario }}</x-table-td>
                                    <x-table-td>{{ $message->titulo }}</x-table-td>
                                    <x-table-td>
                                            <x-ts-button icon="eye" color="black" outline
                                            @click="$dispatch('dispatch-message-table-vizualizacao', { id: '{{ $message->id }}', user_id: '{{ $user->id }}' })">
                                        </x-ts-button>
                                    </x-table-td>
                                    @endcan
                                @endif

                                @if(in_array(strtolower($message->destinatario), ['todos']))
                                    <x-table-td>{{ $message->id }}</x-table-td>
                                    <x-table-td>{{ $message->destinatario }}</x-table-td>
                                    <x-table-td>{{ $message->titulo }}</x-table-td>
                                    <x-table-td>
                                        <x-ts-button icon="eye" color="black" outline
                                        @click="$dispatch('dispatch-message-table-vizualizacao', { id: '{{ $message->id }}', user_id: '{{ $user->id }}' })">
                                    </x-ts-button>
                                </x-table-td>
                                @endif

                                @foreach ($pesquisarUsers as $pesquisarUser)

                                @if($message->name == $pesquisarUser->name)

                                    <x-table-td>{{ $pesquisarUser->id }}</x-table-td>
                                    <x-table-td>{{ $pesquisarUser->destinatario }}</x-table-td>
                                    <x-table-td>{{ $pesquisarUser->titulo }}</x-table-td>
                                    <x-table-td>
                                        <x-ts-button icon="eye" color="black" outline
                                        @click="$dispatch('dispatch-message-table-vizualizacao', { id: '{{ $message->id }}', user_id: '{{ $user->id }}' })">
                                    </x-ts-button>
                                </x-table-td>
                                @endif
                                @endforeach
                            </tr>
                            @endif
                        @endforeach
                    @endforeach
                </tbody>



            </table>
            <div class="mt-4">
                {{ $messages->links() }}
            </div>
            <livewire:message.vizualizar/>


        </div>


</div>
