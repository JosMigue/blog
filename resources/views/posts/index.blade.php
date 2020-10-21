<x-app-layout>}
  @section('title', __('Posts'))
  <x-slot name="header">
    <div class="flex justify-between">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Posts') }} 
      </h2>
    </div>
  </x-slot>
  <x-slot name="slot">
    <div class="mt-5 lg:container lg:mx-auto">
      @if (session('successMessage'))
        <x-alert class="bg-green-500" iconClass="fa fa-check">
          <x-slot name="boldMessage">
            {{__('Done!')}}
          </x-slot>
          <x-slot name="message">
            {{session('successMessage')}}
          </x-slot>
        </x-alert>
      @endif
    <div class="flex flex-row justify-end my-2">
      <a href="{{route('posts.create')}}" type="button" class="text-indigo-500 bg-transparent border border-solid border-indigo-500 hover:bg-indigo-500 hover:text-white active:bg-indigo-600 font-bold uppercase text-sm px-4 py-3  rounded-full outline-none focus:outline-none">
        <i class="fa fa-plus"></i>{{__('Add Post')}}
      </a>
    </div>
      @livewire('posts-table')
    </div>
  </x-slot>
</x-app-layout>