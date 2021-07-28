@extends('frontend.layouts.app')
@section('content')
<!-- Team Members -->
<section class="text-gray-600 body-font" style="padding:50px 0 80px 0;">
    <div class="container px-5 py-24 mx-auto">
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
          <div class="p-2 lg:w-3/3 md:w-3/3 w-full text-left mt-5">
                {{ $teams->links() }}
          </div>
      </div>
    </div>
</section>
@endsection
