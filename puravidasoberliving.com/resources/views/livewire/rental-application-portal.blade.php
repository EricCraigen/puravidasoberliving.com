<div>

    <div class="max-w-7xl mx-auto px-4 py-10 relative z-10">

        <!-- Confirmation Container -->
        <div class="{{ $currentStep == $totalSteps ? 'flex w-full justify-center items-center' : 'hidden' }}">
            <div class="bg-white rounded-lg p-10 flex items-center shadow justify-between">
                <div>
                    <svg class="mb-4 h-20 w-20 text-green-500 mx-auto" viewBox="0 0 20 20" fill="currentColor">  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>

                    <h2 class="text-2xl mb-4 text-gray-800 text-center font-bold">Registration Success</h2>

                    <div class="text-gray-600 mb-8">
                        Thank you. We have sent you an email to demo@demo.test. Please click the link in the message to activate your account.
                    </div>

                    <button
                        @click="step = 1"
                        class="w-40 block mx-auto focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-medium border"
                    >Back to home</button>
                </div>
            </div>
        </div>

        <!-- Application Forms Container -->
        <div class="{{ $currentStep != $totalSteps ? '' : 'hidden' }} bg-white max-w-screen-lg mx-auto mt-8 p-5 pb-0 rounded-md rounded-b-none shadow-lg relative overflow-hidden">
            <!-- Top Navigation 1 -->
            <div class="flex lg:flex-row flex-col lg:justify-between justify-center items-center mb-4 relative z-10">
                <a class="inline-flex relative z-10 sm:mb-4" href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
                <div class="text-4xl font-black text-gray-900 sm:text-center">
                    Sober Housing Rental Application
                </div>
            </div>

            <!-- Top Navigation 2 -->
            <div class="border-b-2 border-gray-300 pb-4 relative z-10">

                <div class="flex flex-col md:items-center md:justify-between relative"  :class="{'hidden' : !isShowing}">

                    <!-- Progress Navigation -->
                    <div class="flex md:flex-row flex-col-reverse w-full">

                        <div class="flex flex-row items-center w-full">

                            <nav class="flex w-full" aria-label="Progress">

                                <ol id="application-portal-menu" role="list" class="flex md:flex-row flex-col w-full border border-gray-300 rounded-md divide-y divide-gray-300 md:flex md:divide-y-0 overflow-x-scroll">

                                    @foreach ($stepTitles as $title)

                                    <li class="relative md:flex-1 md:flex">
                                    <!-- Completed Step -->
                                        <a href="#" class="group flex items-center w-full">
                                            <span class="px-6 py-2 flex items-center text-sm font-medium">

                                                <span class="{{ $stepStatuses[$title] == 'complete' ? '' : 'hidden' }} flex-shrink-0 w-10 h-10 flex items-center justify-center bg-accent bg-accent_hover rounded-full">
                                                    <!-- Heroicon name: solid/check -->
                                                    <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                    </svg>
                                                </span>

                                                <span class="{{ $stepStatuses[$title] == 'current' ? '' : 'hidden' }} flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-full">
                                                    <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-accent rounded-full">
                                                        <span class="text-accent text-md font-bold">
                                                            {{ $loop->index + 1 }}
                                                        </span>
                                                    </span>
                                                </span>

                                                <span class="{{ $stepStatuses[$title] == 'pending' ? '' : 'hidden' }} flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-full">
                                                    <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-gray-300 rounded-full">
                                                        <span class="text-gray-300 text-md font-bold">
                                                            {{ $loop->index + 1 }}
                                                        </span>
                                                    </span>
                                                </span>

                                                <span class="ml-4 text-md font-bold text-gray-900">
                                                     {{ $title }}
                                                </span>
                                            </span>
                                        </a>
                                        <!-- Arrow separator for lg screens and up -->
                                        <div class="hidden md:block absolute top-0 right-0 h-full w-5" aria-hidden="true">
                                            <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none" preserveAspectRatio="none">
                                                <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </li>

                                    @endforeach

                                </ol>

                            </nav>

                        </div>

                    </div>

                    <!-- Progress Bar -->
                    <div class="flex w-full justify-end items-center mt-2">
                        <div class="progress-bar-width mr-2 relative">
                            <div class="absolute top-px left-px bottom-0 right-0 rounded-full bg-accent border-1 border-black text-xs leading-none h-2 text-center text-white z-20" style="width: {{ $currentStep / $totalSteps * 100 }}%;"></div>
                            <div class="rounded-full bg-accent-dark border-1 border-black text-xs leading-none h-2.5 text-center text-white relative z-10"></div>
                        </div>
                        <div class="text-md text-end font-bold w-10 text-gray-900">{{ intval($currentStep / $totalSteps * 100) }}%</div>
                    </div>

                </div>

            </div>

            <!-- Step Content -->
            <div class="py-5 mx-1 relative z-10">

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

                <div class="{{ $currentStep == 0 ? '' : 'hidden' }}">

                    <div class="mt-12 relative">
                        {{-- <svg class="absolute -left-22 -top-6 right-0 bottom-0 transform translate-x-1/2 opacity-30 z-0" width="404" height="404" fill="none" viewBox="0 0 404 404" aria-hidden="true">
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
                        </svg> --}}
                        <form id="personalInformationForm" wire:submit.prevent="validateStep" action="/apply-now" method="POST" class="flex flex-col gap-6 relative z-10">
                            @csrf
                            {{-- FORM ROW 1 --}}
                            <div class="flex md:flex-row flex-col">
                                <div class="w-45 w-full">
                                    <label for="firstName" class="block text-lg font-black text-gray-700">First name</label>
                                    <div class="mt-1">
                                        <input wire:model="personalInfo.firstName" type="text" name="firstName" id="firstName" required autocomplete="given-name" value="{{ old('firstName') }}" class="@error('personalInfo.firstName') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                        @error('personalInfo.firstName')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-10per w-full md:px-2">
                                    <label for="middleInitial" class="block text-lg font-black text-gray-700">Middle Init.</label>
                                    <div class="mt-1">
                                        <input wire:model="personalInfo.middleInitial" type="text" name="middleInitial" id="middleInitial" required autocomplete="additional-name" value="{{ old('middleInitial') }}" class="@error('personalInfo.middleInitial') is-invalid @enderror px-3 py-2 block md:w-full w-2/5 shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                        @error('personalInfo.middleInitial')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-45 w-full">
                                    <label for="lastName" class="block text-lg font-black text-gray-700">Last name</label>
                                    <div class="mt-1">
                                        <input wire:model="personalInfo.lastName" type="text" name="lastName" id="lastName" required autocomplete="family-name" value="{{ old('lastName') }}" class="@error('personalInfo.lastName') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                        @error('personalInfo.lastName')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- FORM ROW 2 --}}
                            <div class="flex md:flex-row flex-col">
                                <div class="w-full">
                                    <label for="dateOfBirth" class="block text-lg font-black text-gray-700">Date of Birth</label>
                                    <div class="mt-1">
                                        @php
                                            $birthDate = \Carbon\Carbon::now()->format('Y-m-d');
                                        @endphp
                                        <input wire:model="personalInfo.dateOfBirth" type="date" name="dateOfBirth" id="dateOfBirth" required autocomplete="bday" value="{{ $birthDate }}" class="@error('personalInfo.dateOfBirth') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                        @error('personalInfo.dateOfBirth')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full md:px-2">
                                    <label for="socialNumber" class="block text-lg font-black text-gray-700">Social Security Number</label>
                                    <div class="mt-1">
                                        <input wire:model="personalInfo.socialNumber" type="text" name="socialNumber" id="socialNumber" required autocomplete="ssn" value="{{ old('socialNumber') }}" class="@error('personalInfo.socialNumber') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                        @error('personalInfo.socialNumber')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full">
                                    <label for="phone" class="block text-lg font-black text-gray-700">Phone</label>
                                    <div class="mt-1">
                                        <input wire:model="personalInfo.phone" type="tel" name="phone" id="phone" required autocomplete="tel" value="{{ old('phone') }}" class="@error('personalInfo.phone') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                        @error('personalInfo.phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </form>
                        {{-- <div class="flex justify-center my-4 text-xl font-black text-indigo-600 relative z-10">
                            {{ $success }}
                        </div> --}}
                    </div>

                </div>

                <div class="{{ $currentStep == 1 ? '' : 'hidden' }}">

                    <div class="mt-12 relative">
                        {{-- <svg class="absolute -left-22 -top-6 right-0 bottom-0 transform translate-x-1/2 opacity-30 z-0" width="404" height="404" fill="none" viewBox="0 0 404 404" aria-hidden="true">
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
                        </svg> --}}
                        <form id="emergencyContactForm" wire:submit.prevent="validateStep" action="/apply-now" method="POST" class="flex flex-col gap-6 relative z-10">
                            @csrf


                            {{-- FORM ROW 1 --}}
                            <div class="flex md:flex-row flex-col">
                                <div class="w-full">
                                    <label for="firstNameEmContact" class="block text-lg font-black text-gray-700">First Name</label>
                                    <div class="mt-1">
                                        <input wire:model="emergencyContactInfo.firstNameEmContact" type="text" name="firstNameEmContact" id="firstNameEmContact" required autocomplete="given-name" value="{{ old('firstNameEmContact') }}" class="@error('emergencyContactInfo.firstNameEmContact') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                        @error('emergencyContactInfo.firstNameEmContact')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full md:px-2">
                                    <label for="lastNameEmContact" class="block text-lg font-black text-gray-700">Last Name</label>
                                    <div class="mt-1">
                                        <input wire:model="emergencyContactInfo.lastNameEmContact" type="text" name="lastNameEmContact" id="lastNameEmContact" required autocomplete="family-name" value="{{ old('lastNameEmContact') }}" class="@error('emergencyContactInfo.lastNameEmContact') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                        @error('emergencyContactInfo.lastNameEmContact')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full">
                                    <label for="phoneEmContact" class="block text-lg font-black text-gray-700">Contact Number</label>
                                    <div class="mt-1">
                                        <input wire:model="emergencyContactInfo.phoneEmContact" type="tel" name="phoneEmContact" id="phoneEmContact" required autocomplete="tel" value="{{ old('phoneEmContact') }}" class="@error('emergencyContactInfo.phoneEmContact') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                        @error('emergencyContactInfo.phoneEmContact')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- FORM ROW 2 --}}
                            <div class="flex md:flex-row flex-col">
                                <div class="w-full">
                                    <label for="cityEmContact" class="block text-lg font-black text-gray-700">City</label>
                                    <div class="mt-1">
                                        <input wire:model="emergencyContactInfo.cityEmContact" type="text" name="cityEmContact" id="cityEmContact" required autocomplete="city" value="{{ $birthDate }}" class="@error('emergencyContactInfo.cityEmContact') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                        @error('emergencyContactInfo.cityEmContact')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full md:px-2">
                                    <label for="emergencyContactInfo.stateEmContact" class="block text-lg font-black text-gray-700">State</label>
                                    <div class="mt-1">
                                        <label for="emergencyContactInfo.stateEmContact" class="sr-only">Phone Type</label>
                                        <select wire:model="emergencyContactInfo.stateEmContact" id="emergencyContactInfo.stateEmContact" name="emergencyContactInfo.stateEmContact" value="{{ old("emergencyContactInfo.stateEmContact") }}" class="px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                            <option  value="">Select</option>
                                            @php
                                                sort($us_state_abbrevs_names)
                                            @endphp
                                            @foreach ($us_state_abbrevs_names as $key => $state)
                                                <option  value="{{ $key }}">{{ $state }}</option>
                                            @endforeach
                                        </select>
                                        @error('emergencyContactInfo.stateEmContact')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full">
                                    <label for="relationshipEmContact" class="block text-lg font-black text-gray-700">Relationship</label>
                                    <div class="mt-1">
                                        <label for="emergencyContactInfo.relationshipEmContact" class="sr-only">Relationship</label>
                                        <select wire:model="emergencyContactInfo.relationshipEmContact" id="emergencyContactInfo.relationshipEmContact" name="emergencyContactInfo.relationshipEmContact" value="{{ old("emergencyContactInfo.relationshipEmContact") }}" class="px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                            <option  value="">Select</option>
                                            @php
                                                sort($relationalStatuses)
                                            @endphp
                                            @foreach ($relationalStatuses as $key => $relation)
                                                <option  value="{{ $key . ': ' . $relation }}">{{ $relation }}</option>
                                            @endforeach
                                        </select>
                                        @error('emergencyContactInfo.relationshipEmContact')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            @php
                                $inputCounter = 1;
                            @endphp

                            @foreach ($additionalEmergencyContactInfo as $emergencyContactInputGroup)
                                {{-- FORM ROW 1 --}}
                                <div class="flex md:flex-row flex-col">
                                    <div class="w-full">
                                        <label  class="block text-lg font-black text-gray-700">First Name</label>
                                        <div class="mt-1">
                                            <input wire:model="additionalEmergencyContactInfo.firstNameEmContact{{ $emergencyContactCounter }}" type="text" name="firstNameEmContact{{ $emergencyContactCounter }}" id="firstNameEmContact{{ $emergencyContactCounter }}" required autocomplete="given-name" value="{{ old('firstNameEmContact.emergencyContactCounter') }}" class="@error('additionalEmergencyContactInfo.firstNameEmContact.emergencyContactCounter') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                            @error('additionalEmergencyContactInfo.firstNameEmContact.emergencyContactCounter }}')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="w-full md:px-2">
                                        <label for="lastNameEmContact" class="block text-lg font-black text-gray-700">Last Name</label>
                                        <div class="mt-1">
                                            <input wire:model="emergencyContactInfo.lastNameEmContact" type="text" name="lastNameEmContact" id="lastNameEmContact" required autocomplete="family-name" value="{{ old('lastNameEmContact') }}" class="@error('emergencyContactInfo.lastNameEmContact') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                            @error('emergencyContactInfo.lastNameEmContact')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="w-full">
                                        <label for="phoneEmContact" class="block text-lg font-black text-gray-700">Contact Number</label>
                                        <div class="mt-1">
                                            <input wire:model="emergencyContactInfo.phoneEmContact" type="tel" name="phoneEmContact" id="phoneEmContact" required autocomplete="tel" value="{{ old('phoneEmContact') }}" class="@error('emergencyContactInfo.phoneEmContact') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                            @error('emergencyContactInfo.phoneEmContact')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- FORM ROW 2 --}}
                                <div class="flex md:flex-row flex-col">
                                    <div class="w-full">
                                        <label for="cityEmContact" class="block text-lg font-black text-gray-700">City</label>
                                        <div class="mt-1">
                                            <input wire:model="emergencyContactInfo.cityEmContact" type="text" name="cityEmContact" id="cityEmContact" required autocomplete="city" value="{{ $birthDate }}" class="@error('emergencyContactInfo.cityEmContact') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                            @error('emergencyContactInfo.cityEmContact')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="w-full md:px-2">
                                        <label for="emergencyContactInfo.stateEmContact" class="block text-lg font-black text-gray-700">State</label>
                                        <div class="mt-1">
                                            <label for="emergencyContactInfo.stateEmContact" class="sr-only">Phone Type</label>
                                            <select wire:model="emergencyContactInfo.stateEmContact" id="emergencyContactInfo.stateEmContact" name="emergencyContactInfo.stateEmContact" value="{{ old("emergencyContactInfo.stateEmContact") }}" class="px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                                <option  value="">Select</option>
                                                @php
                                                    sort($us_state_abbrevs_names)
                                                @endphp
                                                @foreach ($us_state_abbrevs_names as $key => $state)
                                                    <option  value="{{ $key }}">{{ $state }}</option>
                                                @endforeach
                                            </select>
                                            @error('emergencyContactInfo.stateEmContact')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="w-full">
                                        <label for="relationshipEmContact" class="block text-lg font-black text-gray-700">Relationship</label>
                                        <div class="mt-1">
                                            <label for="emergencyContactInfo.relationshipEmContact" class="sr-only">Relationship</label>
                                            <select wire:model="emergencyContactInfo.relationshipEmContact" id="emergencyContactInfo.relationshipEmContact" name="emergencyContactInfo.relationshipEmContact" value="{{ old("emergencyContactInfo.relationshipEmContact") }}" class="px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                                <option  value="">Select</option>
                                                @php
                                                    sort($relationalStatuses)
                                                @endphp
                                                @foreach ($relationalStatuses as $key => $relation)
                                                    <option  value="{{ $key . ': ' . $relation }}">{{ $relation }}</option>
                                                @endforeach
                                            </select>
                                            @error('emergencyContactInfo.relationshipEmContact')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                            @endforeach
                                @php
                                    $inputCounter += 1;
                                @endphp
                            <div class="flex w-full justify-end">

                                <button type="button"
                                        wire:click.prevent="addEmergencyContact"
                                        class="inline-flex min-w-36 justify-center h-full items-center border border-transparent rounded-md shadow-md text-md font-medium text-white bg-accent bg-accent_hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <div wire:loading wire:target="addEmergencyContact">
                                        <x-loading-blocks />
                                    </div>
                                    <div class="flex w-full justify-between items-center p-2 text-white text-md font-bold" wire:loading.remove wire:target="addEmergencyContact">
                                        <img class="flex mr-2" src="/svg/register-icon.svg" alt="Add Another Emergency Contact">
                                        Add Emergency Contact
                                    </div>
                                </button>

                            </div>

                        </form>
                        {{-- <div class="flex justify-center my-4 text-xl font-black text-indigo-600 relative z-10">
                            {{ $success }}
                        </div> --}}
                    </div>

                </div>

                <div class="{{ $currentStep == 2 ? '' : 'hidden' }}">

                    <div class="mt-12 relative">

                        <form id="LegalInformationForm" wire:submit.prevent="validateStep" action="/apply-now" method="POST" class="flex flex-col gap-6 relative z-10">
                            @csrf
                            {{-- FORM ROW 1 --}}
                            <div class="flex md:flex-row flex-col">
                                <div class="grid lg:grid-cols-2 grid-cols-1 w-full">
                                    <label for="sexOffender" class="inline-flex text-lg font-black text-red-500 md:mt-0 mt-2">Are you a registered sex offender?</label>
                                    <fieldset class="mr-2 md:mt-0 mt-2" id="sexOffender">
                                        <label class="inline-flex text-lg font-black text-red-500">Yes</label>
                                        <input wire:model="legalInfo.sexOffender" type="radio" value="1" name="sexOffender">
                                        <label class="inline-flex text-lg font-black text-red-500 ml-2">No</label>
                                        <input wire:model="legalInfo.sexOffender" type="radio" value="0" name="sexOffender">
                                    </fieldset>
                                    <label for="arsonist" class="inline-flex text-lg font-black text-red-500 md:mt-0 mt-2">Have you ever be convicted of arson?</label>
                                    <fieldset class="mr-2 md:mt-0 mt-2" id="arsonist">
                                        <label class="inline-flex text-lg font-black text-red-500">Yes</label>
                                        <input wire:model="legalInfo.arsonist" type="radio" value="1" name="arsonist">
                                        <label class="inline-flex text-lg font-black text-red-500 ml-2">No</label>
                                        <input wire:model="legalInfo.arsonist" type="radio" value="0" name="arsonist">
                                    </fieldset>
                                    <label for="kidnapper" class="inline-flex text-lg font-black text-red-500 md:mt-0 mt-2">Have you ever be convicted of kidnapping?</label>
                                    <fieldset class="mr-2 md:mt-0 mt-2" id="kidnapper">
                                        <label class="inline-flex text-lg font-black text-red-500">Yes</label>
                                        <input wire:model="legalInfo.kidnapper" type="radio" value="1" name="kidnapper">
                                        <label class="inline-flex text-lg font-black text-red-500 ml-2">No</label>
                                        <input wire:model="legalInfo.kidnapper" type="radio" value="0" name="kidnapper">
                                    </fieldset>
                                </div>
                            </div>

                            <div class="grid md:grid-cols-2 grid-cols-1 w-full">
                                <label for="legalSupervision" class="inline-flex text-lg font-black text-gray-900">Are you on legal supervision?</label>
                                <fieldset class="mr-2 md:mt-0 mt-2" id="legalSupervision">
                                    <label class="inline-flex text-lg font-black text-gray-900">Yes</label>
                                    <input wire:model="legalInfo.legalSupervision" type="radio" value="1" name="legalSupervision" />
                                    <label class="inline-flex text-lg font-black text-gray-900 ml-2">No</label>
                                    <input wire:model="legalInfo.legalSupervision" type="radio" value="0" name="legalSupervision" />
                                </fieldset>
                            </div>

                            {{-- FORM ROW 2 --}}
                            <div class="flex md:flex-row flex-col">

                                <div class="w-full">
                                    <label for="firstNameSupervisingOfficer" class="block text-lg font-black text-gray-700">First Name</label>
                                    <div class="mt-1">
                                        <input wire:model="legalInfo.firstNameSupervisingOfficer" type="text" name="firstNameSupervisingOfficer" id="firstNameSupervisingOfficer" required autocomplete="given-name" value="{{ old('firstNameSupervisingOfficer') }}" class="@error('legalInfo.firstNameSupervisingOfficer') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                        @error('legalInfo.firstNameSupervisingOfficer')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full md:pl-2">
                                    <label for="lastNameSupervisingOfficer" class="block text-lg font-black text-gray-700">Last Name</label>
                                    <div class="mt-1">
                                        <input wire:model="legalInfo.lastNameSupervisingOfficer" type="text" name="lastNameSupervisingOfficer" id="lastNameSupervisingOfficer" required autocomplete="family-name" value="{{ old('lastNameSupervisingOfficer') }}" class="@error('legalInfo.lastNameSupervisingOfficer') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                        @error('legalInfo.lastNameSupervisingOfficer')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            {{-- FORM ROW 3 --}}
                            <div class="flex md:flex-row flex-col">
                                <div class="w-full">
                                    <label for="agencySupervisingOfficer" class="block text-lg font-black text-gray-700">Agency</label>
                                    <div class="mt-1">
                                        <input wire:model="legalInfo.agencySupervisingOfficer" type="text" name="agencySupervisingOfficer" id="agencySupervisingOfficer" required autocomplete="organization" value="{{ old('agencySupervisingOfficer') }}" class="@error('legalInfo.agencySupervisingOfficer') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                        @error('legalInfo.agencySupervisingOfficer')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full md:pl-2">
                                    <label for="phoneSupervisingOfficer" class="block text-lg font-black text-gray-700">Contact Number</label>
                                    <div class="mt-1">
                                        <input wire:model="legalInfo.phoneSupervisingOfficer" type="tel" name="phoneSupervisingOfficer" id="phoneSupervisingOfficer" required autocomplete="tel" value="{{ old('phoneSupervisingOfficer') }}" class="@error('legalInfo.phoneSupervisingOfficer') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                        @error('legalInfo.phoneSupervisingOfficer')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                        </form>
                        {{-- <div class="flex justify-center my-4 text-xl font-black text-indigo-600 relative z-10">
                            {{ $success }}
                        </div> --}}
                    </div>

                </div>

                <div class="{{ $currentStep == 3 ? '' : 'hidden' }}">
                    <div class="mb-5">
                        <label for="email" class="font-bold mb-1 text-gray-700 block">Gender</label>

                        <div class="flex">
                            <label
                                class="flex justify-start items-center text-truncate rounded-lg bg-white pl-4 pr-6 py-3 shadow-sm mr-4">
                                <div class="text-teal-600 mr-3">
                                    <input type="radio" value="Male" class="form-radio focus:outline-none focus:shadow-outline" />
                                </div>
                                <div class="select-none text-gray-700">Male</div>
                            </label>

                            <label
                                class="flex justify-start items-center text-truncate rounded-lg bg-white pl-4 pr-6 py-3 shadow-sm">
                                <div class="text-teal-600 mr-3">
                                    <input type="radio" value="Female" class="form-radio focus:outline-none focus:shadow-outline" />
                                </div>
                                <div class="select-none text-gray-700">Female</div>
                            </label>
                        </div>
                    </div>

                    <div class="mb-5">
                        <label for="profession" class="font-bold mb-1 text-gray-700 block">Profession</label>
                        <input type="profession"
                            class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                            placeholder="eg. Web Developer">
                    </div>
                </div>

                <div class="{{ $currentStep == 4 ? '' : 'hidden' }}">
                    <div class="mb-5">
                        <label for="email" class="font-bold mb-1 text-gray-700 block">Gender</label>

                        <div class="flex">
                            <label
                                class="flex justify-start items-center text-truncate rounded-lg bg-white pl-4 pr-6 py-3 shadow-sm mr-4">
                                <div class="text-teal-600 mr-3">
                                    <input type="radio" value="Male" class="form-radio focus:outline-none focus:shadow-outline" />
                                </div>
                                <div class="select-none text-gray-700">Male</div>
                            </label>

                            <label
                                class="flex justify-start items-center text-truncate rounded-lg bg-white pl-4 pr-6 py-3 shadow-sm">
                                <div class="text-teal-600 mr-3">
                                    <input type="radio" value="Female" class="form-radio focus:outline-none focus:shadow-outline" />
                                </div>
                                <div class="select-none text-gray-700">Female</div>
                            </label>
                        </div>
                    </div>

                    <div class="mb-5">
                        <label for="profession" class="font-bold mb-1 text-gray-700 block">Profession</label>
                        <input type="profession"
                            class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                            placeholder="eg. Web Developer">
                    </div>
                </div>

                <div class="{{ $currentStep == 5 ? '' : 'hidden' }}">
                    <div class="mb-5">
                        <label for="email" class="font-bold mb-1 text-gray-700 block">Gender</label>

                        <div class="flex">
                            <label
                                class="flex justify-start items-center text-truncate rounded-lg bg-white pl-4 pr-6 py-3 shadow-sm mr-4">
                                <div class="text-teal-600 mr-3">
                                    <input type="radio" value="Male" class="form-radio focus:outline-none focus:shadow-outline" />
                                </div>
                                <div class="select-none text-gray-700">Male</div>
                            </label>

                            <label
                                class="flex justify-start items-center text-truncate rounded-lg bg-white pl-4 pr-6 py-3 shadow-sm">
                                <div class="text-teal-600 mr-3">
                                    <input type="radio" value="Female" class="form-radio focus:outline-none focus:shadow-outline" />
                                </div>
                                <div class="select-none text-gray-700">Female</div>
                            </label>
                        </div>
                    </div>

                    <div class="mb-5">
                        <label for="profession" class="font-bold mb-1 text-gray-700 block">Profession</label>
                        <input type="profession"
                            class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                            placeholder="eg. Web Developer">
                    </div>
                </div>

                <div class="{{ $currentStep == 6 ? '' : 'hidden' }}">
                    <div class="mb-5">
                        <label for="email" class="font-bold mb-1 text-gray-700 block">Gender</label>

                        <div class="flex">
                            <label
                                class="flex justify-start items-center text-truncate rounded-lg bg-white pl-4 pr-6 py-3 shadow-sm mr-4">
                                <div class="text-teal-600 mr-3">
                                    <input type="radio" value="Male" class="form-radio focus:outline-none focus:shadow-outline" />
                                </div>
                                <div class="select-none text-gray-700">Male</div>
                            </label>

                            <label
                                class="flex justify-start items-center text-truncate rounded-lg bg-white pl-4 pr-6 py-3 shadow-sm">
                                <div class="text-teal-600 mr-3">
                                    <input type="radio" value="Female" class="form-radio focus:outline-none focus:shadow-outline" />
                                </div>
                                <div class="select-none text-gray-700">Female</div>
                            </label>
                        </div>
                    </div>

                    <div class="mb-5">
                        <label for="profession" class="font-bold mb-1 text-gray-700 block">Profession</label>
                        <input type="profession"
                            class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                            placeholder="eg. Web Developer">
                    </div>
                </div>

                <div class="{{ $currentStep == 7 ? '' : 'hidden' }}">
                    <div class="mb-5">
                        <label for="email" class="font-bold mb-1 text-gray-700 block">Gender</label>

                        <div class="flex">
                            <label
                                class="flex justify-start items-center text-truncate rounded-lg bg-white pl-4 pr-6 py-3 shadow-sm mr-4">
                                <div class="text-teal-600 mr-3">
                                    <input type="radio" value="Male" class="form-radio focus:outline-none focus:shadow-outline" />
                                </div>
                                <div class="select-none text-gray-700">Male</div>
                            </label>

                            <label
                                class="flex justify-start items-center text-truncate rounded-lg bg-white pl-4 pr-6 py-3 shadow-sm">
                                <div class="text-teal-600 mr-3">
                                    <input type="radio" value="Female" class="form-radio focus:outline-none focus:shadow-outline" />
                                </div>
                                <div class="select-none text-gray-700">Female</div>
                            </label>
                        </div>
                    </div>

                    <div class="mb-5">
                        <label for="profession" class="font-bold mb-1 text-gray-700 block">Profession</label>
                        <input type="profession"
                            class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                            placeholder="eg. Web Developer">
                    </div>
                </div>

                <div class="{{ $currentStep == 8 ? '' : 'hidden' }}">
                    <div class="mb-5">
                        <label for="email" class="font-bold mb-1 text-gray-700 block">Gender</label>

                        <div class="flex">
                            <label
                                class="flex justify-start items-center text-truncate rounded-lg bg-white pl-4 pr-6 py-3 shadow-sm mr-4">
                                <div class="text-teal-600 mr-3">
                                    <input type="radio" value="Male" class="form-radio focus:outline-none focus:shadow-outline" />
                                </div>
                                <div class="select-none text-gray-700">Male</div>
                            </label>

                            <label
                                class="flex justify-start items-center text-truncate rounded-lg bg-white pl-4 pr-6 py-3 shadow-sm">
                                <div class="text-teal-600 mr-3">
                                    <input type="radio" value="Female" class="form-radio focus:outline-none focus:shadow-outline" />
                                </div>
                                <div class="select-none text-gray-700">Female</div>
                            </label>
                        </div>
                    </div>

                    <div class="mb-5">
                        <label for="profession" class="font-bold mb-1 text-gray-700 block">Profession</label>
                        <input type="profession"
                            class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                            placeholder="eg. Web Developer">
                    </div>
                </div>

                <div class="{{ $currentStep == 9 ? '' : 'hidden' }}">
                    <div class="mb-5">
                        <label for="email" class="font-bold mb-1 text-gray-700 block">Gender</label>

                        <div class="flex">
                            <label
                                class="flex justify-start items-center text-truncate rounded-lg bg-white pl-4 pr-6 py-3 shadow-sm mr-4">
                                <div class="text-teal-600 mr-3">
                                    <input type="radio" value="Male" class="form-radio focus:outline-none focus:shadow-outline" />
                                </div>
                                <div class="select-none text-gray-700">Male</div>
                            </label>

                            <label
                                class="flex justify-start items-center text-truncate rounded-lg bg-white pl-4 pr-6 py-3 shadow-sm">
                                <div class="text-teal-600 mr-3">
                                    <input type="radio" value="Female" class="form-radio focus:outline-none focus:shadow-outline" />
                                </div>
                                <div class="select-none text-gray-700">Female</div>
                            </label>
                        </div>
                    </div>

                    <div class="mb-5">
                        <label for="profession" class="font-bold mb-1 text-gray-700 block">Profession</label>
                        <input type="profession"
                            class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                            placeholder="eg. Web Developer">
                    </div>
                </div>
            </div>

        </div>

        <!-- Bottom Navigation -->
        <div x-data="{ isHidden: true }" class="sticky flex flex-col justify-center align-middle bottom-0 left-0 right-0 max-w-screen-lg mx-auto rounded-b-md z-20">

            <!-- Bottom Navigation 1 -->
            {{-- <div x-data @scroll.window="isHidden = (window.scrollY > 300) ? false : true" class="flex flex-col justify-center w-full py-1 px-14 bg-white relative" :class="{'hidden' : isHidden}">

                <!-- Progress Bar -->
                <div class="flex w-full justify-end items-center mb-2">
                    <div class="progress-bar-width mr-2 relative">
                        <div class="absolute top-px left-px bottom-0 right-0 rounded-full bg-accent border-1 border-black text-xs leading-none h-2 text-center text-white z-20" style="width: {{ $currentStep / $totalSteps * 100 }}%;"></div>
                        <div class="rounded-full bg-accent-dark border-1 border-black text-xs leading-none h-2.5 text-center text-white relative z-10"></div>
                    </div>
                    <div class="text-md text-end font-bold w-10 text-gray-900">{{ intval($currentStep / $totalSteps * 100) }}%</div>
                </div>

                <!-- Progress Navigation -->
                <div class="flex md:flex-row flex-col-reverse w-full">

                    <div class="flex flex-row items-center w-full">
                        <nav class="flex w-full" aria-label="Progress">
                            <ol role="list" class="flex md:flex-row flex-col w-full border border-gray-300 rounded-md divide-y divide-gray-300 md:flex md:divide-y-0">
                              <li class="relative md:flex-1 md:flex">
                                <!-- Completed Step -->
                                <a href="#" class="group flex items-center w-full">
                                  <span class="px-6 py-4 flex items-center text-sm font-medium">
                                    <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-indigo-600 rounded-full group-hover:bg-indigo-800">
                                      <!-- Heroicon name: solid/check -->
                                      <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                      </svg>
                                    </span>
                                    <span class="ml-4 text-sm font-medium text-gray-900">Job details</span>
                                  </span>
                                </a>

                                <!-- Arrow separator for lg screens and up -->
                                <div class="hidden md:block absolute top-0 right-0 h-full w-5" aria-hidden="true">
                                  <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none" preserveAspectRatio="none">
                                    <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor" stroke-linejoin="round" />
                                  </svg>
                                </div>
                              </li>

                              <li class="relative md:flex-1 md:flex">
                                <!-- Current Step -->
                                <a href="#" class="px-6 py-4 flex items-center text-sm font-medium" aria-current="step">
                                  <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-indigo-600 rounded-full">
                                    <span class="text-indigo-600">02</span>
                                  </span>
                                  <span class="ml-4 text-sm font-medium text-indigo-600">Application form</span>
                                </a>

                                <!-- Arrow separator for lg screens and up -->
                                <div class="hidden md:block absolute top-0 right-0 h-full w-5" aria-hidden="true">
                                  <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none" preserveAspectRatio="none">
                                    <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor" stroke-linejoin="round" />
                                  </svg>
                                </div>
                              </li>

                              <li class="relative md:flex-1 md:flex">
                                <!-- Upcoming Step -->
                                <a href="#" class="group flex items-center">
                                  <span class="px-6 py-4 flex items-center text-sm font-medium">
                                    <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-gray-300 rounded-full group-hover:border-gray-400">
                                      <span class="text-gray-500 group-hover:text-gray-900">03</span>
                                    </span>
                                    <span class="ml-4 text-sm font-medium text-gray-500 group-hover:text-gray-900">Preview</span>
                                  </span>
                                </a>
                              </li>
                            </ol>
                        </nav>
                    </div>

                </div>

            </div> --}}

            <!-- Bottom Navigation 2 -->
            <div class="flex w-full justify-between py-2 px-14 bg-accent-dark rounded-b-md shadow-lg">
                <div class="w-1/3">

                    <button type="button"
                            wire:click.prevent="prevStep"
                            class="{{ $currentStep > 0 ? '' : 'hidden' }} inline-flex min-w-36 justify-center h-full items-center border border-transparent rounded-md shadow-md text-md font-medium text-white bg-accent bg-accent_hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <div wire:loading wire:target="prevStep">
                            <x-loading-blocks />
                        </div>
                        <div class="flex w-full justify-between items-center p-2 text-white text-md font-bold" wire:loading.remove wire:target="prevStep">
                            <img class="flex" src="/svg/angle-double-left.svg" alt="Previous Step">
                            {{ $stepTitles[$currentStep - 1 < 0 ? 0 : $currentStep - 1] }}
                        </div>
                    </button>
                </div>

                <div class="w-1/3 text-right">

                    <button type="button"

                            wire:click.prevent="validateStep"
                            class="{{ $currentStep < $totalSteps ? '' : 'hidden' }} inline-flex min-w-36 justify-center h-full items-center border border-transparent rounded-md shadow-md text-md font-medium text-white bg-accent bg-accent_hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <div wire:loading wire:target="validateStep">
                            <x-loading-blocks />
                        </div>
                        <div class="flex w-full justify-between items-center p-2 text-white text-md font-bold" wire:loading.remove wire:target="validateStep">
                            {{ $stepTitles[$currentStep + 1] }}
                            <img class="flex" src="/svg/angle-double-right.svg" alt="Next Step">
                        </div>
                    </button>

                    <button
                        wire:click.prevent="rentalAppFormSubmit"
                        class="{{ $currentStep == $totalSteps ? '' : 'hidden' }} w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium"
                    >Complete</button>
                </div>
            </div>
        </div>

    </div>

</div>
