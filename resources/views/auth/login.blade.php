<x-guest-layout>
    <section class="overflow-hidden text-gray-600 body-font">
        <div class="container">
            <h1 class="mt-6 text-3xl font-bold text-center text-slate-600 dark:text-white">
                <span>{{ config('app.name', 'Laravel') }}</span>
            </h1>
            <div class="flex flex-wrap mx-auto lg:w-4/5">
                <div class="w-full rounded lg:w-1/2 lg:h-auto">
                    <img alt="ecommerce" class="object-cover object-center"
                        src="/storage/image/logo.svg">
                        <a href="https://storyset.com/education" class="text-xs text-gray-400">Education illustrations by Storyset</a>
                </div>
                <div class="w-full px-4 lg:w-1/2 lg:pl-10 lg:py-6 lg:mt-0">
                    <x-validation-errors />
                    <form method="POST" action="{{ route('login') }}" class="lg:mt-40 sm:mt-10">
                        @csrf
                        <div>
                            {{-- <x-ts-input label="E-mail" type="email" name="email"/> --}}
                            <x-ts-input label="Matrícula ou e-mail" type="text" name="login"/>
                        </div>
                        <div class="mt-4">
                            <x-ts-password label="Senha" name="password"/>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-ts-button text="Entrar" color="secondary" type="submit"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
