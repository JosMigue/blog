<x-app-layout>
  @section('title',__('Users'))
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Users list') }}
    </h2>
  </x-slot>
  <x-slot name="slot">
    <div class="mt-5 lg:container lg:mx-auto">
      @if (session('successMessage'))
        <x-alert class="bg-green-400" iconClass="fa fa-check">
          <x-slot name="boldMessage">
            {{__('Done!')}}
          </x-slot>
          <x-slot name="message">
            {{session('successMessage')}}
          </x-slot>
        </x-alert>
      @endif
      @if (session('erroMessage'))
        <x-alert class="bg-red-500" iconClass="fa fa-times">
          <x-slot name="boldMessage">
            {{__('Whoops!')}}
          </x-slot>
          <x-slot name="message">
            {{session('erroMessage')}}
          </x-slot>
        </x-alert>
      @endif
      @if (session('infoMessage'))
        <x-alert class="bg-indigo-500" iconClass="fa fa-info">
          <x-slot name="boldMessage">
            {{__('Whoops!')}}
          </x-slot>
          <x-slot name="message">
            {{session('infoMessage')}}
          </x-slot>
        </x-alert>
      @endif
      <div class="flex flex-row justify-end my-2">
        <a class="text-indigo-500 bg-transparent border border-solid border-indigo-500 hover:bg-indigo-500 hover:text-white active:bg-indigo-600 font-bold uppercase text-sm px-6 py-3  rounded-full outline-none focus:outline-none mr-1 mb-1" type="button" style="transition: all .15s ease" href="{{route('users.create')}}">
          <i class="fa fa-plus"></i> {{__('Add user')}}
        </a>
      </div>
      <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
              <livewire:users-table></livewire:users-table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </x-slot>
</x-app-layout>