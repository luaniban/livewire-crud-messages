<x-guest-layout>
    <nav x-data="{ open: false }" class="border-b border-gray-100 g-white ">
        <div class="max-w-full px-4 sm:mx-auto sm:px-6">
            <div class="flex justify-between h-12">
                <div class="flex">
                    <div class="flex items-center flex-shrink-0">
                        <a href="{{ route('dashboard') }}">
                            <x-application-mark class="block w-auto h-9" />
                        </a>
                    </div>
                    <div
                        class="relative flex justify-center bg-slate-100 items-top dark:bg-gray-900 sm:items-center sm:pt-0">
                        @if (Route::has('login'))
                        <div class="fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth
                            @else
                            <a href="{{ route('login') }}"
                                class="p-2 m-2 text-sm rounded-lg text-slate-700 hover:bg-slate-400 hover:shadow hover:text-white">Acessar</a>
                            @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="p-2 m-2 ml-4 text-sm rounded-lg text-slate-700 hover:bg-slate-400 hover:shadow hover:text-white">Registre-se</a>
                            @endif
                            @endauth
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="py-5 mx-auto max-w-7xl">
        <article>
            <div class="flex items-center justify-center">
                <div>
                    <h1 class="text-3xl font-bold text-slate-600 dark:text-white">
                        <span>{{ config('app.name', 'Laravel') }}</span>
                    </h1>
                    <img src="/storage/image/logo.svg" id="imagemSelecionada" class="mx-auto h-96 ">
                    <a href="https://storyset.com/education" class="pl-40 text-xs text-gray-400">Education illustrations by Storyset</a>
                </div>
            </div>
        </article>
    </div>
    <footer
        class="fixed inset-x-0 bottom-0 flex-col items-center justify-between hidden px-6 py-1 mt-10 bg-white sm:flex dark:bg-gray-800 sm:flex-row">
        <a href="/"
            class="text-xl font-bold text-slate-700 dark:text-white hover:text-gray-700 dark:hover:text-gray-300">SEDUC</a>
        <p class="py-2 text-slate-700 dark:text-white sm:py-0">© {{ now()->format('Y') }} Desenvolvido pela
            <a href="https://educacao.caraguatatuba.sp.gov.br/" rel="noopener noreferrer"
                class="ml-1 text-slate-400 hover:text-slate-800" target="_blank">Informática Educativa</a> - Prefeitura
            Municipal de Caraguatatuba
        </p>
        <div class="flex -mx-2 text-sm text-white">
        </div>
    </footer>
</x-guest-layout>
