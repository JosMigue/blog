<x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Add Post') }} 
      </h2>
    </x-slot>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">       
        <x-jet-validation-errors/>
        <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-4">
            <label class="text-gray-700" for="title">
              {{__('Title')}}
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="title" type="text" placeholder="{{__('Title')}}">
          </div>
          <div class="mb-4">
            <label class="text-gray-700" for="body">{{__('Body')}}</label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="body" placeholder="{{__('Body')}}"></textarea>
          </div>
          <div class="mb-4">
            <label class="text-gray-700" for="image">{{__('Image')}}</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="image" type="file">
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
          </div>
          <div class="flex md:justify-end justify-center">
            <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
              {{__('Add')}}
            </button>
          </div>  
        </form>          
      </div>
    </div>
</x-app-layout>