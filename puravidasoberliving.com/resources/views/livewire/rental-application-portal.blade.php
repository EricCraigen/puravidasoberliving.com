<div>

    <div class="relative z-10 px-4 py-10 mx-auto max-w-7xl">

        <!-- Confirmation Container -->
        <div class="{{ $currentStep == $totalSteps ? 'flex w-full justify-center items-center' : 'hidden' }}">
            <div class="flex items-center justify-between p-10 bg-white rounded-lg shadow">
                <div>
                    <svg class="w-20 h-20 mx-auto mb-4 text-green-500" viewBox="0 0 20 20" fill="currentColor">  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>

                    <h2 class="mb-4 text-2xl font-bold text-center text-gray-800">Registration Success</h2>

                    <div class="mb-8 text-gray-600">
                        Thank you. We have sent you an email to demo@demo.test. Please click the link in the message to activate your account.
                    </div>

                    <button
                        @click="step = 1"
                        class="block w-40 px-5 py-2 mx-auto font-medium text-center text-gray-600 bg-white border rounded-lg shadow-sm focus:outline-none hover:bg-gray-100"
                    >Back to home</button>
                </div>
            </div>
        </div>

        <!-- Application Forms Container -->
        <div class="{{ $currentStep != $totalSteps ? '' : 'hidden' }} bg-white max-w-screen-lg mx-auto mt-8 p-5 pb-0 rounded-md rounded-b-none shadow-lg relative overflow-hidden">
            <!-- Top Navigation 1 -->
            <div class="relative z-10 flex flex-col items-center justify-center mb-4 lg:flex-row lg:justify-between">
                <a class="relative z-10 inline-flex sm:mb-4" href="/">
                    <x-application-logo class="w-20 h-20 text-gray-500 fill-current" />
                </a>
                <div class="text-4xl font-black text-gray-900 sm:text-center">
                    Sober Housing Rental Application
                </div>
            </div>

            <!-- Top Navigation 2 -->
            <div class="relative z-10 pb-4 border-b-2 border-gray-300">

                <div class="relative flex flex-col md:items-center md:justify-between"  :class="{'hidden' : !isShowing}">

                    <!-- Progress Navigation -->
                    <div class="flex flex-col-reverse w-full md:flex-row">

                        <div class="flex flex-row items-center w-full">

                            <nav class="flex w-full" aria-label="Progress">

                                <ol id="application-portal-menu" role="list" class="flex flex-col w-full overflow-x-scroll border border-gray-300 divide-y divide-gray-300 rounded-md md:flex-row md:flex md:divide-y-0">

                                    @foreach ($stepTitles as $title)

                                    <li class="relative md:flex-1 md:flex">
                                    <!-- Completed Step -->
                                        <a href="#" class="flex items-center w-full group">
                                            <span class="flex items-center px-6 py-2 text-sm font-medium">

                                                <span class="{{ $stepStatuses[$title] == 'complete' ? '' : 'hidden' }} flex-shrink-0 w-10 h-10 flex items-center justify-center bg-accent bg-accent_hover rounded-full">
                                                    <!-- Heroicon name: solid/check -->
                                                    <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                    </svg>
                                                </span>

                                                <span class="{{ $stepStatuses[$title] == 'current' ? '' : 'hidden' }} flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-full">
                                                    <span class="flex items-center justify-center flex-shrink-0 w-10 h-10 border-2 rounded-full border-accent">
                                                        <span class="font-bold text-accent text-md">
                                                            {{ $loop->index + 1 }}
                                                        </span>
                                                    </span>
                                                </span>

                                                <span class="{{ $stepStatuses[$title] == 'pending' ? '' : 'hidden' }} flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-full">
                                                    <span class="flex items-center justify-center flex-shrink-0 w-10 h-10 border-2 border-gray-300 rounded-full">
                                                        <span class="font-bold text-gray-300 text-md">
                                                            {{ $loop->index + 1 }}
                                                        </span>
                                                    </span>
                                                </span>

                                                <span class="ml-4 font-bold text-gray-900 text-md">
                                                     {{ $title }}
                                                </span>
                                            </span>
                                        </a>
                                        <!-- Arrow separator for lg screens and up -->
                                        <div class="absolute top-0 right-0 hidden w-5 h-full md:block" aria-hidden="true">
                                            <svg class="w-full h-full text-gray-300" viewBox="0 0 22 80" fill="none" preserveAspectRatio="none">
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
                    <div class="flex items-center justify-end w-full mt-2">
                        <div class="relative mr-2 progress-bar-width">
                            <div class="absolute bottom-0 right-0 z-20 h-2 text-xs leading-none text-center text-white border-black rounded-full top-px left-px bg-accent border-1" style="width: {{ $currentStep / $totalSteps * 100 }}%;"></div>
                            <div class="rounded-full bg-accent-dark border-1 border-black text-xs leading-none h-2.5 text-center text-white relative z-10"></div>
                        </div>
                        <div class="w-10 font-bold text-gray-900 text-md text-end">{{ intval($currentStep / $totalSteps * 100) }}%</div>
                    </div>

                </div>

            </div>

            <!-- Step Content -->
            <div class="relative z-10 py-5 mx-1">

                <svg class="absolute bottom-0 right-0 z-0 transform translate-x-1/2 -left-22 -top-6 opacity-30" width="404" height="404" fill="none" viewBox="0 0 404 404" aria-hidden="true">
                    <defs>
                    <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" class="text-accent" fill="currentColor" />
                    </pattern>
                    </defs>
                    <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)" />
                </svg>
                <svg class="absolute bottom-0 left-0 z-0 transform -translate-x-1/2 -right-22 top-72 opacity-30" width="404" height="404" fill="none" viewBox="0 0 404 404" aria-hidden="true">
                    <defs>
                        <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" class="text-accent" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)" />
                </svg>

                <div class="{{ $currentStep == 0 ? '' : 'hidden' }}">

                    <div class="relative mt-12">

                        <form id="personalInformationForm" wire:submit.prevent="validateStep" action="/apply-now" method="POST" class="relative z-10 flex flex-col gap-6">
                            @csrf
                            {{-- FORM ROW 1 --}}
                            <div class="flex flex-col md:flex-row">
                                <div class="w-full w-45">
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
                                <div class="w-full w-10per md:px-2">
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
                                <div class="w-full w-45">
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
                            <div class="flex flex-col md:flex-row">
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
                        {{-- <div class="relative z-10 flex justify-center my-4 text-xl font-black text-indigo-600">
                            {{ $success }}
                        </div> --}}
                    </div>

                </div>

                <div class="{{ $currentStep == 1 ? '' : 'hidden' }}">

                    <div class="relative mt-12">

                        <form id="emergencyContactForm" wire:submit.prevent="validateStep" action="/apply-now" method="POST" class="relative z-10 flex flex-col gap-6">
                            @csrf


                            {{-- FORM ROW 1 --}}
                            <div class="flex flex-col md:flex-row">
                                <div class="w-full">
                                    <label for="firstNameEmContact" class="block text-lg font-black text-gray-700">First Name</label>
                                    <div class="mt-1">
                                        <input wire:model="emergencyContactInfo.firstNameEmContact" type="text" name="emergencyContactInfo.firstNameEmContact" id="emergencyContactInfo.firstNameEmContact" required autocomplete="given-name" value="emergencyContactInfo.firstNameEmContact" class="@error('emergencyContactInfo.firstNameEmContact') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                        @error('emergencyContactInfo.firstNameEmContact')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full md:px-2">
                                    <label for="emergencyContactInfo.lastNameEmContact" class="block text-lg font-black text-gray-700">Last Name</label>
                                    <div class="mt-1">
                                        <input wire:model="emergencyContactInfo.lastNameEmContact" type="text" name="emergencyContactInfo.lastNameEmContact" id="emergencyContactInfo.lastNameEmContact" required autocomplete="family-name" value="emergencyContactInfo.lastNameEmContact" class="@error('emergencyContactInfo.lastNameEmContact') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                        @error('emergencyContactInfo.lastNameEmContact')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full">
                                    <label for="emergencyContactInfo.phoneEmContact" class="block text-lg font-black text-gray-700">Contact Number</label>
                                    <div class="mt-1">
                                        <input wire:model="emergencyContactInfo.phoneEmContact" type="tel" name="emergencyContactInfo.phoneEmContact" id="emergencyContactInfo.phoneEmContact" required autocomplete="tel" value="emergencyContactInfo.phoneEmContact" class="@error('emergencyContactInfo.phoneEmContact') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                        @error('emergencyContactInfo.phoneEmContact')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- FORM ROW 2 --}}
                            <div class="flex flex-col md:flex-row">
                                <div class="w-full">
                                    <label for="emergencyContactInfo.cityEmContact" class="block text-lg font-black text-gray-700">City</label>
                                    <div class="mt-1">
                                        <input wire:model="emergencyContactInfo.cityEmContact" type="text" name="emergencyContactInfo.cityEmContact" id="emergencyContactInfo.cityEmContact" required autocomplete="ship-city" value="emergencyContactInfo.cityEmContact" class="@error('emergencyContactInfo.cityEmContact') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
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
                                        <select wire:model="emergencyContactInfo.stateEmContact" id="emergencyContactInfo.stateEmContact" name="emergencyContactInfo.stateEmContact" value="emergencyContactInfo.stateEmContact" class="z-10 block w-full px-3 py-2 text-gray-900 border-gray-300 rounded-md shadow-lg focus:ring-indigo-500 focus:border-indigo-500">
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
                                    <label for="emergencyContactInfo.relationshipEmContact" class="block text-lg font-black text-gray-700">Relationship</label>
                                    <div class="mt-1">
                                        <label for="emergencyContactInfo.relationshipEmContact" class="sr-only">Relationship</label>
                                        <select wire:model="emergencyContactInfo.relationshipEmContact" id="emergencyContactInfo.relationshipEmContact" name="emergencyContactInfo.relationshipEmContact" value="emergencyContactInfo.relationshipEmContact" class="z-10 block w-full px-3 py-2 text-gray-900 border-gray-300 rounded-md shadow-lg focus:ring-indigo-500 focus:border-indigo-500">
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
                                $inputCounter = 0;
                            @endphp

                            @foreach ($additionalEmergencyContactInfo as $key => $emergencyContactInputGroup)
                                {{-- FORM ROW 1 --}}
                                <div class="flex flex-col md:flex-row">
                                    <div class="w-full">
                                        <label for="emergencyContactInputGroup.{{ $inputCounter }}.firstNameEmContact" class="block text-lg font-black text-gray-700">First Name</label>
                                        <div class="mt-1">
                                            <input wire:model="additionalEmergencyContactInfo.{{ $inputCounter }}.firstNameEmContact" type="text" name="emergencyContactInputGroup.{{ $inputCounter }}.firstNameEmContact" id="emergencyContactInputGroup.{{ $inputCounter }}.firstNameEmContact" required autocomplete="given-name" value="emergencyContactInputGroup.{{ $inputCounter }}.firstNameEmContact.{{ $inputCounter }}" class="@error('emergencyContactInputGroup.inputCounter.firstNameEmContact') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                            @error('emergencyContactInputGroup.inputCounter.firstNameEmContact')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="w-full md:px-2">
                                        <label for="emergencyContactInputGroup.{{ $inputCounter }}.lastNameEmContact" class="block text-lg font-black text-gray-700">Last Name</label>
                                        <div class="mt-1">
                                            <input wire:model="additionalEmergencyContactInfo.{{ $inputCounter }}.lastNameEmContact" type="text" name="emergencyContactInputGroup.{{ $inputCounter }}.lastNameEmContact" id="additionalEmergencyContactInfo.{{ $inputCounter }}.lastNameEmContact" required autocomplete="family-name" value="additionalEmergencyContactInfo.{{ $inputCounter }}.lastNameEmContact.{{ $inputCounter }}" class="@error('emergencyContactInputGroup.inputCounter.lastNameEmContact') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                            @error('emergencyContactInputGroup.inputCounter.lastNameEmContact')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="w-full">
                                        <label for="emergencyContactInputGroup.{{ $inputCounter }}.phoneEmContact" class="block text-lg font-black text-gray-700">Contact Number</label>
                                        <div class="mt-1">
                                            <input wire:model="additionalEmergencyContactInfo.{{ $inputCounter }}.phoneEmContact" type="tel" name="emergencyContactInputGroup.{{ $inputCounter }}.phoneEmContact" id="emergencyContactInputGroup.{{ $inputCounter }}.phoneEmContact" required autocomplete="tel" value="emergencyContactInputGroup.{{ $inputCounter }}.phoneEmContact.{{ $inputCounter }}" class="@error('emergencyContactInputGroup.inputCounter.phoneEmContact') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                            @error('emergencyContactInputGroup.inputCounter.phoneEmContact')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- FORM ROW 2 --}}
                                <div class="flex flex-col md:flex-row">
                                    <div class="w-full">
                                        <label for="emergencyContactInputGroup.{{ $inputCounter }}.cityEmContact" class="block text-lg font-black text-gray-700">City</label>
                                        <div class="mt-1">
                                            <input wire:model="additionalEmergencyContactInfo.{{ $inputCounter }}.cityEmContact" type="text" name="emergencyContactInputGroup.{{ $inputCounter }}.cityEmContact" id="emergencyContactInputGroup.{{ $inputCounter }}.cityEmContact" required autocomplete="ship-city" value="emergencyContactInputGroup.{{ $inputCounter }}.cityEmContact.{{ $inputCounter }}" class="@error('emergencyContactInputGroup.inputCounter.cityEmContact') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                            @error('emergencyContactInputGroup.inputCounter.cityEmContact')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="w-full md:px-2">
                                        <label for="emergencyContactInputGroup.{{ $inputCounter }}.stateEmContact" class="block text-lg font-black text-gray-700">State</label>
                                        <div class="mt-1">
                                            <label for="emergencyContactInputGroup.{{ $inputCounter }}.stateEmContact" class="sr-only">State</label>
                                            <select wire:model="additionalEmergencyContactInfo.{{ $inputCounter }}.stateEmContact" id="emergencyContactInputGroup.{{ $inputCounter }}.stateEmContact" name="emergencyContactInputGroup.{{ $inputCounter }}.stateEmContact" value="emergencyContactInputGroup.{{ $inputCounter }}.stateEmContact.{{ $inputCounter }}" class="z-10 block w-full px-3 py-2 text-gray-900 border-gray-300 rounded-md shadow-lg focus:ring-indigo-500 focus:border-indigo-500">
                                                <option  value="">Select</option>
                                                @php
                                                    sort($us_state_abbrevs_names)
                                                @endphp
                                                @foreach ($us_state_abbrevs_names as $key => $state)
                                                    <option  value="{{ $key }}">{{ $state }}</option>
                                                @endforeach
                                            </select>
                                            @error('emergencyContactInputGroup.inputCounter.stateEmContact')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="w-full">
                                        <label for="emergencyContactInputGroup.{{ $inputCounter }}.relationshipEmContact" class="block text-lg font-black text-gray-700">Relationship</label>
                                        <div class="mt-1">
                                            <label for="emergencyContactInputGroup.{{ $inputCounter }}.relationshipEmContact" class="sr-only">Relationship</label>
                                            <select wire:model="additionalEmergencyContactInfo.{{ $inputCounter }}.relationshipEmContact" id="emergencyContactInputGroup.{{ $inputCounter }}.relationshipEmContact" name="emergencyContactInputGroup.{{ $inputCounter }}.relationshipEmContact.{{ $inputCounter }}" value="emergencyContactInputGroup.{{ $inputCounter }}.relationshipEmContact.{{ $inputCounter }}" class="z-10 block w-full px-3 py-2 text-gray-900 border-gray-300 rounded-md shadow-lg focus:ring-indigo-500 focus:border-indigo-500">
                                                <option  value="">Select</option>
                                                @php
                                                    sort($relationalStatuses)
                                                @endphp
                                                @foreach ($relationalStatuses as $key => $relation)
                                                    <option  value="{{ $key . ': ' . $relation }}">{{ $relation }}</option>
                                                @endforeach
                                            </select>
                                            @error('emergencyContactInputGroup.inputCounter.relationshipEmContact')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="flex justify-end w-full">

                                    <button type="button"
                                            {{-- wire:key="{{ $inputCounter }}" --}}
                                            wire:click.prevent="removeEmergencyContact({{ $inputCounter }})"
                                            class="inline-flex items-center justify-center h-full font-medium text-white border border-transparent rounded-md shadow-md min-w-36 text-md bg-accent bg-accent_hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        <div wire:loading wire:target="removeEmergencyContact({{ $inputCounter }})">
                                            <x-loading-blocks />
                                        </div>
                                        <div class="flex items-center justify-between w-full p-2 font-bold text-white text-md" wire:loading.remove wire:target="removeEmergencyContact({{ $inputCounter }})">
                                            <img class="flex mr-2" src="/svg/register-icon.svg" alt="Add Another Emergency Contact">
                                            Remove Emergency Contact
                                        </div>
                                    </button>

                                </div>

                                @php
                                    $inputCounter += 1;
                                @endphp
                            @endforeach

                            <div class="flex justify-end w-full">

                                <button type="button"
                                        wire:click.prevent="addEmergencyContact"
                                        class="inline-flex items-center justify-center h-full font-medium text-white border border-transparent rounded-md shadow-md min-w-36 text-md bg-accent bg-accent_hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <div wire:loading wire:target="addEmergencyContact">
                                        <x-loading-blocks />
                                    </div>
                                    <div class="flex items-center justify-between w-full p-2 font-bold text-white text-md" wire:loading.remove wire:target="addEmergencyContact">
                                        <img class="flex mr-2" src="/svg/register-icon.svg" alt="Add Another Emergency Contact">
                                        Add Emergency Contact
                                    </div>
                                </button>

                            </div>

                        </form>
                        {{-- <div class="relative z-10 flex justify-center my-4 text-xl font-black text-indigo-600">
                            {{ $success }}
                        </div> --}}
                    </div>

                </div>

                <div class="{{ $currentStep == 2 ? '' : 'hidden' }}">

                    <div class="relative mt-12">

                        <form id="LegalInformationForm" wire:submit.prevent="validateStep" action="/apply-now" method="POST" class="relative z-10 flex flex-col gap-6">
                            @csrf
                            {{-- FORM ROW 1 --}}
                            <div class="flex flex-col md:flex-row">
                                <div class="grid w-full grid-cols-1 lg:grid-cols-2">
                                    <label for="sexOffender" class="inline-flex mt-2 text-lg font-black text-red-500 md:mt-0">Are you a registered sex offender?</label>
                                    <fieldset class="mt-2 mr-2 md:mt-0" id="sexOffender">
                                        <label class="inline-flex text-lg font-black text-red-500">Yes</label>
                                        <input wire:model="legalInfo.sexOffender" type="radio" value="1" name="sexOffender">
                                        <label class="inline-flex ml-2 text-lg font-black text-red-500">No</label>
                                        <input wire:model="legalInfo.sexOffender" type="radio" value="0" name="sexOffender">
                                    </fieldset>
                                    <label for="arsonist" class="inline-flex mt-2 text-lg font-black text-red-500 md:mt-0">Have you ever be convicted of arson?</label>
                                    <fieldset class="mt-2 mr-2 md:mt-0" id="arsonist">
                                        <label class="inline-flex text-lg font-black text-red-500">Yes</label>
                                        <input wire:model="legalInfo.arsonist" type="radio" value="1" name="arsonist">
                                        <label class="inline-flex ml-2 text-lg font-black text-red-500">No</label>
                                        <input wire:model="legalInfo.arsonist" type="radio" value="0" name="arsonist">
                                    </fieldset>
                                    <label for="kidnapper" class="inline-flex mt-2 text-lg font-black text-red-500 md:mt-0">Have you ever be convicted of kidnapping?</label>
                                    <fieldset class="mt-2 mr-2 md:mt-0" id="kidnapper">
                                        <label class="inline-flex text-lg font-black text-red-500">Yes</label>
                                        <input wire:model="legalInfo.kidnapper" type="radio" value="1" name="kidnapper">
                                        <label class="inline-flex ml-2 text-lg font-black text-red-500">No</label>
                                        <input wire:model="legalInfo.kidnapper" type="radio" value="0" name="kidnapper">
                                    </fieldset>
                                </div>
                            </div>

                            <div class="grid w-full grid-cols-1 md:grid-cols-2">
                                <label for="legalSupervision" class="inline-flex text-lg font-black text-gray-900">Are you on legal supervision?</label>
                                <fieldset class="mt-2 mr-2 md:mt-0" id="legalSupervision">
                                    <label class="inline-flex text-lg font-black text-gray-900">Yes</label>
                                    <input wire:model="legalInfo.legalSupervision" type="radio" value="1" name="legalSupervision" />
                                    <label class="inline-flex ml-2 text-lg font-black text-gray-900">No</label>
                                    <input wire:model="legalInfo.legalSupervision" type="radio" value="0" name="legalSupervision" />
                                </fieldset>
                            </div>

                            {{-- FORM ROW 2 --}}
                            <div class="flex flex-col md:flex-row">

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
                            <div class="flex flex-col md:flex-row">
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
                        {{-- <div class="relative z-10 flex justify-center my-4 text-xl font-black text-indigo-600">
                            {{ $success }}
                        </div> --}}
                    </div>

                </div>

                <div class="{{ $currentStep == 3 ? '' : 'hidden' }}">
                    <div class="mb-5">
                        <label for="email" class="block mb-1 font-bold text-gray-700">Gender</label>

                        <div class="flex">
                            <label
                                class="flex items-center justify-start py-3 pl-4 pr-6 mr-4 bg-white rounded-lg shadow-sm text-truncate">
                                <div class="mr-3 text-teal-600">
                                    <input type="radio" value="Male" class="form-radio focus:outline-none focus:shadow-outline" />
                                </div>
                                <div class="text-gray-700 select-none">Male</div>
                            </label>

                            <label
                                class="flex items-center justify-start py-3 pl-4 pr-6 bg-white rounded-lg shadow-sm text-truncate">
                                <div class="mr-3 text-teal-600">
                                    <input type="radio" value="Female" class="form-radio focus:outline-none focus:shadow-outline" />
                                </div>
                                <div class="text-gray-700 select-none">Female</div>
                            </label>
                        </div>
                    </div>

                    <div class="mb-5">
                        <label for="profession" class="block mb-1 font-bold text-gray-700">Profession</label>
                        <input type="profession"
                            class="w-full px-4 py-3 font-medium text-gray-600 rounded-lg shadow-sm focus:outline-none focus:shadow-outline"
                            placeholder="eg. Web Developer">
                    </div>
                </div>

                <div class="{{ $currentStep == 4 ? '' : 'hidden' }}">
                    <div class="mb-5">
                        <label for="email" class="block mb-1 font-bold text-gray-700">Gender</label>

                        <div class="flex">
                            <label
                                class="flex items-center justify-start py-3 pl-4 pr-6 mr-4 bg-white rounded-lg shadow-sm text-truncate">
                                <div class="mr-3 text-teal-600">
                                    <input type="radio" value="Male" class="form-radio focus:outline-none focus:shadow-outline" />
                                </div>
                                <div class="text-gray-700 select-none">Male</div>
                            </label>

                            <label
                                class="flex items-center justify-start py-3 pl-4 pr-6 bg-white rounded-lg shadow-sm text-truncate">
                                <div class="mr-3 text-teal-600">
                                    <input type="radio" value="Female" class="form-radio focus:outline-none focus:shadow-outline" />
                                </div>
                                <div class="text-gray-700 select-none">Female</div>
                            </label>
                        </div>
                    </div>

                    <div class="mb-5">
                        <label for="profession" class="block mb-1 font-bold text-gray-700">Profession</label>
                        <input type="profession"
                            class="w-full px-4 py-3 font-medium text-gray-600 rounded-lg shadow-sm focus:outline-none focus:shadow-outline"
                            placeholder="eg. Web Developer">
                    </div>
                </div>

                <div class="{{ $currentStep == 5 ? '' : 'hidden' }}">
                    <div class="mb-5">
                        <label for="email" class="block mb-1 font-bold text-gray-700">Gender</label>

                        <div class="flex">
                            <label
                                class="flex items-center justify-start py-3 pl-4 pr-6 mr-4 bg-white rounded-lg shadow-sm text-truncate">
                                <div class="mr-3 text-teal-600">
                                    <input type="radio" value="Male" class="form-radio focus:outline-none focus:shadow-outline" />
                                </div>
                                <div class="text-gray-700 select-none">Male</div>
                            </label>

                            <label
                                class="flex items-center justify-start py-3 pl-4 pr-6 bg-white rounded-lg shadow-sm text-truncate">
                                <div class="mr-3 text-teal-600">
                                    <input type="radio" value="Female" class="form-radio focus:outline-none focus:shadow-outline" />
                                </div>
                                <div class="text-gray-700 select-none">Female</div>
                            </label>
                        </div>
                    </div>

                    <div class="mb-5">
                        <label for="profession" class="block mb-1 font-bold text-gray-700">Profession</label>
                        <input type="profession"
                            class="w-full px-4 py-3 font-medium text-gray-600 rounded-lg shadow-sm focus:outline-none focus:shadow-outline"
                            placeholder="eg. Web Developer">
                    </div>
                </div>

                <div class="{{ $currentStep == 6 ? '' : 'hidden' }}">
                    <div class="mb-5">
                        <label for="email" class="block mb-1 font-bold text-gray-700">Gender</label>

                        <div class="flex">
                            <label
                                class="flex items-center justify-start py-3 pl-4 pr-6 mr-4 bg-white rounded-lg shadow-sm text-truncate">
                                <div class="mr-3 text-teal-600">
                                    <input type="radio" value="Male" class="form-radio focus:outline-none focus:shadow-outline" />
                                </div>
                                <div class="text-gray-700 select-none">Male</div>
                            </label>

                            <label
                                class="flex items-center justify-start py-3 pl-4 pr-6 bg-white rounded-lg shadow-sm text-truncate">
                                <div class="mr-3 text-teal-600">
                                    <input type="radio" value="Female" class="form-radio focus:outline-none focus:shadow-outline" />
                                </div>
                                <div class="text-gray-700 select-none">Female</div>
                            </label>
                        </div>
                    </div>

                    <div class="mb-5">
                        <label for="profession" class="block mb-1 font-bold text-gray-700">Profession</label>
                        <input type="profession"
                            class="w-full px-4 py-3 font-medium text-gray-600 rounded-lg shadow-sm focus:outline-none focus:shadow-outline"
                            placeholder="eg. Web Developer">
                    </div>
                </div>

                <div class="{{ $currentStep == 7 ? '' : 'hidden' }}">
                    <div class="mb-5">
                        <label for="email" class="block mb-1 font-bold text-gray-700">Gender</label>

                        <div class="flex">
                            <label
                                class="flex items-center justify-start py-3 pl-4 pr-6 mr-4 bg-white rounded-lg shadow-sm text-truncate">
                                <div class="mr-3 text-teal-600">
                                    <input type="radio" value="Male" class="form-radio focus:outline-none focus:shadow-outline" />
                                </div>
                                <div class="text-gray-700 select-none">Male</div>
                            </label>

                            <label
                                class="flex items-center justify-start py-3 pl-4 pr-6 bg-white rounded-lg shadow-sm text-truncate">
                                <div class="mr-3 text-teal-600">
                                    <input type="radio" value="Female" class="form-radio focus:outline-none focus:shadow-outline" />
                                </div>
                                <div class="text-gray-700 select-none">Female</div>
                            </label>
                        </div>
                    </div>

                    <div class="mb-5">
                        <label for="profession" class="block mb-1 font-bold text-gray-700">Profession</label>
                        <input type="profession"
                            class="w-full px-4 py-3 font-medium text-gray-600 rounded-lg shadow-sm focus:outline-none focus:shadow-outline"
                            placeholder="eg. Web Developer">
                    </div>
                </div>

                <div class="{{ $currentStep == 8 ? '' : 'hidden' }}">
                    <div class="mb-5">
                        <label for="email" class="block mb-1 font-bold text-gray-700">Gender</label>

                        <div class="flex">
                            <label
                                class="flex items-center justify-start py-3 pl-4 pr-6 mr-4 bg-white rounded-lg shadow-sm text-truncate">
                                <div class="mr-3 text-teal-600">
                                    <input type="radio" value="Male" class="form-radio focus:outline-none focus:shadow-outline" />
                                </div>
                                <div class="text-gray-700 select-none">Male</div>
                            </label>

                            <label
                                class="flex items-center justify-start py-3 pl-4 pr-6 bg-white rounded-lg shadow-sm text-truncate">
                                <div class="mr-3 text-teal-600">
                                    <input type="radio" value="Female" class="form-radio focus:outline-none focus:shadow-outline" />
                                </div>
                                <div class="text-gray-700 select-none">Female</div>
                            </label>
                        </div>
                    </div>

                    <div class="mb-5">
                        <label for="profession" class="block mb-1 font-bold text-gray-700">Profession</label>
                        <input type="profession"
                            class="w-full px-4 py-3 font-medium text-gray-600 rounded-lg shadow-sm focus:outline-none focus:shadow-outline"
                            placeholder="eg. Web Developer">
                    </div>
                </div>

                <div class="{{ $currentStep == 9 ? '' : 'hidden' }}">
                    <div class="mb-5">
                        <label for="email" class="block mb-1 font-bold text-gray-700">Gender</label>

                        <div class="flex">
                            <label
                                class="flex items-center justify-start py-3 pl-4 pr-6 mr-4 bg-white rounded-lg shadow-sm text-truncate">
                                <div class="mr-3 text-teal-600">
                                    <input type="radio" value="Male" class="form-radio focus:outline-none focus:shadow-outline" />
                                </div>
                                <div class="text-gray-700 select-none">Male</div>
                            </label>

                            <label
                                class="flex items-center justify-start py-3 pl-4 pr-6 bg-white rounded-lg shadow-sm text-truncate">
                                <div class="mr-3 text-teal-600">
                                    <input type="radio" value="Female" class="form-radio focus:outline-none focus:shadow-outline" />
                                </div>
                                <div class="text-gray-700 select-none">Female</div>
                            </label>
                        </div>
                    </div>

                    <div class="mb-5">
                        <label for="profession" class="block mb-1 font-bold text-gray-700">Profession</label>
                        <input type="profession"
                            class="w-full px-4 py-3 font-medium text-gray-600 rounded-lg shadow-sm focus:outline-none focus:shadow-outline"
                            placeholder="eg. Web Developer">
                    </div>
                </div>
            </div>

        </div>

        <!-- Bottom Navigation -->
        <div x-data="{ isHidden: true }" class="sticky bottom-0 left-0 right-0 z-20 flex flex-col justify-center max-w-screen-lg mx-auto align-middle rounded-b-md">

            <!-- Bottom Navigation 1 -->
            {{-- <div x-data @scroll.window="isHidden = (window.scrollY > 300) ? false : true" class="relative flex flex-col justify-center w-full py-1 bg-white px-14" :class="{'hidden' : isHidden}">

                <!-- Progress Bar -->
                <div class="flex items-center justify-end w-full mb-2">
                    <div class="relative mr-2 progress-bar-width">
                        <div class="absolute bottom-0 right-0 z-20 h-2 text-xs leading-none text-center text-white border-black rounded-full top-px left-px bg-accent border-1" style="width: {{ $currentStep / $totalSteps * 100 }}%;"></div>
                        <div class="rounded-full bg-accent-dark border-1 border-black text-xs leading-none h-2.5 text-center text-white relative z-10"></div>
                    </div>
                    <div class="w-10 font-bold text-gray-900 text-md text-end">{{ intval($currentStep / $totalSteps * 100) }}%</div>
                </div>

                <!-- Progress Navigation -->
                <div class="flex flex-col-reverse w-full md:flex-row">

                    <div class="flex flex-row items-center w-full">
                        <nav class="flex w-full" aria-label="Progress">
                            <ol role="list" class="flex flex-col w-full border border-gray-300 divide-y divide-gray-300 rounded-md md:flex-row md:flex md:divide-y-0">
                              <li class="relative md:flex-1 md:flex">
                                <!-- Completed Step -->
                                <a href="#" class="flex items-center w-full group">
                                  <span class="flex items-center px-6 py-4 text-sm font-medium">
                                    <span class="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-indigo-600 rounded-full group-hover:bg-indigo-800">
                                      <!-- Heroicon name: solid/check -->
                                      <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                      </svg>
                                    </span>
                                    <span class="ml-4 text-sm font-medium text-gray-900">Job details</span>
                                  </span>
                                </a>

                                <!-- Arrow separator for lg screens and up -->
                                <div class="absolute top-0 right-0 hidden w-5 h-full md:block" aria-hidden="true">
                                  <svg class="w-full h-full text-gray-300" viewBox="0 0 22 80" fill="none" preserveAspectRatio="none">
                                    <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor" stroke-linejoin="round" />
                                  </svg>
                                </div>
                              </li>

                              <li class="relative md:flex-1 md:flex">
                                <!-- Current Step -->
                                <a href="#" class="flex items-center px-6 py-4 text-sm font-medium" aria-current="step">
                                  <span class="flex items-center justify-center flex-shrink-0 w-10 h-10 border-2 border-indigo-600 rounded-full">
                                    <span class="text-indigo-600">02</span>
                                  </span>
                                  <span class="ml-4 text-sm font-medium text-indigo-600">Application form</span>
                                </a>

                                <!-- Arrow separator for lg screens and up -->
                                <div class="absolute top-0 right-0 hidden w-5 h-full md:block" aria-hidden="true">
                                  <svg class="w-full h-full text-gray-300" viewBox="0 0 22 80" fill="none" preserveAspectRatio="none">
                                    <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor" stroke-linejoin="round" />
                                  </svg>
                                </div>
                              </li>

                              <li class="relative md:flex-1 md:flex">
                                <!-- Upcoming Step -->
                                <a href="#" class="flex items-center group">
                                  <span class="flex items-center px-6 py-4 text-sm font-medium">
                                    <span class="flex items-center justify-center flex-shrink-0 w-10 h-10 border-2 border-gray-300 rounded-full group-hover:border-gray-400">
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
            <div class="flex justify-between w-full py-2 shadow-lg px-14 bg-accent-dark rounded-b-md">
                <div class="w-1/3">

                    <button type="button"
                            wire:click.prevent="prevStep"
                            class="{{ $currentStep > 0 ? '' : 'hidden' }} inline-flex min-w-36 justify-center h-full items-center border border-transparent rounded-md shadow-md text-md font-medium text-white bg-accent bg-accent_hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <div wire:loading wire:target="prevStep">
                            <x-loading-blocks />
                        </div>
                        <div class="flex items-center justify-between w-full p-2 font-bold text-white text-md" wire:loading.remove wire:target="prevStep">
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
                        <div class="flex items-center justify-between w-full p-2 font-bold text-white text-md" wire:loading.remove wire:target="validateStep">
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
