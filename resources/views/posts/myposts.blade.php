<x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('My Posts') }} 
      </h2>
    </x-slot>
    <x-slot name="slot">
      <div class="py-12">
        <div class="w-auto lg:w-4/6 mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <table class="table-auto">
              <thead>
                <tr>
                  <th class="px-4 py-2">{{__('Image')}}</th>
                  <th class="px-4 py-2">{{__('Title')}}</th>
                  <th class="px-4 py-2">{{__('Options')}}</th> 
                </tr>
              </thead>
              <tbody>
                  @foreach($posts as $post)
                    <tr>
                      <td class="border px-4 py-2"><img  class="object-contain h-32 w-full" src="/storage/cover_images/{{$post->image}}" alt="Sunset in the mountains"></td>
                      <td class="border px-4 py-2">{{$post->title}}</td>
                      <td class="border px-4 py-2">
                        <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button class="shadow bg-pink-500 hover:bg-pink-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded w-20 m-2" type="submit" >
                            {{__('Delete')}}
                          </button>
                        </form>
                        <a href="{{route('posts.edit',$post->id)}}" class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded w-20 m-2" type="button">
                          {{__('Edit')}}
                        </a>
                      </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </x-slot>
</x-app-layout>
