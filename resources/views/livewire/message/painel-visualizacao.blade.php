<div>
    @if($openModalPainel)
    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-20 "
    wire:click.self="closeModalPainelVisualizacao">
        <div class="w-5/6 p-8 bg-white rounded-md shadow-md h-5/6">
            <div class="flex w-full h-full py-4 place-content-around">
                <div class="h-full px-8 pt-4 bg-gray-300 rounded-sm">
                    <x-ts-button color=blue lg @click="$dispatch('dispatch-open-modal-user-visualizaram')">Usuários que visualizaram</x-ts-button>

                    @if($openModalUsersVisualizacao)
                        <div class="w-full py-4 bg-white h-5/6">

                            @foreach ($userTabelaMessageUser as $userName)
                            <li class="ml-6">
                              <ul>{{ $userName->name }}</ul>
                            </li>
                            @endforeach
                        </div>
                    @endif

                </div>

                <div class="h-full px-8 pt-4 bg-gray-300 rounded-sm">
                    <x-ts-button color=red lg @click="$dispatch('dispatch-open-modal-user-nao-visualizaram')">Usuários que não visualizaram</x-ts-button>
                @if($verificaUserPesquisarUser != 'Pesquisar Usuario')
                @if($openModalUsersNaoVisualizacao)
                    <div class="w-full py-4 bg-white h-5/6">


                        @foreach ($userTabelaMessageUser as $userName)
                            <li class="ml-6">
                              <ul>{{ $userName->name }}</ul>
                            </li>
                        @endforeach

                        {{-- @for($i = 0; $i < sizeof($userTabelaUser); $i++)
                            @for($t = 0; $t < sizeof($userTabelaMessageUser); $t++)

                                @if($userTabelaUser[$i]->name == $userTabelaMessageUser[$t])
                                    @php
                                        $value = 1;
                                    @endphp
                                @endif
                            @endfor

                            @if($value == 0)

                                    <li class="ml-6">
                                        <ul>{{ $userTabelaUser[$i]->name }}</ul>
                                    </li>
                            @endif
                            @php
                                $value = 0;
                            @endphp
                        @endfor --}}
                    </div>
                @endif
                @endif
                @if($verificaUserPesquisarUser == 'Pesquisar Usuario')
                    @if($openModalUsersNaoVisualizacao)
                    <div class="w-full py-4 bg-white h-5/6">


                        <div class="ml-6">
                        <p>Usuario Visualizou sua mensagem!</p>
                        </div>

                    </div>
                    @endif
                @endif
                </div>

            </div>
        </div>



        </div>
    </div>
    @endif
</div>
