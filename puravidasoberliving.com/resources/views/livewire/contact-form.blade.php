<div class="bg-gray-100 py-16 px-4 overflow-hidden sm:px-6 lg:px-8 lg:py-24">
    <div class="relative bg-white max-w-xl mx-auto p-5 rounded-md shadow-lg overflow-hidden">
      {{-- <svg class="absolute left-full transform translate-x-1/2" width="404" height="404" fill="none" viewBox="0 0 404 404" aria-hidden="true">
        <defs>
          <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
            <rect x="0" y="0" width="4" height="4" class="text-accent" fill="currentColor" />
          </pattern>
        </defs>
        <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)" />
      </svg> --}}
      {{-- <svg class="absolute right-full bottom-0 transform -translate-x-1/2" width="404" height="404" fill="none" viewBox="0 0 404 404" aria-hidden="true">
        <defs>
          <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
            <rect x="0" y="0" width="4" height="4" class="text-accent" fill="currentColor" />
          </pattern>
        </defs>
        <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)" />
      </svg> --}}
      <div class="text-center">
        <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
          Have a <span class="text-accent">Question</span>?
        </h2>
        <p class="mt-4 text-lg leading-6 text-gray-500">
          If you send our team a short message below, they will be more than happy to <span class="text-accent">promptly</span> get back to you.
        </p>
      </div>


      <div class="mt-12 relative">
        <svg class="absolute -left-22 -top-6 right-0 bottom-0 transform translate-x-1/2 opacity-30 z-0" width="404" height="404" fill="none" viewBox="0 0 404 404" aria-hidden="true">
            <defs>
              <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                <rect x="0" y="0" width="4" height="4" class="text-accent" fill="currentColor" />
              </pattern>
            </defs>
            <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)" />
          </svg>
          <svg class="absolute -right-22 bottom-0 left-0 top-72 transform -translate-x-1/2 opacity-30 z-0" width="404" height="404" fill="none" viewBox="0 0 404 404" aria-hidden="true">
            <defs>
              <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                <rect x="0" y="0" width="4" height="4" class="text-accent" fill="currentColor" />
              </pattern>
            </defs>
            <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)" />
          </svg>
        <form wire:submit.prevent="contactFormSubmit" action="/contact" method="POST" class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8 z-10">
          <div class="z-10">
            <label for="firstName" class="block text-md font-medium text-gray-700">First name</label>
            <div class="mt-1">
              <input wire:model="firstName" type="text" name="firstName" id="firstName" required autocomplete="given-name" value="{{ old('firstName') }}" class="px-3 py-2 block w-full shadow-sm text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
            </div>
          </div>
          <div class="z-10">
            <label for="lastName" class="block text-md font-medium text-gray-700">Last name</label>
            <div class="mt-1">
              <input wire:model="lastName" type="text" name="lastName" id="lastName" required autocomplete="family-name" value="{{ old('lastName') }}" class="px-3 py-2 block w-full shadow-sm text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
            </div>
          </div>
          {{-- <div class="sm:col-span-2 z-10">
            <label for="company" class="block text-md font-medium text-gray-700">Company</label>
            <div class="mt-1">
              <input wire:model="company" type="text" name="company" id="company" autocomplete="organization" value="{{ old('company') }}" class="px-3 py-2 block w-full shadow-sm text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
            </div>
          </div> --}}
          <div class="sm:col-span-2 z-10">
            <label for="email" class="block text-md font-medium text-gray-700">Email</label>
            <div class="mt-1">
              <input wire:model="email" id="email" name="email" type="email" required autocomplete="email" value="{{ old('email') }}" class="px-3 py-2 block w-full shadow-sm text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
            </div>
          </div>
          <div class="sm:col-span-2 z-10">
            <label for="phone-number" class="block text-md font-medium text-gray-700">Phone Number</label>
            <div class="mt-1 relative rounded-md shadow-sm">
              <div class="absolute inset-y-0 left-0 flex items-center">
                <label for="country" class="sr-only">Country</label>
                <select wire:model="country" id="country" name="country" class="h-full py-0 pl-4 pr-8 border-transparent bg-transparent text-gray-500 focus:ring-indigo-500 focus:border-indigo-500 rounded-md">
                  <option>US</option>
                  <option>CA</option>
                  <option>EU</option>
                </select>
              </div>
              <input type="text" name="phone-number" id="phone-number" required autocomplete="tel" class="py-3 block w-full pl-20 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md" placeholder="+1 (555) 987-6543">
            </div>
          </div>
          <div class="sm:col-span-2 z-10">
            <label for="subject" class="block text-md font-medium text-gray-700">Subject</label>
            <div class="mt-1">
              <input wire:model="subject" type="text" name="subject" id="subject" autocomplete="subject" value="{{ old('subject') }}" class="px-3 py-2 block w-full shadow-sm text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
            </div>
          </div>
          <div class="sm:col-span-2 z-10">
            <label for="messageContent" class="block text-md font-medium text-gray-700">Message</label>
            <div class="mt-1">
              <textarea wire:model="messageContent" id="messageContent" name="messageContent" rows="4" required value="{{ old('messageContent') }}" class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border border-gray-300 rounded-md"></textarea>
            </div>
          </div>
          <div class="sm:col-span-2 z-10">
            <div class="flex items-start">
              <div class="flex-shrink-0">
                <!-- Enabled: "bg-indigo-600", Not Enabled: "bg-gray-200" -->
                <button wire:click.prenvent="toggleAgreeToPolices" type="button" class="{{ $agreeToPolicies == null ? 'bg-accent_off' : 'bg-accent bg-accent_hover' }} relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-md" role="switch" aria-checked="false">
                    <span class="sr-only">
                      Agree to policies
                    </span>
                  <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
                  <span aria-hidden="true" class="{{ $agreeToPolicies == null ? 'translate-x-0' : 'translate-x-5' }} inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"></span>
                </button>
              </div>
              <div class="ml-3 z-10">
                <p class="text-md text-gray-500">
                  By selecting this, you agree to the
                    <a href="#" class="font-medium text-gray-700 underline">
                      Privacy Policy
                    </a>
                    and
                    <a href="#" class="font-medium text-gray-700 underline">
                      Cookie Policy
                    </a>.
                </p>
              </div>
            </div>
          </div>
          <div class="sm:col-span-2 z-10">
            <button type="submit" class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-md text-md font-medium text-white bg-accent bg-accent_hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Let's talk
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
