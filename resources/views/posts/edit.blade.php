<x-app-layout>
  @section('title', __('Edit Post'))
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Edit') }} 
      </h2>
  </x-slot>
  <x-slot name="slot">
    <div class="py-12">
      <x-jet-validation-errors/>
      <div class="w-auto lg:w-3/6 mx-auto sm:px-6 lg:px-8">    
        <form action="{{route('posts.update', $post->id)}}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
          @csrf
          @method('PATCH')
          <input type="hidden" value="{{$post->id}}" name="id">
          <div class=" flex justify-center bg-gray-300">
            <img class="object-contain lg:object-none" src="/storage/cover_images/{{$post->image}}" alt="Sunset in the mountains">
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
            <div class="flex w-full items-center justify-center bg-grey-lighter">
              <label class="w-64 flex flex-col items-center px-4 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-gray-200 cursor-pointer hover:bg-blue-700 hover:text-white">
                <i class="fa fa-upload" aria-hidden="false"></i>
                <span class="mt-2 text-base leading-normal">{{__('Select an image')}}</span>
                <input type='file' class="hidden" name="image" onchange="readUploadedImage(this)"/>
              </label>
            </div>
            <div class="flex flex-row justify-center hidden" id="image-preview-container">
              <img id="blah" src="#" alt="Uploaded image preview" />
            </div>
          </div>
          <div class="flex md:justify-end justify-center">
            <button  class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded float-right" type="submit">
              {{__('Update')}}
            </button>            
        </form> 
      </div>
    </div>
  </x-slot>
  @section('scripts')
    <script src="{{asset('js/showUploadedImage.js')}}"></script>
  @endsection
</x-app-layout>




