<div>
  <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6 pb-2"> 
    <input type="text" class="form-input rounded shadow-sm mt-1 block w-full" placeholder="{{__('Search Post by title...')}}" wire:model="search">
    <div class="flex flex-row flex-wrap lg:justify-evenly justify-center">
      @if (count($posts) >= 1)
        @foreach ($posts as $post)
          <div class="max-w-sm w-full sm:w-1/2 lg:w-1/3 py-6 px-3">
            <div class="bg-white shadow-xl rounded-lg overflow-hidden transform hover:scale-105 duration-500">
                <div class="bg-cover bg-center h-56 p-4" style="background-image: url(/storage/cover_images/{{$post->image}})">
                  <div class="flex justify-end">
                  </div>
                </div>
                <div class="p-4">
                  <p class="uppercase tracking-wide text-sm font-bold text-gray-700">{{$post->title}}</p>
                  <p class="text-gray-700">{{$post->body}}</p>
                </div>
                <div class="flex p-4 border-t border-gray-300 text-gray-700">
                    <div class="flex-1 inline-flex items-center">
                      <i class="h-6 w-6 text-gray-600 fill-current mr-1 fa fa-clock-o" aria-hidden="true"></i>
                      <p><span class="text-gray-900 font-bold text-2x1">{{__('Written')}} </span>{{$post->created_at->diffForHumans()}}</p>
                    </div>
                    <div class="flex-1 inline-flex items-center">
                      <i class="h-6 w-6 text-gray-600 fill-current mr-1 fa fa-pencil"></i>
                      <p><span class="text-gray-900 font-bold text-2x1">{{__('Updated')}} </span>{{$post->updated_at->diffForHumans()}}</p>
                    </div>
                </div>
                <div class="px-4 pt-3 pb-4 border-t border-gray-300 bg-gray-100">
                  <div class="text-xs uppercase font-bold text-gray-600 tracking-wide">{{__('Creator')}}</div>
                    <div class="flex items-center pt-2">
                        <div class="bg-cover bg-center w-10 h-10 rounded-full mr-3">
                          <img class="h-10 w-10 rounded-full" src="{{$post->user->profile_photo_url}}" alt="{{$post->user->name}}">
                        </div>
                        <div>
                          <p class="font-bold text-gray-900">{{$post->user->name}}</p>
                          <p class="text-sm text-gray-700">{{$post->user->email}}</p>
                        </div>
                    </div>
                    <div class="flex justify-center border-t border-gray-300 bg-gray-100 px-4 pt-3 pb-4">
                      <a class="py-2 px-4 bg-indigo-500 text-white rounded font-bold hover:bg-indigo-400 hover:no-underline" href="{{route('posts.show', $post->id)}}">{{__('Show post')}}</a>
                    </div>
                </div>
            </div>
          </div>
        @endforeach       
      @else
        <div class="px-6 py-4 whitespace-no-wrap text-center">
          {{__('There is not results for search')}} "{{$search}}" <i class="fa fa-frown-o" aria-hidden="true"></i>
        </div>
      @endif  
    </div>
    {{$posts->links()}}
  </div>
</div>
