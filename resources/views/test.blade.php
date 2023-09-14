<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
        </h2>
    </x-slot>
@foreach ($users as $user)
    <p>
        {{$user->name}}
    </p>
@endforeach
</x-app-layout>