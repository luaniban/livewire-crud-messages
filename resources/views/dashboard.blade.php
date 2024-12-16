<x-app-layout>
    <div class="pb-2">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="py-5 mx-auto max-w-7xl">
                <article>
                    <div class="flex items-center justify-center bg-white dark:bg-dark-600 dark:text-dark-200">
                        <div class="w-1/3 px-4 sm:px-6">
                            <h1 class="mt-6 text-2xl font-bold text-center text-slate-600 dark:text-white">
                                <span>{{ config('app.name', 'Laravel') }}</span>
                            </h1>
                            <img src="/storage/image/logo.svg" id="imagemSelecionada" alt="Logo" class="h-auto max-w-full max-h-full">
                            <a href="https://storyset.com/education" class="block mt-4 text-xs text-center text-gray-400">
                                Education illustrations by Storyset
                            </a>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</x-app-layout>
