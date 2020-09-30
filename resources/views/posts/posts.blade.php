<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }} 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               
                @if (count($posts) >= 1)
                <div class="card">
                    <ul class="list-group list-group-flush">
                        @foreach($posts as $post)
                    
                            <li class="list-group-item">
                                <h3><a href="/post/{{$post->id}}">{{ $post->title }}</a></h3>
                                <small>Written on {{ $post->created_at }}</small>
                                <div >
                                    <a href="/post/{{$post->id}}/edit" class="text-blue-500 background-transparent font-bold uppercase px-3 py-1 text-xs outline-none focus:outline-none mr-1 mb-1" type="button" style="transition: all .15s ease; float:right;">
                                        Edit
                                    </a>
                                    <form action="{{route('delete')}}" method="POST">
                                        @csrf
                                        <button  class="text-pink-500 background-transparent font-bold uppercase px-3 py-1 text-xs outline-none focus:outline-none mr-1 mb-1" type="submit" style="transition: all .15s ease; float:right;">
                                            Delete
                                        </button>
                                    <input type="hidden" value="{{$post->id}}" name="id">
                                    </form>
                                </div>
                               
                            </li>
                        
                        @endforeach
                    </ul>               
                </div>
            @else
                
            @endif  
            </div>
        </div>
    </div>
</x-app-layout>