<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit') }} 
        </h2>
    </x-slot>
    <x-slot name="slot">
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">    
          <form action="{{route('posts.update', $post->id)}}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PATCH')
            <input type="hidden" value="{{$post->id}}" name="id">
            <div class="bg-gray-300">
              <img class=" object-contain h-48 w-full md:object-none md:h-screen" src="/storage/cover_images/{{$post->image}}" alt="Sunset in the mountains">
            </div>
            <div class="mb-4">
              <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                {{__('Title')}}
              </label>
              <input value="{{$post->title}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="title" type="text" placeholder="Title">
            </div>
            <div class="mb-4">
              <label class="block text-gray-700" for="body">{{__('Body')}}</label>
              <textarea  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="body" placeholder="{{__('Body')}}">{{$post->body}}</textarea>
            </div>
            <div class="mb-4">
              <label class="block text-gray-700" for="image">{{__('Image')}}</label>
              <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="image" type="file">
            </div>
            <div class="flex md:justify-end justify-center">
              <button  class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded float-right" type="submit">
                {{__('Update')}}
              </button>            
          </form> 
        </div>
      </div>
    </x-slot>
</x-app-layout>




