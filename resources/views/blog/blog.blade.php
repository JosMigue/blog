<x-guest-layout>
    <div class="relative">
        <div class="max-w-screen-xl mx-auto py-20 lg:py-24">
          <!-- Heading -->
          <div class="flex flex-col items-center">
            <h5 class="font-bold text-purple-500">
              Blog
            </h5>
            <h2 class="text-4xl sm:text-5xl font-black tracking-wide text-center">
              We Love <span class="text-purple-500">Writing.</span>
            </h2>
            <p class="mt-4 font-medium text-gray-600 text-center max-w-sm">
              Some amazing blog posts that are written by even more amazing people.
            </p>

            <div class="flex justify-center lg:justify-start mt-6">
            <a class="px-4 py-3 bg-gray-900 text-gray-200 text-xs font-semibold rounded hover:bg-gray-800" href="{{route('login')}}">Login</a>
            </div>
          </div>
          <!-- Columns -->
          <div class="flex flex-col items-center lg:items-stretch lg:flex-row flex-wrap">
            <!-- card post -->
            @foreach ($posts as $post)
            <div class="mt-24 lg:w-1/3">
                <div class="lg:mx-4 xl:mx-8 max-w-sm flex flex-col h-full">
                  <div class="bg-cover bg-center h-80 lg:h-64 rounded rounded-b-none">
                    <img src="/storage/cover_images/{{$post->image}}" class="object-none h-full w-full" alt="">
                  </div>
                  <div class="p-6 rounded border-2 border-t-0 rounded-t-none border-dashed border-indigo-900 flex-1 flex flex-col items-center text-center lg:block lg:text-left">
                    <div class="flex items-center">
                      <div class="text-secondary-100 font-medium text-sm flex items-center leading-none mr-6 last:mr-0">
                        <i class="fa fa-user mr-1" aria-hidden="true"></i>
                      <div>{{$post->name}}</div>
                      </div>
                      <div class="text-secondary-100 font-medium text-sm flex items-center leading-none mr-6 last:mr-0">
                        <i class="fa fa-tag mr-1" aria-hidden="true"></i>
                        <div>{{$post->email}}</div>
                      </div>
                    </div>
                    <h5 class="mt-4 leading-snug font-bold text-lg">
                        {{$post->title}}
                    </h5>
                    <p class="mt-2 text-sm text-secondary-100">
                        {{$post->body}}
                    </p>
                    <a href="" class="inline-block px-8 py-2 mt-2 font-bold rounded bg-indigo-500 text-gray-100 hocus:bg-indigo-700 hocus:text-gray-200 focus:shadow-outline focus:outline-none transition duration-300">Read post</a>
                  </div>
                </div>
              </div>
            @endforeach
            

           
           
          </div>
        </div>
        <div class="-z-10 absolute bottom-0 right-0 w-48 h-48 transform -translate-y-8 opacity-25">
          <img src="../img/icons/svg-decorator-blob-1.svg" alt="">
        </div>
        <div class="-z-10 absolute top-0 left-0 w-48 h-48 transform lg:-translate-x-32 translate-y-full opacity-25">
          <img src="../img/icons/svg-decorator-blob-3.svg" alt="">
        </div>
      </div>
</x-guest-layout>

<x-footer></x-footer>