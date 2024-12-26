<div>
    @if($modalVizu)
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-20"  wire:click.self="closeModalVizu">
            <div class="flex-col max-w-5xl p-8 bg-white rounded">

                <h1 class="p-2 mb-4 text-3xl bg-gray-100">{{ $titulo }}:</h1>


                <p class="p-2 bg-gray-100">{{ $descricao }}</p>
                <div class="flex justify-center w-full">
            @if($file != null)
                @if($extension == 'jpg' || $extension == 'png' || $extension == 'jpeg' || $extension == 'gif')
                <img src="{{ asset('storage/' . $file) }}" class="mt-4" />
                @endif
                @if($extension == 'pdf' || $extension == 'doc' || $extension == 'docx')
                    <div class="flex-col justify-start w-full">
                        <h1 class="mt-4 text-xl">Link para dowload de arquivo:</h1>
                        <x-ts-link class="p-2 mt-1 bg-gray-100" href="{{  Storage::url($file) }}" download>Baixar Arquivo</x-ts-link>
                    </div>
                @endif
            @endif
                </div>
            </div>
        </div>

    @endif
</div>


