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
                                    <div class="{{ $loop->index == count($stepTitles) - 1 ? 'd-none' : '' }} absolute top-0 right-0 hidden w-5 h-full md:block" aria-hidden="true">
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

            </div>

        </div>

        <!-- FORM PAGES -->
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

            <!-- STEP 1 - Personal Information -->
            <div class="{{ $currentStep == 0 ? '' : 'hidden' }}">

                <div class="relative mt-12">

                    <form id="personalInformationForm" wire:submit.prevent="completeStep" action="/apply-now" method="POST" class="relative z-10 flex flex-col gap-6">
                        @csrf

                        {{-- Section Label --}}
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

            <!-- STEP 2 - Emergency Contacts -->
            <div class="{{ $currentStep == 1 ? '' : 'hidden' }}">

                <div class="relative mt-12">

                    <form id="emergencyContactForm" wire:submit.prevent="completeStep" action="/apply-now" method="POST" class="relative z-10 flex flex-col gap-6">
                        @csrf

                        {{-- Section Label --}}
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
                                <label for="identificationInfo.firstNameEmContact" class="block text-lg font-black text-gray-700">First Name</label>
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
                                    <label for="emergencyContactInfo.stateEmContact" class="sr-only">State</label>
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

            <!-- STEP 3 - Legal Information -->
            <div class="{{ $currentStep == 2 ? '' : 'hidden' }}">

                <div class="relative mt-12">

                    <form id="LegalInformationForm" wire:submit.prevent="completeStep" action="/apply-now" method="POST" class="relative z-10 flex flex-col gap-6">
                        @csrf

                        {{-- Section Label --}}
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

            <!-- STEP 4 - Medical Information -->
            <div class="{{ $currentStep == 3 ? '' : 'hidden' }}">

                <div class="relative mt-12">

                    <form id="medicalInformationForm" wire:submit.prevent="completeStep" action="/apply-now" method="POST" class="relative z-10 flex flex-col gap-6">
                        @csrf

                        {{-- Section Label --}}
                        <div class="flex justify-between items-center w-full">

                            <div class="flex w-1/2">

                                <h3 class="font-black text-2xl text-gray-900">
                                    Medical Questions
                                </h3>

                            </div>

                        </div>

                        {{-- FORM ROW 1 --}}
                        <div class="grid w-full grid-cols-1">

                            <div class="grid grid-cols-2 content-center mb-4">

                                <label for="medicalInfo.hasScripts" class="inline-flex text-lg font-black text-red-500 md:mt-0">
                                    Are you currently prescribed any medications?
                                </label>

                                <fieldset class="@error("medicalInfo.hasScripts") is-invalid @enderror" id="medicalInfo.hasScripts">

                                    <label class="inline-flex text-lg font-black text-red-500">Yes</label>
                                    <input wire:model="medicalInfo.hasScripts" wire:click="addMedicationOnYes" type="radio" value="1" name="medicalInfo.hasScripts" />

                                    <label class="inline-flex ml-2 text-lg font-black text-red-500">No</label>
                                    <input wire:model="medicalInfo.hasScripts" type="radio" value="0" name="medicalInfo.hasScripts" />

                                    @error("medicalInfo.hasScripts")
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror

                                </fieldset>

                            </div>

                        </div>

                        {{-- FORM ROW 2 --}}
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
                                                                class="inline-flex items-center justify-center h-full p-2 font-medium text-white border border-transparent rounded-md shadow-md min-w-36 text-md bg-red-500 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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

                        {{-- FORM ROW 3 --}}
                        <div class="grid grid-cols-1">

                            <div class="flex justify-between items-center w-full">

                                <div class="flex flex-col w-full">

                                    <h3 class="font-black text-2xl text-gray-900">
                                        Please list drug(s) of choice:
                                    </h3>

                                    <div class="grid grid-cols-2 mb-5 gap-4">

                                        @foreach ($medicalInfo['drugUse']['drugOfChoice'] as $input)

                                            <div class="w-full mt-4">

                                                <div class="flex ">

                                                    <div class="flex w-full justify-content-between">

                                                        <label for="medicalInfo.drugUse.drugOfChoice.{{ $loop->index }}" class="block text-lg font-black text-gray-700">
                                                            Drug of choice #{{ $loop->index + 1 }}
                                                        </label>

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


                                            <div class="flex justify-between w-full mt-4">

                                                <div class="flex flex-col justify-between w-full">
                                                        <label for="medicalInfo.drugUse.lastUse.{{ $loop->index }}" class="block text-lg font-black text-gray-700">
                                                            Last use
                                                        </label>
                                                    <div class="flex justify-between w-full">

                                                        <div class="mt-1">
                                                            <input wire:model="medicalInfo.drugUse.lastUse.{{ $loop->index  }}" type="date" name="medicalInfo.drugUse.lastUse.{{ $loop->index }}" id="medicalInfo.drugUse.lastUse.{{ $loop->index }}" required autocomplete="given-name" value="{{ $today }}" class="@error("medicalInfo.drugUse.lastUse.{$loop->index}") is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                                        </div>

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
                                                        @error("medicalInfo.drugUse.lastUse.{$loop->index}")
                                                            <div class="flex w-full invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror
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

            <!-- STEP 5 - Funding Information -->
            <div class="{{ $currentStep == 4 ? '' : 'hidden' }}">

                <div class="relative mt-12">

                    <form id="fundingInformationForm" wire:submit.prevent="completeStep" action="/apply-now" method="POST" class="relative z-10 flex flex-col gap-6">
                        @csrf

                        {{-- Section Label --}}
                        <div class="flex justify-between items-center w-full">

                            <div class="flex w-1/2">

                                <h3 class="font-black text-2xl text-gray-900">
                                    Funding Information
                                </h3>

                            </div>

                        </div>

                        {{-- FORM ROW 1 --}}
                        <div class="grid w-full grid-cols-1">

                            <div class="grid grid-cols-2 content-center mb-4">

                                <label for="fundingInfo.hasLivedWithPVSL" class="inline-flex text-lg font-black text-red-500 md:mt-0">
                                    Have you ever lived with Pura Vida Sober Living?
                                </label>

                                <fieldset class="@error("fundingInfo.hasLivedWithPVSL") is-invalid @enderror" id="fundingInfo.hasLivedWithPVSL">

                                    <label class="inline-flex text-lg font-black text-red-500">Yes</label>
                                    <input wire:model="fundingInfo.hasLivedWithPVSL" type="radio" value="1" name="fundingInfo.hasLivedWithPVSL" />

                                    <label class="inline-flex ml-2 text-lg font-black text-red-500">No</label>
                                    <input wire:model="fundingInfo.hasLivedWithPVSL" type="radio" value="0" name="fundingInfo.hasLivedWithPVSL" />

                                    @error("fundingInfo.hasLivedWithPVSL")
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror

                                </fieldset>

                            </div>

                        </div>

                        {{-- FORM ROW 2 --}}
                        <div class="{{ $fundingInfo['hasLivedWithPVSL'] == 0 || $fundingInfo['hasLivedWithPVSL'] == null ? 'hidden' : '' }} grid w-full grid-cols-1">

                            <div class="flex justify-between items-center w-full">

                                <div class="flex flex-cols-2 gap-4 w-full">

                                    <div class="w-full">
                                        <label for="fundingInfo.moveOutDate" class="block text-lg font-black text-gray-700">Move Out Date</label>
                                        <div class="mt-1">
                                            <input wire:model="fundingInfo.moveOutDate" type="date" name="fundingInfo.moveOutDate" id="fundingInfo.moveOutDate" required autocomplete="" value="fundingInfo.moveOutDate" class="@error('fundingInfo.moveOutDate') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                            @error('fundingInfo.moveOutDate')
                                                <div class="flex w-full invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="w-full">
                                        <label for="fundingInfo.reasonForLeaving" class="block text-lg font-black text-gray-700">Reason For Leaving</label>
                                        <div class="mt-1">
                                            <label for="fundingInfo.reasonForLeaving" class="sr-only">Reason For Leaving</label>
                                            <select wire:model="fundingInfo.reasonForLeaving" id="fundingInfo.reasonForLeaving" name="fundingInfo.reasonForLeaving" value="fundingInfo.reasonForLeaving" class="@error("fundingInfo.reasonForLeaving") is-invalid @enderror z-10 block w-full px-3 py-2 text-gray-900 border-gray-300 rounded-md shadow-lg focus:ring-indigo-500 focus:border-indigo-500">
                                                <option  value="">Select</option>
                                                {{-- @php
                                                    sort($reasonsForLeaving)
                                                @endphp --}}
                                                @foreach ($reasonsForLeaving as $key => $reason)
                                                    <option  value="{{ $key . ': ' . $reason }}">{{ $reason }}</option>
                                                @endforeach
                                            </select>
                                            @error("fundingInfo.reasonForLeaving")
                                                <div class="flex w-full invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                        {{-- FORM ROW 3 --}}
                        <div class="grid grid-cols-2 content-center my-4">

                            <label for="fundingInfo.hasPaidAdminFee" class="inline-flex text-lg font-black text-red-500 md:mt-0">
                                Have you paid the Administration Fee ($250.00)?
                            </label>

                            <fieldset class="@error("fundingInfo.hasPaidAdminFee") is-invalid @enderror" id="fundingInfo.hasPaidAdminFee">

                                <label class="inline-flex text-lg font-black text-red-500">Yes</label>
                                <input wire:model="fundingInfo.hasPaidAdminFee" type="radio" value="1" name="fundingInfo.hasPaidAdminFee" />

                                <label class="inline-flex ml-2 text-lg font-black text-red-500">No</label>
                                <input wire:model="fundingInfo.hasPaidAdminFee" type="radio" value="0" name="fundingInfo.hasPaidAdminFee" />

                                @error("fundingInfo.hasPaidAdminFee")
                                    <div class="flex w-full invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror

                            </fieldset>

                        </div>

                        {{-- FORM ROW 4 --}}
                        <div class="grid w-full grid-cols-1">

                            <div class="flex justify-between items-center w-full">

                                <div class="flex flex-col w-full">

                                    <h3 class="font-black text-2xl text-gray-900">
                                        What are your source(s) of funding?
                                    </h3>

                                        @foreach ($fundingInfo['sources'] as $source)

                                            <div class="flex w-full justify-content-between">

                                                <h4 class="flex text-lg font-black text-gray-900 my-3">
                                                    Source #{{ $loop->index + 1 }}
                                                </h4>

                                                <button type="button"
                                                        wire:click.prevent="removeFundingSource({{ $loop->index }})"
                                                        class="{{ $loop->index == 0 ? 'hidden' : '' }} inline-flex items-center justify-center h-full p-2 font-medium text-white border border-transparent rounded-md shadow-md min-w-36 text-md bg-red-500 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    <div wire:loading wire:target="removeFundingSource({{ $loop->index }})">
                                                        <x-loading-blocks />
                                                    </div>
                                                    <div class="flex items-center justify-between w-full font-bold text-white text-md" wire:loading.remove wire:target="removeFundingSource({{ $loop->index }})">
                                                        <img class="flex mr-2" src="/svg/remove-user-icon.svg" alt="Romove Conviction">
                                                        Remove Source
                                                    </div>
                                                </button>

                                            </div>

                                            {{-- SOURCE ROW 1 --}}
                                            <div class="grid grid-cols-3 w-full gap-4 p-2">

                                                <div class="w-full">
                                                    <label for="fundingInfo.sources.{{ $loop->index }}.name" class="block text-lg font-black text-gray-900">Name</label>
                                                    <div class="mt-1">
                                                        <input wire:model="fundingInfo.sources.{{ $loop->index }}.name" type="text" name="fundingInfo.sources.{{ $loop->index }}.name" id="fundingInfo.sources.{{ $loop->index }}.name" required autocomplete="given-name" value="fundingInfo.sources.{{ $loop->index }}.name" class="@error("fundingInfo.sources.{$loop->index}.name") is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                                        @error("fundingInfo.sources.{$loop->index}.name")
                                                            <div class="flex w-full invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="w-full">

                                                    <label for="pricefundingInfo.sources.{{ $loop->index }}.amount" class="block text-lg font-black text-gray-900">Start Date</label>
                                                    <div class="mt-1 relative rounded-md shadow-sm">
                                                        <div class="absolute inset-y-0 left-0 px-3 flex items-center pointer-events-none">
                                                            <span class="text-gray-500 sm:text-sm">
                                                                $
                                                            </span>
                                                        </div>
                                                        <input wire:model="fundingInfo.sources.{{ $loop->index }}.amount" type="text" name="fundingInfo.sources.{{ $loop->index }}.amount" id="fundingInfo.sources.{{ $loop->index }}.amount" required autocomplete="given-name" value="fundingInfo.sources.{{ $loop->index }}.amount" class="@error("fundingInfo.sources.{$loop->index}.amount") is-invalid @enderror block w-full text-center shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10" placeholder="0.00">
                                                        <div class="absolute inset-y-0 right-0 flex items-center">
                                                            <label for="pricefundingInfo.sources.{{ $loop->index }}.frequency" class="sr-only">Pay Frequency</label>
                                                            <select wire:model="fundingInfo.sources.{{ $loop->index }}.frequency" id="fundingInfo.sources.{{ $loop->index }}.frequency" name="fundingInfo.sources.{{ $loop->index }}.frequency" required autocomplete="" value="fundingInfo.sources.{{ $loop->index }}.frequency" class="focus:ring-indigo-500 focus:border-indigo-500 h-full py-0 pl-2 pr-7 border-transparent bg-transparent text-gray-500 sm:text-sm rounded-md">
                                                                <option wire:key="fundingInfo.sources.{{ $loop->index }}.frequency" value="0">/Hr</option>
                                                                <option wire:key="fundingInfo.sources.{{ $loop->index }}.frequency" value="1">/Mo</option>
                                                                <option wire:key="fundingInfo.sources.{{ $loop->index }}.frequency" value="2">/Yr</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                        @error("fundingInfo.sources.{$loop->index}.amount")
                                                            <div class="flex w-full invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror
                                                </div>

                                                <div class="w-full">
                                                    <div class="w-full">
                                                        <label for="fundingInfo.sources.{{ $loop->index }}.startDate" class="block text-lg font-black text-gray-900">Start Date</label>
                                                        <div class="mt-1">
                                                            <input wire:model="fundingInfo.sources.{{ $loop->index }}.startDate" type="date" name="fundingInfo.sources.{{ $loop->index }}.startDate" id="fundingInfo.sources.{{ $loop->index }}.startDate" required autocomplete="" value="{{ $today }}" class="@error("fundingInfo.sources.{$loop->index}.startDate") is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                                            @error("fundingInfo.sources.{$loop->index}.startDate")
                                                                <div class="flex w-full invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <h4 class="flex text-lg font-black text-gray-900 my-3">
                                                Reference
                                            </h4>

                                            {{-- SOURCE ROW 2 --}}
                                            <div class="grid grid-cols-3 w-full gap-4 p-2 mb-5">

                                                <div class="w-full">
                                                    <label for="fundingInfo.sources.{{ $loop->index }}.reference.firstName" class="block text-lg font-black text-gray-900">First Name</label>
                                                    <div class="mt-1">
                                                        <input wire:model="fundingInfo.sources.{{ $loop->index }}.reference.firstName" type="text" name="fundingInfo.sources.{{ $loop->index }}.reference.firstName" id="fundingInfo.sources.{{ $loop->index }}.reference.firstName" required autocomplete="given-name" value="fundingInfo.sources.{{ $loop->index }}.reference.firstName" class="@error("fundingInfo.sources.{$loop->index}.reference.firstName") is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                                        @error("fundingInfo.sources.{$loop->index}.reference.firstName")
                                                            <div class="flex w-full invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="w-full">
                                                    <label for="fundingInfo.sources.{{ $loop->index }}.reference.lastName" class="block text-lg font-black text-gray-900">Last Name</label>
                                                    <div class="mt-1">
                                                        <input wire:model="fundingInfo.sources.{{ $loop->index }}.reference.lastName" type="text" name="fundingInfo.sources.{{ $loop->index }}.reference.lastName" id="fundingInfo.sources.{{ $loop->index }}.reference.lastName" required autocomplete="given-name" value="fundingInfo.sources.{{ $loop->index }}.reference.lastName" class="@error("fundingInfo.sources.{$loop->index}.reference.lastName") is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                                        @error("fundingInfo.sources.{$loop->index}.reference.lastName")
                                                            <div class="flex w-full invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="w-full">
                                                    <div class="w-full">
                                                        <label for="fundingInfo.sources.{{ $loop->index }}.reference.phone" class="block text-lg font-black text-gray-900">Phone</label>
                                                        <div class="mt-1">
                                                            <input wire:model="fundingInfo.sources.{{ $loop->index }}.reference.phone" type="text" name="fundingInfo.sources.{{ $loop->index }}.reference.phone" id="fundingInfo.sources.{{ $loop->index }}.reference.phone" required autocomplete="" value="fundingInfo.sources.{{ $loop->index }}.reference.phone" class="@error("fundingInfo.sources.{$loop->index}.reference.phone") is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                                            @error("fundingInfo.sources.{$loop->index}.reference.phone")
                                                                <div class="flex w-full invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        @endforeach

                                    {{-- ADD FUNDING SOURCE --}}
                                    <div class="flex justify-end w-full">

                                        <button type="button"
                                                wire:click.prevent="addFundingSource"
                                                class="inline-flex items-center justify-center h-full font-medium text-white border border-transparent rounded-md shadow-md min-w-36 text-md bg-accent bg-accent_hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            <div wire:loading wire:target="addFundingSource">
                                                <x-loading-blocks />
                                            </div>
                                            <div class="flex items-center justify-between w-full p-2 font-bold text-white text-md" wire:loading.remove wire:target="addFundingSource">
                                                <img class="flex mr-2" src="/svg/register-icon.svg" alt="Add Another Funding Source">
                                                Add Source
                                            </div>
                                        </button>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

            <!-- STEP 6 - Identification Information -->
            <div class="{{ $currentStep == 5 ? '' : 'hidden' }}">

                <div class="relative mt-12">

                    <form id="identificationInformationForm" wire:submit.prevent="completeStep" action="/apply-now" method="POST" class="relative z-10 flex flex-col items-center gap-6">
                        @csrf

                        {{-- Section Label --}}
                        <div class="flex justify-between items-center w-full">

                            <div class="flex w-1/2">

                                <h3 class="font-black text-2xl text-gray-900">
                                    Identification Information
                                </h3>

                            </div>

                        </div>

                        <div class="flex justify-between items-center w-full">

                            <div class="flex w-1/2">

                                <h3 class="font-black text-xl text-gray-900">
                                    Picture Identification
                                </h3>

                            </div>

                        </div>

                        {{-- FORM ROW 1 --}}
                        <div class="flex justify-between items-center">

                            <div class="w-1/5 mr-2">
                                <label for="identificationInfo.type" class="block text-lg font-black text-gray-700">Type</label>
                                <div class="mt-1">
                                    <label for="identificationInfo.type" class="sr-only">Type</label>
                                    <select wire:model="identificationInfo.type" id="identificationInfo.type" name="identificationInfo.type" value="identificationInfo.type" class="@error("identificationInfo.type") is-invalid @enderror z-10 block w-full px-3 py-2 text-gray-900 border-gray-300 rounded-md shadow-lg focus:ring-indigo-500 focus:border-indigo-500">
                                        <option  value="">Select</option>
                                        @php
                                            sort($identificationTypes)
                                        @endphp
                                        @foreach ($identificationTypes as $key => $type)
                                            <option  value="{{ $key . ': ' . $type }}">{{ $type }}</option>
                                        @endforeach
                                    </select>
                                    @error("identificationInfo.type")
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="w-1/5 mx-2">
                                <label for="identificationInfo.state" class="block text-lg font-black text-gray-700">State</label>
                                <div class="mt-1">
                                    <label for="identificationInfo.state" class="sr-only">State</label>
                                    <select wire:model="identificationInfo.state" id="identificationInfo.state" name="identificationInfo.state" value="identificationInfo.state" class="@error("identificationInfo.state") is-invalid @enderror z-10 block w-full px-3 py-2 text-gray-900 border-gray-300 rounded-md shadow-lg focus:ring-indigo-500 focus:border-indigo-500">
                                        <option  value="">Select</option>
                                        @php
                                            sort($us_state_abbrevs_names)
                                        @endphp
                                        @foreach ($us_state_abbrevs_names as $key => $state)
                                            <option  value="{{ $key . ': ' . $state }}">{{ $state }}</option>
                                        @endforeach
                                    </select>
                                    @error('identificationInfo.state')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="w-2/5 mx-2">
                                <label for="identificationInfo.number" class="block text-lg font-black text-gray-700">Number</label>
                                <div class="mt-1">
                                    <input wire:model="identificationInfo.number" type="text" name="identificationInfo.number" id="identificationInfo.number" required autocomplete="" value="identificationInfo.number" class="@error('identificationInfo.number') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                    @error('identificationInfo.number')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="w-1/5 ml-2">
                                <label for="identificationInfo.expiration" class="block text-lg font-black text-gray-700">Expiration Date</label>
                                <div class="mt-1">
                                    <input wire:model="identificationInfo.expiration" type="date" name="identificationInfo.expiration" id="identificationInfo.expiration" required autocomplete="" value="identificationInfo.expiration" class="@error('identificationInfo.expiration') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md z-10">
                                    @error('identificationInfo.expiration')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        {{-- Upload ID Card --}}
                        <div class="{{ $hasIDCardUpload == true ? 'hidden' : '' }} flex w-full justify-center items-center relative z-10 px-28 mt-4">

                                <button type="button"
                                        wire:click.prevent="toggleHasIDCardUpload"
                                        class="inline-flex items-center justify-center h-full font-medium text-white border border-transparent rounded-md shadow-md min-w-36 text-md bg-accent bg-accent_hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <div wire:loading wire:target="toggleHasIDCardUpload">
                                        <x-loading-blocks />
                                    </div>
                                    <div class="flex items-center justify-between w-full p-2 font-bold text-white text-md" wire:loading.remove wire:target="toggleHasIDCardUpload">
                                        <img class="flex mr-2" src="/svg/register-icon.svg" alt="Upload ID Card">
                                        Upload ID Card
                                    </div>
                                </button>

                        </div>

                        {{-- FORM ROW 3 --}}
                        <div class="{{ $hasIDCardUpload == false ? 'hidden' : '' }} flex w-full relative z-10 mt-4">

                            {{-- FRONT OF ID --}}
                            <div class="flex flex-col items-center w-1/2">

                                <label class="inline-block mb-2 font-black text-lg text-gray-900">

                                    FRONT

                                </label>

                                <div class="p-4 bg-white border-gray-300 rounded-md shadow-lg focus:ring-indigo-500 focus:border-indigo-500">

                                    <div class="flex items-center justify-center w-full">

                                        <label class="flex flex-col w-full min-h-32 border-4 border-dashed hover:bg-gray-100 hover:border-gray-300">

                                            <div class="{{ $photoIdCardFront ? 'hidden' : '' }} flex flex-col items-center justify-center pt-7">

                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="w-12 h-12 text-gray-300 group-hover:text-gray-900" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                                        clip-rule="evenodd" />
                                                </svg>

                                                <p class="pt-1 text-sm tracking-wider text-gray-300 group-hover:text-gray-900">
                                                    Select a photo
                                                </p>

                                            </div>

                                            <div class="{{ $photoIdCardFront ? '' : 'hidden' }} flex flex-col items-center justify-center pt-7">

                                                @if ($photoIdCardFront)
                                                    <img src="{{ $photoIdCardFront->temporaryUrl() }}" alt="">
                                                @endif

                                            </div>

                                            <input wire:model="photoIdCardFront" id="photoIdCardFront" name="photoIdCardFront" value="photoIdCardFront" type="file" class="@error("photoIdCardFront") is-invalid @enderror opacity-0" />

                                        </label>

                                    </div>

                                </div>

                                @error("photoIdCardFront")
                                    <div class="flex w-full invalid-feedback pl-7" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror

                            </div>

                            {{-- BACK OF ID --}}
                            <div class="flex flex-col items-center w-1/2">

                                <label class="inline-block mb-2 font-black text-lg text-gray-900">

                                    BACK

                                </label>

                                <div class="p-4 bg-white border-gray-300 rounded-md shadow-lg focus:ring-indigo-500 focus:border-indigo-500">

                                    <div class="flex items-center justify-center w-full">

                                        <label class="flex flex-col w-full min-h-32 border-4 border-dashed hover:bg-gray-100 hover:border-gray-300">

                                            <div class="{{ $photoIdCardBack ? 'hidden' : '' }} flex flex-col items-center justify-center pt-7">

                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="w-12 h-12 text-gray-300 group-hover:text-gray-900" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                                        clip-rule="evenodd" />
                                                </svg>

                                                <p class="pt-1 text-sm tracking-wider text-gray-300 group-hover:text-gray-900">
                                                    Select a photo
                                                </p>

                                            </div>

                                            <div class="{{ $photoIdCardBack ? '' : 'hidden' }} flex flex-col items-center justify-center pt-7">

                                                @if ($photoIdCardBack)
                                                    <img src="{{ $photoIdCardBack->temporaryUrl() }}" alt="">
                                                @endif

                                            </div>

                                            <input wire:model="photoIdCardBack" id="photoIdCardBack" name="photoIdCardBack" value="photoIdCardBack" type="file" class="@error("photoIdCardBack") is-invalid @enderror opacity-0" />

                                        </label>

                                    </div>

                                </div>

                                @error("photoIdCardBack")
                                    <div class="flex w-full invalid-feedback pl-7" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror

                            </div>

                        </div>

                        {{-- Upload ID Card CANCEL --}}
                        <div class="{{ $hasIDCardUpload == false ? 'hidden' : '' }} flex w-full justify-center items-center relative z-10 mt-4 px-28">

                            <button type="button"
                                    wire:click.prevent="toggleHasIDCardUpload"
                                    class="inline-flex items-center justify-center h-full font-medium text-white border border-transparent rounded-md shadow-md min-w-36 text-md bg-red-500 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <div wire:loading wire:target="toggleHasIDCardUpload">
                                    <x-loading-blocks />
                                </div>
                                <div class="flex items-center justify-between w-full p-2 font-bold text-white text-md" wire:loading.remove wire:target="toggleHasIDCardUpload">
                                    <img class="flex mr-2" src="/svg/register-icon.svg" alt="Upload ID Card">
                                    Cancel
                                </div>
                            </button>

                        </div>

                        {{-- FORM ROW 4 --}}
                        <div class="grid w-full grid-cols-1 mt-4">

                            <div class="grid grid-cols-2 content-center my-4">

                                <label for="identificationInfo.hasSocialCard" class="inline-flex text-lg font-black text-red-500 md:mt-0">
                                    Do you have a Social Security Card?
                                </label>

                                <fieldset class="@error("identificationInfo.hasSocialCard") is-invalid @enderror" id="identificationInfo.hasSocialCard">

                                    <label class="inline-flex text-lg font-black text-red-500">Yes</label>
                                    <input wire:model="identificationInfo.hasSocialCard" type="radio" value="1" name="identificationInfo.hasSocialCard" />

                                    <label class="inline-flex ml-2 text-lg font-black text-red-500">No</label>
                                    <input wire:model="identificationInfo.hasSocialCard" type="radio" value="0" name="identificationInfo.hasSocialCard" />

                                    @error("identificationInfo.hasSocialCard")
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror

                                </fieldset>

                            </div>

                        </div>

                        {{-- FORM ROW 5 LABEL --}}
                        <div class="flex w-full justify-end items-center mt-2">

                            <h3 class="font-black text-xl text-gray-900">
                                Additional Documentation
                            </h3>

                        </div>

                        {{-- FORM ROW 5 --}}
                        <div class="flex w-full justify-center items-center mt-2">


                            <div x-data="{ additionalDocumentation: $wire.additionalDocumentation }" 
                                 x-on:dragover="$el.classList.add('active')"
                                 x-on:dragleave="$el.classList.remove('active')"
                                 x-on:drop="$el.classList.remove('active')" 
                                 id="additionalDocumentationDropZone" 
                                 class="{{ $additionalDocumentation == null ? '' : 'hidden' }} flex justify-center bg-white shadow-lg rounded-md p-3 w-3/4 relative">

                                <input multiple
                                       x-data="{ additionalDocumentation }"
                                       wire:model="additionalDocumentation"
                                       name="additionalDocumentation"
                                       id="additionalDocumentation"
                                       value="additionalDocumentation"
                                       type="file"
                                       x-on:change="additionalDocumentation = $event.target.files; console.log($event.target.files);"
                                       class="@error("additionalDocumentation") is-invalid @enderror absolute inset-0 z-50 m-0 p-0 w-full h-full outline-none opacity-0"
                                />

                                <div class=" flex flex-col w-full items-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">

                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>

                                    <div class="flex text-sm text-gray-600">

                                        <label for="additionalDocumentation" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                            <span>Upload a file</span>

                                        </label>

                                        <p class="pl-1">
                                            or drag and drop
                                        </p>

                                    </div>
                                    <p class="text-xs text-gray-500">
                                        PNG, JPG, GIF, DOC, DOCX, ZIP, TXT up to 10MB
                                    </p>

                                </div>

                            </div>

                            <div class="{{ $additionalDocumentation != null ? '' : 'hidden' }} flex flex-col w-full items-end">

                                @foreach ($additionalDocumentation as $file)

                                    <div wire:loading.remove wire:target="additionalDocumentation" class="relative w-3/4 rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm flex items-center space-x-3 mb-4 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        
                                        <div class="flex w-1/3 justify-center items-center relative">

                                            @if (
                                                    $additionalDocumentation[$loop->index]->getMimeType() == "image/jpeg" || 
                                                    $additionalDocumentation[$loop->index]->getMimeType() == "image/png" || 
                                                    $additionalDocumentation[$loop->index]->getMimeType() == "image/svg"
                                                )
                                                
                                                <img class="w-1/2 h-1/2 rounded-sm hover:w-full hover:h-full" src="{{ $additionalDocumentation[$loop->index]->temporaryUrl() }}" alt="{{ $additionalDocumentation[$loop->index]->getClientOriginalName() }}">
                                            
                                            @elseif (
                                                        $additionalDocumentation[$loop->index]->getMimeType() == "application/vnd.openxmlformats-officedocument.wordprocessingml.document" ||
                                                        $additionalDocumentation[$loop->index]->getMimeType() == "text/rtf" ||
                                                        $additionalDocumentation[$loop->index]->getMimeType() == "text/plain"
                                                    )

                                                <img class="h-1/2 w-1/2 hover:w-full hover:h-full" src="/svg/file-icons/file-word-regular.svg" alt="Word Document">
                                                
                                            @endif

                                        </div>

                                        <div class="flex w-full">

                                            {{-- <a href="#" class="focus:outline-none"> --}}
                                                <div class="flex flex-col w-3/4 justify-center items-start">

                                                   {{-- <span class="absolute inset-0" aria-hidden="true"></span> --}}
                                                    <p class="text-lg font-black text-gray-900">
                                                        {{ $additionalDocumentation[$loop->index]->getClientOriginalName() }}
                                                    </p>
                                                    <p class="text-md text-gray-500 truncate">
                                                        {{ number_format((float)($additionalDocumentation[$loop->index]->getSize() / 1024), 2, '.', '') . ' kb' }}
                                                        {{-- {{ $additionalDocumentation[$loop->index]->getSize() / 1024 . ' KB' }} --}}
                                                    </p> 

                                                </div>
                                                
                                                <div class="flex w-1/4 justify-center items-center">

                                                    <button type="button"
                                                            wire:click.prevent="removeFileFromUploadQue({{ $loop->index }})"
                                                            class="inline-flex items-center justify-center h-full font-medium text-white border border-transparent rounded-md shadow-md min-w-max text-md bg-red-500 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                        <div wire:loading wire:target="removeFileFromUploadQue({{ $loop->index }})">
                                                            <x-loading-blocks />
                                                        </div>
                                                        <div class="flex items-center justify-center p-2" wire:loading.remove wire:target="removeFileFromUploadQue({{ $loop->index }})">
                                                            <img class="w-5 h-5" src="/svg/trash-alt-regular.svg" alt="Remove File From Upload Queue">
                                                        </div>
                                                    </button>
                        
                                                </div>

                                            {{-- </a> --}}

                                        </div>

                                    </div>

                                    <div wire:loading wire:target="additionalDocumentation" class="flex">

                                        loading

                                    </div>

                                    {{-- {!! $additionalDocumentation[$loop->index]->getMimeType() !!} --}}
                                    <!-- More people... -->

                                @endforeach
                                
                            </div>

                        </div>

                    </form>

                </div>

            </div>

            <!-- STEP 7 - Recovery Information -->
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

            <!-- STEP 8 - Review Application -->
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

            <!-- STEP 9 - Consent Form -->
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

            <!-- STEP 10 - Confirmation -->
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

