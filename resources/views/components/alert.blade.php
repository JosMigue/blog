@props(['iconClass'])
<div {{ $attributes->merge(['class' => 'text-white lg:px-6 lg:py-4 py-1 px-4 border-0 rounded relative mb-4 ']) }}>
  <span class="text-md lg:text-xl inline-block lg:mr-5 align-middle">
    <i class="{{$iconClass}}"></i>
  </span>
  <span class="inline-block align-middle lg:mr-8 text-md lg:text-lg">
    <b class="capitalize">{{  $boldMessage }}</b> {{  $message  }}
  </span>
  <button type="button" class="absolute bg-transparent text-md lg:text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none" onclick="closeAlert(event)">
    <span>×</span>
  </button>
</div>