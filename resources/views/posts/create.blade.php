<x-app-layout>
  @section('title', __('Add Post'))
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Add Post') }} 
      </h2>
    </x-slot>
    <div class="mt-5 lg:container lg:mx-auto">       
      <x-jet-validation-errors/>
      <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-row flex-wrap mt-4">
          <div class="flex-column px-3 w-full lg:pl-3 ">
            <label class="text-gray-700" for="title">
              {{__('Title')}}
            </label>
            <x-jet-input class="mt-1 w-full" name="title" type="text" placeholder="{{__('Title')}}"/>
          </div>
          <div class="flex-column px-3 w-full lg:pl-3">
            <label class="text-gray-700" for="body">{{__('Body')}}</label>
            <textarea class="mt-1 w-full form-input rounded-md shadow-sm" name="body" placeholder="{{__('Body')}}"></textarea>
          </div>
        </div>
        <div class="flex flex-row flex-wrap mt-4 mb-4">
          <div class="flex-column px-3 w-full lg:pl-3">
            <div class="flex w-full items-center justify-center bg-grey-lighter">
              <label class="w-64 flex flex-col items-center px-4 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-gray-200 cursor-pointer hover:bg-blue-700 hover:text-white">
                  <i class="fa fa-upload" aria-hidden="false"></i>
                  <span class="mt-2 text-base leading-normal">{{__('Select an image')}}</span>
                  <input type='file' class="hidden" name="image" onchange="readUploadedImage(this)"/>
              </label>
            </div>
          </div>
        </div>
        <div class="flex flex-row justify-center hidden" id="image-preview-container">
          <img id="blah" src="#" alt="Uploaded image preview" />
        </div>
        <div class="flex md:justify-end justify-center">
          <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
            {{__('Add')}}
          </button>
        </div>  
      </form>          
    </div>
    @section('scripts')
      <script src="{{asset('js/showUploadedImage.js')}}"></script>
    @endsection
</x-app-layout>
