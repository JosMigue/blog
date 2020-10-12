<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Posts') }} 
      </h2>
      <a href="{{route('posts.create')}}" type="button" class="text-indigo-500 bg-transparent border border-solid border-indigo-500 hover:bg-indigo-500 hover:text-white active:bg-indigo-600 font-bold uppercase text-sm px-4 py-3  rounded-full outline-none focus:outline-none">{{__('Add Post')}}</a>
    </div>
  </x-slot>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">       
        @if (count($posts) >= 1)
        <div class="flex flex-wrap">
          @foreach($posts as $post)
          <div class="max-w-sm rounded overflow-hidden shadow-lg m-2">
            <a class="hover:decoration-none" href="{{route('posts.show', $post->id)}}">
              <img class="object-cover h-48 w-full transform scale-75 hover:transform hover:scale-100 transition duration-500" src="/storage/cover_images/{{$post->image}}" alt="Sunset in the mountains">
            </a>
            <div class="px-6 py-4">
              <div class="font-bold text-xl mb-2"><a >{{ $post->title }}</a></div>
              <p class="text-gray-700 text-base">
                {{$post->body}}
              </p>
            </div>
            <div class="px-6 pt-4 pb-2">
              <small>{{__('Written')}} {{ $post->created_at->diffForHumans()}}</small>
              <a href="{{route('posts.show', $post->id)}}" class="text-pink-500 hover:text-pink-700 background-transparent font-bold uppercase px-3 py-1 text-xs outline-none focus:outline-none mr-1 mb-1 float-right">
                {{__('See More')}}
              </a>
            </div>
          </div>
            @endforeach
        </div>           
        @else
          <h1> no posts to show</h1>
        @endif  
      </div>
    </div>
  </div>
</x-app-layout>