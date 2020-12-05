<x-guest-layout>
    <section class="text-gray-700 body-font">
        <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
          <img class="lg:w-2/6 md:w-3/6 w-5/6  rounded mb-10 object-cover object-center rounded" alt="post image" src="/storage/cover_images/{{$post->image}}">
          <div class="text-center lg:w-2/3 w-full">
            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{$post->title}}</h1>
            <p class="mb-8 leading-relaxed">{{$post->body}}</p>
            <div class="flex justify-center">
            <button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">{{__('Show autor profile')}}</button>
            <button class="ml-4 inline-flex text-gray-700 bg-gray-200 border-0 py-2 px-6 focus:outline-none hover:bg-gray-300 rounded text-lg">{{__('Nevermind')}}</button>
            </div>
          </div>
        </div>
      </section>
</x-guest-layout>