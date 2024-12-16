<div>





    <div class="w-1/3 h-24 bg-white rounded">
        <div class="bg-gray-200 shadow-md h-1/3"><h1 class="text-2xl text-center">Você tem uma nova mensagem</h1></div>
        <x-ts-button class="mt-5" wire:click='openModalShow'>Veja outras mensagens</x-ts-button>
    </div>


    @if($modalShow)
        <div class="p-8 bg-white">
           
            @foreach($messages as $message)
              <ul>
                <li>{{ $message->descricao }}</li>
              </ul>
            @endforeach
        </div>

    @endif
</div>
