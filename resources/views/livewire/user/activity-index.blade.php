<div class="py-4">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="p-4 bg-white shadow-xl verflow-hidden dark:bg-gray-800 sm:rounded-lg">
            @can('gerente_access')
            <div class="mb-3">
                <select wire:model.live='escola_id' class="w-1/3 border-gray-200 rounded-md shadow-sm text-slate-600 dark:bg-gray-600 dark:text-white">
                    <option value="">Selecione uma escola..</option>
                    @foreach($escolas as $escola)
                    <option value="{{$escola->id}}">
                        {{ $escola->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            @endcan
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                        <table class="w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50 dark:bg-gray-600 dark:text-gray-200">
                                <tr>
                                    <x-table-th>Escola</x-table-th>
                                    <x-table-th>Nome</x-table-th>
                                    <x-table-th>Último acesso</x-table-th>
                                    <x-table-th class="text-center">Status</x-table-th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-800">
                                @foreach ($users as $user)
                                <tr class="my-4">
                                    <x-table-td>{{ $user->escola->name }}</x-table-td>
                                    <x-table-td>{{ $user->name }}</x-table-td>
                                    <x-table-td>{{ Carbon\Carbon::parse($user->ultimo_acesso_at)->diffForHumans() }}</x-table-td>
                                    <x-table-td class="text-{{ $user->ultimo_acesso_at >= now()->subMinutes(2) ? 'teal' : 'red' }}-500  text-center dark:text-{{ $user->ultimo_acesso_at >= now()->subMinutes(2) ? 'teal' : 'red' }}-500 ">
                                        {{ $user->ultimo_acesso_at >= now()->subMinutes(2) ? 'Online' : 'OffLine'}}
                                    </x-table-td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="flex px-2 py-3 space-x-2 rounded-md dark:bg-gray-900 bg-gray-50">
                            <div class="w-full">
                                {{ $users->links() }}
                            </div>
                            <div>
                                <select wire:model.live="perPage"
                                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md cursor-pointer hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700">
                                    <option value="5">5 por página</option>
                                    <option value="10">10 por página</option>
                                    <option value="50">50 por página</option>
                                    <option value="100">100 por página</option>
                                    <option value="250">250 por página</option>
                                    <option value="1000">1000 por página</option>
                                    <option value="10000">10000 por página</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
