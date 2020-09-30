<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }} 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <a href="/posts" class="btn btn-default">Go Back</a>
                <hr>
                 <h1>{{$post->title}}</h1>
                 <p>
                   {{$post->body}}
                 </p>
                 <small>Written on {{$post->created_at}}</small>
            </div>
        </div>
    </div>
</x-app-layout>