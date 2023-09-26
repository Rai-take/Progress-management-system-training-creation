<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            タスク一覧
        </h2>
    </x-slot>
    <div class="mx-auto px-6">
        @if(session('message'))
        <div class="text-red-600 font-bold">
          {{session('message')}}
        </div>
        @endif
        <div class="my-10 ">
            {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> --}}
                {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"> --}}
                    <div class="mx-auto px-6 text-gray-900">
                        {{-- componentsのprimary-button.blade.phpを使ってる --}}
                        <a href = "{{ route('create') }}">
                        <x-primary-button>
                            タスクを追加
                        </x-primary-button>
                        </a>
                    </div>
                {{-- </div> --}}
            {{-- </div> --}}
        </div>
        @foreach($posts as $post)
        <div class="mt-4 p-8 bg-white w-full rounded-2xl">
            <h1 class="p-4 text-lg font-semibold">
                {{$post->title}}<br>
                担当者：{{$post->assignee}}
                開始日：{{$post->start_date}}
                完了期日：{{$post->finish_date}}
            </h1>
            <hr class="w-full">
            <p class="mt-4 p-4">
                {{$post->content}}
            </p>
            <div class="p-4 text-sm">
                <p>
                    タスク作成日：{{$post->created_at}}
                </p>
                <p>
                    タスク作成者：{{$post->user->name??'不明'}}
                </p>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>