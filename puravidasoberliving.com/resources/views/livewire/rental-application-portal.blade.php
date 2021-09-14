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
                    {{-- <div class="flex items-center justify-end w-full mt-2">
                        <div class="relative mr-2 progress-bar-width">
                            <div class="absolute bottom-0 right-0 z-20 h-2 text-xs leading-none text-center text-white border-black rounded-full top-px left-px bg-accent border-1" style="width: {{ $currentStep / $totalSteps * 100 }}%;"></div>
                            <div class="rounded-full bg-accent-dark border-1 border-black text-xs leading-none h-2.5 text-center text-white relative z-10"></div>
                        </div>
                        <div class="w-10 font-bold text-gray-900 text-md text-end">{{ intval($currentStep / $totalSteps * 100) }}%</div>
                    </div> --}}

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

                        <form id="personalInformationForm" wire:submit.prevent="completeStep" action="/apply-now" method="POST" class="relative z-10 flex flex-col gap-6">
                            @csrf

                            <div class="flex justify-between items-center w-full">

                                <div class="flex w-1/2">

                                    <h3 class="font-black text-2xl text-gray-900">
                                        Applicant Information
                                    </h3>

                                </div>

                            </div>

                            {{-- FORM ROW 1 --}}
                            <div class="flex flex-col md:flex-row">
                                <div class="w-full w-45">
                                    <label for="personalInfo.firstName" class="block text-lg font-black text-gray-700">First name</label>
                                    <div class="mt-1">
                                        <input wire:model="personalInfo.firstName" type="text" name="personalInfo.firstName" id="personalInfo.firstName" required autocomplete="given-name" value="personalInfo.firstName" class="@error('personalInfo.firstName') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                        @error('personalInfo.firstName')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full w-10per md:px-2">
                                    <label for="personalInfo.middleInitial" class="block text-lg font-black text-gray-700">Middle Init.</label>
                                    <div class="mt-1">
                                        <input wire:model="personalInfo.middleInitial" type="text" name="personalInfo.middleInitial" id="personalInfo.middleInitial" required autocomplete="additional-name" value="personalInfo.middleInitial" class="@error('personalInfo.middleInitial') is-invalid @enderror px-3 py-2 block md:w-full w-2/5 shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                        @error('personalInfo.middleInitial')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full w-45">
                                    <label for="personalInfo.lastName" class="block text-lg font-black text-gray-700">Last name</label>
                                    <div class="mt-1">
                                        <input wire:model="personalInfo.lastName" type="text" name="personalInfo.lastName" id="personalInfo.lastName" required autocomplete="family-name" value="personalInfo.lastName" class="@error('personalInfo.lastName') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
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
                                    <label for="personalInfo.dateOfBirth" class="block text-lg font-black text-gray-700">Date of Birth</label>
                                    <div class="mt-1">
                                        @php
                                            $today = \Carbon\Carbon::now()->format('Y-m-d');
                                        @endphp
                                        <input wire:model="personalInfo.dateOfBirth" type="date" name="personalInfo.dateOfBirth" id="personalInfo.dateOfBirth" required autocomplete="bday" value="{{ $today }}" class="@error('personalInfo.dateOfBirth') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                        @error('personalInfo.dateOfBirth')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full md:px-2">
                                    <label for="personalInfo.socialNumber" class="block text-lg font-black text-gray-700">Social Security Number</label>
                                    <div class="mt-1">
                                        <input wire:model="personalInfo.socialNumber" type="text" name="personalInfo.socialNumber" id="personalInfo.socialNumber" required autocomplete="ssn" value="personalInfo.socialNumber" class="@error('personalInfo.socialNumber') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                        @error('personalInfo.socialNumber')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full">
                                    <label for="personalInfo.phone" class="block text-lg font-black text-gray-700">Phone</label>
                                    <div class="mt-1">
                                        <input wire:model="personalInfo.phone" type="tel" name="personalInfo.phone" id="personalInfo.phone" required autocomplete="tel" value="personalInfo.phone" class="@error('personalInfo.phone') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                        @error('personalInfo.phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>

                </div>

                <div class="{{ $currentStep == 1 ? '' : 'hidden' }}">

                    <div class="relative mt-12">

                        <form id="emergencyContactForm" wire:submit.prevent="completeStep" action="/apply-now" method="POST" class="relative z-10 flex flex-col gap-6">
                            @csrf

                            <div class="flex justify-between items-center w-full">

                                <div class="flex w-1/2">

                                    <h3 class="font-black text-2xl text-gray-900">
                                        Primary Contact
                                    </h3>

                                </div>

                            </div>

                            {{-- FORM ROW 1 --}}
                            <div class="flex flex-col md:flex-row">
                                <div class="w-full">
                                    <label for="emergencyContactInfo.firstNameEmContact" class="block text-lg font-black text-gray-700">First Name</label>
                                    <div class="mt-1">
                                        <input wire:model="emergencyContactInfo.firstNameEmContact" type="text" name="emergencyContactInfo.firstNameEmContact" id="emergencyContactInfo.firstNameEmContact" required autocomplete="given-name" value="emergencyContactInfo.firstNameEmContact" class="@error('emergencyContactInfo.firstNameEmContact') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                        @error('emergencyContactInfo.firstNameEmContact')
                                            <div class="flex w-full invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full md:px-2">
                                    <label for="emergencyContactInfo.lastNameEmContact" class="block text-lg font-black text-gray-700">Last Name</label>
                                    <div class="mt-1">
                                        <input wire:model="emergencyContactInfo.lastNameEmContact" type="text" name="emergencyContactInfo.lastNameEmContact" id="emergencyContactInfo.lastNameEmContact" required autocomplete="family-name" value="emergencyContactInfo.lastNameEmContact" class="@error('emergencyContactInfo.lastNameEmContact') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                        @error('emergencyContactInfo.lastNameEmContact')
                                            <div class="flex w-full invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full">
                                    <label for="emergencyContactInfo.phoneEmContact" class="block text-lg font-black text-gray-700">Contact Number</label>
                                    <div class="mt-1">
                                        <input wire:model="emergencyContactInfo.phoneEmContact" type="tel" name="emergencyContactInfo.phoneEmContact" id="emergencyContactInfo.phoneEmContact" required autocomplete="tel" value="emergencyContactInfo.phoneEmContact" class="@error('emergencyContactInfo.phoneEmContact') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                        @error('emergencyContactInfo.phoneEmContact')
                                            <div class="flex w-full invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- FORM ROW 2 --}}
                            <div class="flex flex-col md:flex-row mb-5">
                                <div class="w-full">
                                    <label for="emergencyContactInfo.cityEmContact" class="block text-lg font-black text-gray-700">City</label>
                                    <div class="mt-1">
                                        <input wire:model="emergencyContactInfo.cityEmContact" type="text" name="emergencyContactInfo.cityEmContact" id="emergencyContactInfo.cityEmContact" required autocomplete="ship-city" value="emergencyContactInfo.cityEmContact" class="@error('emergencyContactInfo.cityEmContact') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                        @error('emergencyContactInfo.cityEmContact')
                                            <div class="flex w-full invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
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
                                                <option  value="{{ $key . ': ' . $state }}">{{ $state }}</option>
                                            @endforeach
                                        </select>
                                        @error('emergencyContactInfo.stateEmContact')
                                            <div class="flex w-full invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
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
                                            <div class="flex w-full invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            {{-- ADDITIONAL EMERGENCY CONTACTS --}}
                            @foreach ($additionalEmergencyContactInfo as $emergencyContactInputGroup)

                                <div class="flex justify-between items-center w-full mt-5">

                                    <div class="flex w-1/2">

                                        <h3 class="font-black text-2xl text-gray-900">
                                            Alternative Contact #{{ $loop->index + 1 }}
                                        </h3>

                                    </div>

                                    <div class="flex w-1/2 justify-content-end">

                                        <button type="button"
                                                wire:click.prevent="removeEmergencyContact({{ $loop->index }})"
                                                class="inline-flex items-center justify-center h-full font-medium text-white border border-transparent rounded-md shadow-md min-w-36 text-md bg-red-500 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            <div wire:loading wire:target="removeEmergencyContact({{ $loop->index }})">
                                                <x-loading-blocks />
                                            </div>
                                            <div class="flex items-center justify-between w-full p-2 font-bold text-white text-md" wire:loading.remove wire:target="removeEmergencyContact({{ $loop->index }})">
                                                <img class="flex mr-2" src="/svg/remove-user-icon.svg" alt="Add Another Emergency Contact">
                                                Remove Emergency Contact
                                            </div>
                                        </button>

                                    </div>

                                </div>

                                {{-- FORM ROW 1 --}}
                                <div class="flex flex-col md:flex-row">
                                    <div class="w-1/3">
                                        <label for="additionalEmergencyContactInfo.{{ $loop->index }}.firstNameEmContact" class="block text-lg font-black text-gray-700">First Name</label>
                                        <div class="mt-1">
                                            <input wire:model="additionalEmergencyContactInfo.{{ $loop->index }}.firstNameEmContact" type="text" name="additionalEmergencyContactInfo.{{ $loop->index }}.firstNameEmContact" id="additionalEmergencyContactInfo.{{ $loop->index }}.firstNameEmContact" required autocomplete="given-name" value="additionalEmergencyContactInfo.{{ $loop->index }}.firstNameEmContact" class="@error("additionalEmergencyContactInfo.{$loop->index}.firstNameEmContact") is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                            @error("additionalEmergencyContactInfo.{$loop->index}.firstNameEmContact")
                                                <div class="flex w-full invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="w-1/3 md:px-2">
                                        <label for="additionalEmergencyContactInfo.{{ $loop->index }}.lastNameEmContact" class="block text-lg font-black text-gray-700">Last Name</label>
                                        <div class="mt-1">
                                            <input wire:model="additionalEmergencyContactInfo.{{ $loop->index }}.lastNameEmContact" type="text" name="additionalEmergencyContactInfo.{{ $loop->index }}.lastNameEmContact" id="additionalEmergencyContactInfo.{{ $loop->index }}.lastNameEmContact" required autocomplete="family-name" value="additionalEmergencyContactInfo.{{ $loop->index }}.lastNameEmContact" class="@error("additionalEmergencyContactInfo.{$loop->index}.lastNameEmContact") is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                            @error("additionalEmergencyContactInfo.{$loop->index}.lastNameEmContact")
                                                <div class="flex w-full invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="w-1/3">
                                        <label for="additionalEmergencyContactInfo.{{ $loop->index }}.phoneEmContact" class="block text-lg font-black text-gray-700">Contact Number</label>
                                        <div class="mt-1">
                                            <input wire:model="additionalEmergencyContactInfo.{{ $loop->index }}.phoneEmContact" type="tel" name="additionalEmergencyContactInfo.{{ $loop->index }}.phoneEmContact" id="additionalEmergencyContactInfo.{{ $loop->index }}.phoneEmContact" required autocomplete="tel" value="additionalEmergencyContactInfo.{{ $loop->index }}.phoneEmContact" class="@error("additionalEmergencyContactInfo.{$loop->index}.phoneEmContact") is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                            @error("additionalEmergencyContactInfo.{$loop->index}.phoneEmContact")
                                                <div class="flex w-full invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- FORM ROW 2 --}}
                                <div class="flex flex-col md:flex-row mb-5">
                                    <div class="w-1/3">
                                        <label for="additionalEmergencyContactInfo.{{ $loop->index }}.cityEmContact" class="block text-lg font-black text-gray-700">City</label>
                                        <div class="mt-1">
                                            <input wire:model="additionalEmergencyContactInfo.{{ $loop->index }}.cityEmContact" type="text" name="additionalEmergencyContactInfo.{{ $loop->index }}.cityEmContact" id="additionalEmergencyContactInfo.{{ $loop->index }}.cityEmContact" required autocomplete="ship-city" value="additionalEmergencyContactInfo.{{ $loop->index }}.cityEmContact" class="@error("additionalEmergencyContactInfo.{$loop->index}.cityEmContact") is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                            @error("additionalEmergencyContactInfo.{$loop->index}.cityEmContact")
                                                <div class="flex w-full invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="w-1/3 md:px-2">
                                        <label for="additionalEmergencyContactInfo.{{ $loop->index }}.stateEmContact" class="block text-lg font-black text-gray-700">State</label>
                                        <div class="mt-1">
                                            <label for="additionalEmergencyContactInfo.{{ $loop->index }}.stateEmContact" class="sr-only">State</label>
                                            <select wire:model="additionalEmergencyContactInfo.{{ $loop->index }}.stateEmContact" id="additionalEmergencyContactInfo.{{ $loop->index }}.stateEmContact" name="additionalEmergencyContactInfo.{{ $loop->index }}.stateEmContact" value="additionalEmergencyContactInfo.{{ $loop->index }}.stateEmContact" class="@error("additionalEmergencyContactInfo.{$loop->index}.stateEmContact") is-invalid @enderror z-10 block w-full px-3 py-2 text-gray-900 border-gray-300 rounded-md shadow-lg focus:ring-indigo-500 focus:border-indigo-500">
                                                <option  value="">Select</option>
                                                @php
                                                    sort($us_state_abbrevs_names)
                                                @endphp
                                                @foreach ($us_state_abbrevs_names as $key => $state)
                                                    <option  value="{{ $key }}">{{ $state }}</option>
                                                @endforeach
                                            </select>
                                            @error("additionalEmergencyContactInfo.{$loop->index}.stateEmContact")
                                                <div class="flex w-full invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="w-1/3">
                                        <label for="additionalEmergencyContactInfo.{{ $loop->index }}.relationshipEmContact" class="block text-lg font-black text-gray-700">Relationship</label>
                                        <div class="mt-1">
                                            <label for="additionalEmergencyContactInfo.{{ $loop->index }}.relationshipEmContact" class="sr-only">Relationship</label>
                                            <select wire:model="additionalEmergencyContactInfo.{{ $loop->index }}.relationshipEmContact" id="additionalEmergencyContactInfo.{{ $loop->index }}.relationshipEmContact" name="additionalEmergencyContactInfo.{{ $loop->index }}.relationshipEmContact" value="additionalEmergencyContactInfo.{{ $loop->index }}.relationshipEmContact" class="@error("additionalEmergencyContactInfo.{$loop->index}.relationshipEmContact") is-invalid @enderror z-10 block w-full px-3 py-2 text-gray-900 border-gray-300 rounded-md shadow-lg focus:ring-indigo-500 focus:border-indigo-500">
                                                <option  value="">Select</option>
                                                @php
                                                    sort($relationalStatuses)
                                                @endphp
                                                @foreach ($relationalStatuses as $key => $relation)
                                                    <option  value="{{ $key . ': ' . $relation }}">{{ $relation }}</option>
                                                @endforeach
                                            </select>
                                            @error("additionalEmergencyContactInfo.{$loop->index}.relationshipEmContact")
                                                <div class="flex w-full invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                            @endforeach

                            {{-- ADD EMERGENCY CONTACT --}}
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

                    </div>

                </div>

                <div class="{{ $currentStep == 2 ? '' : 'hidden' }}">

                    <div class="relative mt-12">

                        <form id="LegalInformationForm" wire:submit.prevent="completeStep" action="/apply-now" method="POST" class="relative z-10 flex flex-col gap-6">
                            @csrf

                            <div class="flex justify-between items-center w-full">

                                <div class="flex w-1/2">

                                    <h3 class="font-black text-2xl text-gray-900">
                                        Legal Questions
                                    </h3>

                                </div>

                            </div>

                            {{-- FORM ROW 1 --}}
                            <div class="flex flex-col md:flex-row">
                                <div class="grid w-full grid-cols-1 lg:grid-cols-2">
                                    <label for="legalInfo.isSexOffender" class="inline-flex mt-2 text-lg font-black text-red-500 md:mt-0">Are you a registered sex offender?</label>
                                    <fieldset class="@error("legalInfo.isSexOffender") is-invalid @enderror mt-2 mr-2 md:mt-0" id="legalInfo.isSexOffender">
                                        <label class="inline-flex text-lg font-black text-red-500">Yes</label>
                                        <input wire:model="legalInfo.isSexOffender" type="radio" value="1" name="legalInfo.isSexOffender">
                                        <label class="inline-flex ml-2 text-lg font-black text-red-500">No</label>
                                        <input wire:model="legalInfo.isSexOffender" type="radio" value="0" name="legalInfo.isSexOffender">
                                        @error("legalInfo.isSexOffender")
                                            <div class="flex w-full invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </fieldset>
                                    <label for="legalInfo.isArsonist" class="inline-flex mt-2 text-lg font-black text-red-500 md:mt-0">Have you ever be convicted of arson?</label>
                                    <fieldset class="@error("legalInfo.isArsonist") is-invalid @enderror mt-2 mr-2 md:mt-0" id="legalInfo.isArsonist">
                                        <label class="inline-flex text-lg font-black text-red-500">Yes</label>
                                        <input wire:model="legalInfo.isArsonist" type="radio" value="1" name="legalInfo.isArsonist">
                                        <label class="inline-flex ml-2 text-lg font-black text-red-500">No</label>
                                        <input wire:model="legalInfo.isArsonist" type="radio" value="0" name="legalInfo.isArsonist">
                                        @error("legalInfo.isArsonist")
                                            <div class="flex w-full invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </fieldset>
                                    <label for="legalInfo.isKidnapper" class="inline-flex mt-2 text-lg font-black text-red-500 md:mt-0">Have you ever be convicted of kidnapping?</label>
                                    <fieldset class="@error("legalInfo.isKidnapper") is-invalid @enderror mt-2 mr-2 md:mt-0" id="legalInfo.isKidnapper">
                                        <label class="inline-flex text-lg font-black text-red-500">Yes</label>
                                        <input wire:model="legalInfo.isKidnapper" type="radio" value="1" name="legalInfo.isKidnapper">
                                        <label class="inline-flex ml-2 text-lg font-black text-red-500">No</label>
                                        <input wire:model="legalInfo.isKidnapper" type="radio" value="0" name="legalInfo.isKidnapper">
                                        @error("legalInfo.isKidnapper")
                                            <div class="flex w-full invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </fieldset>
                                </div>
                            </div>

                            {{-- FORM ROW 2 --}}
                            <div class="grid w-full grid-cols-1">
                                <div class="grid grid-cols-2 content-center mb-4">
                                    <label for="legalInfo.onLegalSupervision" class="inline-flex text-lg font-black text-gray-900">Are you on legal supervision?</label>
                                    <fieldset class="@error("legalInfo.onLegalSupervision") is-invalid @enderror" id="legalInfo.onLegalSupervision">
                                        <label class="inline-flex text-lg font-black text-gray-900">Yes</label>
                                        <input wire:model="legalInfo.onLegalSupervision" type="radio" value="1" name="legalInfo.onLegalSupervision" />
                                        <label class="inline-flex ml-2 text-lg font-black text-gray-900">No</label>
                                        <input wire:model="legalInfo.onLegalSupervision" type="radio" value="0" name="legalInfo.onLegalSupervision" />
                                        @error("legalInfo.onLegalSupervision")
                                            <div class="flex w-full invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </fieldset>
                                </div>

                                {{-- Legal Supervisor Info --}}
                                <div class="flex flex-col {{ $legalInfo['onLegalSupervision'] == 0 || $legalInfo['onLegalSupervision'] == null ? 'hidden' : '' }}">
                                    {{-- ROW 1 --}}
                                    <div class="flex flex-col md:flex-row">

                                        <div class="w-full">
                                            <label for="legalInfo.firstName" class="block text-lg font-black text-gray-700">First Name</label>
                                            <div class="mt-1">
                                                <input wire:model="legalInfo.firstName" type="text" name="legalInfo.firstName" id="firstName" required autocomplete="given-name" value="legalInfo.firstName" class="@error('legalInfo.firstName') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                                @error('legalInfo.firstName')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="w-full md:pl-2">
                                            <label for="legalInfo.lastName" class="block text-lg font-black text-gray-700">Last Name</label>
                                            <div class="mt-1">
                                                <input wire:model="legalInfo.lastName" type="text" name="legalInfo.lastName" id="legalInfo.lastName" required autocomplete="family-name" value="legalInfo.lastName" class="@error('legalInfo.lastName') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                                @error('legalInfo.lastName')
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
                                            <label for="legalInfo.agency" class="block text-lg font-black text-gray-700">Agency</label>
                                            <div class="mt-1">
                                                <input wire:model="legalInfo.agency" type="text" name="legalInfo.agency" id="legalInfo.agency" required autocomplete="organization" value="legalInfo.agency" class="@error('legalInfo.agency') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                                @error('legalInfo.agency')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="w-full md:pl-2">
                                            <label for="legalInfo.phone" class="block text-lg font-black text-gray-700">Contact Number</label>
                                            <div class="mt-1">
                                                <input wire:model="legalInfo.phone" type="tel" name="legalInfo.phone" id="legalInfo.phone" required autocomplete="tel" value="legalInfo.phone" class="@error('legalInfo.phone') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                                @error('legalInfo.phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            {{-- FORM ROW 3 --}}
                            <div class="grid w-full grid-cols-1">

                                <div class="flex justify-between items-center w-full">

                                    <div class="flex flex-col w-full">

                                        <h3 class="font-black text-2xl text-gray-900">
                                            List all convictions in the past ten (10) years:
                                        </h3>

                                        <div class="grid grid-cols-1 mb-5">

                                            @foreach ($legalInfo['convictions'] as $input)

                                                <div class="w-full mt-4">
                                                    <div class="flex">



                                                        <div class="flex w-full justify-content-between">

                                                            <label for="legalInfo.convictions.{{ $loop->index }}" class="block text-lg font-black text-gray-700">
                                                                Conviction #{{ $loop->index + 1 }}
                                                            </label>

                                                            <button type="button"
                                                                    wire:click.prevent="removeConviction({{ $loop->index }})"
                                                                    class="inline-flex items-center justify-center h-full p-2 font-medium text-white border border-transparent rounded-md shadow-md min-w-36 text-md bg-red-500 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                                <div wire:loading wire:target="removeConviction({{ $loop->index }})">
                                                                    <x-loading-blocks />
                                                                </div>
                                                                <div class="flex items-center justify-between w-full font-bold text-white text-md" wire:loading.remove wire:target="removeConviction({{ $loop->index }})">
                                                                    <img class="flex mr-2" src="/svg/remove-user-icon.svg" alt="Romove Conviction">
                                                                    Remove Conviction
                                                                </div>
                                                            </button>

                                                        </div>

                                                    </div>

                                                    <div class="mt-1">
                                                        <input wire:model="legalInfo.convictions.{{ $loop->index }}" type="text" name="legalInfo.convictions.{{ $loop->index }}" id="legalInfo.convictions.{{ $loop->index }}" required autocomplete="given-name" value="legalInfo.convictions.{{ $loop->index }}" class="@error("legalInfo.convictions.{$loop->index}") is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                                        @error("legalInfo.convictions.{$loop->index}")
                                                            <div class="flex w-full invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                            @endforeach

                                        </div>

                                        {{-- ADD CONVICTION --}}
                                        <div class="flex justify-end w-full">

                                            <button type="button"
                                                    wire:click.prevent="addConviction"
                                                    class="inline-flex items-center justify-center h-full font-medium text-white border border-transparent rounded-md shadow-md min-w-36 text-md bg-accent bg-accent_hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                <div wire:loading wire:target="addConviction">
                                                    <x-loading-blocks />
                                                </div>
                                                <div class="flex items-center justify-between w-full p-2 font-bold text-white text-md" wire:loading.remove wire:target="addConviction">
                                                    <img class="flex mr-2" src="/svg/register-icon.svg" alt="Add Another Conviction">
                                                    Add Conviction
                                                </div>
                                            </button>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

                <div class="{{ $currentStep == 3 ? '' : 'hidden' }}">

                    <div class="relative mt-12">

                        <form id="medicalInformationForm" wire:submit.prevent="completeStep" action="/apply-now" method="POST" class="relative z-10 flex flex-col gap-6">
                            @csrf

                            <div class="flex justify-between items-center w-full">

                                <div class="flex w-1/2">

                                    <h3 class="font-black text-2xl text-gray-900">
                                        Medical Questions
                                    </h3>

                                </div>

                            </div>

                            {{-- FORM ROW 2 --}}
                            <div class="grid w-full grid-cols-1">
                                <div class="grid grid-cols-2 content-center mb-4">
                                    <label for="medicalInfo.hasScripts" class="inline-flex text-lg font-black text-red-500 md:mt-0">
                                        Are you currently prescribed any medications?
                                    </label>
                                    <fieldset class="@error("medicalInfo.hasScripts") is-invalid @enderror" id="medicalInfo.hasScripts">
                                        <label class="inline-flex text-lg font-black text-red-500">Yes</label>
                                        <input wire:model="medicalInfo.hasScripts" type="radio" value="1" name="medicalInfo.hasScripts" />
                                        <label class="inline-flex ml-2 text-lg font-black text-red-500">No</label>
                                        <input wire:model="medicalInfo.hasScripts" type="radio" value="0" name="medicalInfo.hasScripts" />
                                        @error("medicalInfo.hasScripts")
                                            <div class="flex w-full invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </fieldset>
                                </div>

                                {{-- Legal Supervisor Info --}}


                            </div>

                            {{-- FORM ROW 3 --}}
                            <div class="{{ $medicalInfo['hasScripts'] == 0 || $medicalInfo['hasScripts'] == null ? 'hidden' : '' }} grid w-full grid-cols-1">

                                <div class="flex justify-between items-center w-full">

                                    <div class="flex flex-col w-full">

                                        <h3 class="font-black text-2xl text-gray-900">
                                            Please list all perscribed medications:
                                        </h3>

                                        <div class="grid grid-cols-1 mb-5">

                                            @foreach ($medicalInfo['medications'] as $input)

                                                <div class="w-full mt-4">
                                                    <div class="flex ">

                                                        <div class="flex w-full justify-content-between">

                                                            <label for="medicalInfo.medications.{{ $loop->index }}" class="block text-lg font-black text-gray-700">
                                                                Medication #{{ $loop->index + 1 }}
                                                            </label>

                                                            <button type="button"
                                                                    wire:key="{{ $loop->index }}"
                                                                    wire:click.prevent="removeMedication({{ $loop->index }})"
                                                                    class="{{ $loop->index == 0 ? 'hidden' : '' }} inline-flex items-center justify-center h-full p-2 font-medium text-white border border-transparent rounded-md shadow-md min-w-36 text-md bg-red-500 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                                <div wire:loading wire:target="removeMedication({{ $loop->index }})">
                                                                    <x-loading-blocks />
                                                                </div>
                                                                <div class="flex items-center justify-between w-full font-bold text-white text-md" wire:loading.remove wire:target="removeMedication({{ $loop->index }})">
                                                                    <img class="flex mr-2" src="/svg/remove-user-icon.svg" alt="Romove Medication">
                                                                    Remove Medication
                                                                </div>
                                                            </button>

                                                        </div>

                                                    </div>

                                                    <div class="mt-1">
                                                        <input wire:model="medicalInfo.medications.{{ $loop->index  }}" type="text" name="medicalInfo.medications.{{ $loop->index }}" id="medicalInfo.medications.{{ $loop->index }}" required autocomplete="given-name" value="medicalInfo.medications.{{ $loop->index }}" class="@error("medicalInfo.medications.{$loop->index}") is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                                        @error("medicalInfo.medications.{$loop->index}")
                                                            <div class="flex w-full invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                            @endforeach

                                        </div>

                                        {{-- ADD MEDICATION --}}
                                        <div class="flex justify-end w-full">

                                            <button type="button"
                                                    wire:click.prevent="addMedication"
                                                    class="inline-flex items-center justify-center h-full font-medium text-white border border-transparent rounded-md shadow-md min-w-36 text-md bg-accent bg-accent_hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                <div wire:loading wire:target="addMedication">
                                                    <x-loading-blocks />
                                                </div>
                                                <div class="flex items-center justify-between w-full p-2 font-bold text-white text-md" wire:loading.remove wire:target="addMedication">
                                                    <img class="flex mr-2" src="/svg/register-icon.svg" alt="Add Another Medication">
                                                    Add Medication
                                                </div>
                                            </button>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            {{-- FORM ROW 4 --}}
                            <div class="grid grid-cols-1">

                                <div class="flex justify-between items-center w-full">

                                    <div class="flex flex-col w-full">

                                        <h3 class="font-black text-2xl text-gray-900">
                                            Please list drug(s) of choice:
                                        </h3>

                                        <div class="grid grid-cols-2 mb-5 gap-4">

                                            {{-- <div class="flex w-1/2"> --}}
                                                
                                                @foreach ($medicalInfo['drugUse']['drugOfChoice'] as $input)

                                                    <div class="w-full mt-4">
                                                        <div class="flex ">

                                                            <div class="flex w-full justify-content-between">

                                                                <label for="medicalInfo.drugUse.drugOfChoice.{{ $loop->index }}" class="block text-lg font-black text-gray-700">
                                                                    Drug of choice #{{ $loop->index + 1 }}
                                                                </label>

                                                                {{-- <button type="button"
                                                                        wire:key="{{ $loop->index }}"
                                                                        wire:click.prevent="removeDrugOfChoice({{ $loop->index }})"
                                                                        class="{{ $loop->index == 0 ? 'hidden' : '' }} inline-flex items-center justify-center h-full p-2 font-medium text-white border border-transparent rounded-md shadow-md min-w-36 text-md bg-red-500 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                                    <div wire:loading wire:target="removeDrugOfChoice({{ $loop->index }})">
                                                                        <x-loading-blocks />
                                                                    </div>
                                                                    <div class="flex items-center justify-between w-full font-bold text-white text-md" wire:loading.remove wire:target="removeDrugOfChoice({{ $loop->index }})">
                                                                        <img class="flex mr-2" src="/svg/remove-user-icon.svg" alt="Romove Drug of Choice">
                                                                        Remove Drug of Choice
                                                                    </div>
                                                                </button> --}}

                                                            </div>

                                                        </div>

                                                        <div class="mt-1">
                                                            <input wire:model="medicalInfo.drugUse.drugOfChoice.{{ $loop->index  }}" type="text" name="medicalInfo.drugUse.drugOfChoice.{{ $loop->index }}" id="medicalInfo.drugUse.drugOfChoice.{{ $loop->index }}" required autocomplete="given-name" value="medicalInfo.drugUse.drugOfChoice.{{ $loop->index }}" class="@error("medicalInfo.drugUse.drugOfChoice.{$loop->index}") is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                                            @error("medicalInfo.drugUse.drugOfChoice.{$loop->index}")
                                                                <div class="flex w-full invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    
                                                @endforeach

                                            {{-- </div> --}}

                                            @foreach ($medicalInfo['drugUse']['lastUse'] as $input)
                                            
                                                    <div class="flex justify-between w-full mt-4">

                                                            <div class="flex flex-col justify-between w-full">
                                                                    <label for="medicalInfo.drugUse.drugOfChoice.{{ $loop->index }}" class="block text-lg font-black text-gray-700">
                                                                        Last use
                                                                    </label>
                                                                <div class="flex justify-between w-full">

                                                                    

                                                                    <div class="mt-1">
                                                                        <input wire:model="medicalInfo.drugUse.drugOfChoice.{{ $loop->index  }}" type="text" name="medicalInfo.drugUse.drugOfChoice.{{ $loop->index }}" id="medicalInfo.drugUse.drugOfChoice.{{ $loop->index }}" required autocomplete="given-name" value="medicalInfo.drugUse.drugOfChoice.{{ $loop->index }}" class="@error("medicalInfo.drugUse.drugOfChoice.{$loop->index}") is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                                                        @error("medicalInfo.drugUse.drugOfChoice.{$loop->index}")
                                                                            <div class="flex w-full invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </div>
                                                                        @enderror

                                                                    </div>
                                                                    
                                                                {{-- </div>

                                                                <div class="w-1/2"> --}}
                                                            
                                                                    <button type="button"
                                                                            wire:key="{{ $loop->index }}"
                                                                            wire:click.prevent="removeDrugOfChoice({{ $loop->index }})"
                                                                            class="inline-flex items-center justify-center h-full p-2 font-medium text-white border border-transparent rounded-md shadow-md  text-md bg-red-500 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                                        <div wire:loading wire:target="removeDrugOfChoice({{ $loop->index }})">
                                                                            <x-loading-blocks />
                                                                        </div>
                                                                        <div class="flex items-center justify-between w-full font-bold text-white text-md" wire:loading.remove wire:target="removeDrugOfChoice({{ $loop->index }})">
                                                                            <img class="flex mr-2" src="/svg/remove-user-icon.svg" alt="Romove Drug of Choice">
                                                                            Remove
                                                                        </div>
                                                                    </button>
                                                                
                                                                </div>

                                                            </div>

                                                    </div>
                                                    
                                            @endforeach

                                        </div>

                                        {{-- ADD DRUG OF CHOICE --}}
                                        <div class="flex justify-end w-full">

                                            <button type="button"
                                                    wire:click.prevent="addDrugOfChoice"
                                                    class="inline-flex items-center justify-center h-full font-medium text-white border border-transparent rounded-md shadow-md min-w-36 text-md bg-accent bg-accent_hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                <div wire:loading wire:target="addDrugOfChoice">
                                                    <x-loading-blocks />
                                                </div>
                                                <div class="flex items-center justify-between w-full p-2 font-bold text-white text-md" wire:loading.remove wire:target="addDrugOfChoice">
                                                    <img class="flex mr-2" src="/svg/register-icon.svg" alt="Add Another Drug of Choice">
                                                    Add Drug of Choice
                                                </div>
                                            </button>

                                        </div>
                                    
                                    </div>

                                </div>

                            </div>

                        </form>

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
        <div class="sticky bottom-0 left-0 right-0 z-20 flex flex-col justify-center max-w-screen-lg mx-auto align-middle rounded-b-md">

            <!-- Bottom Navigation 1 -->
            <div class="relative flex flex-col justify-center w-full py-1 bg-white px-14">

                <!-- Progress Bar -->
                <div class="flex items-center justify-end w-full mb-2 pt-2 border-t-2 border-gray-300">
                    <div class="relative mr-2 progress-bar-width">
                        <div class="absolute bottom-0 right-0 z-20 h-2 text-xs leading-none text-center text-white border-black rounded-full top-px left-px bg-accent border-1" style="width: {{ $currentStep + 1 / $totalSteps * 100 }}%;"></div>
                        <div class="rounded-full bg-accent-dark border-1 border-black text-xs leading-none h-2.5 text-center text-white relative z-10"></div>
                    </div>
                    <div class="w-10 font-bold text-gray-900 text-md text-end">{{ intval($currentStep + 1 / $totalSteps * 100) }}%</div>
                </div>

            </div>

            <!-- Bottom Navigation 2 -->
            <div class="flex justify-between w-full py-2 shadow-lg px-14 bg-gray-600 rounded-b-md">
                <div class="w-1/3">

                    <button type="button"
                            wire:click.prevent="prevStep"
                            class="{{ $currentStep > 0 ? '' : 'hidden' }} inline-flex min-w-36 justify-center h-full items-center border border-transparent rounded-md shadow-md text-md font-medium text-white bg-accent bg-accent_hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <div wire:loading wire:target="prevStep">
                            <x-loading-blocks />
                        </div>
                        <div class="flex items-center justify-between p-2 w-full font-bold text-white text-md" wire:loading.remove wire:target="prevStep">
                            <img class="flex mr-5" src="/svg/angle-double-left.svg" alt="Previous Step">
                            Step {{ $currentStep - 1 < 0 ? 0 : $currentStep . ': ' . $stepTitles[$currentStep - 1 < 0 ? 0 : $currentStep - 1] }}
                        </div>
                    </button>
                </div>

                <div class="w-1/3 text-right">

                    <button type="button"
                            wire:click.prevent="completeStep"
                            class="{{ $currentStep < $totalSteps ? '' : 'hidden' }} inline-flex min-w-36 justify-center h-full items-center py-1 px-2 border border-transparent rounded-md shadow-md text-md font-medium text-white bg-accent bg-accent_hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <div wire:loading wire:target="completeStep">
                            <x-loading-blocks />
                        </div>
                        <div class="flex items-center justify-between p-2 w-full font-bold text-white text-md" wire:loading.remove wire:target="completeStep">
                            Step {{ $currentStep + 2 . ': ' . $stepTitles[$currentStep + 1] }}
                            <img class="flex ml-5" src="/svg/angle-double-right.svg" alt="Next Step">
                        </div>
                    </button>

                    <button wire:click.prevent="rentalAppFormSubmit"
                            class="{{ $currentStep == $totalSteps ? '' : 'hidden' }} w-32 focus:outline-none border border-transparent  rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium">
                        Complete
                    </button>
                </div>
            </div>
        </div>

    </div>

</div>
