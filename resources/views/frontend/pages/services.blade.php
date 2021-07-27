@extends('frontend.layouts.app')
@section('content')

<section class="text-gray-600 body-font" style="padding-bottom: 50px;">
    <div class="container px-5 py-24 mx-auto" style="padding-top: 80px;">
        <div class="text-center" style="margin-bottom: 30px;">
            <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 mb-4">What We Offer !</h1>
            <div class="flex mt-6 justify-center">
              <div class="w-16 h-1 rounded-full bg-indigo-500 inline-flex"></div>
            </div>
        </div>
        <div class="flex flex-wrap -m-4">
            <div class="flex flex-wrap -m-4">
                <div class="p-4 md:w-1/3">
                    <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                        <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="https://grainger-prod.adobecqms.net/content/dam/grainger/gus/en/public/digital-tactics/know-how/artcl/kh-office-security-workplace-img-1.jpg" alt="blog">
                        <div class="p-6">
                            <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Office Security</h1>
                            <p class="leading-relaxed mb-3">Lorem ipsum dolor sit amet, luctus posuere semper felis consectetuer hendrerit, enim varius enim</p>
                            <div class="flex items-center flex-wrap ">
                                <a class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0" href="{{ route('frontend.singleService','asdasdas') }}">Learn More
                                    <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14"></path>
                                        <path d="M12 5l7 7-7 7"></path>
                                    </svg>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-4 md:w-1/3">
                    <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                        <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="http://ktswv.com/wp-content/uploads/2013/03/CCTV1.jpg" alt="blog">
                        <div class="p-6">
                            <h1 class="title-font text-lg font-medium text-gray-900 mb-3">CCTV Security</h1>
                            <p class="leading-relaxed mb-3">Lorem ipsum dolor sit amet, luctus posuere semper felis consectetuer hendrerit, enim varius enim</p>
                            <div class="flex items-center flex-wrap ">
                                <a class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0" href="{{ route('frontend.singleService','asdasdas') }}">Learn More
                                    <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14"></path>
                                        <path d="M12 5l7 7-7 7"></path>
                                    </svg>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-4 md:w-1/3">
                    <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                        <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="https://img3.exportersindia.com/product_images/bc-full/2021/2/8467107/bank-security-guard-services-1614078764-5732838.jpeg" alt="blog">
                            <div class="p-6">
                                <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Bank Security</h1>
                                 <p class="leading-relaxed mb-3">Lorem ipsum dolor sit amet, luctus posuere semper felis consectetuer hendrerit, enim varius enim</p>
                                <div class="flex items-center flex-wrap ">
                                    <a class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0" href="{{ route('frontend.singleService','asdasdas') }}">Learn More
                                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14"></path>
                                            <path d="M12 5l7 7-7 7"></path>
                                        </svg>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
