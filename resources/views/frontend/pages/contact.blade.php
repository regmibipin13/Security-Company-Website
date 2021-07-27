@extends('frontend.layouts.app')
@section('content')
<!-- Contact Us -->
{{-- <section class="text-gray-600 body-font relative">
    <div class="container px-5 pb-20 pt-5 mx-auto flex sm:flex-nowrap flex-wrap">
      <div class="lg:w-2/3 md:w-1/2 bg-gray-300 rounded-lg overflow-hidden sm:mr-10 p-10 flex items-end justify-start relative">
        <iframe class="absolute inset-0" style="filter: grayscale(1) contrast(1.2) opacity(0.4);" title="map" marginheight="0" marginwidth="0" scrolling="no" src="https://maps.google.com/maps?width=100%&height=600&hl=en&q=%C4%B0zmir+(My%20Business%20Name)&ie=UTF8&t=&z=14&iwloc=B&output=embed" width="100%" height="100%" frameborder="0"></iframe>
        <div class="bg-white relative flex flex-wrap py-6 rounded shadow-md">
          <div class="lg:w-1/2 px-6">
            <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">ADDRESS</h2>
            <p class="mt-1">Photo booth tattooed prism, portland taiyaki hoodie neutra typewriter</p>
          </div>
          <div class="lg:w-1/2 px-6 mt-4 lg:mt-0">
            <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">EMAIL</h2>
            <a class="text-indigo-500 leading-relaxed">example@email.com</a>
            <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs mt-4">PHONE</h2>
            <p class="leading-relaxed">123-456-7890</p>
          </div>
        </div>
      </div>
      <div class="lg:w-1/3 md:w-1/2 bg-white flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0">
        <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Contact Us</h2>
        <p class="leading-relaxed mb-5 text-gray-600">Contact our team for enquiries and more info</p>
        <div class="relative mb-4">
          <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
          <input type="text" id="name" name="name" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>
        <div class="relative mb-4">
          <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
          <input type="email" id="email" name="email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>
        <div class="relative mb-4">
            <label for="phone" class="leading-7 text-sm text-gray-600">Phone</label>
            <input type="text" id="phone" name="phone" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
        <div class="relative mb-4">
          <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
          <textarea id="message" name="message" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
        </div>
        <button class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Send</button>
        <p class="text-xs text-gray-500 mt-3">We usually reply within 12 hours of working time</p>
      </div>
    </div>
</section> --}}


<section id="text-gray-600 body-font relative">
    <div class="container px-5 pb-20 pt-5 mx-auto flex sm:flex-nowrap flex-wrap">
        <div class="w-full mt-4  rounded">
            <!-- Tabs -->
            <ul id="tabs" class="inline-flex w-full px-1 pt-2 ">
              <li class="px-4 py-2 -mb-px font-semibold text-gray-800 border-b-2 border-blue-400 rounded-t opacity-50"><a id="default-tab" href="#first">Company Form</a></li>
              <li class="px-4 py-2 font-semibold text-gray-800 rounded-t opacity-50"><a href="#second">Employee Form</a></li>
              <li class="px-4 py-2 font-semibold text-gray-800 rounded-t opacity-50"><a href="#third">Our Location</a></li>
            </ul>

            <!-- Tab Contents -->
            <div id="tab-contents">
              <div id="first" class="p-4">
                <div class="lg:w-3/3 md:w-2/2 bg-white flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0">
                    <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Contact Us</h2>
                    <p class="leading-relaxed mb-5 text-gray-600">Contact our team for enquiries and more info</p>
                    <div class="relative mb-4">
                      <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                      <input type="text" id="name" name="name" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                    <div class="relative mb-4">
                      <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                      <input type="email" id="email" name="email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                    <div class="relative mb-4">
                        <label for="phone" class="leading-7 text-sm text-gray-600">Phone</label>
                        <input type="text" id="phone" name="phone" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                      </div>
                    <div class="relative mb-4">
                      <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
                      <textarea id="message" name="message" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                    </div>
                    <button class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Send</button>
                    <p class="text-xs text-gray-500 mt-3">We usually reply within 12 hours of working time</p>
                </div>
              </div>
              <div id="second" class="hidden p-4">
                <div class="lg:w-3/3 md:w-2/2 bg-white flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0">
                    <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Contact Us</h2>
                    <p class="leading-relaxed mb-5 text-gray-600">Contact our team for enquiries and more info</p>
                    <div class="relative mb-4">
                      <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                      <input type="text" id="name" name="name" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                    <div class="relative mb-4">
                      <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                      <input type="email" id="email" name="email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                    <div class="relative mb-4">
                        <label for="phone" class="leading-7 text-sm text-gray-600">Phone</label>
                        <input type="text" id="phone" name="phone" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                      </div>
                    <div class="relative mb-4">
                      <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
                      <textarea id="message" name="message" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                    </div>
                    <button class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Send</button>
                    <p class="text-xs text-gray-500 mt-3">We usually reply within 12 hours of working time</p>
                </div>
              </div>
              <div id="third" class="hidden p-4">
                <div class="lg:w-3/3 md:w-3/3">
                  <div class="bg-white relative flex border flex-wrap py-6 rounded shadow-md">
                    <div class="lg:w-1/2 px-6">
                      <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">ADDRESS</h2>
                      <p class="mt-1">Photo booth tattooed prism, portland taiyaki hoodie neutra typewriter</p>
                    </div>
                    <div class="lg:w-1/2 px-6 mt-4 lg:mt-0">
                      <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">EMAIL</h2>
                      <a class="text-indigo-500 leading-relaxed">example@email.com</a>
                      <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs mt-4">PHONE</h2>
                      <p class="leading-relaxed">123-456-7890</p>
                    </div>
                  </div>
                  <iframe class="mt-5" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3176.164043396604!2d83.98222062655047!3d28.207730723135548!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399595b20f2b1e15%3A0xa93ef98e78f6f799!2sMuktinath%20Bikas%20Bank%20Ltd.!5e0!3m2!1sen!2snp!4v1627293619248!5m2!1sen!2snp" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
              </div>
            </div>
        </div>
    </div>
</section>

<script>
let tabsContainer = document.querySelector("#tabs");

let tabTogglers = tabsContainer.querySelectorAll("a");
console.log(tabTogglers);

tabTogglers.forEach(function(toggler) {
toggler.addEventListener("click", function(e) {
e.preventDefault();

let tabName = this.getAttribute("href");

let tabContents = document.querySelector("#tab-contents");

for (let i = 0; i < tabContents.children.length; i++) {

tabTogglers[i].parentElement.classList.remove("border-blue-400", "border-b",  "-mb-px", "opacity-100");  tabContents.children[i].classList.remove("hidden");
if ("#" + tabContents.children[i].id === tabName) {
continue;
}
tabContents.children[i].classList.add("hidden");

}
e.target.parentElement.classList.add("border-blue-400", "border-b-4", "-mb-px", "opacity-100");
});
});

document.getElementById("default-tab").click();

</script>
@endsection
