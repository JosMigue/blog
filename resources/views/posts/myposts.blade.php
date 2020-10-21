<x-app-layout>
  @section('title', __('My Posts'))
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('My Posts') }} 
    </h2>
  </x-slot>
  <x-slot name="slot">
    <section class="text-gray-700 body-font">
      <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-wrap -m-4">
          @foreach($posts as $post)
            <div class="xl:w-1/4 md:w-1/2 p-4 border border-solid border-gray-200">
              <div class="bg-gray-100 p-6 rounded-lg">
                <img class="h-40 rounded w-full object-cover object-center mb-6" src="/storage/cover_images/{{$post->image}}" alt="Post's image">
                <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font uppercase">{{__('Title')}}</h3>
                <h2 class="text-lg text-gray-900 font-medium title-font mb-4">{{$post->title}}</h2>
                <p class="leading-relaxed text-base">{{$post->body}}</p>
              </div>
              <div class="flex justify-evenly">
                @if (Auth::user()->role == 1)
                <form action="{{route('posts.destroy', $post->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="shadow bg-pink-500 hover:bg-pink-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded w-20 m-2" type="submit" >
                    {{__('Delete')}}
                  </button>
                </form>
                @endif
                <a href="{{route('posts.edit',$post->id)}}" class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded w-20 m-2" type="button">
                  {{__('Edit')}}
                </a>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>
  </x-slot>
</x-app-layout>
