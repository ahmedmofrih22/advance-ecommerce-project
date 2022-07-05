<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Hi{{Auth::User()->name}}
        </h2>
    </x-slot>

    <div class="py-12">
        this is admin
    </div>
</x-app-layout>
