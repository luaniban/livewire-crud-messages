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

                            @foreach ($usersVisualizaram as $userVisualizaram)
                            <li class="ml-6">
                              <ul>{{ $userVisualizaram->user_id }}</ul>
                            </li>
                            @endforeach
                        </div>
                    @endif

                </div>

                <div class="h-full px-8 pt-4 bg-gray-300 rounded-sm">
                    <x-ts-button color=red lg wire:click='openModalUsersNaoVisualizacao()'>Usuários que não visualizaram</x-ts-button>

                    @if($openModalUsersNaoVisualizacao)

                    @endif
                </div>
            </div>



        </div>
    </div>
   @endif
</div>
