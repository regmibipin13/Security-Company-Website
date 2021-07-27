<!-- Header -->
<header class="text-gray-600 body-font" style="box-shadow:0 1px 15px 0 rgba(0,0,0,.2);">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0" href="{{ url('/') }}">
            <img src="{{ $settings->site_logo ? $settings->site_logo->getUrl() : ''  }}" class="w-100 h-10 text-white rounded-full" alt="">
            &nbsp;
            <h3 style="font-size: 20px;">
                {{ $settings->site_title  }}
            </h3>
        </a>
        <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
            <a class="mr-5 hover:text-gray-900" href="{{ url('/') }}">Home</a>
            <a class="mr-5 hover:text-gray-900" href="{{ route('frontend.services') }}">Services</a>
            <a class="mr-5 hover:text-gray-900" href="{{ route('frontend.about') }}">About</a>
            <a class="mr-5 hover:text-gray-900" href="{{ route('frontend.teams') }}">Our Team</a>
        </nav>
        <a href="{{ route('frontend.contact') }}" class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">Contact
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
        </a>
    </div>
</header>
<hr>
