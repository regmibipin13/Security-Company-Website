@extends('frontend.layouts.app')
@section('content')

<section class="text-gray-600 body-font overflow-hidden mb-5 pb-3">
    <div class="container px-5 py-24 mx-auto">
      <div class="lg:w-5/5 mx-auto flex flex-wrap">
          @if(isVideoFile($service->feature_media))
              <video width="320" height="240" controls class="lg:w-1/3 w-full lg:h-auto h-64 object-cover object-center rounded">
                  <source src="{{ $service->feature_media->getUrl() }}" type="video/mp4">
                  <source src="{{ $service->feature_media->getUrl()  }}" type="video/ogg">
                  Your browser does not support the video tag.
              </video>
          @else
              <img alt="{{ $service->name }}" class="lg:w-1/3 w-full lg:h-auto h-64 object-cover object-center rounded" src="{{ $service->feature_media ? $service->feature_media->getUrl() : '' }}">
          @endif
        <div class="lg:w-2/3 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
          <h2 class="text-sm title-font text-gray-500 tracking-widest">{{ env('APP_NAME') }}</h2>
          <h1 class="text-gray-900 text-3xl title-font font-medium mb-5">{{ $service->name }}</h1>
            <div class="leading-relaxed" style="line-break: anywhere; line-height: 30px;">
                {!! $service->description !!}
            </div>

          <div class="flex mt-5">
            <a class="flex mr-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded" href="{{ route('frontend.contact') }}">Contact Us To Get the Service</a>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
