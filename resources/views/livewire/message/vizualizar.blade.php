<div>
    @if($modalVizu)
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-20"  wire:click.self="closeModalVizu">
            <div class="flex-col w-1/2 p-8 bg-white rounded">

                <h1 class="mb-4 text-3xl">{{ $titulo }}:</h1>


                <p>{{ $descricao }}</p>

            </div>
        </div>

    @endif
</div>
