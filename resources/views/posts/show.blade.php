<x-app-layout>
  @section('title', __('Show post'))
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Posts') }} 
    </h2>
  </x-slot>
  <div class="max-w-screen-lg mx-auto">
    <main class="mt-10">
      <div class="mb-4 md:mb-0 w-full mx-auto relative">
        <div class="px-4 lg:px-0">
          <h2 class="text-4xl font-semibold text-gray-800 leading-tight">
            {{ $post->title }}
          </h2>
          <a href="{{route('posts.index')}}" class="text-indigo-500 background-transparent font-bold uppercase px-3 py-1 text-xs outline-none focus:outline-none mr-1 mb-1 float-right">
            {{__('Go Back')}}
          </a>
          <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded text-pink-600 bg-pink-200 uppercase last:mr-0 mr-1">
            {{__('Written at')}} {{$post->created_at->format('Y-m-d')}}
          </span>
        </div>
        <img src="/storage/cover_images/{{$post->image}}" class="object-contain h-48 w-full lg:rounded" style="height: 28em;"/>
      </div>
      <div class="flex flex-col lg:flex-row lg:space-x-12">
        <div class="px-4 lg:px-0 mt-12 text-gray-700 text-lg leading-relaxed w-full lg:w-3/4">
          <p class="pb-6"> {{ $post->body }}</p>
        </div>
      </div>
    </main>
  </div>
</x-app-layout>