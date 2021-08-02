@extends('frontend.layouts.app')
@section('content')
<section id="text-gray-600 body-font relative">
    <div class="container px-5 pb-20 pt-5 mx-auto flex sm:flex-nowrap flex-wrap">
        <div class="w-full mt-4  rounded">
            <!-- Tabs -->
            <ul id="tabs" class="inline-flex w-full px-1 pt-2 ">
              <li class="px-4 py-2 -mb-px font-semibold text-gray-800 border-b-2 border-blue-400 rounded-t opacity-50"><a id="default-tab" href="#second">Employee Form</a></li>
              <li class="px-4 py-2 font-semibold text-gray-800 rounded-t opacity-50"><a href="#first">Company Form</a></li>
              <li class="px-4 py-2 font-semibold text-gray-800 rounded-t opacity-50"><a href="#third">Our Location</a></li>
            </ul>

            <!-- Tab Contents -->
            <div id="tab-contents">
              <div id="first" class="p-4">
                <div class="lg:w-3/3 md:w-2/2 bg-white flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0">
                    <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Company Contact Us</h2>
                    <p class="leading-relaxed mb-5 text-gray-600">Contact our team for enquiries and more info</p>
                    <company inline-template>
                        <form @submit.prevent="submit">
                            <div class="relative mb-4">
                                <label for="company_name" class="leading-7 text-sm text-gray-600">Company Name</label>
                                <input type="text" id="company_name" v-model="form.company_name" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                            <div class="relative mb-4">
                                <label for="location" class="leading-7 text-sm text-gray-600">Company Location</label>
                                <input type="text" id="location" v-model="form.company_location" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                            <div class="relative mb-4">
                                  <label for="company_phone" class="leading-7 text-sm text-gray-600">Company Contact</label>
                                  <input type="text" id="company_phone" v-model="form.company_phone" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                            <div class="relative mb-4">
                                  <label for="name" class="leading-7 text-sm text-gray-600">Your Name (Form Filler)</label>
                                  <input type="text" id="name" v-model="form.name" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                            <div class="relative mb-4">
                                  <label for="email" class="leading-7 text-sm text-gray-600">Your Email (Form Filler)</label>
                                  <input type="email" id="email" v-model="form.email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                            <div class="relative mb-4">
                                  <label for="phone" class="leading-7 text-sm text-gray-600">Your Contact (Form Filler)</label>
                                  <input type="text" id="phone" v-model="form.phone" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                            <div class="relative mb-4">
                                  <label for="subject" class="leading-7 text-sm text-gray-600">Your Subject</label>
                                  <input type="text" id="subject" v-model="form.subject" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                            <div class="relative mb-4">
                                <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
                                <textarea id="message" v-model="form.message" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out" placeholder="Write your message in breif"></textarea>
                            </div>
                            <button class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg" type="submit" :disabled="loading">
                                <span v-if="loading" style="display: flex; align-items:center;">
                                    <i class="fa fa-spinner fa-spin"></i> &nbsp;&nbsp; Sending
                                </span>
                                <span v-else>Send</span>
                            </button>
                        </form>
                    </company>
                </div>
              </div>
              <div id="second" class="hidden p-4">
                  @if($message = Session::get('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Success !</strong>
                    <span class="block sm:inline">{{ $message }}.</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                      <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                  </div>
                  @endif
                  @if($message = Session::get('error'))
                  <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                      <strong class="font-bold">Success !</strong>
                      <span class="block sm:inline">{{ $message }}.</span>
                      <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                      </span>
                    </div>
                    @endif
                  @if($errors->any())
                  <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Error !</strong>
                    <span class="block sm:inline">{{ $errors->first() }}.</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                      <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                  </div>
                  @endif
                <div class="lg:w-3/3 md:w-2/2 bg-white flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0">
                    <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Employee Contact Us</h2>
                    <p class="leading-relaxed mb-5 text-gray-600">Contact our team for enquiries and more info</p>
                    <employee inline-template>
                        <form action="{{ url('/api/v1/contact/employee') }}" method="POST" id="employee">
                            @csrf
                            <div class="relative mb-4">
                                <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                                <input type="text" id="name" value="{{ old('name') }}" name="name" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              </div>
                              <div class="relative mb-4">
                                <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                                <input type="email" id="email" value="{{ old('email') }}" name="email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              </div>
                              <div class="relative mb-4">
                                  <label for="phone" class="leading-7 text-sm text-gray-600">Phone</label>
                                  <input type="text" id="phone" value="{{ old('phone') }}" name="phone" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              </div>
                              <div class="relative mb-4">
                                  <label for="address" class="leading-7 text-sm text-gray-600">Address</label>
                                  <input type="text" id="address" value="{{ old('address') }}" name="address" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              </div>
                              <div class="relative mb-4">
                                  <label class="required" for="files">Files</label><br />
                                  <div class="notice pt-2 pb-3">
                                    <span>PLease Attach Three Files here .</span>
                                    <ul class="pl-2">
                                        <li>1.Front Image of your Citizenship</li>
                                        <li>2.Back Image of your Citizenship</li>
                                        <li>3.Clear Passport Size photo</li>
                                    </ul>
                                  </div>
                                  <div class="needsclick dropzone {{ $errors->has('files') ? 'is-invalid' : '' }}" id="files-dropzone">
                                  </div>
                                  @if($errors->has('files'))
                                      <div class="invalid-feedback">
                                          {{ $errors->first('files') }}
                                      </div>
                                  @endif
                                  <span class="help-block">{{ trans('cruds.galleryCollection.fields.files_helper') }}</span>
                              </div>
                              <div class="relative mb-4">
                                <label for="message" class="leading-7 text-sm text-gray-600">Additional Message</label>
                                <textarea id="message" name="message" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ old('message') }}</textarea>
                              </div>
                              <button class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg" type="submit">Send</button>
                        </form>
                    </employee>
                    <p class="text-xs text-gray-500 mt-3">We usually reply within 12 hours of working time</p>
                </div>
              </div>
              <div id="third" class="hidden p-4">
                <div class="lg:w-3/3 md:w-3/3">
                  <div class="bg-white relative flex border flex-wrap py-6 rounded shadow-md">
                    <div class="lg:w-1/2 px-6">
                      <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">ADDRESS</h2>
                      <p class="mt-1">{{ $settings->company_full_address }}</p>
                    </div>
                    <div class="lg:w-1/2 px-6 mt-4 lg:mt-0">
                      <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">EMAIL</h2>
                      <a class="text-indigo-500 leading-relaxed">{{ $settings->company_email }}</a>
                      <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs mt-4">PHONE</h2>
                      <p class="leading-relaxed">{{ $settings->support_number }}</p>
                    </div>
                  </div>
                  <div class="mt-5" style="max-width: 100%;">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7031.890629260507!2d83.985137!3d28.208974!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399595a600f6e6b7%3A0xfcdb95504cee8fd1!2sSiddhartha%20Hwy%2C%20Pokhara%2033700%2C%20Nepal!5e0!3m2!1sen!2sus!4v1627612141719!5m2!1sen!2sus" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        var uploadedFilesMap = {}
        Dropzone.options.filesDropzone = {
            url: '{{ route('frontend.storeMedia') }}',
            maxFilesize: 1000, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 1000
            },
            success: function (file, response) {
                $('form#employee').append('<input type="hidden" name="files[]" value="' + response.name + '">')
                uploadedFilesMap[file.name] = response.name
            },
            removedfile: function (file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedFilesMap[file.name]
                }
                $('form#employee').find('input[name="files[]"][value="' + name + '"]').remove()
            },
            init: function () {
                @if(isset($galleryCollection) && $galleryCollection->files)
                var files =
                    {!! json_encode($galleryCollection->files) !!}
                    for (var i in files) {
                    var file = files[i]
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form#employee').append('<input type="hidden" name="files[]" value="' + file.file_name + '">')
                }
                @endif
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
@endsection
