<x-app-layout>
  @section('title',__('Users list'))
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
              <table class="min-w-full divide-y divide-gray-200">
                <thead>
                  <tr>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                      {{__('Name')}}
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                      {{__('Status')}}
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                      {{__('Role')}}
                    </th>
                    <th class="px-6 py-3 bg-gray-50">
                      {{__('Actions')}}
                    </th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  @foreach ($users as $user)                     
                    <tr>
                      <td class="px-6 py-4 whitespace-no-wrap">
                        <div class="flex items-center">
                          <div class="flex-shrink-0 h-10 w-10">
                            <img class="h-10 w-10 rounded-full" src="{{$user->profile_photo_url}}" alt="{{$user->name}}">
                          </div>
                          <div class="ml-4">
                            <div class="text-sm leading-5 font-medium text-gray-900">
                              {{$user->name}}
                            </div>
                            <div class="text-sm leading-5 text-gray-500">
                              {{$user->email}}
                            </div>
                          </div>
                        </div>
                      </td>
                      <td class="px-6 py-4 whitespace-no-wrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                          Active
                        </span>
                      </td>
                      <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                        @if ($user->role == 1)
                          Admin
                        @else
                          Editor  
                        @endif
                      </td>
                      <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                        <div class="flex justify-center ml-6 z-10">
                          <a href="{{route('users.edit', $user->id)}}" class="mx-1 py-2 px-3 rounded bg-yellow-300 text-white hover:text-indigo-900"><i class="fa fa-pencil"></i></a>
                          <form method="POST" action="{{route('users.destroy',$user->id)}}">
                            @csrf 
                            @method('DELETE')
                            <button type="sumbit" class="mx-1 py-2 px-3 rounded bg-red-600 text-white hover:text-red-900"><i class="fa fa-trash"></i></button>
                          </form>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>  
      {{$users->links()}}
    </div>
  </x-slot>
</x-app-layout>