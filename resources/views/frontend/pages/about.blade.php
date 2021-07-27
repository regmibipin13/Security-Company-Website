@extends('frontend.layouts.app')
@section('content')

<section class="text-gray-600 body-font overflow-hidden">
    <div class="container px-5 py-20 mx-auto">
      <div class="lg:w-5/5 mx-auto flex flex-wrap">
        <div class="lg:w-2/3 w-full lg:pr-10 lg:py-6 mb-6 lg:mb-0">
          <h2 class="text-sm title-font text-gray-500 tracking-widest">Company Name</h2>
          <h1 class="text-gray-900 text-3xl title-font font-medium mb-4">About Us</h1>

            <p class="leading-relaxed" style="font-size: 18px; line-height:35px;">
                Fam locavore kickstarter distillery. Mixtape chillwave tumeric sriracha taximy chia microdosing tilde DIY. XOXO fam inxigo juiceramps cornhole raw denim forage brooklyn. Everyday carry +1 seitan poutine tumeric. Gastropub blue bottle austin listicle pour-over, neutra jean.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo officiis asperiores, animi exercitationem corporis non. Exercitationem earum corporis recusandae ad, aliquid eligendi, reiciendis tempora voluptas eius quasi, asperiores dignissimos saepe!
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate voluptatum accusamus, iure ipsam doloremque sint atque incidunt exercitationem porro id ullam eos consectetur, facilis distinctio deserunt suscipit in libero vero.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis nemo ut nesciunt fugiat iste, possimus blanditiis reprehenderit voluptate commodi ea facere aliquid temporibus soluta sint ipsum, atque deserunt corrupti. Impedit.
            </p>
        </div>
        <img alt="ecommerce" class="lg:w-1/3 w-full lg:h-auto h-64 object-cover object-center rounded" src="https://themeearth.com/tf/html/securepress/img/about.jpg">
      </div>
    </div>
</section>

<section class="text-gray-600 body-font">
    <div class="container px-5 py-20 mx-auto flex flex-wrap">
      <div class="flex w-full mb-5 flex-wrap">
        <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 lg:w-1/3 lg:mb-0 mb-2">Our Galleries Collection</h1>
      </div>
      <div class="flex flex-wrap md:-m-2 -m-1">
        <div class="flex flex-wrap w-1/2">
          <div class="md:p-2 p-1 w-1/2">
            <img alt="gallery" class="w-full object-cover h-full object-center block" src="https://dummyimage.com/500x300">
          </div>
          <div class="md:p-2 p-1 w-1/2">
            <img alt="gallery" class="w-full object-cover h-full object-center block" src="https://dummyimage.com/501x301">
          </div>
          <div class="md:p-2 p-1 w-full">
            <img alt="gallery" class="w-full h-full object-cover object-center block" src="https://dummyimage.com/600x360">
          </div>
        </div>
        <div class="flex flex-wrap w-1/2">
          <div class="md:p-2 p-1 w-full">
            <img alt="gallery" class="w-full h-full object-cover object-center block" src="https://dummyimage.com/601x361">
          </div>
          <div class="md:p-2 p-1 w-1/2">
            <img alt="gallery" class="w-full object-cover h-full object-center block" src="https://dummyimage.com/502x302">
          </div>
          <div class="md:p-2 p-1 w-1/2">
            <img alt="gallery" class="w-full object-cover h-full object-center block" src="https://dummyimage.com/503x303">
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
