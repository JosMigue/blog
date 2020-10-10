<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Posts') }} 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <table class="table-auto">
                    <thead>
                      <tr>
                        <th class="px-4 py-2">Image</th>
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Options</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                      <tr>
                        <td class="border px-4 py-2"><img style="height: 100px; width:200px;" class="w-full" src="/storage/cover_images/{{$post->image}}" alt="Sunset in the mountains"></td>
                        <td class="border px-4 py-2">{{$post->title}}</td>
                        <td class="border px-4 py-2">

                            <form action="{{url('delete/' . $post->id) }}" method="POST">
                                @csrf
                                
                                <button style="width:80px; margin-left:10px;"  class="shadow bg-pink-500 hover:bg-pink-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" style="transition: all .15s ease;">
                                    Delete
                                </button>
                
                              </form>
                              

                          <a href="/post/{{$post->id}}/edit" style=" margin:10px; width:80px;"  class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button" style="transition: all .15s ease;">
                            Edit
                          </a>

                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>


            </div>
        </div>
    </div>
</x-app-layout>
