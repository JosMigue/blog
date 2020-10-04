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


                <div class="box">
                    @foreach($posts as $post)
                    <div class="max-w-sm rounded overflow-hidden shadow-lg" style="margin: 10px;">
                        <img class="w-full" src="/storage/cover_images/{{$post->image}}" alt="Sunset in the mountains">
                        <div class="px-6 py-4">
                          <div class="font-bold text-xl mb-2"><a href="/post/{{$post->id}}">{{ $post->title }}</a></div>
                          <p class="text-gray-700 text-base">
                            {{$post->body}}
                          </p>
                        </div>
                        <div class="px-6 pt-4 pb-2">
                            <small>Written on {{ $post->created_at }}</small>
                            <a href="/post/{{$post->id}}/edit" style="float:right;" class="text-pink-500 background-transparent font-bold uppercase px-3 py-1 text-xs outline-none focus:outline-none mr-1 mb-1"  style="transition: all .15s ease">
                                see more
                            </a>
                        </div>
                      </div>
                      @endforeach
                      </div>

                      <!--
                       
                     -->          
                @else
                  <h1> no posts to show</h1>
                @endif  

            
                




            </div>
        </div>
    </div>
</x-app-layout>