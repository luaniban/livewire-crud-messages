<div>
    <div class="flex justify-end w-screen pr-28">
        <div class="absolute flex justify-end h-10">

        <x-responsive-nav-link  href="{{ route('newMessages.index') }}" wire:navigate :active="request()->routeIs('newMessages.index')">
            <div class="flex items-center mt-1 ">
                <div class="relative px-4 mr-2 text-sm text-center text-orange-800 bg-yellow-300 rounded-full">{{ $countAll }}</div>
                <div class="text-sm">{{'Mensagens não lidas'}}</div>
            </div>
        </x-responsive-nav-link>
        </div>
    </div>
</div>
