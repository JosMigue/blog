<x-app-layout>
    @section('title', __('Create user'))
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{__('Create user')}}
      </h2>
    </x-slot>
    <x-slot name="slot">
      <div class="mt-5 lg:container lg:mx-auto">
        <x-jet-validation-errors class="mb-4" />
        <form method="POST" action="{{route('users.store')}}">
          @csrf
          <div class="flex flex-row flex-wrap mt-4">
            <div class="flex-column px-3 w-full lg:pr-3 lg:w-1/2">
              <x-jet-label value="{{ __('Name') }}" />
              <x-jet-input class="block mt-1 w-full" type="text" name="name" :value="old('name')"  autofocus autocomplete="name" />
            </div>
            <div class="flex-column px-3 w-full lg:pl-3 lg:w-1/2">
              <x-jet-label value="{{ __('E-Mail Address') }}" />
              <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')"  />
            </div>
          </div>
          <div>
          </div>
          <div class="flex flex-row flex-wrap mt-4">
            <div class="flex-column px-3 w-full lg:pr-3 lg:w-1/2">
              <x-jet-label value="{{ __('Password') }}" />
              <x-jet-input class="block mt-1 w-full" type="password" name="password"  autocomplete="new-password" />
            </div>
            <div class="flex-column px-3 w-full lg:pl-3 lg:w-1/2">
              <x-jet-label value="{{ __('Confirm Password') }}" />
              <x-jet-input class="block mt-1 w-full" type="password" name="password_confirmation"  autocomplete="new-password" />
            </div>
          </div>
          <div class="flex flex-row mt-4">
            <div class="flex-column px-3 w-full lg:pr-3 lg:w-1/2">
              <x-jet-label value="{{ __('Role') }}" />
              <div class="inline-block relative w-full">
                <select class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" name="role">
                  <option value="" disabled selected>{{__('Select role')}}</option>
                  <option value="1">Admin</option>
                  <option value="2">Editor</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
              </div>
            </div>
          </div>
          <div class="flex items-center justify-end mt-4">
            <x-jet-button class="ml-4">
              {{ __('Add') }}
            </x-jet-button>
          </div>
        </form>
      </div>
    </x-slot>
</x-app-layout>