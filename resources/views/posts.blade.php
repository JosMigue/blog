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
                                <h3><a href="/posts/{{$post->id}}">{{ $post->title }}</a></h3>
                                <small>Written on {{ $post->created_at }}</small>
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