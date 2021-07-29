@extends('frontend.layouts.app')
@section('content')

@if($website !== null)
 <!-- Hero -->
 <section class="text-gray-600 body-font">
    <div class="container mx-auto flex px-4 py-20 md:flex-row flex-col items-center">
      <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
        <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ $website->hero_title  }}
          <br class="hidden lg:inline-block">{{ $website->hero_title_2 }}
        </h1>
        <p class="leading-relaxed" style="font-size: 18px;">
            {!! $website->hero_text !!}
        </p>
        <div class="flex justify-center mt-5">
          <a class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg" href="{{ $website->button_1_link }}">{{ $website->button_1_title }}</a>
          <a class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg" href="{{ $website->button_2_link }}">{{ $website->button_2_title }}</a>
        </div>
      </div>
      <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
        <img class="object-cover object-center rounded" alt="hero" src="{{ $website->hero_image ? $website->hero_image->getUrl() : '' }}">
      </div>
    </div>
</section>
<hr>
@endif

@if(count($services) > 0)
<!-- Services -->
<section class="text-gray-600 body-font">
    <div class="container px-5 pb-19 mx-auto" style="padding-top: 30px;">
        <div class="text-center" style="margin-bottom: 30px;">
            <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 mb-4">What We Offer !</h1>
            <div class="flex mt-6 justify-center">
              <div class="w-16 h-1 rounded-full bg-indigo-500 inline-flex"></div>
            </div>
        </div>
        <div class="flex flex-wrap -m-4">
            @foreach($services as $service)
            <div class="p-4 md:w-1/3">
                <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                    @if(isVideoFile($service->feature_media))
                        <video width="320" height="240" controls class="lg:h-48 md:h-36 w-full object-cover object-center">
                            <source src="{{ $service->feature_media->getUrl() }}" type="video/mp4">
                            <source src="{{ $service->feature_media->getUrl()  }}" type="video/ogg">
                            Your browser does not support the video tag.
                        </video>
                    @else
                    <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="{{ $service->feature_media ? $service->feature_media->getUrl() : '' }}" alt="{{ $service->name }}">
                    @endif
                    <div class="p-6">
                        <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ $service->name  }}</h1>
                        <p class="leading-relaxed mb-3">{{ $service->intro_text }}</p>
                        <div class="flex items-center flex-wrap ">
                            <a class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0" href="{{ route('frontend.singleService',$service->slug) }}">Learn More
                                <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14"></path>
                                    <path d="M12 5l7 7-7 7"></path>
                                 </svg>
                             </a>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
          <div class="p-2 lg:w-3/3 md:w-3/3 w-full text-center mt-5">
            <a href="{{ route('frontend.services') }}">View All</a>
          </div>
    </div>
</section>

@endif


@if(count($teams) > 0)
<!-- Team Members -->
<section class="text-gray-600 body-font">
    <div class="container px-5 pt-20 pb-19 mx-auto">
      <div class="flex flex-col text-center w-full" style="margin-bottom: 20px;">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Our Team</h1>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">{{ $website->our_team_text }}</p>
      </div>
      <div class="flex flex-wrap -m-2">
          @foreach($teams as $team)
            <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
              <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                <img alt="{{ $team->name }}" class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="{{ $team->image ? $team->image->getUrl() : '' }}">
                <div class="flex-grow">
                  <h2 class="text-gray-900 title-font font-medium">{{ $team->name }}</h2>
                  <p class="text-gray-500">{{ $team->position }}</p>
                </div>
              </div>
            </div>
          @endforeach
        <div class="p-2 lg:w-3/3 md:w-3/3 w-full text-center mt-5">
            <a href="{{ route('frontend.teams') }}">View All</a>
        </div>
      </div>
    </div>
</section>

@endif


@if(count($testimonials) > 0)
<!-- Testimonials -->
<section class="text-gray-600 body-font">
    <div class="container px-5 py-20 mx-auto">
      <h1 class="text-3xl font-medium title-font text-gray-900 mb-12 text-center">Testimonials</h1>
      <div class="flex flex-wrap -m-4">
          @foreach($testimonials as $testimonial)
              <div class="p-4 md:w-1/2 w-full">
                  <div class="h-full bg-gray-100 p-8 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="block w-5 h-5 text-gray-400 mb-4" viewBox="0 0 975.036 975.036">
                      <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
                    </svg>
                    <p class="leading-relaxed mb-6">{!! $testimonial->review !!}</p>
                    <a class="inline-flex items-center mt-5">
                      <img alt="{{ $testimonial->name }}" src="{{ $testimonial->photo ? $testimonial->photo->getUrl() : '' }}" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
                      <span class="flex-grow flex flex-col pl-4">
                        <span class="title-font font-medium text-gray-900">{{ $testimonial->name  }}</span>
                        <span class="text-gray-500 text-sm">{{ $testimonial->profession }}</span>
                      </span>
                    </a>
                  </div>
                </div>
          @endforeach
          <div class="p-2 lg:w-3/3 md:w-3/3 w-full text-center mt-5">
              <a href="{{ route('frontend.testimonials') }}">View All</a>
          </div>
      </div>
    </div>
</section>
@endif



@endsection
