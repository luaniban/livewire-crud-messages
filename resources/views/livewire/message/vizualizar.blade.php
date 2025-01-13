<div>
    @if($modalVizu)

        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-20"  wire:click.self="closeModalVizu">
            <div class="flex-col max-w-5xl max-h-full bg-white rounded min-w-96">
                <div class="flex justify-center bg-gray-200 h-28 rounded-t-md">
                    <div class="flex-col items-center">
                        <x-ts-icon name="user-circle" class="w-20 h-20 ml-2"/>
                        <p class="">{{ $teste->name }}</p>
                    </div>
                </div>
                <div class="p-8 m-8 bg-gray-200 rounded-md">
                    <div class="flex justify-center">
                        <h1 class="inline-block p-2 mb-4 text-3xl text-center bg-gray-100 rounded-r-lg">{{ $titulo }}:</h1>
                    </div>
                    <p class="p-2 mb-8 bg-gray-100 rounded-r-lg">{{ $descricao }}</p>
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
        </div>

    @endif
</div>


