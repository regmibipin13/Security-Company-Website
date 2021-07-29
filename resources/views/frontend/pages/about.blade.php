@extends('frontend.layouts.app')
@section('content')

<section class="text-gray-600 body-font overflow-hidden">
    <div class="container px-5 py-20 mx-auto">
      <div class="lg:w-5/5 mx-auto flex flex-wrap">
        <div class="lg:w-3/3 w-full lg:pr-10 lg:py-6 mb-6 lg:mb-0">
          <h2 class="text-sm title-font text-gray-500 tracking-widest">{{ env('APP_NAME') }}</h2>
          <h1 class="text-gray-900 text-3xl title-font font-medium mb-4">About Us</h1>

            <div class="leading-relaxed" style="font-size: 18px; line-height:35px; line-break: anywhere;">
                {!! $website->about_us_text !!}
            </div>
        </div>
{{--        <img alt="{{ env('APP_NAME') }}" class="lg:w-1/3 w-full lg:h-auto h-64 object-cover object-center rounded" src="{{ $website->about_image ? $website->about_image->getUrl() : '' }}">--}}
      </div>
    </div>
</section>

{{-- <section class="text-gray-600 body-font">
    <div class="container px-5 py-20 mx-auto flex flex-wrap">

      <div class="flex flex-wrap md:-m-2 -m-1">
          @foreach($galleries as $gallery)
              <h5 class="sm:text-2xl text-2xl font-medium title-font text-gray-900 lg:w-1/3 lg:mb-0 mb-2 pt-5">{{ $gallery->collection_name }}</h5>
            <div class="flex flex-wrap w-4/4">
                @foreach($gallery->files as $file)
                <div class="md:p-2 p-1 w-1/3">
                    <img alt="{{ $gallery->collection_name }}" class="w-full object-cover h-full object-center block" src="{{ $file->getUrl() }}">
                </div>
                @endforeach
            </div>
          @endforeach
      </div>
    </div>
  </section> --}}

@endsection
