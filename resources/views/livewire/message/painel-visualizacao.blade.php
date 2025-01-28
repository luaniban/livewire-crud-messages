<div>
    @if($openModalPainel)
    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-20 "
    wire:click.self="closeModalPainelVisualizacao">
        <div class="w-5/6 p-8 bg-white rounded-md shadow-md h-5/6">
            <div class="flex w-full h-full py-4 place-content-around">
                <div class="h-full px-8 pt-4 bg-gray-300 rounded-sm">
                    <x-ts-button color=blue lg @click="$dispatch('dispatch-open-modal-user-visualizaram')">Usuários que visualizaram</x-ts-button>

                @if($verificaUserPesquisarUser->destinatario != 'Pesquisar Usuario')
                    @if($openModalUsersVisualizacao)
                        <div class="w-full py-4 bg-white h-5/6">
                            @foreach ($usersVisualizaram as $vizu)
                                @foreach ( $userTabelaUser as $user)

                                    @if($vizu->user_id == $user->id)
                                    <p class="text-center">{{ $user->name }}</p>
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                    @endif
                    @endif

                    @if($verificaUserPesquisarUser->destinatario == 'Pesquisar Usuario')
                        @if($openModalUsersVisualizacao)
                            <div class="w-full py-4 bg-white h-5/6">
                                <div>
                                    @if($this->verificaUserPesquisarUserVisu[0]->visualizado == 1)
                                    <p class="text-center">{{ $verificaUserPesquisarUserVisuName }}</p>
                                    @endif

                                </div>
                            </div>
                        @endif
                    @endif
                </div>

                <div class="h-full px-8 pt-4 bg-gray-300 rounded-sm">
                    <x-ts-button color=red lg @click="$dispatch('dispatch-open-modal-user-nao-visualizaram')">Usuários que não visualizaram</x-ts-button>
                @if($verificaUserPesquisarUser->destinatario != 'Pesquisar Usuario')


                    @if($openModalUsersNaoVisualizacao)
                            <div class="w-full py-4 bg-white h-5/6">
                                @foreach ($usersQueNaoVisualizaram as $vizu)
                                    @foreach ( $userTabelaUser as $user)

                                        @if($vizu->user_id == $user->id)
                                        <p class="text-center">{{ $user->name }}</p>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                    @endif
                @endif

                @if($verificaUserPesquisarUser->destinatario == 'Pesquisar Usuario')
                    @if($openModalUsersNaoVisualizacao)
                    <div class="w-full py-4 bg-white h-5/6">
                        @if($this->verificaUserPesquisarUserVisu[0]->visualizado == 0)
                            <p class="text-center">{{ $verificaUserPesquisarUserVisuName }}</p>
                        @endif

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
