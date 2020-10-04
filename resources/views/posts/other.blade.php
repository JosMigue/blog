<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Other') }} 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="max-w-sm rounded overflow-hidden shadow-lg">
                    <img class="w-full" src="https://demos.creative-tim.com/tailwindcss-starter-project/_next/static/images/team-3-800x800-19201574ed51f77138a739c0452ca104.jpg" alt="Sunset in the mountains">
                    <div class="px-6 py-4">
                      <div class="font-bold text-xl mb-2">The Coldest Sunset</div>
                      <p class="text-gray-700 text-base">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
                      </p>
                    </div>
                    <div class="px-6 pt-4 pb-2">
                        <button style="float:right;" class="text-pink-500 background-transparent font-bold uppercase px-3 py-1 text-xs outline-none focus:outline-none mr-1 mb-1" type="button" style="transition: all .15s ease">
                            see more
                          </button>
                    </div>
                  </div>


            </div>
        </div>
    </div>
</x-app-layout>