<div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <!--
        Background overlay, show/hide based on modal state.
  
        Entering: "ease-out duration-300"
          From: "opacity-0"
          To: "opacity-100"
        Leaving: "ease-in duration-200"
          From: "opacity-100"
          To: "opacity-0"
      -->
      <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
  
      <!-- This element is to trick the browser into centering the modal contents. -->
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
  
      <!--
        Modal panel, show/hide based on modal state.
  
        Entering: "ease-out duration-300"
          From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          To: "opacity-100 translate-y-0 sm:scale-100"
        Leaving: "ease-in duration-200"
          From: "opacity-100 translate-y-0 sm:scale-100"
          To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
      -->
      <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
        <div>
          <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
            <!-- Heroicon name: outline/check -->
            <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
          </div>
          <div class="mt-3 text-center sm:mt-5">
            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
              Payment successful
            </h3>
            <div class="mt-2">
              <p class="text-sm text-gray-500">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur amet labore.
              </p>
            </div>
          </div>
        </div>
        <div class="mt-5 sm:mt-6">
          <button type="button" class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">
            Go back to dashboard
          </button>
        </div>
      </div>
    </div>
  </div>

<script type="text/javascript">

// window.livewire.on(‘file-dropped’, (event) => {
//     alert('working');

//     // let files = event.dataTransfer.files;
//     // let fileObject = files[0];
//     // let reader = new FileReader();
//     // reader.onloadend = () => {
//     //     window.livewire.emit('file-upload', reader.result)
//     // }
//     // reader.readAsDataURL(fileObject);
// })

</script>
