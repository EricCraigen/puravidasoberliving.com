<div class="flex flex-col items-center justify-center bg-gray-100 py-16 px-4 overflow-hidden sm:px-6 lg:px-8 lg:py-24">

    <h2 class="mt-6 text-center text-5xl font-extrabold text-gray-900">
        Have a <span class="text-accent">Question</span>?
    </h2>

    <div class="relative bg-white max-w-xl mx-auto mt-8 p-5 rounded-md shadow-lg overflow-hidden">

        <div class="text-center">
            <p class="my-4 text-2xl font-black text-gray-600 relative z-10 text-center">
                Send our team a short message below! We'll be more than <span class="text-accent">happy</span> get back with you as soon as possible.
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
                @csrf
                <div class="z-10">
                    <label for="firstName" class="block text-lg font-black text-gray-700">First name</label>
                    <div class="mt-1">
                        <input wire:model="firstName" type="text" name="firstName" id="firstName" required autocomplete="given-name" value="{{ old('firstName') }}" class="@error('firstName') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                        @error('firstName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="z-10">
                    <label for="lastName" class="block text-lg font-black text-gray-700">Last name</label>
                    <div class="mt-1">
                        <input wire:model="lastName" type="text" name="lastName" id="lastName" required autocomplete="family-name" value="{{ old('lastName') }}" class="@error('lastName') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                        @error('lastName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-2 z-10">
                    <label for="email" class="block text-lg font-black text-gray-700">Email</label>
                    <div class="mt-1">
                    <input wire:model="email" id="email" name="email" type="email" required autocomplete="email" value="{{ old('email') }}" class="@error('email') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-2 z-10">
                    <label for="phone" class="block text-lg font-black text-gray-700">Phone Number</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 flex items-center">
                        <label for="phoneType" class="sr-only">Phone Type</label>
                        <select wire:model="phoneType" id="phoneType" name="phoneType" value="{{ old("phoneType") }}" class="h-full py-0 pl-4 pr-8 border-transparent bg-transparent text-gray-500 focus:ring-indigo-500 focus:border-indigo-500 rounded-md">
                        <option {{ $phoneType == 'Type' ? 'selected' : '' }} value="">Type</option>
                        <option {{ $phoneType == 'Home' ? 'selected' : '' }} value="US">Home</option>
                        <option {{ $phoneType == 'Office' ? 'selected' : '' }} value="US">Office</option>
                        <option {{ $phoneType == 'Cell' ? 'selected' : '' }} value="US">Cell</option>
                        </select>
                    </div>
                    <input wire:model="phone" type="text" name="phone" id="phone" value="{{ old('phone') }}" required autocomplete="tel" class="@error('phone') is-invalid @enderror py-3 block w-full pl-28 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md" placeholder="+1 (555) 987-6543">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-2 z-10">
                    <label for="subject" class="block text-lg font-black text-gray-700">Subject</label>
                    <div class="mt-1">
                    <input wire:model="subject" type="text" name="subject" id="subject" autocomplete="subject" value="{{ old('subject') }}" class="@error('subject') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                        @error('subject')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-2 z-10">
                    <label for="messageContent" class="block text-lg font-black text-gray-700">Message</label>
                    <div class="mt-1">
                    <textarea wire:model="messageContent" id="messageContent" name="messageContent" rows="4" required value="{{ old('messageContent') }}" class="@error('messageContent') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10"></textarea>
                        @error('messageContent')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-2 z-10">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <button wire:click.prenvent="toggleAgreeToPolices" type="button" class="{{ $agreeToPolicies == null ? 'bg-accent-dark bg-accent-dark_hover' : 'bg-accent bg-accent_hover' }} relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-md" role="switch" aria-checked="false">
                                <span class="sr-only">
                                Agree to policies
                                </span>
                                <input type="hidden" id="agreeToPolices" name="agreeToPolicies" value="{{ $agreeToPolicies }}">
                                <span aria-hidden="true" class="{{ $agreeToPolicies == null ? 'translate-x-0 bg-gray-200' : 'translate-x-5 bg-white transition ease-in duration-200' }} inline-block h-5 w-5 rounded-full shadow transform ring-0"></span>
                            </button>
                        </div>
                        <div class="ml-3 z-10">
                            <p class="text-md font-semibold text-gray-500">
                                By selecting this, you agree to the
                                <a href="#" class="font-medium text-gray-700 underline"> Privacy Policy</a> and
                                <a href="#" class="font-medium text-gray-700 underline"> Cookie Policy</a>.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="sm:col-span-2 z-10">
                    <button type="submit" class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-md text-md font-medium text-white bg-accent bg-accent_hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <div wire:loading wire:target="contactFormSubmit">
                            <x-loading-blocks />
                        </div>
                        <div wire:loading.remove wire:target="contactFormSubmit">
                            Let's talk
                        </div>
                        {{-- Let's talk --}}
                    </button>
                </div>
            </form>
            <div class="flex my-4 text-xl font-black text-indigo-600 relative z-10">
                {{ $success }}
            </div>
        </div>
    </div>
</div>
