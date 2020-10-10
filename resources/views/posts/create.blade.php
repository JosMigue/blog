<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Post') }} 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           
          @if ($errors->any())
          <ul>
              @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      @endif
                <form action="/add" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    @csrf
                  <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                      title
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="title" type="text" placeholder="Title">
                  </div>
                  <div class="mb-4">
                    <label class="block">
                        <span class="text-gray-700">Body</span>
                        <textarea class="form-textarea mt-1 block w-full" name="body" placeholder="body"></textarea>
                      </label>
                  </div>
                  <div class="mb-4">
                    <label class="block">
                        <span class="text-gray-700">Image</span><br>
                        <input class="" name="image" type="file">
                      </label>
                  </div>
                  
                  <div class="md:flex md:items-center">
                    <div class="md:w-1/3"></div>
                    <div class="md:w-2/3">
                      <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                        Submit
                      </button>
                    </div>
                  </div>
                  
                </form>
          

              <hr>

             
            
            
        </div>
    </div>
</x-app-layout>