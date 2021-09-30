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
    <div class="{{ $currentStep != $totalSteps ? '' : 'hidden' }} bg-white max-w-screen-lg mx-auto mt-8 p-5 pb-0 rounded-md rounded-b-none shadow-lg relative overflow-hidden"
         wire:click="{{ $navMessageContent != '' ? 'clearNavMessageContent()' : '' }}">

        <!-- Top Navigation 1 -->
        <div class="{{ !$previewActive ? 'z-10' : 'z-0' }} relative flex flex-col items-center justify-center mb-4 lg:flex-row lg:justify-between">
            <a class="relative z-10 inline-flex sm:mb-4" href="/">
                <x-application-logo class="w-20 h-20 text-gray-500 fill-current" />
            </a>
            <div class="text-4xl font-black text-gray-900 sm:text-center">
                Sober Housing Rental Application
            </div>
        </div>

        <!-- Top Navigation 2 -->
        <div class="{{ !$previewActive ? 'z-10' : 'z-0' }} relative pb-4 border-b-2 border-gray-300">

            <div class="relative flex flex-col md:items-center md:justify-between">

                <!-- Progress Navigation -->
                <div class="flex flex-col-reverse w-full md:flex-row">

                    <div class="flex flex-row items-center w-full">

                        <nav class="flex w-full" aria-label="Progress">

                            <ol x-data="{scroll: ($index) => {$el.scrollTo($index * 125, {axis:'x'});}}"
                                id="application-portal-menu"
                                role="list"
                                class="flex flex-col w-full overflow-x-scroll border border-gray-300 divide-y divide-gray-300 rounded-md md:flex-row md:flex md:divide-y-0">

                                @foreach ($stepTitles as $title)

                                <li class="relative md:flex-1 md:flex">
                                <!-- Completed Step -->
                                    <a href="#" x-data x-on:click="scroll({{ $loop->index }})" wire:click.prevent="setCurrentStep({{ $loop->index }})" class="flex items-center w-full group">
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

            <h3 class="w-full text-lg text-red-500 font-black text-center mt-4">

                {{ $navMessageContent ? $navMessageContent : '' }}

            </h3>

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
            <div class="{{ $currentStep == 0 || $currentStep == 7 ? '' : 'hidden' }} {{ $currentStep == 7 ? 'border-b-4 border-accent-dark pb-12' : '' }}">

                <div class="relative mt-12">

                    <form id="personalInformationForm" wire:submit.prevent="completeStep" action="/apply-now" method="POST" class="relative z-10 flex flex-col gap-6" autocomplete="on">
                        @csrf

                        {{-- REVIEW Section Label --}}
                        <div class="flex w-full {{ $currentStep == 7 ? '' : 'hidden' }} {{ $currentStep == 7 ? 'border-b-4 border-accent-dark pb-12' : '' }}">

                            <div class="flex justify-start items-center w-full">

                                <h3 class="font-black text-6xl text-accent">
                                    Application Review
                                </h3>

                            </div>

                        </div>

                        {{-- Section Label --}}
                        <div class="flex w-full">

                            <div class="flex justify-start items-center w-full">

                                <h3 class="font-black text-5xl text-gray-900">
                                    Personal Information
                                </h3>

                            </div>

                        </div>

                        {{-- FORM ROW 1 --}}
                        <div class="flex flex-col md:flex-row">
                            <div class="w-full w-45">
                                <label for="personalInfo.firstName" class="block text-lg font-black text-gray-700">First Name</label>
                                <div class="mt-1">
                                    <input wire:model="personalInfo.firstName"
                                           type="text"
                                           name="personalInfo.firstName"
                                           id="personalInfo.firstName"
                                           required
                                           {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                           {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 0 || $currentStep == 0 ? '' : 'disabled' }}
                                           autocomplete="given-name"
                                           value="personalInfo.firstName"
                                           class="@error('personalInfo.firstName') is-invalid bg-input-error @enderror {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 && $currentStep != 0 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 0 || $currentStep == 0 ? 'bg-input' : 'bg-input-disabled' }} px-3 py-2 block w-full shadow-lg text-gray-900 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-accent-dark rounded-md z-10" />
                                    @error('personalInfo.firstName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full w-10per md:px-2">
                                <label for="personalInfo.middleInitial" class="block text-lg font-black text-gray-700">Middle Initial</label>
                                <div class="mt-1">
                                    <input wire:model="personalInfo.middleInitial"
                                           type="text"
                                           name="personalInfo.middleInitial"
                                           id="personalInfo.middleInitial"
                                           required
                                           {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                           {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 0 || $currentStep == 0 ? '' : 'disabled' }}
                                           autocomplete="additional-name"
                                           value="personalInfo.middleInitial"
                                           class="@error('personalInfo.middleInitial') is-invalid bg-input-error @enderror {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 0 || $currentStep == 0 ? 'bg-input' : 'bg-input-disabled' }} px-3 py-2 block md:w-full w-2/5 shadow-lg text-gray-900 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-accent-dark rounded-md z-10" />
                                    @error('personalInfo.middleInitial')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full w-45">
                                <label for="personalInfo.lastName" class="block text-lg font-black text-gray-700">Last Name</label>
                                <div class="mt-1">
                                    <input wire:model="personalInfo.lastName"
                                           type="text"
                                           name="personalInfo.lastName"
                                           id="personalInfo.lastName"
                                           required
                                           {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                           {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 0 || $currentStep == 0 ? '' : 'disabled' }}
                                           autocomplete="family-name"
                                           value="personalInfo.lastName"
                                           class="@error('personalInfo.lastName') is-invalid bg-input-error @enderror {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 0 || $currentStep == 0 ? 'bg-input' : 'bg-input-disabled' }} px-3 py-2 block w-full shadow-lg text-gray-900 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-accent-dark rounded-md z-10" />
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
                                    <input wire:model="personalInfo.dateOfBirth"
                                           type="date"
                                           name="personalInfo.dateOfBirth"
                                           id="personalInfo.dateOfBirth"
                                           required
                                           {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                           {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 0 || $currentStep == 0 ? '' : 'disabled' }}
                                           autocomplete="bday"
                                           value="{{ $today }}"
                                           class="@error('personalInfo.dateOfBirth') is-invalid bg-input-error @enderror {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 0 || $currentStep == 0 ? 'bg-input' : 'bg-input-disabled' }} px-3 py-2 block w-full shadow-lg text-gray-900 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-accent-dark rounded-md z-10" />
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
                                    <input wire:model="personalInfo.socialNumber"
                                           type="text"
                                           name="personalInfo.socialNumber"
                                           id="personalInfo.socialNumber"
                                           required
                                           {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                           {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 0 || $currentStep == 0 ? '' : 'disabled' }}
                                           autocomplete="ssn"
                                           value="personalInfo.socialNumber"
                                           class="@error('personalInfo.socialNumber') is-invalid bg-input-error @enderror {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 0 || $currentStep == 0 ? 'bg-input' : 'bg-input-disabled' }} px-3 py-2 block w-full shadow-lg text-gray-900 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-accent-dark rounded-md z-10">
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
                                    <input wire:model="personalInfo.phone"
                                           type="tel"
                                           name="personalInfo.phone"
                                           id="personalInfo.phone"
                                           required
                                           {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                           {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 0 || $currentStep == 0 ? '' : 'disabled' }}
                                           autocomplete="tel"
                                           value="personalInfo.phone"
                                           class="@error('personalInfo.phone') is-invalid bg-input-error @enderror {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 0 || $currentStep == 0 ? 'bg-input' : 'bg-input-disabled' }} px-3 py-2 block w-full shadow-lg text-gray-900 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-accent-dark rounded-md z-10 ">
                                    @error('personalInfo.phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- EDIT BUTTON --}}
                        <div class="flex justify-end w-full {{ $currentStep != 7 ? 'hidden' : '' }}">

                            <button type="button"
                                    wire:click.prevent="{{ $isAdminEditing ? 'validateThisStep(0)'  : ($isAdmin ? 'editAsAdmin(0)' : 'editThisStep(0)') }}"
                                    class="{{ $currentStep != 7 && $isAdminEditing && $stepAdminIsEditing == 0 ? 'hidden' : '' }} {{ $isAdminEditing && $stepAdminIsEditing == 0 ? 'bg-accent' : 'bg-edit-btn' }} inline-flex items-center justify-center h-full font-medium text-white border border-transparent rounded-md shadow-md min-w-36 text-md bg-edit-btn bg-accent_hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            >

                                <div wire:loading
                                    wire:target="{{ $isAdminEditing ? 'validateThisStep(0)'  : ($isAdmin ? 'editAsAdmin(0)' : 'editThisStep(0)') }}"
                                >
                                    <x-loading-blocks />
                                </div>

                                <div class="flex items-center justify-between w-full p-2 font-bold text-white text-md" wire:loading.remove wire:target="{{ $isAdminEditing ? 'validateThisStep(0)'  : ($isAdmin ? 'editAsAdmin(0)' : 'editThisStep(0)') }}">
                                    {{ $isAdminEditing && $stepAdminIsEditing == 0 ? 'Submit Changes' : $stepTitles[0] }}
                                    <img class="flex ml-2 {{ $isAdminEditing && $stepAdminIsEditing == 0 ? 'hidden' : '' }}" src="/svg/edit-solid.svg" alt="Edit Personal Information">
                                </div>

                            </button>

                        </div>

                    </form>

                </div>

            </div>

            <!-- STEP 2 - Emergency Contacts -->
            <div class="{{ $currentStep == 1 || $currentStep == 7 ? '' : 'hidden' }} {{ $currentStep == 7 ? 'border-b-4 border-accent-dark pb-12' : '' }}">

                <div class="relative mt-12">

                    <form id="emergencyContactForm" wire:submit.prevent="completeStep" action="/apply-now" method="POST" class="relative z-10 flex flex-col gap-6">
                        @csrf

                        {{-- SECTION LABEL --}}
                        <div class="flex w-full">

                            <div class="flex justify-start items-center w-full">

                                <h3 class="font-black text-5xl text-gray-900">
                                    Emergency Contacts
                                </h3>

                            </div>

                        </div>

                        {{-- FORM LABEL --}}
                        <div class="flex justify-between items-center w-full">

                            <div class="flex w-1/2">

                                <h3 class="font-black text-2xl text-accent">
                                    Primary Contact
                                </h3>

                            </div>

                        </div>

                        {{-- FORM ROW 1 --}}
                        <div class="flex flex-col md:flex-row">
                            <div class="w-full">
                                <label for="identificationInfo.firstNameEmContact" class="block text-lg font-black text-gray-700">First Name</label>
                                <div class="mt-1">
                                    <input wire:model="emergencyContactInfo.firstNameEmContact"
                                           type="text" name="emergencyContactInfo.firstNameEmContact"
                                           id="emergencyContactInfo.firstNameEmContact"
                                           required
                                           {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                           {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 1 || $currentStep == 1 ? '' : 'disabled' }}
                                           autocomplete="given-name"
                                           value="emergencyContactInfo.firstNameEmContact"
                                           class="@error('emergencyContactInfo.firstNameEmContact') is-invalid bg-input-error @enderror {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 1 || $currentStep == 1 ? 'bg-input' : 'bg-input-disabled' }} px-3 py-2 block w-full shadow-lg text-gray-900 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-accent-dark rounded-md z-10">
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
                                    <input wire:model="emergencyContactInfo.lastNameEmContact"
                                           type="text"
                                           name="emergencyContactInfo.lastNameEmContact"
                                           id="emergencyContactInfo.lastNameEmContact"
                                           required
                                           {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                           {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 1 || $currentStep == 1 ? '' : 'disabled' }}
                                           autocomplete="family-name"
                                           value="emergencyContactInfo.lastNameEmContact"
                                           class="@error('emergencyContactInfo.lastNameEmContact') is-invalid bg-input-error @enderror {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 1 || $currentStep == 1 ? 'bg-input' : 'bg-input-disabled' }} px-3 py-2 block w-full shadow-lg text-gray-900 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-accent-dark rounded-md z-10">
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
                                    <input wire:model="emergencyContactInfo.phoneEmContact"
                                           type="tel"
                                           name="emergencyContactInfo.phoneEmContact"
                                           id="emergencyContactInfo.phoneEmContact"
                                           required
                                           {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                           {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 1 || $currentStep == 1 ? '' : 'disabled' }}
                                           autocomplete="tel"
                                           value="emergencyContactInfo.phoneEmContact"
                                           class="@error('emergencyContactInfo.phoneEmContact') is-invalid bg-input-error @enderror {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 1 || $currentStep == 1 ? 'bg-input' : 'bg-input-disabled' }} px-3 py-2 block w-full shadow-lg text-gray-900 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-accent-dark rounded-md z-10">
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
                                    <input wire:model="emergencyContactInfo.cityEmContact"
                                           type="text"
                                           name="emergencyContactInfo.cityEmContact"
                                           id="emergencyContactInfo.cityEmContact"
                                           required
                                           {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                           {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 1 || $currentStep == 1 ? '' : 'disabled' }}
                                           autocomplete="city"
                                           value="emergencyContactInfo.cityEmContact"
                                           class="@error('emergencyContactInfo.cityEmContact') is-invalid bg-input-error @enderror {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 1 || $currentStep == 1 ? 'bg-input' : 'bg-input-disabled' }} px-3 py-2 block w-full shadow-lg text-gray-900 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-accent-dark rounded-md z-10" />
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
                                    <select wire:model="emergencyContactInfo.stateEmContact"
                                            id="emergencyContactInfo.stateEmContact"
                                            name="emergencyContactInfo.stateEmContact"
                                            required
                                            {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                            {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 1 || $currentStep == 1 ? '' : 'disabled' }}
                                            autocomplete="state"
                                            value="emergencyContactInfo.stateEmContact"
                                            class="@error('emergencyContactInfo.stateEmContact') is-invalid bg-input-error @enderror {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 1 || $currentStep == 1 ? 'bg-input' : 'bg-input-disabled' }} z-10 block w-full px-3 py-2 text-gray-900 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-accent-dark rounded-md z-10">
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
                                    <select wire:model="emergencyContactInfo.relationshipEmContact"
                                            id="emergencyContactInfo.relationshipEmContact"
                                            name="emergencyContactInfo.relationshipEmContact"
                                            required
                                            {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                            {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 1 || $currentStep == 1 ? '' : 'disabled' }}
                                            value="emergencyContactInfo.relationshipEmContact"
                                            class="@error('emergencyContactInfo.relationshipEmContact') is-invalid bg-input-error @enderror {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 1 || $currentStep == 1 ? 'bg-input' : 'bg-input-disabled' }} z-10 block w-full px-3 py-2 text-gray-900 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-accent-dark rounded-md z-10">
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

                            <div class="flex {{ $loop->index % 2 ? 'flex-row-reverse' : '' }} justify-between items-center w-full mt-5">

                                <div class="flex w-1/2 {{ $loop->index % 2 ? 'justify-end' : 'justify-start' }}">

                                    <button type="button"
                                            wire:click.prevent="removeEmergencyContact({{ $loop->index }})"
                                            class="{{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != 1 ? 'hidden' : '' }} inline-flex items-center justify-center h-full font-medium text-white border border-transparent rounded-md shadow-md min-w-36 text-md bg-red-500 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        <div wire:loading wire:target="removeEmergencyContact({{ $loop->index }})">
                                            <x-loading-blocks />
                                        </div>
                                        <div class="flex items-center justify-between w-full p-2 font-bold text-white text-md" wire:loading.remove wire:target="removeEmergencyContact({{ $loop->index }})">
                                            <img class="flex mr-2" src="/svg/remove-user-icon.svg" alt="Add Another Emergency Contact">
                                            Remove Emergency Contact
                                        </div>
                                    </button>

                                </div>

                                <div class="flex w-1/2 {{ $loop->index % 2 ? 'justify-start' : 'justify-end' }}">

                                    <h3 class="font-black text-2xl text-accent">
                                        Alternative Contact #{{ $loop->index + 1 }}
                                    </h3>

                                </div>

                            </div>

                            {{-- FORM ROW 1 --}}
                            <div class="flex flex-col md:flex-row">
                                <div class="w-1/3">
                                    <label for="additionalEmergencyContactInfo.{{ $loop->index }}.firstNameEmContact" class="block text-lg font-black text-gray-700">First Name</label>
                                    <div class="mt-1">
                                        <input wire:model="additionalEmergencyContactInfo.{{ $loop->index }}.firstNameEmContact"
                                               type="text"
                                               name="additionalEmergencyContactInfo.{{ $loop->index }}.firstNameEmContact"
                                               id="additionalEmergencyContactInfo.{{ $loop->index }}.firstNameEmContact"
                                               required
                                               {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                               {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 1 || $currentStep == 1 ? '' : 'disabled' }}
                                               autocomplete="given-name"
                                               value="additionalEmergencyContactInfo.{{ $loop->index }}.firstNameEmContact"
                                               class="@error("additionalEmergencyContactInfo.{$loop->index}.firstNameEmContact") is-invalid bg-input-error @enderror {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 1 || $currentStep == 1 ? 'bg-input' : 'bg-input-disabled' }} px-3 py-2 block w-full shadow-lg text-gray-900 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-accent-dark rounded-md z-10" />
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
                                        <input wire:model="additionalEmergencyContactInfo.{{ $loop->index }}.lastNameEmContact"
                                               type="text"
                                               name="additionalEmergencyContactInfo.{{ $loop->index }}.lastNameEmContact"
                                               id="additionalEmergencyContactInfo.{{ $loop->index }}.lastNameEmContact"
                                               required
                                               {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                               {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 1 || $currentStep == 1 ? '' : 'disabled' }}
                                               autocomplete="family-name"
                                               value="additionalEmergencyContactInfo.{{ $loop->index }}.lastNameEmContact"
                                               class="@error("additionalEmergencyContactInfo.{$loop->index}.lastNameEmContact") is-invalid bg-input-error @enderror {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 1 || $currentStep == 1 ? 'bg-input' : 'bg-input-disabled' }} px-3 py-2 block w-full shadow-lg text-gray-900 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-accent-dark rounded-md z-10" />
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
                                        <input wire:model="additionalEmergencyContactInfo.{{ $loop->index }}.phoneEmContact"
                                               type="tel"
                                               name="additionalEmergencyContactInfo.{{ $loop->index }}.phoneEmContact"
                                               id="additionalEmergencyContactInfo.{{ $loop->index }}.phoneEmContact"
                                               required
                                               {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                               {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 1 || $currentStep == 1 ? '' : 'disabled' }}
                                               autocomplete="tel"
                                               value="additionalEmergencyContactInfo.{{ $loop->index }}.phoneEmContact"
                                               class="@error("additionalEmergencyContactInfo.{$loop->index}.phoneEmContact") is-invalid bg-input-error @enderror {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 1 || $currentStep == 1 ? 'bg-input' : 'bg-input-disabled' }} px-3 py-2 block w-full shadow-lg text-gray-900 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-accent-dark rounded-md z-10" />
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
                                        <input wire:model="additionalEmergencyContactInfo.{{ $loop->index }}.cityEmContact"
                                               type="text"
                                               name="additionalEmergencyContactInfo.{{ $loop->index }}.cityEmContact"
                                               id="additionalEmergencyContactInfo.{{ $loop->index }}.cityEmContact"
                                               required
                                               {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                               {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 1 || $currentStep == 1 ? '' : 'disabled' }}
                                               autocomplete="ship-city"
                                               value="additionalEmergencyContactInfo.{{ $loop->index }}.cityEmContact"
                                               class="@error("additionalEmergencyContactInfo.{$loop->index}.cityEmContact") is-invalid bg-input-error @enderror {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 1 || $currentStep == 1 ? 'bg-input' : 'bg-input-disabled' }} px-3 py-2 block w-full shadow-lg text-gray-900 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-accent-dark rounded-md z-10" />
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
                                        <select wire:model="additionalEmergencyContactInfo.{{ $loop->index }}.stateEmContact"
                                                id="additionalEmergencyContactInfo.{{ $loop->index }}.stateEmContact"
                                                name="additionalEmergencyContactInfo.{{ $loop->index }}.stateEmContact"
                                                required
                                                {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                                {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 1 || $currentStep == 1 ? '' : 'disabled' }}
                                                autocomplete="state"
                                                value="additionalEmergencyContactInfo.{{ $loop->index }}.stateEmContact"
                                                class="@error("additionalEmergencyContactInfo.{$loop->index}.stateEmContact") is-invalid bg-input-error @enderror {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 1 || $currentStep == 1 ? 'bg-input' : 'bg-input-disabled' }} z-10 block w-full px-3 py-2 text-gray-900 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-accent-dark rounded-md z-10">
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
                                        <select wire:model="additionalEmergencyContactInfo.{{ $loop->index }}.relationshipEmContact"
                                                id="additionalEmergencyContactInfo.{{ $loop->index }}.relationshipEmContact"
                                                name="additionalEmergencyContactInfo.{{ $loop->index }}.relationshipEmContact"
                                                required
                                                {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                                {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 1 || $currentStep == 1 ? '' : 'disabled' }}
                                                value="additionalEmergencyContactInfo.{{ $loop->index }}.relationshipEmContact"
                                                class="@error("additionalEmergencyContactInfo.{$loop->index}.relationshipEmContact") is-invalid bg-input-error @enderror {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 1 || $currentStep == 1 ? 'bg-input' : 'bg-input-disabled' }} z-10 block w-full px-3 py-2 text-gray-900 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-accent-dark rounded-md z-10">
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
                        <div class="flex flex-col items-end w-full">

                            <button type="button"
                                    wire:click.prevent="addEmergencyContact"
                                    class="{{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != 1 ? 'hidden' : 'mb-2' }} inline-flex items-center justify-center h-full font-medium text-white border border-transparent rounded-md shadow-md min-w-36 text-md bg-accent bg-accent_hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <div wire:loading wire:target="addEmergencyContact">
                                    <x-loading-blocks />
                                </div>
                                <div class="flex items-center justify-between w-full p-2 font-bold text-white text-md" wire:loading.remove wire:target="addEmergencyContact">
                                    <img class="flex mr-2" src="/svg/register-icon.svg" alt="Add Another Emergency Contact">
                                    Add Emergency Contact
                                </div>
                            </button>

                            {{-- EDIT BUTTON --}}
                            <button type="button"
                                    wire:click.prevent="{{ $isAdminEditing ? 'validateThisStep(1)'  : ($isAdmin ? 'editAsAdmin(1)' : 'editThisStep(1)') }}"
                                    class="{{ $currentStep != 7 && $isAdminEditing && $stepAdminIsEditing == 1 ? 'hidden' : '' }} {{ $currentStep != 7 && $stepAdminIsEditing != 1 ? 'hidden' : '' }} {{ $isAdminEditing && $stepAdminIsEditing == 1 ? 'bg-accent' : 'bg-edit-btn' }} bg-accent_hover inline-flex items-center justify-center h-full font-medium text-white border border-transparent rounded-md shadow-md min-w-36 text-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            >

                                <div wire:loading
                                    wire:target="{{ $isAdminEditing ? 'validateThisStep(1)'  : ($isAdmin ? 'editAsAdmin(1)' : 'editThisStep(1)') }}"
                                >
                                    <x-loading-blocks />
                                </div>

                                <div class="flex items-center justify-between w-full p-2 font-bold text-white text-md" wire:loading.remove wire:target="{{ $isAdminEditing ? 'validateThisStep(1)'  : ($isAdmin ? 'editAsAdmin(1)' : 'editThisStep(1)') }}">
                                    {{ $isAdminEditing && $stepAdminIsEditing == 1 ? 'Submit Changes' : $stepTitles[1] }}
                                    <img class="flex ml-2 {{ $isAdminEditing && $stepAdminIsEditing == 1 ? 'hidden' : '' }}" src="/svg/edit-solid.svg" alt="Edit Emergency Contacts">
                                </div>

                            </button>

                        </div>

                    </form>

                </div>

            </div>

            <!-- STEP 3 - Legal Information -->
            <div class="{{ $currentStep == 2 || $currentStep == 7 ? '' : 'hidden' }} {{ $currentStep == 7 ? 'border-b-4 border-accent-dark pb-12' : '' }}">

                <div class="relative mt-12">

                    <form id="LegalInformationForm" wire:submit.prevent="completeStep" action="/apply-now" method="POST" class="relative z-10 flex flex-col gap-6">
                        @csrf

                        {{-- SECTION LABEL --}}
                        <div class="flex w-full">

                            <div class="flex justify-start items-center w-full">

                                <h3 class="font-black text-5xl text-gray-900">
                                    Legal Information
                                </h3>

                            </div>

                        </div>

                        {{-- FORM LABEL --}}
                        <div class="flex justify-between items-center w-full">

                            <div class="flex w-1/2">

                                <h3 class="font-black text-2xl text-accent">
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
                                    <input wire:model="legalInfo.isSexOffender"
                                           type="radio"
                                           value="1"
                                           {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                           {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 2 || $currentStep == 2 ? '' : 'disabled' }}
                                           name="legalInfo.isSexOffender"
                                           class="{{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 2 || $currentStep == 2 ? 'bg-input' : 'bg-input-disabled' }}" />
                                    <label class="inline-flex ml-2 text-lg font-black text-red-500">No</label>
                                    <input wire:model="legalInfo.isSexOffender"
                                           type="radio"
                                           value="0"
                                           {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                           {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 2 || $currentStep == 2 ? '' : 'disabled' }}
                                           name="legalInfo.isSexOffender"
                                           class=" {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 2 || $currentStep == 2 ? 'bg-input' : 'bg-input-disabled' }}" />
                                    @error("legalInfo.isSexOffender")
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </fieldset>
                                <label for="legalInfo.isArsonist" class="inline-flex mt-2 text-lg font-black text-red-500 md:mt-0">Have you ever be convicted of arson?</label>
                                <fieldset class="@error("legalInfo.isArsonist") is-invalid @enderror mt-2 mr-2 md:mt-0" id="legalInfo.isArsonist">
                                    <label class="inline-flex text-lg font-black text-red-500">Yes</label>
                                    <input wire:model="legalInfo.isArsonist"
                                           type="radio"
                                           value="1"
                                           {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                           {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 2 || $currentStep == 2 ? '' : 'disabled' }}
                                           name="legalInfo.isArsonist"
                                           class=" {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 2 || $currentStep == 2 ? 'bg-input' : 'bg-input-disabled' }}" />
                                    <label class="inline-flex ml-2 text-lg font-black text-red-500">No</label>
                                    <input wire:model="legalInfo.isArsonist"
                                           type="radio"
                                           value="0"
                                           {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                           {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 2 || $currentStep == 2 ? '' : 'disabled' }}
                                           name="legalInfo.isArsonist"
                                           class=" {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 2 || $currentStep == 2 ? 'bg-input' : 'bg-input-disabled' }}" />
                                    @error("legalInfo.isArsonist")
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </fieldset>
                                <label for="legalInfo.isKidnapper" class="inline-flex mt-2 text-lg font-black text-red-500 md:mt-0">Have you ever be convicted of kidnapping?</label>
                                <fieldset class="@error("legalInfo.isKidnapper") is-invalid @enderror mt-2 mr-2 md:mt-0" id="legalInfo.isKidnapper">
                                    <label class="inline-flex text-lg font-black text-red-500">Yes</label>
                                    <input wire:model="legalInfo.isKidnapper"
                                           type="radio"
                                           value="1"
                                           {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                           {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 2 || $currentStep == 2 ? '' : 'disabled' }}
                                           name="legalInfo.isKidnapper"
                                           class=" {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 2 || $currentStep == 2 ? 'bg-input' : 'bg-input-disabled' }}" />
                                    <label class="inline-flex ml-2 text-lg font-black text-red-500">No</label>
                                    <input wire:model="legalInfo.isKidnapper"
                                           type="radio"
                                           value="0"
                                           {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                           {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 2 || $currentStep == 2 ? '' : 'disabled' }}
                                           name="legalInfo.isKidnapper"
                                           class=" {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 2 || $currentStep == 2 ? 'bg-input' : 'bg-input-disabled' }}" />
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
                                <fieldset class="@error("legalInfo.onLegalSupervision") is-invalid  @enderror" id="legalInfo.onLegalSupervision">
                                    <label class="inline-flex text-lg font-black text-gray-900">Yes</label>
                                    <input wire:model="legalInfo.onLegalSupervision"
                                           type="radio"
                                           value="1"
                                           {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                           {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 2 || $currentStep == 2 ? '' : 'disabled' }}
                                           name="legalInfo.onLegalSupervision"
                                           class=" {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 2 || $currentStep == 2 ? 'bg-input' : 'bg-input-disabled' }}" />
                                    <label class="inline-flex ml-2 text-lg font-black text-gray-900">No</label>
                                    <input wire:model="legalInfo.onLegalSupervision"
                                           type="radio"
                                           value="0"
                                           {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                           {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 2 || $currentStep == 2 ? '' : 'disabled' }}
                                           name="legalInfo.onLegalSupervision"
                                           class=" {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 2 || $currentStep == 2 ? 'bg-input' : 'bg-input-disabled' }}" />
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
                                            <input wire:model="legalInfo.firstName"
                                                   type="text"
                                                   name="legalInfo.firstName"
                                                   id="firstName"
                                                   required
                                                   {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                                   {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 2 || $currentStep == 2 ? '' : 'disabled' }}
                                                   autocomplete="given-name"
                                                   value="legalInfo.firstName"
                                                   class="@error('legalInfo.firstName') is-invalid bg-input-error @enderror {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 2 || $currentStep == 2 ? 'bg-input' : 'bg-input-disabled' }} px-3 py-2 block w-full shadow-lg text-gray-900 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-accent-dark rounded-md z-10">
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
                                            <input wire:model="legalInfo.lastName"
                                                   type="text"
                                                   name="legalInfo.lastName"
                                                   id="legalInfo.lastName"
                                                   required
                                                   {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                                   {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 2 || $currentStep == 2 ? '' : 'disabled' }}
                                                   autocomplete="family-name"
                                                   value="legalInfo.lastName"
                                                   class="@error('legalInfo.lastName') is-invalid bg-input-error @enderror {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 2 || $currentStep == 2 ? 'bg-input' : 'bg-input-disabled' }} px-3 py-2 block w-full shadow-lg text-gray-900 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-accent-dark rounded-md z-10">
                                            @error('legalInfo.lastName')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                {{-- ROW 2 --}}
                                <div class="flex flex-col md:flex-row">
                                    <div class="w-full">
                                        <label for="legalInfo.agency" class="block text-lg font-black text-gray-700">Agency</label>
                                        <div class="mt-1">
                                            <input wire:model="legalInfo.agency"
                                                   type="text"
                                                   name="legalInfo.agency"
                                                   id="legalInfo.agency"
                                                   required
                                                   {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                                   {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 2 || $currentStep == 2 ? '' : 'disabled' }}
                                                   autocomplete="organization"
                                                   value="legalInfo.agency"
                                                   class="@error('legalInfo.agency') is-invalid bg-input-error @enderror {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 2 || $currentStep == 2 ? 'bg-input' : 'bg-input-disabled' }} px-3 py-2 block w-full shadow-lg text-gray-900 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-accent-dark rounded-md z-10">
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
                                            <input wire:model="legalInfo.phone"
                                                   type="tel"
                                                   name="legalInfo.phone"
                                                   id="legalInfo.phone"
                                                   required
                                                   {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                                   {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 2 || $currentStep == 2 ? '' : 'disabled' }}
                                                   autocomplete="tel"
                                                   value="legalInfo.phone"
                                                   class="@error('legalInfo.phone') is-invalid bg-input-error @enderror {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 2 || $currentStep == 2 ? 'bg-input' : 'bg-input-disabled' }} px-3 py-2 block w-full shadow-lg text-gray-900 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-accent-dark rounded-md z-10">
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

                                    <h3 class="font-black text-2xl text-gray-900 {{ $isAdminEditing && $stepAdminIsEditing == 2 ? '' : (count($legalInfo['convictions']) == 0 ? 'hidden' : '') }}">
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
                                                                class=" {{ $currentStep == 7 && !$isAdminEditing ? 'hidden' : '' }} inline-flex items-center justify-center h-full p-2 font-medium text-white border border-transparent rounded-md shadow-md min-w-36 text-md bg-red-500 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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

                                                <div class="mt-2">
                                                    <input wire:model="legalInfo.convictions.{{ $loop->index }}"
                                                           type="text"
                                                           name="legalInfo.convictions.{{ $loop->index }}"
                                                           id="legalInfo.convictions.{{ $loop->index }}"
                                                           required
                                                           {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                                           {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 2 || $currentStep == 2 ? '' : 'disabled' }}
                                                           autocomplete="given-name"
                                                           value="legalInfo.convictions.{{ $loop->index }}"
                                                           class="@error("legalInfo.convictions.{$loop->index}") is-invalid bg-input-error @enderror {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 2 || $currentStep == 2 ? 'bg-input' : 'bg-input-disabled' }} px-3 py-2 block w-full shadow-lg text-gray-900 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-accent-dark rounded-md z-10">
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
                                    <div class="flex justify-end w-full {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != 2 ? 'hidden' : '' }}">

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

                        {{-- EDIT BUTTON --}}
                        <div class="flex justify-end w-full {{ $currentStep != 7 ? 'hidden' : '' }}">

                            <button type="button"
                                    wire:click.prevent="{{ $isAdminEditing ? 'validateThisStep(2)'  : ($isAdmin ? 'editAsAdmin(2)' : 'editThisStep(2)') }}"
                                    class="{{ $currentStep != 7 && $isAdminEditing && $stepAdminIsEditing == 2 ? 'hidden' : '' }} {{ $isAdminEditing && $stepAdminIsEditing == 2 ? 'bg-accent' : 'bg-edit-btn' }} inline-flex items-center justify-center h-full font-medium text-white border border-transparent rounded-md shadow-md min-w-36 text-md bg-edit-btn bg-accent_hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            >

                                <div wire:loading
                                    wire:target="{{ $isAdminEditing ? 'validateThisStep(2)'  : ($isAdmin ? 'editAsAdmin(2)' : 'editThisStep(2)') }}"
                                >
                                    <x-loading-blocks />
                                </div>

                                <div class="flex items-center justify-between w-full p-2 font-bold text-white text-md" wire:loading.remove wire:target="{{ $isAdminEditing ? 'validateThisStep(2)'  : ($isAdmin ? 'editAsAdmin(2)' : 'editThisStep(2)') }}">
                                    {{ $isAdminEditing && $stepAdminIsEditing == 2 ? 'Submit Changes' : $stepTitles[2] }}
                                    <img class="flex ml-2 {{ $isAdminEditing && $stepAdminIsEditing == 2 ? 'hidden' : '' }}" src="/svg/edit-solid.svg" alt="Edit Personal Information">
                                </div>

                            </button>

                        </div>

                    </form>

                </div>

            </div>

            <!-- STEP 4 - Medical Information -->
            <div class="{{ $currentStep == 3 || $currentStep == 7 ? '' : 'hidden' }} {{ $currentStep == 7 ? 'border-b-4 border-accent-dark pb-12' : '' }}">

                <div class="relative mt-12">

                    <form id="medicalInformationForm" wire:submit.prevent="completeStep" action="/apply-now" method="POST" class="relative z-10 flex flex-col gap-6">
                        @csrf

                        {{-- SECTION LABEL --}}
                        <div class="flex w-full">

                            <div class="flex justify-start items-center w-full">

                                <h3 class="font-black text-5xl text-gray-900">
                                    Medical Information
                                </h3>

                            </div>

                        </div>

                        {{-- FORM LABEL --}}
                        <div class="flex justify-between items-center w-full">

                            <div class="flex w-1/2">

                                <h3 class="font-black text-2xl text-accent">
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

                                <fieldset class="@error("medicalInfo.hasScripts") is-invalid bg-input-error @enderror" id="medicalInfo.hasScripts">

                                    <label class="inline-flex text-lg font-black text-red-500">Yes</label>
                                    <input wire:model="medicalInfo.hasScripts"
                                           wire:click="addMedicationOnYes"
                                           type="radio"
                                           value="1"
                                           {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                           {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 3 || $currentStep == 3 ? '' : 'disabled' }}
                                           name="medicalInfo.hasScripts"
                                           class="{{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 3 || $currentStep == 3 ? 'bg-input' : 'bg-input-disabled' }}" />

                                    <label class="inline-flex ml-2 text-lg font-black text-red-500">No</label>
                                    <input wire:model="medicalInfo.hasScripts"
                                           type="radio"
                                           value="0"
                                           {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                           {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 3 || $currentStep == 3 ? '' : 'disabled' }}
                                           name="medicalInfo.hasScripts"
                                           class="{{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 3 || $currentStep == 3 ? 'bg-input' : 'bg-input-disabled' }}" />

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

                                    <h3 class="font-black text-2xl text-gray-900 {{ count($medicalInfo['medications']) == 0 && !$isAdminEditing ? 'hidden' : '' }}">
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
                                                                class=" {{ $currentStep == 7 && !$isAdminEditing ? 'hidden' : '' }} inline-flex items-center justify-center h-full p-2 font-medium text-white border border-transparent rounded-md shadow-md min-w-36 text-md bg-red-500 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
                                                    <input wire:model="medicalInfo.medications.{{ $loop->index  }}"
                                                           type="text"
                                                           name="medicalInfo.medications.{{ $loop->index }}"
                                                           id="medicalInfo.medications.{{ $loop->index }}"
                                                           required
                                                           {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                                           {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 3 || $currentStep == 3 ? '' : 'disabled' }}
                                                           autocomplete="given-name"
                                                           value="medicalInfo.medications.{{ $loop->index }}"
                                                           class="@error("medicalInfo.medications.{$loop->index}") is-invalid bg-input-error @enderror {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 3 || $currentStep == 3 ? 'bg-input' : 'bg-input-disabled' }} px-3 py-2 block w-full shadow-lg text-gray-900 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-accent-dark rounded-md z-10">
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
                                                class="{{ $currentStep == 7 && !$isAdminEditing ? 'hidden' : '' }}inline-flex items-center justify-center h-full font-medium text-white border border-transparent rounded-md shadow-md min-w-36 text-md bg-accent bg-accent_hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
                        <div class="grid grid-cols-1 {{ $isAdminEditing && $stepAdminIsEditing == 3 ? '' : ($medicalInfo['drugUse']['drugOfChoice'][0] == '' && $currentStep == 7 && $stepAdminIsEditing != 3 ? 'hidden' : '') }}">

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
                                                    <input wire:model="medicalInfo.drugUse.drugOfChoice.{{ $loop->index  }}"
                                                           type="text"
                                                           name="medicalInfo.drugUse.drugOfChoice.{{ $loop->index }}"
                                                           id="medicalInfo.drugUse.drugOfChoice.{{ $loop->index }}"
                                                           required
                                                           {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                                           {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 3 || $currentStep == 3 ? '' : 'disabled' }}
                                                           autocomplete="given-name"
                                                           value="medicalInfo.drugUse.drugOfChoice.{{ $loop->index }}"
                                                           class="@error("medicalInfo.drugUse.drugOfChoice.{$loop->index}") is-invalid bg-input-error @enderror {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 3 || $currentStep == 3 ? 'bg-input' : 'bg-input-disabled' }} px-3 py-2 block w-full shadow-lg text-gray-900 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-accent-dark rounded-md z-10">
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
                                                            <input wire:model="medicalInfo.drugUse.lastUse.{{ $loop->index  }}"
                                                                   type="date"
                                                                   name="medicalInfo.drugUse.lastUse.{{ $loop->index }}"
                                                                   id="medicalInfo.drugUse.lastUse.{{ $loop->index }}"
                                                                   required
                                                                   {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                                                   {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 3 || $currentStep == 3 ? '' : 'disabled' }}
                                                                   autocomplete="given-name"
                                                                   value="{{ $today }}"
                                                                   class="@error("medicalInfo.drugUse.lastUse.{$loop->index}") is-invalid bg-input-error @enderror {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 3 || $currentStep == 3 ? 'bg-input' : 'bg-input-disabled' }} px-3 py-2 block w-full shadow-lg text-gray-900 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-accent-dark rounded-md z-10">
                                                        </div>

                                                        <button type="button"
                                                                wire:key="{{ $loop->index }}"
                                                                wire:click.prevent="removeDrugOfChoice({{ $loop->index }})"
                                                                class="{{ $currentStep == 7 && !$isAdminEditing ? 'hidden' : '' }} inline-flex items-center justify-center h-full p-2 font-medium text-white border border-transparent rounded-md shadow-md  text-md bg-red-500 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                            <div wire:loading wire:target="removeDrugOfChoice({{ $loop->index }})">
                                                                <x-loading-blocks />
                                                            </div>
                                                            <div class="flex items-center justify-between w-full font-bold text-white text-md" wire:loading.remove wire:target="removeDrugOfChoice({{ $loop->index }})">
                                                                {{-- <img class="flex mr-2" src="/svg/remove-user-icon.svg" alt="Romove Drug of Choice"> --}}
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
                                                class="{{ $currentStep == 7 ? 'hidden' : '' }} inline-flex items-center justify-center h-full font-medium text-white border border-transparent rounded-md shadow-md min-w-36 text-md bg-accent bg-accent_hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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

                        {{-- EDIT BUTTON --}}
                        <div class="flex justify-end w-full {{ $currentStep != 7 ? 'hidden' : '' }}">

                            <button type="button"
                                    wire:click.prevent="{{ $isAdminEditing ? 'validateThisStep(3)'  : ($isAdmin ? 'editAsAdmin(3)' : 'editThisStep(3)') }}"
                                    class="{{ $currentStep != 7 && $isAdminEditing && $stepAdminIsEditing == 3 ? 'hidden' : '' }} {{ $isAdminEditing && $stepAdminIsEditing == 3 ? 'bg-accent' : 'bg-edit-btn' }} inline-flex items-center justify-center h-full font-medium text-white border border-transparent rounded-md shadow-md min-w-36 text-md bg-edit-btn bg-accent_hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            >

                                <div wire:loading
                                    wire:target="{{ $isAdminEditing ? 'validateThisStep(3)'  : ($isAdmin ? 'editAsAdmin(3)' : 'editThisStep(3)') }}"
                                >
                                    <x-loading-blocks />
                                </div>

                                <div class="flex items-center justify-between w-full p-2 font-bold text-white text-md" wire:loading.remove wire:target="{{ $isAdminEditing ? 'validateThisStep(3)'  : ($isAdmin ? 'editAsAdmin(3)' : 'editThisStep(3)') }}">
                                    {{ $isAdminEditing && $stepAdminIsEditing == 3 ? 'Submit Changes' : $stepTitles[3] }}
                                    <img class="flex ml-2 {{ $isAdminEditing && $stepAdminIsEditing == 3 ? 'hidden' : '' }}" src="/svg/edit-solid.svg" alt="Edit Personal Information">
                                </div>

                            </button>

                        </div>

                    </form>

                </div>

            </div>

            <!-- STEP 5 - Funding Information -->
            <div class="{{ $currentStep == 4 || $currentStep == 7 ? '' : 'hidden' }} {{ $currentStep == 7 ? 'border-b-4 border-accent-dark pb-12' : '' }}">

                <div class="relative mt-12">

                    <form id="fundingInformationForm" wire:submit.prevent="completeStep" action="/apply-now" method="POST" class="relative z-10 flex flex-col gap-6">
                        @csrf

                        {{-- SECTION LABEL --}}
                        <div class="flex w-full">

                            <div class="flex justify-start items-center w-full">

                                <h3 class="font-black text-5xl text-gray-900">
                                    Funding Information
                                </h3>

                            </div>

                        </div>

                        {{-- Section Label --}}
                        <div class="flex justify-between items-center w-full">

                            <div class="flex w-1/2">

                                <h3 class="font-black text-2xl text-accent">
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

                                <fieldset class="@error("fundingInfo.hasLivedWithPVSL") is-invalid bg-input-error @enderror" id="fundingInfo.hasLivedWithPVSL">

                                    <label class="inline-flex text-lg font-black text-red-500">Yes</label>
                                    <input wire:model="fundingInfo.hasLivedWithPVSL"
                                           type="radio"
                                           value="1"
                                           {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                           {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 4 || $currentStep == 4 ? '' : 'disabled' }}
                                           name="fundingInfo.hasLivedWithPVSL"
                                           class="{{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 4 || $currentStep == 4 ? 'bg-input' : 'bg-input-disabled' }}" />

                                    <label class="inline-flex ml-2 text-lg font-black text-red-500">No</label>
                                    <input wire:model="fundingInfo.hasLivedWithPVSL"
                                           type="radio"
                                           value="0"
                                           {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                           {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 4 || $currentStep == 4 ? '' : 'disabled' }}
                                           name="fundingInfo.hasLivedWithPVSL"
                                           class="{{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 4 || $currentStep == 4 ? 'bg-input' : 'bg-input-disabled' }}" />

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
                                            <input wire:model="fundingInfo.moveOutDate"
                                                   type="date"
                                                   name="fundingInfo.moveOutDate"
                                                   id="fundingInfo.moveOutDate"
                                                   required
                                                   {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                                   {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 4 || $currentStep == 4 ? '' : 'disabled' }}
                                                   autocomplete=""
                                                   value="fundingInfo.moveOutDate"
                                                   class="@error('fundingInfo.moveOutDate') is-invalid bg-input-error @enderror {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 4 || $currentStep == 4 ? 'bg-input' : 'bg-input-disabled' }} px-3 py-2 block w-full shadow-lg text-gray-900 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-accent-dark rounded-md z-10">
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
                                            <select wire:model="fundingInfo.reasonForLeaving"
                                                    id="fundingInfo.reasonForLeaving"
                                                    name="fundingInfo.reasonForLeaving"
                                                    required
                                                    {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                                    {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 4 || $currentStep == 4 ? '' : 'disabled' }}
                                                    value="fundingInfo.reasonForLeaving"
                                                    class="@error("fundingInfo.reasonForLeaving") is-invalid bg-input-error @enderror {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 4 || $currentStep == 4 ? 'bg-input' : 'bg-input-disabled' }} px-3 py-2 block w-full shadow-lg text-gray-900 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-accent-dark rounded-md z-10">
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

                            <fieldset class="@error("fundingInfo.hasPaidAdminFee") is-invalid bg-input-error @enderror" id="fundingInfo.hasPaidAdminFee">

                                <label class="inline-flex text-lg font-black text-red-500">Yes</label>
                                <input wire:model="fundingInfo.hasPaidAdminFee"
                                       type="radio"
                                       value="1"
                                       {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                       {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 4 || $currentStep == 4 ? '' : 'disabled' }}
                                       name="fundingInfo.hasPaidAdminFee"
                                       class="{{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 4 || $currentStep == 4 ? 'bg-input' : 'bg-input-disabled' }}" />

                                <label class="inline-flex ml-2 text-lg font-black text-red-500">No</label>
                                <input wire:model="fundingInfo.hasPaidAdminFee"
                                       type="radio"
                                       value="0"
                                       {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                       {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 4 || $currentStep == 4 ? '' : 'disabled' }}
                                       name="fundingInfo.hasPaidAdminFee"
                                       class="{{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 4 || $currentStep == 4 ? 'bg-input' : 'bg-input-disabled' }}" />

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

                                            <div class="flex w-full justify-content-between {{ $loop->index == 0 ? 'mt-4' : '' }}">

                                                <h4 class="flex text-lg font-black text-gray-900 my-3 {{ $loop->index == 0 ? 'hidden' : '' }}">
                                                    Source #{{ $loop->index + 1 }}
                                                </h4>

                                                <button type="button"
                                                        wire:click.prevent="removeFundingSource({{ $loop->index }})"
                                                        class="{{ $loop->index == 0 ? 'hidden' : '' }} {{ $currentStep == 7 && !$isAdminEditing ? 'hidden' : '' }} inline-flex items-center justify-center h-full p-2 font-medium text-white border border-transparent rounded-md shadow-md min-w-36 text-md bg-red-500 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
                                                        <input wire:model="fundingInfo.sources.{{ $loop->index }}.name"
                                                               type="text" name="fundingInfo.sources.{{ $loop->index }}.name"
                                                               id="fundingInfo.sources.{{ $loop->index }}.name"
                                                               required
                                                               {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                                               {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 4 || $currentStep == 4 ? '' : 'disabled' }}
                                                               autocomplete="given-name"
                                                               value="fundingInfo.sources.{{ $loop->index }}.name"
                                                               class="@error("fundingInfo.sources.{$loop->index}.name") is-invalid bg-input-error @enderror {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 4 || $currentStep == 4 ? 'bg-input' : 'bg-input-disabled' }} px-3 py-2 block w-full shadow-lg text-gray-900 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-accent-dark rounded-md z-10">
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
                                                            <span class="text-gray-900 sm:text-sm">
                                                                $
                                                            </span>
                                                        </div>
                                                        <input wire:model="fundingInfo.sources.{{ $loop->index }}.amount"
                                                               type="text"
                                                               name="fundingInfo.sources.{{ $loop->index }}.amount"
                                                               id="fundingInfo.sources.{{ $loop->index }}.amount"
                                                               required
                                                               {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                                               {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 4 || $currentStep == 4 ? '' : 'disabled' }}
                                                               autocomplete="given-name"
                                                               value="fundingInfo.sources.{{ $loop->index }}.amount"
                                                               class="@error("fundingInfo.sources.{$loop->index}.amount") is-invalid bg-input-error @enderror {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 4 || $currentStep == 4 ? 'bg-input' : 'bg-input-disabled' }} block w-full shadow-lg text-gray-900 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-accent-dark rounded-md z-10 block text-center"
                                                               placeholder="0.00" />
                                                        <div class="absolute inset-y-0 right-0 flex items-center">
                                                            <label for="pricefundingInfo.sources.{{ $loop->index }}.frequency" class="sr-only">Pay Frequency</label>
                                                            <select wire:model="fundingInfo.sources.{{ $loop->index }}.frequency"
                                                                    id="fundingInfo.sources.{{ $loop->index }}.frequency"
                                                                    name="fundingInfo.sources.{{ $loop->index }}.frequency"
                                                                    required
                                                                    {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                                                    {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 4 || $currentStep == 4 ? '' : 'disabled' }}
                                                                    autocomplete=""
                                                                    value="fundingInfo.sources.{{ $loop->index }}.frequency"
                                                                    class="focus:ring-indigo-500 focus:border-indigo-500 h-full py-0 pl-2 pr-7 border-transparent bg-transparent text-gray-900 sm:text-sm rounded-md">
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
                                                            <input wire:model="fundingInfo.sources.{{ $loop->index }}.startDate"
                                                                   type="date"
                                                                   name="fundingInfo.sources.{{ $loop->index }}.startDate"
                                                                   id="fundingInfo.sources.{{ $loop->index }}.startDate"
                                                                   required
                                                                   {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                                                   {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 4 || $currentStep == 4 ? '' : 'disabled' }}
                                                                   autocomplete=""
                                                                   value="{{ $today }}"
                                                                   class="@error("fundingInfo.sources.{$loop->index}.startDate") is-invalid bg-input-error @enderror {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 4 || $currentStep == 4 ? 'bg-input' : 'bg-input-disabled' }} px-3 py-2 block w-full shadow-lg text-gray-900 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-accent-dark rounded-md z-10">
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
                                                        <input wire:model="fundingInfo.sources.{{ $loop->index }}.reference.firstName"
                                                               type="text"
                                                               name="fundingInfo.sources.{{ $loop->index }}.reference.firstName"
                                                               id="fundingInfo.sources.{{ $loop->index }}.reference.firstName"
                                                               required
                                                               {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                                               {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 4 || $currentStep == 4 ? '' : 'disabled' }}
                                                               autocomplete="given-name"
                                                               value="fundingInfo.sources.{{ $loop->index }}.reference.firstName"
                                                               class="@error("fundingInfo.sources.{$loop->index}.reference.firstName") is-invalid bg-input-error @enderror {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 4 || $currentStep == 4 ? 'bg-input' : 'bg-input-disabled' }} px-3 py-2 block w-full shadow-lg text-gray-900 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-accent-dark rounded-md z-10">
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
                                                        <input wire:model="fundingInfo.sources.{{ $loop->index }}.reference.lastName"
                                                               type="text"
                                                               name="fundingInfo.sources.{{ $loop->index }}.reference.lastName"
                                                               id="fundingInfo.sources.{{ $loop->index }}.reference.lastName"
                                                               required
                                                               {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                                               {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 4 || $currentStep == 4 ? '' : 'disabled' }}
                                                               autocomplete="given-name"
                                                               value="fundingInfo.sources.{{ $loop->index }}.reference.lastName"
                                                               class="@error("fundingInfo.sources.{$loop->index}.reference.lastName") is-invalid bg-input-error @enderror {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 4 || $currentStep == 4 ? 'bg-input' : 'bg-input-disabled' }} px-3 py-2 block w-full shadow-lg text-gray-900 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-accent-dark rounded-md z-10">
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
                                                            <input wire:model="fundingInfo.sources.{{ $loop->index }}.reference.phone"
                                                                   type="text"
                                                                   name="fundingInfo.sources.{{ $loop->index }}.reference.phone"
                                                                   id="fundingInfo.sources.{{ $loop->index }}.reference.phone"
                                                                   required
                                                                   {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                                                   {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 4 || $currentStep == 4 ? '' : 'disabled' }}
                                                                   autocomplete=""
                                                                   value="fundingInfo.sources.{{ $loop->index }}.reference.phone"
                                                                   class="@error("fundingInfo.sources.{$loop->index}.reference.phone") is-invalid bg-input-error @enderror {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 4 || $currentStep == 4 ? 'bg-input' : 'bg-input-disabled' }} px-3 py-2 block w-full shadow-lg text-gray-900 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-accent-dark rounded-md z-10">
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
                                                class="{{ $currentStep == 7 && !$isAdminEditing ? 'hidden' : '' }} inline-flex items-center justify-center h-full font-medium text-white border border-transparent rounded-md shadow-md min-w-36 text-md bg-accent bg-accent_hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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

                        {{-- EDIT BUTTON --}}
                        <div class="flex justify-end w-full {{ $currentStep != 7 ? 'hidden' : '' }}">

                            <button type="button"
                                    wire:click.prevent="{{ $isAdminEditing ? 'validateThisStep(4)'  : ($isAdmin ? 'editAsAdmin(4)' : 'editThisStep(4)') }}"
                                    class="{{ $currentStep != 7 && $isAdminEditing && $stepAdminIsEditing == 4 ? 'hidden' : '' }} {{ $isAdminEditing && $stepAdminIsEditing == 4 ? 'bg-accent' : 'bg-edit-btn' }} inline-flex items-center justify-center h-full font-medium text-white border border-transparent rounded-md shadow-md min-w-36 text-md bg-edit-btn bg-accent_hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            >

                                <div wire:loading
                                    wire:target="{{ $isAdminEditing ? 'validateThisStep(4)'  : ($isAdmin ? 'editAsAdmin(4)' : 'editThisStep(4)') }}"
                                >
                                    <x-loading-blocks />
                                </div>

                                <div class="flex items-center justify-between w-full p-2 font-bold text-white text-md" wire:loading.remove wire:target="{{ $isAdminEditing ? 'validateThisStep(4)'  : ($isAdmin ? 'editAsAdmin(4)' : 'editThisStep(4)') }}">
                                    {{ $isAdminEditing && $stepAdminIsEditing == 4 ? 'Submit Changes' : $stepTitles[4] }}
                                    <img class="flex ml-2 {{ $isAdminEditing && $stepAdminIsEditing == 4 ? 'hidden' : '' }}" src="/svg/edit-solid.svg" alt="Edit Personal Information">
                                </div>

                            </button>

                        </div>

                    </form>

                </div>

            </div>

            <!-- STEP 6 - Identification Information -->
            <div class="{{ $currentStep == 5 || $currentStep == 7 ? '' : 'hidden' }} relative {{ $currentStep == 7 ? 'border-b-4 border-accent-dark pb-12' : '' }}">

                <div class="relative mt-12">

                    <form id="identificationInformationForm" wire:submit.prevent="completeStep" action="/apply-now" method="POST" class="relative z-10 flex flex-col items-center gap-6">
                        @csrf

                        {{-- SECTION LABEL --}}
                        <div class="flex w-full">

                            <div class="flex justify-start items-center w-full">

                                <h3 class="font-black text-5xl text-gray-900">
                                    Identification Information
                                </h3>

                            </div>

                        </div>

                        {{-- FORM LABEL --}}
                        <div class="flex justify-between items-center w-full">

                            <div class="flex w-1/2 sm:w-full">

                                <h3 class="font-black text-xl text-accent">
                                    Picture Identification
                                </h3>

                            </div>

                        </div>

                        {{-- FORM ROW 1 --}}
                        <div class="grid grid-cols-8 gap-2">

                            <div class="md:col-span-2 col-span-4 ">
                                <label for="identificationInfo.type" class="block text-lg font-black text-gray-700">Type</label>
                                <div class="mt-1">
                                    <label for="identificationInfo.type" class="sr-only">Type</label>
                                    <select wire:model="identificationInfo.type"
                                            id="identificationInfo.type"
                                            name="identificationInfo.type"
                                            required
                                            {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                            {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 5 || $currentStep == 5 ? '' : 'disabled' }}
                                            value="identificationInfo.type"
                                            class="@error("identificationInfo.type") is-invalid bg-input-error @enderror {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 5 || $currentStep == 5 ? 'bg-input' : 'bg-input-disabled' }} px-3 py-2 block w-full shadow-lg text-gray-900 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-accent-dark rounded-md z-10">
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

                            <div class="md:col-span-2 col-span-4 ">
                                <label for="identificationInfo.state" class="block text-lg font-black text-gray-700">State</label>
                                <div class="mt-1">
                                    <label for="identificationInfo.state" class="sr-only">State</label>
                                    <select wire:model="identificationInfo.state"
                                            id="identificationInfo.state"
                                            name="identificationInfo.state"
                                            required
                                            {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                            {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 5 || $currentStep == 5 ? '' : 'disabled' }}
                                            value="identificationInfo.state"
                                            class="@error("identificationInfo.state") is-invalid bg-input-error @enderror {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 5 || $currentStep == 5 ? 'bg-input' : 'bg-input-disabled' }} px-3 py-2 block w-full shadow-lg text-gray-900 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-accent-dark rounded-md z-10">
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

                            <div class="md:col-span-2 col-span-5 ">
                                <label for="identificationInfo.number" class="block text-lg font-black text-gray-700">Number</label>
                                <div class="mt-1">
                                    <input wire:model="identificationInfo.number"
                                           type="text"
                                           name="identificationInfo.number"
                                           id="identificationInfo.number"
                                           required
                                           {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                           {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 5 || $currentStep == 5 ? '' : 'disabled' }}
                                           autocomplete=""
                                           value="identificationInfo.number"
                                           class="@error('identificationInfo.number') is-invalid bg-input-error @enderror {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 5 || $currentStep == 5 ? 'bg-input' : 'bg-input-disabled' }} px-3 py-2 block w-full shadow-lg text-gray-900 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-accent-dark rounded-md z-10">
                                    @error('identificationInfo.number')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="md:col-span-2 col-span-3 ">
                                <label for="identificationInfo.expiration" class="block text-lg font-black text-gray-700">Expiration Date</label>
                                <div class="mt-1">
                                    <input wire:model="identificationInfo.expiration"
                                           type="date"
                                           name="identificationInfo.expiration"
                                           id="identificationInfo.expiration"
                                           required
                                           {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                           {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 5 || $currentStep == 5 ? '' : 'disabled' }}
                                           autocomplete=""
                                           value="identificationInfo.expiration"
                                           class="@error('identificationInfo.expiration') is-invalid bg-input-error @enderror {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 5 || $currentStep == 5 ? 'bg-input' : 'bg-input-disabled' }} px-3 py-2 block w-full shadow-lg text-gray-900 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-accent-dark rounded-md z-10">
                                    @error('identificationInfo.expiration')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        {{-- Upload ID Card --}}
                        <div class="{{ $hasIDCardUpload == true || $previewActive == true ? 'hidden' : '' }} flex w-full justify-center items-center relative z-10 md:w-1/5 mt-4">

                                <button type="button"
                                        wire:click.prevent="toggleHasIDCardUpload"
                                        class="{{ $currentStep == 7 && $stepAdminIsEditing != 5 ? 'hidden' : '' }} flex items-center justify-center w-full font-medium text-white border border-transparent rounded-md shadow-md text-md bg-accent bg-accent_hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <div wire:loading wire:target="toggleHasIDCardUpload">
                                        <x-loading-blocks />
                                    </div>
                                    <div class="flex items-center md:justify-between justify-center w-full p-2 font-bold text-white text-md" wire:loading.remove wire:target="toggleHasIDCardUpload">
                                        <img class="flex mr-2" src="/svg/register-icon.svg" alt="Upload ID Card">
                                        Upload ID Card
                                    </div>
                                </button>

                        </div>

                        {{-- FORM ROW 3 --}}
                        <div class="{{ $hasIDCardUpload == false ? 'hidden' : '' }} flex gap-4 w-full relative z-10 mt-4 {{ $previewActive ? 'z-preview' : '' }} md:flex-row flex-col justify-center items-center">

                            {{-- FRONT OF ID --}}
                            <div x-data="{ photoIdCardFront, isUploading: false, progress: 0 }"
                                 x-on:livewire-upload-start="isUploading = true"
                                 x-on:livewire-upload-finish="isUploading = false"
                                 x-on:livewire-upload-error="isUploading = false"
                                 x-on:livewire-upload-progress="progress = $event.detail.progress"
                                 class="flex flex-col items-center md:w-1/2 w-full relative {{ $currentStep == 7 && !isset($photoIdCardFront) && $stepAdminIsEditing != 5 ? 'hidden' : '' }}"
                            >

                                <label class="inline-block mb-2 font-black text-lg text-gray-900">

                                    FRONT{{ $identificationInfo['type'] ? ' of ' . $identificationInfo['type'] : '' }}

                                </label>

                                <div x-data="{ photoIdCardFront: $wire.photoIdCardFront }"
                                     id="photoIdCardFrontDropZone"
                                     x-on:mouseover="$el.classList.add('active')"
                                     x-on:mouseleave="$el.classList.remove('active')"
                                     x-on:dragover="$el.classList.add('active')"
                                     x-on:dragleave="$el.classList.remove('active')"
                                     x-on:drop="$el.classList.remove('active')"
                                     class="flex w-full max-h-max p-3 bg-white rounded-md shadow-lg focus:ring-indigo-500 focus:border-indigo-500 relative z-10"
                                >
                                    <input x-data="{ photoIdCardFront }"
                                           wire:model="photoIdCardFront"
                                           x-on:change="photoIdCardFront = $event.target.files; console.log($event.target.files);"
                                           id="photoIdCardFront"
                                           name="photoIdCardFront"
                                           value="photoIdCardFront"
                                           type="file"
                                           {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                           {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 5 || $currentStep == 5 ? '' : 'disabled' }}
                                           class="@error("photoIdCardFront") is-invalid bg-input-error @enderror absolute inset-0 opacity-0 w-full cursor-pointer" />

                                    <div wire:loading.remove
                                            wire:target="photoIdCardFront"
                                            class="{{ $photoIdCardFront ? 'p-1' : 'p-6' }} flex flex-col w-full items-center border-2 border-gray-300 border-dashed rounded-md"
                                    >

                                        <div class="{{ $photoIdCardFront ? 'hidden' : '' }} flex flex-col items-center w-full">

                                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>

                                            <div class="flex text-sm text-gray-600">

                                                <label for="photoIdCardFront" class="relative bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
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

                                        <div class="{{ $previewIDFrontActive ? 'fixed inset-0 bg-gray-900 bg-opacity-95 z-50' : 'relative' }} flex w-full justify-center items-center ">

                                            @if ($photoIdCardFront)

                                                <div class="{{ $previewIDFrontActive ? 'relative p-2 m-auto z-50' : '' }} max-w-xl max-h-xl bg-gray-300 bg-opacity-50 rounded-lg">

                                                    <div class="relative z-10">

                                                        <img wire:click.prevent="toggleIDFrontPreview()" class="w-full h-auto rounded-lg border-1 border-gray-600 shadow-md {{ $previewIDFrontActive ? 'pointer-events-none cursor-none' : 'cursor-pointer' }} " src="{{ $photoIdCardFront->temporaryUrl() }}" alt="{{ $photoIdCardFront->getClientOriginalName() }}">

                                                        <div class="{{ $previewIDFrontActive ? 'relative' : 'hidden' }} flex flex-col items-center w-full mt-4">

                                                            <h3 class="text-md text-gray-900 font-semibold text-center">
                                                                Name: {{ $photoIdCardFront->getClientOriginalName() }}
                                                            </h3>

                                                            <p class="text-sm text-gray-600 font-bold text-center mt-1">
                                                                @php
                                                                    $fileSize = number_format((float)($photoIdCardFront->getSize() / 1024), 2, '.', '');
                                                                @endphp
                                                                @if ($fileSize < 1024.0)
                                                                    <span class="text-gray-900 text-md font-semibold">Size:</span> {{ number_format((float)($photoIdCardFront->getSize() / 1024), 2, '.', '') . ' KB' }}
                                                                @else
                                                                    <span class="text-gray-900 text-md font-semibold">Size:</span> {{ number_format((float)($photoIdCardFront->getSize() / (1024 * 1024)), 2, '.', '') . ' MB' }}
                                                                @endif
                                                            </p>

                                                            <button type="button"
                                                                    wire:click.prevent.stop="toggleIDFrontPreview()"
                                                                    class="w-full mt-3 font-medium text-white border border-transparent rounded-md shadow-xl text-md bg-red-500 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                            >

                                                                <div wire:loading wire:target="toggleIDFrontPreview()">
                                                                    <x-loading-blocks />
                                                                </div>

                                                                <div class="flex items-center justify-center w-full p-2 font-bold text-white text-md" wire:loading.remove wire:target="toggleIDFrontPreview()">
                                                                    Close Preview
                                                                </div>

                                                            </button>

                                                        </div>

                                                    </div>

                                                </div>

                                            @endif

                                        </div>

                                        <div class="{{ !$previewIDFrontActive ? 'hidden' : '' }} relative flex w-full justify-center items-center">

                                            @if ($photoIdCardFront)
                                                <img class="w-full h-auto rounded-lg border-1 border-gray-600 shadow-md pointer-events-auto" src="{{ $photoIdCardFront->temporaryUrl() }}" alt="{{ $photoIdCardFront->getClientOriginalName() }}">
                                            @endif

                                        </div>

                                    </div>

                                    <div wire:loading wire:target="photoIdCardFront" class="flex w-full h-full justify-center items-center shadow-xl">

                                        <div class="flex w-full" x-show="isUploading">
                                            <progress class="flex w-full" max="100" x-bind:value="progress"></progress>
                                        </div>

                                    </div>

                                </div>

                                @error("photoIdCardFront")
                                    <div class="flex w-full invalid-feedback pl-7" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror

                            </div>

                            {{-- BACK OF ID --}}
                            <div x-data="{ photoIdCardBack, isUploading: false, progress: 0 }"
                                 x-on:livewire-upload-start="isUploading = true"
                                 x-on:livewire-upload-finish="isUploading = false"
                                 x-on:livewire-upload-error="isUploading = false"
                                 x-on:livewire-upload-progress="progress = $event.detail.progress"
                                 class="flex flex-col items-center md:w-1/2 w-full relative {{ $currentStep == 7 && !isset($photoIdCardFront) && $stepAdminIsEditing != 5 ? 'hidden' : '' }}"
                            >

                                <label class="inline-block mb-2 font-black text-lg text-gray-900">

                                    BACK{{ $identificationInfo['type'] ? ' of ' . $identificationInfo['type'] : '' }}

                                </label>

                                <div x-data="{ photoIdCardBack: $wire.photoIdCardBack }"
                                        id="photoIdCardBackDropZone"
                                        x-on:mouseover="$el.classList.add('active')"
                                        x-on:mouseleave="$el.classList.remove('active')"
                                        x-on:dragover="$el.classList.add('active')"
                                        x-on:dragleave="$el.classList.remove('active')"
                                        x-on:drop="$el.classList.remove('active')"
                                        class="flex w-full max-h-max p-3 bg-white rounded-md shadow-lg focus:ring-indigo-500 focus:border-indigo-500 relative {{ $previewIDFrontActive ? 'z-0' : 'z-10' }}"
                                >
                                    <input x-data="{ photoIdCardBack }"
                                            wire:model="photoIdCardBack"
                                            x-on:change="photoIdCardBack = $event.target.files; console.log($event.target.files);"
                                            id="photoIdCardBack"
                                            name="photoIdCardBack"
                                            value="photoIdCardBack"
                                            {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                            {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 5 || $currentStep == 5 ? '' : 'disabled' }}
                                            type="file"
                                            class="@error("photoIdCardBack") is-invalid bg-input-error @enderror absolute inset-0 opacity-0 w-full cursor-pointer" />

                                    <div wire:loading.remove
                                            wire:target="photoIdCardBack"
                                            class="{{ $photoIdCardBack ? 'p-1' : 'p-6' }} flex flex-col w-full items-center border-2 border-gray-300 border-dashed rounded-md"
                                    >

                                        <div class="{{ $photoIdCardBack ? 'hidden' : '' }} flex flex-col items-center w-full">

                                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>

                                            <div class="flex text-sm text-gray-600">

                                                <label for="photoIdCardBack" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
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

                                        <div class="{{ $previewIDBackActive ? 'fixed inset-0 bg-gray-900 bg-opacity-95 z-50' : 'relative' }} flex w-full justify-center items-center {{ $previewIDFrontActive ? 'relative z-1' : '' }}">

                                            @if ($photoIdCardBack)

                                                <div class="{{ $previewIDBackActive ? 'relative p-2 m-auto z-50' : '' }} max-w-xl max-h-xl bg-gray-300 bg-opacity-50 rounded-lg">

                                                    <div class="relative z-10">

                                                        <img wire:click.prevent="toggleIDBackPreview()" class="w-full h-auto rounded-lg border-1 border-gray-600 shadow-md {{ $previewIDBackActive ? 'pointer-events-none cursor-none' : 'cursor-pointer' }} " src="{{ $photoIdCardBack->temporaryUrl() }}" alt="{{ $photoIdCardBack->getClientOriginalName() }}">

                                                        <div class="{{ $previewIDBackActive ? 'relative' : 'hidden' }} flex flex-col items-center w-full mt-4">

                                                            <h3 class="text-md text-gray-900 font-semibold text-center">
                                                                Name: {{ $photoIdCardBack->getClientOriginalName() }}
                                                            </h3>

                                                            <p class="text-sm text-gray-600 font-bold text-center mt-1">
                                                                @php
                                                                    $fileSize = number_format((float)($photoIdCardBack->getSize() / 1024), 2, '.', '');
                                                                @endphp
                                                                @if ($fileSize < 1024.0)
                                                                    <span class="text-gray-900 text-md font-semibold">Size:</span> {{ number_format((float)($photoIdCardBack->getSize() / 1024), 2, '.', '') . ' KB' }}
                                                                @else
                                                                    <span class="text-gray-900 text-md font-semibold">Size:</span> {{ number_format((float)($photoIdCardBack->getSize() / (1024 * 1024)), 2, '.', '') . ' MB' }}
                                                                @endif
                                                            </p>

                                                            <button type="button"
                                                                    wire:click.prevent.stop="toggleIDBackPreview()"
                                                                    class="w-full mt-3 font-medium text-white border border-transparent rounded-md shadow-xl text-md bg-red-500 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                            >

                                                                <div wire:loading wire:target="toggleIDBackPreview()">
                                                                    <x-loading-blocks />
                                                                </div>

                                                                <div class="flex items-center justify-center w-full p-2 font-bold text-white text-md" wire:loading.remove wire:target="toggleIDBackPreview()">
                                                                    Close Preview
                                                                </div>

                                                            </button>

                                                        </div>

                                                    </div>

                                                </div>

                                            @endif

                                        </div>

                                        <div class="{{ !$previewIDBackActive ? 'hidden' : '' }} relative flex w-full justify-center items-center">

                                            @if ($photoIdCardBack)
                                                <img class="w-full h-auto rounded-lg border-1 border-gray-600 shadow-md pointer-events-auto" src="{{ $photoIdCardBack->temporaryUrl() }}" alt="{{ $photoIdCardBack->getClientOriginalName() }}">
                                            @endif

                                        </div>

                                    </div>

                                    <div wire:loading wire:target="photoIdCardBack" class="flex w-full h-full justify-center items-center shadow-xl">

                                        <div class="flex w-full" x-show="isUploading">
                                            <progress class="flex w-full" max="100" x-bind:value="progress"></progress>
                                        </div>

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
                        <div class="{{ $hasIDCardUpload == false ? 'hidden' : '' }} flex w-full justify-center items-center relative md:w-1/5 mt-4 {{ $previewActive || $previewIDFrontActive || $previewIDBackActive ? 'z-0' : 'z-10' }}">

                            <button type="button"
                                    wire:click.prevent="toggleHasIDCardUpload"
                                    class="{{ $currentStep == 7 && $stepAdminIsEditing != 5 ? 'hidden' : '' }} flex items-center justify-center w-full text-white border border-transparent rounded-md shadow-md text-md bg-red-500 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <div wire:loading wire:target="toggleHasIDCardUpload">
                                    <x-loading-blocks />
                                </div>
                                <div class="flex items-center md:justify-between justify-center w-full p-2 font-bold text-white text-md" wire:loading.remove wire:target="toggleHasIDCardUpload">
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

                                <fieldset class="@error("identificationInfo.hasSocialCard") is-invalid bg-input-error @enderror" id="identificationInfo.hasSocialCard">

                                    <label class="inline-flex text-lg font-black text-red-500">Yes</label>
                                    <input wire:model="identificationInfo.hasSocialCard"
                                           type="radio"
                                           value="1"
                                           {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                           {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 5 || $currentStep == 5 ? '' : 'disabled' }}
                                           name="identificationInfo.hasSocialCard"
                                           class=" {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 5 || $currentStep == 5 ? 'bg-input' : 'bg-input-disabled' }}" />

                                    <label class="inline-flex ml-2 text-lg font-black text-red-500">No</label>
                                    <input wire:model="identificationInfo.hasSocialCard"
                                           type="radio"
                                           value="0"
                                           {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                           {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 5 || $currentStep == 5 ? '' : 'disabled' }}
                                           name="identificationInfo.hasSocialCard"
                                           class=" {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 5 || $currentStep == 5 ? 'bg-input' : 'bg-input-disabled' }}" />

                                    @error("identificationInfo.hasSocialCard")
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror

                                </fieldset>

                            </div>

                        </div>

                        {{-- FORM ROW 5 LABEL --}}
                        <div class="flex w-full md:justify-end justify-center items-center mt-2 {{ $currentStep == 7 && $additionalDocumentation == null && $stepAdminIsEditing != 5 ? 'hidden' : '' }}">

                            <h3 class="font-black text-xl text-gray-900">
                                Additional Documentation
                            </h3>

                        </div>

                        {{-- FORM ROW 5 --}}
                        <div x-data="{ isUploading: false, progress: 0 }"
                             x-on:livewire-upload-start="isUploading = true"
                             x-on:livewire-upload-finish="isUploading = false"
                             x-on:livewire-upload-error="isUploading = false"
                             x-on:livewire-upload-progress="progress = $event.detail.progress"
                             class="flex w-full justify-center items-center mt-2 {{ $currentStep == 7 && $additionalDocumentation == null && $stepAdminIsEditing != 5 ? 'hidden' : '' }}"
                        >


                            <div x-data="{ additionalDocumentation: $wire.additionalDocumentation }"
                                 x-on:dragover="$el.classList.add('active')"
                                 x-on:dragleave="$el.classList.remove('active')"
                                 x-on:drop="$el.classList.remove('active')"
                                 id="additionalDocumentationDropZone"
                                 class="{{ $additionalDocumentation == null ? '' : 'hidden' }} flex justify-center bg-white shadow-lg rounded-md p-3 md:w-3/4 w-full relative"
                            >

                                <input multiple
                                       x-data="{ additionalDocumentation }"
                                       wire:model="additionalDocumentation"
                                       wire:loading.remove wire:target="additionalDocumentation"
                                       name="additionalDocumentation"
                                       id="additionalDocumentation"
                                       value="additionalDocumentation"
                                       type="file"
                                       {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                       {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 5 || $currentStep == 5 ? '' : 'disabled' }}
                                       x-on:change="additionalDocumentation = $event.target.files; console.log($event.target.files);"
                                       class="@error("additionalDocumentation") is-invalid bg-input-error @enderror absolute inset-0 z-10 m-0 p-0 w-full h-full outline-none opacity-0"
                                />

                                <div wire:loading.remove wire:target="additionalDocumentation" class=" flex flex-col w-full items-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">

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

                                <div wire:loading wire:target="additionalDocumentation" class="flex w-full h-full justify-center items-center shadow-xl my-5">

                                    <div class="flex w-full" x-show="isUploading">
                                        <progress class="flex w-full" max="100" x-bind:value="progress"></progress>
                                    </div>

                                </div>

                            </div>

                            <div class="{{ $additionalDocumentation != null ? '' : 'hidden' }} flex flex-col w-full items-end {{ $previewActive ? 'relative z-preview' : '' }}">

                                @foreach ($additionalDocumentation as $file)

                                    <div wire:loading.remove wire:target="additionalDocumentation" class="md:w-3/4 w-full rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm flex md:flex-row flex-col items-center space-x-3 mb-4 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">

                                        <div class="flex md:w-1/3 w-full">

                                            @if (
                                                    $additionalDocumentation[$loop->index]->getMimeType() == "image/jpeg" ||
                                                    $additionalDocumentation[$loop->index]->getMimeType() == "image/png" ||
                                                    $additionalDocumentation[$loop->index]->getMimeType() == "image/svg" ||
                                                    $additionalDocumentation[$loop->index]->getMimeType() == "image/svg+xml"
                                                )

                                                <div class="{{ $previewActive ? 'fixed inset-0 flex justify-center items-center bg-gray-900 bg-opacity-95 z-50' : 'relative z-0' }} {{ $fileToPreview != '' ? ($fileToPreview == $loop->index ? '' : 'hidden') : '' }}">

                                                    <div class="{{ $previewActive ? 'relative p-2 m-auto z-50' : '' }} max-w-xl max-h-xl bg-gray-300 bg-opacity-50 rounded-lg">

                                                        <div class="relative w-full">

                                                            <img wire:click.prevent="toggleFilePreview({{ $loop->index }})" class="{{ $previewActive ? 'pointer-events-none' : 'cursor-pointer' }} w-full h-auto rounded-lg border-1 border-gray-600 shadow-xl bg-white bg-opacity-15" src="{{ $additionalDocumentation[$loop->index]->temporaryUrl() }}" alt="{{ $additionalDocumentation[$loop->index]->getClientOriginalName() }}" />

                                                        </div>

                                                        <div class="{{ $previewActive ? 'relative' : 'hidden' }} flex flex-col items-center w-full mt-4">

                                                            <h3 class="text-md text-gray-900 font-semibold text-center">
                                                                Name: {{ $additionalDocumentation[$loop->index]->getClientOriginalName() }}
                                                            </h3>

                                                            <p class="text-sm text-gray-600 font-bold text-center mt-1">
                                                                @php
                                                                    $fileSize = number_format((float)($additionalDocumentation[$loop->index]->getSize() / 1024), 2, '.', '');
                                                                @endphp
                                                                @if ($fileSize < 1024.0)
                                                                    <span class="text-gray-900 text-md font-semibold">Size:</span> {{ number_format((float)($additionalDocumentation[$loop->index]->getSize() / 1024), 2, '.', '') . ' KB' }}
                                                                @else
                                                                    <span class="text-gray-900 text-md font-semibold">Size:</span> {{ number_format((float)($additionalDocumentation[$loop->index]->getSize() / (1024 * 1024)), 2, '.', '') . ' MB' }}
                                                                @endif
                                                            </p>

                                                            <button type="button"
                                                                    wire:click.prevent.stop="toggleFilePreview({{ $loop->index }})"
                                                                    class="w-full mt-3 font-medium text-white border border-transparent rounded-md shadow-xl text-md bg-red-500 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                                <div wire:loading wire:target="toggleFilePreview({{ $loop->index }})">
                                                                    <x-loading-blocks />
                                                                </div>
                                                                <div class="flex items-center justify-center w-full p-2 font-bold text-white text-md" wire:loading.remove wire:target="toggleFilePreview({{ $loop->index }})">
                                                                    {{-- <img class="flex mr-2" src="/svg/register-icon.svg" alt="Upload ID Card"> --}}
                                                                    Close Preview
                                                                </div>
                                                            </button>

                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="flex relative inset-0 {{ !$previewActive ? 'hidden' : '' }}">

                                                    <img class="rounded-md w-full h-auto" src="{{ $additionalDocumentation[$loop->index]->temporaryUrl() }}" alt="{{ $additionalDocumentation[$loop->index]->getClientOriginalName() }}" />

                                                </div>

                                            @elseif (
                                                        $additionalDocumentation[$loop->index]->getMimeType() == "application/vnd.openxmlformats-officedocument.wordprocessingml.document" ||
                                                        $additionalDocumentation[$loop->index]->getMimeType() == "text/rtf" ||
                                                        $additionalDocumentation[$loop->index]->getMimeType() == "text/plain"
                                                    )

                                                    <img class="h-1/2 w-1/2" src="/svg/file-icons/file-word-regular.svg" alt="Word Document">

                                            @elseif (
                                                        $additionalDocumentation[$loop->index]->getMimeType() == "application/zip"
                                                    )

                                                    <img class="h-1/2 w-1/2" src="/svg/file-icons/file-archive-regular.svg" alt="Word Document">

                                            @endif

                                        </div>

                                        <div class="flex w-full md:mt-0 mt-4">

                                            <div class="flex flex-col w-3/4 justify-center items-start">

                                                <p class="text-lg font-black text-gray-900">
                                                    {{ $additionalDocumentation[$loop->index]->getClientOriginalName() }}
                                                </p>

                                                <p class="text-md text-gray-500 truncate">
                                                    @php
                                                        $fileSize = number_format((float)($additionalDocumentation[$loop->index]->getSize() / 1024), 2, '.', '');
                                                    @endphp
                                                    @if ($fileSize < 1024.0)
                                                        {{ number_format((float)($additionalDocumentation[$loop->index]->getSize() / 1024), 2, '.', '') . ' KB' }}
                                                    @else
                                                        {{ number_format((float)($additionalDocumentation[$loop->index]->getSize() / (1024 * 1024)), 2, '.', '') . ' MB' }}
                                                    @endif
                                                </p>

                                            </div>

                                            <div class="flex w-1/4 justify-center items-center">

                                                <button type="button"
                                                        wire:click.prevent="removeFileFromUploadQue({{ $loop->index }})"
                                                        class="{{ $currentStep == 7 ? 'hidden' : '' }} inline-flex items-center justify-center min-w-max h-full px-2 text-md text-white font-medium border border-transparent rounded-md shadow-md bg-red-500 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    <div wire:loading wire:target="removeFileFromUploadQue({{ $loop->index }})">
                                                        <x-loading-blocks />
                                                    </div>
                                                    <div class="flex items-center justify-center p-2" wire:loading.remove wire:target="removeFileFromUploadQue({{ $loop->index }})">
                                                        <img class="w-5 h-5" src="/svg/trash-alt-regular.svg" alt="Remove File From Upload Queue">
                                                    </div>
                                                </button>

                                            </div>

                                        </div>

                                    </div>
                                    {{-- {{ $additionalDocumentation[$loop->index]->getMimeType() }} --}}
                                @endforeach

                            </div>

                        </div>

                        {{-- EDIT BUTTON --}}
                        <div class="flex justify-end w-full {{ $currentStep != 7 ? 'hidden' : '' }}">

                            <button type="button"
                                    wire:click.prevent="{{ $isAdminEditing ? 'validateThisStep(5)'  : ($isAdmin ? 'editAsAdmin(5)' : 'editThisStep(5)') }}"
                                    class="{{ $currentStep != 7 && $isAdminEditing && $stepAdminIsEditing == 5 ? 'hidden' : '' }} {{ $isAdminEditing && $stepAdminIsEditing == 5 ? 'bg-accent' : 'bg-edit-btn' }} inline-flex items-center justify-center h-full font-medium text-white border border-transparent rounded-md shadow-md min-w-36 text-md bg-edit-btn bg-accent_hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            >

                                <div wire:loading
                                    wire:target="{{ $isAdminEditing ? 'validateThisStep(5)'  : ($isAdmin ? 'editAsAdmin(5)' : 'editThisStep(5)') }}"
                                >
                                    <x-loading-blocks />
                                </div>

                                <div class="flex items-center justify-between w-full p-2 font-bold text-white text-md" wire:loading.remove wire:target="{{ $isAdminEditing ? 'validateThisStep(5)'  : ($isAdmin ? 'editAsAdmin(5)' : 'editThisStep(5)') }}">
                                    {{ $isAdminEditing && $stepAdminIsEditing == 5 ? 'Submit Changes' : $stepTitles[5] }}
                                    <img class="flex ml-2 {{ $isAdminEditing && $stepAdminIsEditing == 5 ? 'hidden' : '' }}" src="/svg/edit-solid.svg" alt="Edit Recovery Information">
                                </div>

                            </button>

                        </div>

                    </form>

                </div>

            </div>

            <!-- STEP 7 - Recovery Information -->
            <div class="{{ $currentStep == 6 || $currentStep == 7 ? '' : 'hidden' }}">

                <div class="relative mt-12">

                    <form id="recoveryInformationForm" wire:submit.prevent="completeStep" action="/apply-now" method="POST" class="relative z-10 flex flex-col gap-6">
                        @csrf

                        {{-- SECTION LABEL --}}
                        <div class="flex w-full">

                            <div class="flex justify-start items-center w-full">

                                <h3 class="font-black text-5xl text-gray-900">
                                    Recovery Information
                                </h3>

                            </div>

                        </div>

                        {{-- FORM ROW 1 --}}
                        <div class="grid w-full grid-cols-1">

                            <div class="flex flex-col">

                                <label for="recoveryInfo.txtGoingWell" class="block text-xl font-black text-accent">
                                    What is going well in your recovery?
                                </label>

                                <textarea wire:model="recoveryInfo.txtGoingWell"
                                          id="recoveryInfo.txtGoingWell"
                                          name="recoveryInfo.txtGoingWell"
                                          rows="4"
                                          required
                                          {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                          {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 6 || $currentStep == 6 ? '' : 'disabled' }}
                                          placeholder="Tell us what is going well in your recovery."
                                          value="{{ old('recoveryInfo.txtGoingWell') }}"
                                          class="@error('recoveryInfo.txtGoingWell') is-invalid bg-input-error @enderror {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 6 || $currentStep == 6 ? 'bg-input' : 'bg-input-disabled' }} px-3 py-2 block w-full shadow-lg text-gray-900 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-accent-dark rounded-md z-10"
                                >
                                </textarea>

                                @error('recoveryInfo.txtGoingWell')
                                    <div class="flex w-full invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror

                            </div>

                        </div>

                        {{-- FORM ROW 2 --}}
                        <div class="grid w-full grid-cols-1">

                            <div class="flex flex-col">

                                <label for="recoveryInfo.txtGoingBad" class="block text-xl font-black text-red-500">
                                    What is NOT going well in your recovery?
                                </label>

                                <textarea wire:model="recoveryInfo.txtGoingBad"
                                          id="recoveryInfo.txtGoingBad"
                                          name="recoveryInfo.txtGoingBad"
                                          rows="4"
                                          required
                                          {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                          {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 6 || $currentStep == 6 ? '' : 'disabled' }}
                                          placeholder="Tell us what is NOT going well in you recovery."
                                          value="{{ old('recoveryInfo.txtGoingBad') }}"
                                          class="@error('recoveryInfo.txtGoingBad') is-invalid bg-input-error @enderror {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 6 || $currentStep == 6 ? 'bg-input' : 'bg-input-disabled' }} px-3 py-2 block w-full shadow-lg text-gray-900 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-accent-dark rounded-md z-10"
                                >
                                </textarea>

                                @error('recoveryInfo.txtGoingBad')
                                    <div class="flex w-full invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror

                            </div>

                        </div>

                        {{-- FORM ROW 3 --}}
                        <div class="grid w-full grid-cols-1">

                            <div class="flex flex-col">

                                <label for="recoveryInfo.txtHopesGoals" class="block text-xl font-black text-green-600">
                                    What are your hopes and goals for the future?
                                </label>

                                <textarea wire:model="recoveryInfo.txtHopesGoals"
                                          id="recoveryInfo.txtHopesGoals"
                                          name="recoveryInfo.txtHopesGoals"
                                          rows="4"
                                          required
                                          {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing == -1 ? 'disabled' : '' }}
                                          {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 6 || $currentStep == 6 ? '' : 'disabled' }}
                                          placeholder="Tell us your hopes and goals for the future."
                                          value="{{ old('recoveryInfo.txtHopesGoals') }}"
                                          class="@error('recoveryInfo.txtHopesGoals') is-invalid bg-input-error @enderror {{ $currentStep == 7 && !$isAdminEditing && $stepAdminIsEditing != -1 ? 'bg-input-disabled' : 'bg-input' }} {{ $currentStep == 7 && $isAdminEditing && $stepAdminIsEditing == 6 || $currentStep == 6 ? 'bg-input' : 'bg-input-disabled' }} px-3 py-2 block w-full shadow-lg text-gray-900 focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-accent-dark rounded-md z-10"
                                >
                                </textarea>

                                @error('recoveryInfo.txtHopesGoals')
                                    <div class="flex w-full invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror

                            </div>

                        </div>

                        {{-- EDIT BUTTON --}}
                        <div class="flex justify-end w-full {{ $currentStep != 7 ? 'hidden' : '' }}  {{ $currentStep == 7 ? 'border-b-4 border-accent-dark pb-12' : '' }}">

                            <button type="button"
                                    wire:click.prevent="{{ $isAdminEditing ? 'validateThisStep(6)'  : ($isAdmin ? 'editAsAdmin(6)' : 'editThisStep(6)') }}"
                                    class="{{ $currentStep != 7 && $isAdminEditing && $stepAdminIsEditing == 6 ? 'hidden' : '' }} {{ $isAdminEditing && $stepAdminIsEditing == 6 ? 'bg-accent' : 'bg-edit-btn' }} inline-flex items-center justify-center h-full font-medium text-white border border-transparent rounded-md shadow-md min-w-36 text-md bg-edit-btn bg-accent_hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            >

                                <div wire:loading
                                    wire:target="{{ $isAdminEditing ? 'validateThisStep(6)'  : ($isAdmin ? 'editAsAdmin(6)' : 'editThisStep(6)') }}"
                                >
                                    <x-loading-blocks />
                                </div>

                                <div class="flex items-center justify-between w-full p-2 font-bold text-white text-md" wire:loading.remove wire:target="{{ $isAdminEditing ? 'validateThisStep(6)'  : ($isAdmin ? 'editAsAdmin(6)' : 'editThisStep(6)') }}">
                                    {{ $isAdminEditing && $stepAdminIsEditing == 6 ? 'Submit Changes' : $stepTitles[6] }}
                                    <img class="flex ml-2 {{ $isAdminEditing && $stepAdminIsEditing == 6 ? 'hidden' : '' }}" src="/svg/edit-solid.svg" alt="Edit Recovery Information">
                                </div>

                            </button>

                        </div>

                        {{-- Application Signature Attestation --}}
                        <div class="{{ $currentStep != 7 ? 'hidden' : '' }} flex flex-col w-full justify-center items-center mt-4">

                            <h3 class="w-full text-2xl text-red-500 font-black text-center">
                                * AUTHORIZATION OF HOUSING *
                            </h3>

                            <h4 class="w-full text-xl text-gray-900 font-black text-center mt-2">
                                BY SIGNING BELOW:
                            </h4>

                            <p class="w-13/4 text-md text-gray-900 text-justify font-black mt-2">
                                I AFFIRM ALL STATEMENTS I HAVE DISCLOSED ARE TRUTHFUL AND HONEST TO THE BEST OF MY RECOLLECTION AND KNOWLEDGE.
                            </p>

                        </div>

                        {{-- SIGN & DATE --}}
                        <div class="{{ $currentStep != 7 ? 'hidden' : '' }} flex w-full gap-2 mt-4">

                            {{-- Signature --}}
                            <div class="w-1/2 min-h-28 mr-2 relative">
                                <label for="rentalApplicationSignature.signed" class="block text-lg font-black text-gray-700 text-end">Signature</label>

                                <input wire:model="rentalApplicationSignature.signed"
                                        type="checkbox"
                                        name="rentalApplicationSignature.signed"
                                        id="rentalApplicationSignature.signed"
                                        required
                                        autocomplete=""
                                        wire:click="clearMessageContent()"
                                        class="absolute inset-0 w-full h-full opacity-0 z-10 cursor-pointer">
                                <div class="@error('rentalApplicationSignature.signed') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                    @if ($rentalApplicationSignature['signed'])
                                        <div class="text-md font-black text-gray-900">
                                            {{ $userSignature }}
                                        </div>
                                    @else
                                        <img src="/svg/signature-solid.svg" alt="Click to sign consent form">
                                    @endif
                                </div>
                                {{-- @error('rentalApplicationSignature.signed') --}}
                                    <div class="{{ $messageContent ? '' : 'hidden' }} flex w-full invalid-feedback" role="alert">
                                        <strong>{{ $messageContent }}</strong>
                                    </div>
                                {{-- @enderror --}}
                            </div>

                            {{-- Date --}}
                            <div class="w-1/2 min-h-28 relative">
                                <label for="rentalApplicationSignature.date" class="block text-lg font-black text-gray-700 text-end">Date</label>

                                <input wire:model="rentalApplicationSignature.date"
                                        type="checkbox"
                                        name="rentalApplicationSignature.date"
                                        id="rentalApplicationSignature.date"
                                        required
                                        autocomplete=""
                                        class="absolute inset-0 w-full h-full opacity-0 z-10 cursor-pointer">
                                <div class="@error('rentalApplicationSignature.date') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                    @if ($rentalApplicationSignature['date'])
                                        <div class="text-md font-black text-gray-900">
                                            {{ $today }}
                                        </div>
                                    @else
                                        <img src="/svg/calendar-alt-solid.svg" alt="Click to date consent form">
                                    @endif
                                </div>
                                        @error('rentalApplicationSignature.date')
                                    <div class="flex w-full invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                        </div>

                    </form>

                </div>

            </div>

            <!-- STEP 8 - Review Application -->

            <!-- STEP 9 - Consent Form -->
            <div class="{{ $currentStep == 8 ? '' : 'hidden' }}">

                <div class="relative mt-12">

                    <form id="consentForm" wire:submit.prevent="completeStep" action="/apply-now" method="POST" class="relative z-10 flex flex-col gap-6" autocomplete="on">
                        @csrf

                        {{-- SECTION LABEL --}}
                        <div class="flex w-full">

                            <div class="flex justify-center items-center w-full">

                                <h3 class="font-black text-4xl text-accent">
                                    Client Release of Information Consent
                                </h3>

                            </div>

                        </div>

                        {{-- NOTICE TO CLIENTS --}}
                        <div class="flex w-full">

                            <div class="flex justify-start items-center w-full">

                                <p class="font-black text-lg text-gray-900">
                                    <span class="text-xl text-accent">Notice to Clients:</span> Pura Vida Sober Living house's housing specialist will be able to help
                                    you resolve issues you may have with the following items. Signing this form gives our professionals the right to share
                                    information with corresponding agensices on your behalf. If you decline to sign this form, your confidential information
                                    can be shared to the extent Washington State law allows.
                                </p>

                            </div>

                        </div>

                        {{-- CONSENT --}}
                        <div class="flex w-full">

                            <div class="flex justify-center items-center w-full">

                                <p class="font-black text-lg text-gray-900">
                                    <span class="text-xl text-accent">Consent:</span> I allow Pura Vida Sober Living <span class="text-accent">(PVSL)</span> LLC. housing specialist
                                    to use my confidential information to provide, and coordinate services, treatment, and benefits for me or for other purposes authorized
                                    by law. I allow <span class="text-accent">PVSL</span> and the below listed agencies, providers, or persons to use my confidential information and disclose it to each
                                    other for these purposes. Information may be shared verbally or by computer, data transfer, mail, or hand delivery.
                                </p>

                            </div>

                        </div>

                        {{-- CONSENT LIST --}}
                        <ul class="flex flex-col w-full gap-2">

                            {{-- Employment Security Department --}}
                            <li class="flex justify-start items-center w-full">

                                <div class="w-1/12 min-h-28 mr-2 relative cursor-pointer">
                                    <input wire:model="consentForm.employmentSecurityDepartment"
                                           type="checkbox"
                                           name="consentForm.employmentSecurityDepartment"
                                           id="consentForm.employmentSecurityDepartment"
                                           required
                                           wire:click="{{ $consentFormSignature['signed'] ? 'clearConsentFormSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-20">
                                    <div class="@error('consentForm.employmentSecurityDepartment') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($consentForm['employmentSecurityDepartment'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('consentForm.employmentSecurityDepartment')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <label for="consentForm.employmentSecurityDepartment" class="block text-lg font-black text-gray-700">Employment Security Department</label>

                            </li>

                            {{-- Social Security Administration --}}
                            <li class="flex justify-start items-center w-full">

                                <div class="w-1/12 min-h-28 mr-2 relative cursor-pointer">
                                    <input wire:model="consentForm.socialSecurityAdministration"
                                           type="checkbox"
                                           name="consentForm.socialSecurityAdministration"
                                           id="consentForm.socialSecurityAdministration"
                                           required
                                           wire:click="{{ $consentFormSignature['signed'] ? 'clearConsentFormSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-10">
                                    <div class="@error('consentForm.socialSecurityAdministration') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($consentForm['socialSecurityAdministration'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('consentForm.socialSecurityAdministration')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <label for="consentForm.socialSecurityAdministration" class="block text-lg font-black text-gray-700">Social Security Administration</label>

                            </li>

                            {{-- Department of Corrections --}}
                            <li class="flex justify-start items-center w-full">

                                <div class="w-1/12 min-h-28 mr-2 relative cursor-pointer">
                                    <input wire:model="consentForm.departmentOfCorrections"
                                           type="checkbox"
                                           name="consentForm.departmentOfCorrections"
                                           id="consentForm.departmentOfCorrections"
                                           required
                                           wire:click="{{ $consentFormSignature['signed'] ? 'clearConsentFormSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-10">
                                    <div class="@error('consentForm.departmentOfCorrections') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($consentForm['departmentOfCorrections'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('consentForm.departmentOfCorrections')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <label for="consentForm.departmentOfCorrections" class="block text-lg font-black text-gray-700">Department of Corrections</label>

                            </li>

                            {{-- Child Support Enforcement --}}
                            <li class="flex justify-start items-center w-full">

                                <div class="w-1/12 min-h-28 mr-2 relative cursor-pointer">
                                    <input wire:model="consentForm.childSupportEnforcement"
                                           type="checkbox"
                                           name="consentForm.childSupportEnforcement"
                                           id="consentForm.childSupportEnforcement"
                                           required
                                           wire:click="{{ $consentFormSignature['signed'] ? 'clearConsentFormSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-10">
                                    <div class="@error('consentForm.childSupportEnforcement') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($consentForm['childSupportEnforcement'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('consentForm.childSupportEnforcement')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <label for="consentForm.childSupportEnforcement" class="block text-lg font-black text-gray-700">Child Support Enforcement</label>

                            </li>

                            {{-- Health Care Providers --}}
                            <li class="flex justify-start items-center w-full">

                                <div class="w-1/12 min-h-28 mr-2 relative cursor-pointer">
                                    <input wire:model="consentForm.healthCareProviders"
                                           type="checkbox"
                                           name="consentForm.healthCareProviders"
                                           id="consentForm.healthCareProviders"
                                           required
                                           wire:click="{{ $consentFormSignature['signed'] ? 'clearConsentFormSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-10">
                                    <div class="@error('consentForm.healthCareProviders') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($consentForm['healthCareProviders'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('consentForm.healthCareProviders')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <label for="consentForm.healthCareProviders" class="block text-lg font-black text-gray-700">Health Care Providers</label>

                            </li>

                            {{-- Mental Health Providers --}}
                            <li class="flex justify-start items-center w-full">

                                <div class="w-1/12 min-h-28 mr-2 relative cursor-pointer">
                                    <input wire:model="consentForm.mentalHealthProviders"
                                           type="checkbox"
                                           name="consentForm.mentalHealthProviders"
                                           id="consentForm.mentalHealthProviders"
                                           required
                                           wire:click="{{ $consentFormSignature['signed'] ? 'clearConsentFormSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-10">
                                    <div class="@error('consentForm.mentalHealthProviders') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($consentForm['mentalHealthProviders'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('consentForm.mentalHealthProviders')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <label for="consentForm.mentalHealthProviders" class="block text-lg font-black text-gray-700">Mental Health Providers</label>

                            </li>

                            {{-- Chemical Dependency Providers --}}
                            <li class="flex justify-start items-center w-full">

                                <div class="w-1/12 min-h-28 mr-2 relative cursor-pointer">
                                    <input wire:model="consentForm.chemicalDependencyProviders"
                                           type="checkbox"
                                           name="consentForm.chemicalDependencyProviders"
                                           id="consentForm.chemicalDependencyProviders"
                                           required
                                           wire:click="{{ $consentFormSignature['signed'] ? 'clearConsentFormSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-10">
                                    <div class="@error('consentForm.chemicalDependencyProviders') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($consentForm['chemicalDependencyProviders'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('consentForm.chemicalDependencyProviders')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <label for="consentForm.chemicalDependencyProviders" class="block text-lg font-black text-gray-700">Chemical Dependency Providers</label>

                            </li>

                            {{-- Housing Program Providers --}}
                            <li class="flex justify-start items-center w-full">

                                <div class="w-1/12 min-h-28 mr-2 relative cursor-pointer">
                                    <input wire:model="consentForm.housingProgramProviders"
                                           type="checkbox"
                                           name="consentForm.housingProgramProviders"
                                           id="consentForm.housingProgramProviders"
                                           required
                                           wire:click="{{ $consentFormSignature['signed'] ? 'clearConsentFormSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-10">
                                    <div class="@error('consentForm.housingProgramProviders') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($consentForm['housingProgramProviders'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('consentForm.housingProgramProviders')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <label for="consentForm.housingProgramProviders" class="block text-lg font-black text-gray-700">Housing Program Providers</label>

                            </li>

                            {{-- Department of Social Health Services --}}
                            <li class="flex justify-start items-center w-full">

                                <div class="w-1/12 min-h-28 mr-2 relative cursor-pointer">
                                    <input wire:model="consentForm.departmentOfSocialHealthServices"
                                           type="checkbox"
                                           name="consentForm.departmentOfSocialHealthServices"
                                           id="consentForm.departmentOfSocialHealthServices"
                                           required
                                           wire:click="{{ $consentFormSignature['signed'] ? 'clearConsentFormSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-10">
                                    <div class="@error('consentForm.departmentOfSocialHealthServices') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($consentForm['departmentOfSocialHealthServices'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('consentForm.departmentOfSocialHealthServices')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <label for="consentForm.departmentOfSocialHealthServices" class="block text-lg font-black text-gray-700">Department of Social Health Services</label>

                            </li>

                            {{-- Colleges and Education Providers --}}
                            <li class="flex justify-start items-center w-full">

                                <div class="w-1/12 min-h-28 mr-2 relative cursor-pointer">
                                    <input wire:model="consentForm.collegesAndEducationProviders"
                                           type="checkbox"
                                           name="consentForm.collegesAndEducationProviders"
                                           id="consentForm.collegesAndEducationProviders"
                                           required
                                           wire:click="{{ $consentFormSignature['signed'] ? 'clearConsentFormSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-10">
                                    <div class="@error('consentForm.collegesAndEducationProviders') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($consentForm['collegesAndEducationProviders'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('consentForm.collegesAndEducationProviders')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <label for="consentForm.collegesAndEducationProviders" class="block text-lg font-black text-gray-700">Colleges and Education Providers</label>

                            </li>

                            {{-- Attached Lists --}}
                            <li class="flex justify-start items-center w-full">

                                <div class="w-1/12 min-h-28 mr-2 relative cursor-pointer">
                                    <input wire:model="consentForm.attachedLists"
                                           type="checkbox"
                                           name="consentForm.attachedLists"
                                           id="consentForm.attachedLists"
                                           required
                                           wire:click="{{ $consentFormSignature['signed'] ? 'clearConsentFormSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-10">
                                    <div class="@error('consentForm.attachedLists') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($consentForm['attachedLists'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('consentForm.attachedLists')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <label for="consentForm.attachedLists" class="block text-lg font-black text-gray-700">Attached Lists</label>

                            </li>

                            {{-- Others --}}
                            <li class="flex justify-start items-center w-full">

                                <div class="w-1/12 min-h-28 mr-2 relative cursor-pointer">
                                    <input wire:model="consentForm.others"
                                           type="checkbox"
                                           name="consentForm.others"
                                           id="consentForm.others"
                                           required
                                           wire:click="{{ $consentFormSignature['signed'] ? 'clearConsentFormSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-10">
                                    <div class="@error('consentForm.others') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($consentForm['others'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('consentForm.others')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <label for="consentForm.others" class="block text-lg font-black text-gray-700">Others</label>

                            </li>

                            {{-- Select All Consent Form --}}
                            <li class="flex justify-end items-center w-full">

                                <input wire:model="selectAllConsentForm"
                                    type="checkbox"
                                    name="selectAllConsentForm"
                                    id="selectAllConsentForm"
                                    wire:click="selectAllConsentForm()"
                                    class="h-6 w-6 mr-2 text-accent text-accent_hover shadow-lg bg-input bg-input_hover focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-1 border-accent-dark rounded-md z-10" />

                                <label for="selectAllConsentForm" class="block text-lg font-black text-red-500 text-end">CONSENT TO ALL</label>

                            </li>

                        </ul>

                        {{-- ADDITIONAL CONSENT --}}
                        <div class="flex w-full">

                            <div class="flex justify-center items-center w-full">

                                <p class="font-black text-lg text-gray-900">
                                    <span class="text-xl text-accent">Additional Consent:</span> If your confidential records include any of the following information, your
                                    must also complete this section to include these records. I allow <span class="text-accent">PVSL</span> to share the following records:
                                </p>

                            </div>

                        </div>

                        {{-- ADDITIONAL CONSENT LIST --}}
                        <ul class="flex flex-col w-full gap-2">

                            {{-- Mental Health AC --}}
                            <li class="flex justify-start items-center w-full">

                                <div class="w-1/12 min-h-28 mr-2 relative cursor-pointer">
                                    <input wire:model="consentFormAdditional.mentalHealthAC"
                                           type="checkbox"
                                           name="consentFormAdditional.mentalHealthAC"
                                           id="consentFormAdditional.mentalHealthAC"
                                           required
                                           wire:click="{{ $consentFormSignature['signed'] ? 'clearConsentFormSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-10">
                                    <div class="@error('consentFormAdditional.mentalHealthAC') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($consentFormAdditional['mentalHealthAC'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('consentFormAdditional.mentalHealthAC')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <label for="consentFormAdditional.mentalHealthAC" class="block text-lg font-black text-gray-700">Mental Health</label>

                            </li>

                            {{-- HIV/AIDS and STD --}}
                            <li class="flex justify-start items-center w-full">

                                <div class="w-1/12 min-h-28 mr-2 relative cursor-pointer">
                                    <input wire:model="consentFormAdditional.hivStdAC"
                                           type="checkbox"
                                           name="consentFormAdditional.hivStdAC"
                                           id="consentFormAdditional.hivStdAC"
                                           required
                                           wire:click="{{ $consentFormSignature['signed'] ? 'clearConsentFormSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-10">
                                    <div class="@error('consentFormAdditional.hivStdAC') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($consentFormAdditional['hivStdAC'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('consentFormAdditional.hivStdAC')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <label for="consentFormAdditional.hivStdAC" class="block text-lg font-black text-gray-700">HIV/AIDS and STD test (results, diagnosis, and/or treatment)</label>

                            </li>

                            {{-- Attached Lists --}}
                            <li class="flex justify-start items-center w-full">

                                <div class="w-1/12 min-h-28 mr-2 relative">
                                    <input wire:model="consentFormAdditional.attachedListsAC"
                                           type="checkbox"
                                           name="consentFormAdditional.attachedListsAC"
                                           id="consentFormAdditional.attachedListsAC"
                                           required
                                           wire:click="{{ $consentFormSignature['signed'] ? 'clearConsentFormSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-10 cursor-pointer">
                                    <div class="@error('consentFormAdditional.attachedListsAC') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($consentFormAdditional['attachedListsAC'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('consentFormAdditional.attachedListsAC')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <label for="consentFormAdditional.attachedListsAC" class="block text-lg font-black text-gray-700">Attached Lists</label>

                            </li>

                            {{-- Select All Additional Consent Form --}}
                            <li class="flex justify-end items-center w-full">

                                <input wire:model="initialAllAdditionalConsentForm"
                                    type="checkbox"
                                    name="initialAllAdditionalConsentForm"
                                    id="initialAllAdditionalConsentForm"
                                    wire:click="selectAllAdditionalConsentForm()"
                                    class="h-6 w-6 mr-2 text-accent text-accent_hover shadow-lg bg-input bg-input_hover focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-1 border-accent-dark rounded-md z-10" />

                                <label for="initialAllAdditionalConsentForm" class="block text-lg font-black text-red-500 text-end">CONSENT TO ALL ADDITIONAL</label>

                            </li>

                        </ul>

                        {{-- CONSENT DATE NOTICE --}}
                        <div class="flex w-full">

                            <div class="flex justify-start items-center w-full">

                                <p class="font-black text-xl text-gray-900">
                                    This consent is valid from the date below.
                                </p>

                            </div>

                        </div>

                        {{-- CONSENT WITHDRAWL NOTICE --}}
                        <div class="flex flex-col w-full">

                            <div class="flex justify-center items-center w-full">

                                <p class="font-black text-lg text-gray-900">
                                    I may revoke or withdraw this consent at any time in writing, but that will not affect any information
                                    already shared. I understand that records shared under this consent may no longer be protected under
                                    the law set. A copy of this form is valid to give my permission to share records.
                                </p>

                            </div>

                            <div class="flex w-full gap-2 mt-4">

                                {{-- Signature --}}
                                <div class="w-1/2 min-h-28 mr-2 relative">
                                    <label for="consentFormSignature.signed" class="block text-lg font-black text-gray-700 text-end">Signature</label>

                                    <input wire:model="consentFormSignature.signed"
                                           type="checkbox"
                                           name="consentFormSignature.signed"
                                           id="consentFormSignature.signed"
                                           required
                                           autocomplete=""
                                           wire:click="signConsentForm()"
                                           class="absolute inset-0 w-full h-full opacity-0 z-10 cursor-pointer">
                                    <div class="@error('consentFormSignature.signed') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($consentFormSignature['signed'])
                                            <div class="text-md font-black text-gray-900">
                                               {{ $userSignature }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to sign consent form">
                                        @endif
                                    </div>
                                            @error('consentFormSignature.signed')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                {{-- Date --}}
                                <div class="w-1/2 min-h-28 relative">
                                    <label for="consentFormSignature.date" class="block text-lg font-black text-gray-700 text-end">Date</label>

                                    <input wire:model="consentFormSignature.date"
                                           type="checkbox"
                                           name="consentFormSignature.date"
                                           id="consentFormSignature.date"
                                           required
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-10 cursor-pointer">
                                    <div class="@error('consentFormSignature.date') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($consentFormSignature['date'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $today }}
                                            </div>
                                        @else
                                            <img src="/svg/calendar-alt-solid.svg" alt="Click to date consent form">
                                        @endif
                                    </div>
                                            @error('consentFormSignature.date')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                            </div>

                        </div>

                        {{-- NOTICE TO RECIPIENTS OF INFORMATION --}}
                        <div class="flex flex-col w-full justify-center items-center mt-2 p-2 bg-input border-2 border-accent-dark">

                            <h3 class="font-black text-lg text-red-500 mb-3">
                                NOTICE TO RECIPIENTS OF INFORMATION
                            </h3>

                            <p class="font-black text-md text-red-500">
                                If you have received information related to drug or alcohol abuse by the client, you must include the following statement when further disclosing
                                infomration as required by 42 CFR 2.32. This information has been disclosed to you from records protected by Federal confidentiality rules (42 CFR part 2).
                                The Federal rules prohibit you from making any further disclosure of this information ujnless further disclosure is expressly permitted by the written
                                consent of the person to whom it pertains or as otherwise permitted by 42 CFR part 2. A general authorization for the release of medical or other information
                                is NOT sufficient for this purpose. The Federal rules restrict any use of the information to criminally investigate or prosecute any alcohol or drug abuse
                                patient.
                            </p>

                        </div>

                    </form>

                </div>

            </div>

            <!-- STEP 10 - Rules & Regulations -->
            <div class="{{ $currentStep == 9 ? '' : 'hidden' }}">

                <div class="relative mt-12">

                    <form id="consentForm" wire:submit.prevent="completeStep" action="/apply-now" method="POST" class="relative z-10 flex flex-col gap-6" autocomplete="on">
                        @csrf

                        {{-- SECTION LABEL --}}
                        <div class="flex w-full">

                            <div class="flex justify-center items-center w-full">

                                <h3 class="font-black text-4xl text-accent">
                                    Rules &amp; Regulations
                                </h3>

                            </div>

                        </div>

                        {{-- NOTICE TO APPLICANT --}}
                        <div class="flex flex-col w-full justify-center items-center mt-2 p-2 bg-input border-2 border-accent-dark">

                            <p class="font-black text-lg text-gray-900 text-center">
                                All policy violatoins will be documented. Policy violations in direct contravention of DOC guidelins will be reported
                                to the appropriate administration.
                            </p>

                        </div>

                        {{-- RULES & REGULATIONS LIST --}}
                        <ul class="flex flex-col w-full gap-2">

                            @php
                                $ruleCounter = 1;
                            @endphp

                            {{-- 1 RED TEXT SPAN --}}
                            <li class="flex justify-start items-center w-full mt-2">

                                <div class="flex justify-start items-start w-11/12">

                                    <label for="rulesAndRegulations.rule1" class="text-2xl font-black text-gray-700 mr-2">{{ $ruleCounter }}.</label>

                                    <p class="text-lg text-gray-900 font-black">
                                        <span class="text-2xl">I understand:</span>
                                        <span class="text-red-500">
                                            ANY physical contact, fight and/or verbal intimidation
                                            or threat is subject to automatic eviction and appropriate legal recourse subject to the discretion of PVSL.
                                        </span>
                                    </p>

                                </div>

                                <div class="w-1/12 min-h-28 ml-2 relative cursor-pointer">
                                    <input wire:model="rulesAndRegulations.rule1"
                                           type="checkbox"
                                           name="rulesAndRegulations.rule1"
                                           id="rulesAndRegulations.rule1"
                                           required
                                           wire:click="{{ $rulesAndRegulationsSignature['signed'] ? 'clearRulesAndRegulationsSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-20">
                                    <div class="@error('rulesAndRegulations.rule1') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($rulesAndRegulations['rule1'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('rulesAndRegulations.rule1')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>



                            </li>

                            {{-- 2 GRAY TEXT ONLY --}}
                            <li class="flex justify-start items-center w-full mt-2">

                                <div class="flex justify-start items-start w-11/12">

                                    <label for="consentForm.rule2" class="text-2xl font-black text-gray-700 mr-2">{{ ++$ruleCounter }}.</label>

                                    <p class="text-lg text-gray-900 font-black">
                                        <span class="text-2xl">I understand:</span>
                                        ANY theft or possession of another person's property may result in immediate eviction.
                                    </p>

                                </div>

                                <div class="w-1/12 min-h-28 ml-2 relative cursor-pointer">
                                    <input wire:model="rulesAndRegulations.rule2"
                                           type="checkbox"
                                           name="rulesAndRegulations.rule2"
                                           id="rulesAndRegulations.rule2"
                                           required
                                           wire:click="{{ $rulesAndRegulationsSignature['signed'] ? 'clearRulesAndRegulationsSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-20">
                                    <div class="@error('rulesAndRegulations.rule2') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($rulesAndRegulations['rule2'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('rulesAndRegulations.rule2')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>



                            </li>

                            {{-- 3 GRAY TEXT ONLY --}}
                            <li class="flex justify-start items-center w-full mt-2">

                                <div class="flex justify-start items-start w-11/12">

                                    <label for="consentForm.rule3" class="text-2xl font-black text-gray-700 mr-2">{{ ++$ruleCounter }}.</label>

                                    <p class="text-lg text-gray-900 font-black">
                                        <span class="text-2xl">I understand:</span>
                                        Do not eat or drink another individual's food. All personal food (i.e. items not considered part of the community
                                        pantry) must be initialed by the purchaser of that item.
                                    </p>

                                </div>

                                <div class="w-1/12 min-h-28 ml-2 relative cursor-pointer">
                                    <input wire:model="rulesAndRegulations.rule3"
                                           type="checkbox"
                                           name="rulesAndRegulations.rule3"
                                           id="rulesAndRegulations.rule3"
                                           required
                                           wire:click="{{ $rulesAndRegulationsSignature['signed'] ? 'clearRulesAndRegulationsSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-20">
                                    <div class="@error('rulesAndRegulations.rule3') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($rulesAndRegulations['rule3'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('rulesAndRegulations.rule3')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>



                            </li>

                            {{-- 4 GRAY TEXT ONLY --}}
                            <li class="flex justify-start items-center w-full mt-2">

                                <div class="flex justify-start items-start w-11/12">

                                    <label for="consentForm.rule4" class="text-2xl font-black text-gray-700 mr-2">{{ ++$ruleCounter }}.</label>

                                    <p class="text-lg text-gray-900 font-black">
                                        <span class="text-2xl">I understand:</span>
                                        No one is allowed in another person's room unless you've been invited AND the other person is present in the room.
                                    </p>

                                </div>

                                <div class="w-1/12 min-h-28 ml-2 relative cursor-pointer">
                                    <input wire:model="rulesAndRegulations.rule4"
                                           type="checkbox"
                                           name="rulesAndRegulations.rule4"
                                           id="rulesAndRegulations.rule4"
                                           required
                                           wire:click="{{ $rulesAndRegulationsSignature['signed'] ? 'clearRulesAndRegulationsSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-20">
                                    <div class="@error('rulesAndRegulations.rule4') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($rulesAndRegulations['rule4'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('rulesAndRegulations.rule4')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>



                            </li>

                            {{-- 5 GRAY TEXT ONLY --}}
                            <li class="flex justify-start items-center w-full mt-2">

                                <div class="flex justify-start items-start w-11/12">

                                    <label for="consentForm.rule5" class="text-2xl font-black text-gray-700 mr-2">{{ ++$ruleCounter }}.</label>

                                    <p class="text-lg text-gray-900 font-black">
                                        <span class="text-2xl">I understand:</span>
                                        Always keep both front and back doors locked when exiting the premises. All entries must be kept locked after dark.
                                        All keys, entry codes, passwords, and other security media are the sole property of PVSL and are not to be shared,
                                        loaned, disclosed, or transferred without the written consent of PVSL staff.
                                    </p>

                                </div>

                                <div class="w-1/12 min-h-28 ml-2 relative cursor-pointer">
                                    <input wire:model="rulesAndRegulations.rule5"
                                           type="checkbox"
                                           name="rulesAndRegulations.rule5"
                                           id="rulesAndRegulations.rule5"
                                           required
                                           wire:click="{{ $rulesAndRegulationsSignature['signed'] ? 'clearRulesAndRegulationsSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-20">
                                    <div class="@error('rulesAndRegulations.rule5') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($rulesAndRegulations['rule5'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('rulesAndRegulations.rule5')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>



                            </li>

                            {{-- 6 GRAY TEXT ONLY --}}
                            <li class="flex justify-start items-center w-full mt-2">

                                <div class="flex justify-start items-start w-11/12">

                                    <label for="consentForm.rule6" class="text-2xl font-black text-gray-700 mr-2">{{ ++$ruleCounter }}.</label>

                                    <p class="text-lg text-gray-900 font-black">
                                        <span class="text-2xl">I understand:</span>
                                        The member's room will remain locked at all times if not at the house. Members are financially responsible for personal padlocks
                                        and locking devices. Members are not allowed to install a locking door knob. All doors must be secured with exterior clasp when available.
                                    </p>

                                </div>

                                <div class="w-1/12 min-h-28 ml-2 relative cursor-pointer">
                                    <input wire:model="rulesAndRegulations.rule6"
                                           type="checkbox"
                                           name="rulesAndRegulations.rule6"
                                           id="rulesAndRegulations.rule6"
                                           required
                                           wire:click="{{ $rulesAndRegulationsSignature['signed'] ? 'clearRulesAndRegulationsSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-20">
                                    <div class="@error('rulesAndRegulations.rule6') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($rulesAndRegulations['rule6'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('rulesAndRegulations.rule6')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>



                            </li>

                            {{-- 7 GRAY TEXT ONLY --}}
                            <li class="flex justify-start items-center w-full mt-2">

                                <div class="flex justify-start items-start w-11/12">

                                    <label for="consentForm.rule7" class="text-2xl font-black text-gray-700 mr-2">{{ ++$ruleCounter }}.</label>

                                    <p class="text-lg text-gray-900 font-black">
                                        <span class="text-2xl">I understand:</span>
                                        Food and/or dishes are not allowed in your room. Rooms are to be kept clean and organized. All bedding must be washed
                                        weekly. All dirty or soiled laundry must be stored in an appropriate receptacle in the member's room.
                                    </p>

                                </div>

                                <div class="w-1/12 min-h-28 ml-2 relative cursor-pointer">
                                    <input wire:model="rulesAndRegulations.rule7"
                                           type="checkbox"
                                           name="rulesAndRegulations.rule7"
                                           id="rulesAndRegulations.rule7"
                                           required
                                           wire:click="{{ $rulesAndRegulationsSignature['signed'] ? 'clearRulesAndRegulationsSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-20">
                                    <div class="@error('rulesAndRegulations.rule7') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($rulesAndRegulations['rule7'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('rulesAndRegulations.rule7')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>



                            </li>

                            {{-- 8 GRAY TEXT ONLY --}}
                            <li class="flex justify-start items-center w-full mt-2">

                                <div class="flex justify-start items-start w-11/12">

                                    <label for="consentForm.rule8" class="text-2xl font-black text-gray-700 mr-2">{{ ++$ruleCounter }}.</label>

                                    <p class="text-lg text-gray-900 font-black">
                                        <span class="text-2xl">I understand:</span>
                                        The member must participate in all house cleaning projects, procedures, tasks, and routines. This includes maintaining the cleanliness and safety
                                        of all common rooms including but not limeited to: living areas, bathrooms, garages and/or storage areas, house exteriors including driveways,
                                        walkways and yards, kitchen, and hallways.
                                    </p>

                                </div>

                                <div class="w-1/12 min-h-28 ml-2 relative cursor-pointer">
                                    <input wire:model="rulesAndRegulations.rule8"
                                           type="checkbox"
                                           name="rulesAndRegulations.rule8"
                                           id="rulesAndRegulations.rule8"
                                           required
                                           wire:click="{{ $rulesAndRegulationsSignature['signed'] ? 'clearRulesAndRegulationsSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-20">
                                    <div class="@error('rulesAndRegulations.rule8') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($rulesAndRegulations['rule8'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('rulesAndRegulations.rule8')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>



                            </li>

                            {{-- 9 GRAY TEXT ONLY --}}
                            <li class="flex justify-start items-center w-full mt-2">

                                <div class="flex justify-start items-start w-11/12">

                                    <label for="consentForm.rule9" class="text-2xl font-black text-gray-700 mr-2">{{ ++$ruleCounter }}.</label>

                                    <p class="text-lg text-gray-900 font-black">
                                        <span class="text-2xl">I understand:</span>
                                        Dishes, silverware, and cooking implements must be wahed and put away immediately after use. The member is responsible for cleaning and
                                        sanitizing all food preparation services, before and after cooking. This includes, but is not limited to: cutting boards, countertops,
                                        stoves, microwaves, and any food storage areas such as refrigerators, cabinets, and freezers.
                                    </p>

                                </div>

                                <div class="w-1/12 min-h-28 ml-2 relative cursor-pointer">
                                    <input wire:model="rulesAndRegulations.rule9"
                                           type="checkbox"
                                           name="rulesAndRegulations.rule9"
                                           id="rulesAndRegulations.rule9"
                                           required
                                           wire:click="{{ $rulesAndRegulationsSignature['signed'] ? 'clearRulesAndRegulationsSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-20">
                                    <div class="@error('rulesAndRegulations.rule9') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($rulesAndRegulations['rule9'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('rulesAndRegulations.rule9')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>



                            </li>

                            {{-- 10 GRAY TEXT ONLY --}}
                            <li class="flex justify-start items-center w-full mt-2">

                                <div class="flex justify-start items-start w-11/12">

                                    <label for="consentForm.rule10" class="text-2xl font-black text-gray-700 mr-2">{{ ++$ruleCounter }}.</label>

                                    <p class="text-lg text-gray-900 font-black">
                                        <span class="text-2xl">I understand:</span>
                                        The member is required to store food in clean, hygienic, sealable, pest-resistant (i.e. mice) containers.
                                    </p>

                                </div>

                                <div class="w-1/12 min-h-28 ml-2 relative cursor-pointer">
                                    <input wire:model="rulesAndRegulations.rule10"
                                           type="checkbox"
                                           name="rulesAndRegulations.rule10"
                                           id="rulesAndRegulations.rule10"
                                           required
                                           wire:click="{{ $rulesAndRegulationsSignature['signed'] ? 'clearRulesAndRegulationsSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-20">
                                    <div class="@error('rulesAndRegulations.rule10') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($rulesAndRegulations['rule10'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('rulesAndRegulations.rule10')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>



                            </li>

                            {{-- 11 RED TEXT SPAN --}}
                            <li class="flex justify-start items-center w-full mt-2">

                                <div class="flex justify-start items-start w-11/12">

                                    <label for="rulesAndRegulations.rule11" class="text-2xl font-black text-gray-700 mr-2">{{ ++$ruleCounter }}.</label>

                                    <p class="text-lg text-gray-900 font-black">
                                        <span class="text-2xl">I understand:</span>
                                        <span class="text-red-500 text-2xl">
                                            Rent is due by the 5<sup>th</sup> of each month.
                                        </span>
                                        <span class="text-red-500">
                                            Failure to pay rent by this date may result in immediate eviction. Rooms are rented month to month, no refunds or prorate if
                                            the member is evicted or moves out before the end of the month. A $50.00 late fee will be assessed if rent is received after the 5<sup>th</sup>
                                            of each month. Late payments are considered a policy violation and will be documented. I understand any late payments beyond the first may
                                            result in termination from participation in the program and eviction from the premises.
                                        </span>
                                    </p>

                                </div>

                                <div class="w-1/12 min-h-28 ml-2 relative cursor-pointer">
                                    <input wire:model="rulesAndRegulations.rule11"
                                           type="checkbox"
                                           name="rulesAndRegulations.rule11"
                                           id="rulesAndRegulations.rule11"
                                           required
                                           wire:click="{{ $rulesAndRegulationsSignature['signed'] ? 'clearRulesAndRegulationsSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-20">
                                    <div class="@error('rulesAndRegulations.rule11') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($rulesAndRegulations['rule11'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('rulesAndRegulations.rule11')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>



                            </li>

                            {{-- 12 GRAY TEXT ONLY --}}
                            <li class="flex justify-start items-center w-full mt-2">

                                <div class="flex justify-start items-start w-11/12">

                                    <label for="consentForm.rule12" class="text-2xl font-black text-gray-700 mr-2">{{ ++$ruleCounter }}.</label>

                                    <p class="text-lg text-gray-900 font-black">
                                        <span class="text-2xl">I understand:</span>
                                        Guests are permitted to stay no more than two nights in one week. Guests are NOT permitted to stay any consecutive nights. Nights must be "split up" during the week.
                                        Guests must sleep in the member's room. If the member is funded by the Department of Corrections, guests of any type are NOT permitted.
                                    </p>

                                </div>

                                <div class="w-1/12 min-h-28 ml-2 relative cursor-pointer">
                                    <input wire:model="rulesAndRegulations.rule12"
                                           type="checkbox"
                                           name="rulesAndRegulations.rule12"
                                           id="rulesAndRegulations.rule12"
                                           required
                                           wire:click="{{ $rulesAndRegulationsSignature['signed'] ? 'clearRulesAndRegulationsSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-20">
                                    <div class="@error('rulesAndRegulations.rule12') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($rulesAndRegulations['rule12'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('rulesAndRegulations.rule12')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>



                            </li>

                            {{-- 13 RED TEXT SPAN --}}
                            <li class="flex justify-start items-center w-full mt-2">

                                <div class="flex justify-start items-start w-11/12">

                                    <label for="rulesAndRegulations.rule13" class="text-2xl font-black text-gray-700 mr-2">{{ ++$ruleCounter }}.</label>

                                    <p class="text-lg text-gray-900 font-black">
                                        <span class="text-2xl">I understand:</span>
                                        <span class="text-red-500 text-xl">
                                            UNUSUPERVISED GUESTS ARE NOT ALLOWED ON THE PREMISES AT ANY TIME.
                                        </span>
                                        If you are not present at the house with your guest, then your guest must vacate the premises immediately.
                                    </p>

                                </div>

                                <div class="w-1/12 min-h-28 ml-2 relative cursor-pointer">
                                    <input wire:model="rulesAndRegulations.rule13"
                                           type="checkbox"
                                           name="rulesAndRegulations.rule13"
                                           id="rulesAndRegulations.rule13"
                                           required
                                           wire:click="{{ $rulesAndRegulationsSignature['signed'] ? 'clearRulesAndRegulationsSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-20">
                                    <div class="@error('rulesAndRegulations.rule13') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($rulesAndRegulations['rule13'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('rulesAndRegulations.rule13')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>



                            </li>

                            {{-- 14 GRAY TEXT ONLY --}}
                            <li class="flex justify-start items-center w-full mt-2">

                                <div class="flex justify-start items-start w-11/12">

                                    <label for="consentForm.rule14" class="text-2xl font-black text-gray-700 mr-2">{{ ++$ruleCounter }}.</label>

                                    <p class="text-lg text-gray-900 font-black">
                                        <span class="text-2xl">I understand:</span>
                                        If I am being couched, I may NOT have overnight Guests.
                                    </p>

                                </div>

                                <div class="w-1/12 min-h-28 ml-2 relative cursor-pointer">
                                    <input wire:model="rulesAndRegulations.rule14"
                                           type="checkbox"
                                           name="rulesAndRegulations.rule14"
                                           id="rulesAndRegulations.rule14"
                                           required
                                           wire:click="{{ $rulesAndRegulationsSignature['signed'] ? 'clearRulesAndRegulationsSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-20">
                                    <div class="@error('rulesAndRegulations.rule14') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($rulesAndRegulations['rule14'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('rulesAndRegulations.rule14')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>



                            </li>

                            {{-- 15 GRAY TEXT ONLY --}}
                            <li class="flex justify-start items-center w-full mt-2">

                                <div class="flex justify-start items-start w-11/12">

                                    <label for="consentForm.rule15" class="text-2xl font-black text-gray-700 mr-2">{{ ++$ruleCounter }}.</label>

                                    <p class="text-lg text-gray-900 font-black">
                                        <span class="text-2xl">I understand:</span>
                                        No more than ONE Guest is allowed during any visit. All Guests must be approved by PVSL staff. PVSL is NOT responsible for the loss
                                        or damage of any Guest's property. Them member will be responsible for the loss or damage of any property caused by the Guest.
                                    </p>

                                </div>

                                <div class="w-1/12 min-h-28 ml-2 relative cursor-pointer">
                                    <input wire:model="rulesAndRegulations.rule15"
                                           type="checkbox"
                                           name="rulesAndRegulations.rule15"
                                           id="rulesAndRegulations.rule15"
                                           required
                                           wire:click="{{ $rulesAndRegulationsSignature['signed'] ? 'clearRulesAndRegulationsSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-20">
                                    <div class="@error('rulesAndRegulations.rule15') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($rulesAndRegulations['rule15'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('rulesAndRegulations.rule15')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>



                            </li>

                            {{-- 16 GRAY TEXT ONLY --}}
                            <li class="flex justify-start items-center w-full mt-2">

                                <div class="flex justify-start items-start w-11/12">

                                    <label for="consentForm.rule16" class="text-2xl font-black text-gray-700 mr-2">{{ ++$ruleCounter }}.</label>

                                    <p class="text-lg text-gray-900 font-black">
                                        <span class="text-2xl">I understand:</span>
                                        Visits are to be no longer than twelve consecutive hours (example, 6pm - 6am). Community spaces (defined as any space within a PVSL property other than the member's
                                        private room or bathroom) may NOT be used by the Guest unless the member is present.
                                    </p>

                                </div>

                                <div class="w-1/12 min-h-28 ml-2 relative cursor-pointer">
                                    <input wire:model="rulesAndRegulations.rule16"
                                           type="checkbox"
                                           name="rulesAndRegulations.rule16"
                                           id="rulesAndRegulations.rule16"
                                           required
                                           wire:click="{{ $rulesAndRegulationsSignature['signed'] ? 'clearRulesAndRegulationsSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-20">
                                    <div class="@error('rulesAndRegulations.rule16') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($rulesAndRegulations['rule16'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('rulesAndRegulations.rule16')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>



                            </li>

                            {{-- 17 RED TEXT SPAN --}}
                            <li class="flex justify-start items-center w-full mt-2">

                                <div class="flex justify-start items-start w-11/12">

                                    <label for="rulesAndRegulations.rule17" class="text-2xl font-black text-gray-700 mr-2">{{ ++$ruleCounter }}.</label>

                                    <p class="text-lg text-gray-900 font-black">
                                        <span class="text-2xl">I understand:</span>
                                        <span class="text-red-500">
                                            ANY refusal of a drug test may result in immediate eviction.
                                        </span>
                                    </p>

                                </div>

                                <div class="w-1/12 min-h-28 ml-2 relative cursor-pointer">
                                    <input wire:model="rulesAndRegulations.rule17"
                                           type="checkbox"
                                           name="rulesAndRegulations.rule17"
                                           id="rulesAndRegulations.rule17"
                                           required
                                           wire:click="{{ $rulesAndRegulationsSignature['signed'] ? 'clearRulesAndRegulationsSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-20">
                                    <div class="@error('rulesAndRegulations.rule17') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($rulesAndRegulations['rule17'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('rulesAndRegulations.rule17')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>



                            </li>

                            {{-- 18 RED TEXT SPAN --}}
                            <li class="flex justify-start items-center w-full mt-2">

                                <div class="flex justify-start items-start w-11/12">

                                    <label for="rulesAndRegulations.rule18" class="text-2xl font-black text-gray-700 mr-2">{{ ++$ruleCounter }}.</label>

                                    <p class="text-lg text-gray-900 font-black">
                                        <span class="text-2xl">I understand:</span>
                                        <span class="text-red-500">
                                            ANY positive drug test may result in immediate eviction.
                                        </span>
                                    </p>

                                </div>

                                <div class="w-1/12 min-h-28 ml-2 relative cursor-pointer">
                                    <input wire:model="rulesAndRegulations.rule18"
                                           type="checkbox"
                                           name="rulesAndRegulations.rule18"
                                           id="rulesAndRegulations.rule18"
                                           required
                                           wire:click="{{ $rulesAndRegulationsSignature['signed'] ? 'clearRulesAndRegulationsSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-20">
                                    <div class="@error('rulesAndRegulations.rule18') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($rulesAndRegulations['rule18'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('rulesAndRegulations.rule18')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>



                            </li>

                            {{-- 19 GRAY TEXT ONLY --}}
                            <li class="flex justify-start items-center w-full mt-2">

                                <div class="flex justify-start items-start w-11/12">

                                    <label for="consentForm.rule19" class="text-2xl font-black text-gray-700 mr-2">{{ ++$ruleCounter }}.</label>

                                    <p class="text-lg text-gray-900 font-black">
                                        <span class="text-2xl">I understand:</span>
                                        Personal items are not allowed in comminity spaces unless the member is present.
                                    </p>

                                </div>

                                <div class="w-1/12 min-h-28 ml-2 relative cursor-pointer">
                                    <input wire:model="rulesAndRegulations.rule19"
                                           type="checkbox"
                                           name="rulesAndRegulations.rule19"
                                           id="rulesAndRegulations.rule19"
                                           required
                                           wire:click="{{ $rulesAndRegulationsSignature['signed'] ? 'clearRulesAndRegulationsSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-20">
                                    <div class="@error('rulesAndRegulations.rule19') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($rulesAndRegulations['rule19'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('rulesAndRegulations.rule19')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>



                            </li>

                            {{-- 20 GRAY TEXT ONLY --}}
                            <li class="flex justify-start items-center w-full mt-2">

                                <div class="flex justify-start items-start w-11/12">

                                    <label for="consentForm.rule20" class="text-2xl font-black text-gray-700 mr-2">{{ ++$ruleCounter }}.</label>

                                    <p class="text-lg text-gray-900 font-black">
                                        <span class="text-2xl">I understand:</span>
                                        Guests are required to be clean and sober. If they are suspected to be under the influence, a random drug test can be requested for the member's guest at any time.
                                        If the guest is found to be under the influence of any substance, he/she will be asked to leave the premises and will not be permitted to return.
                                    </p>

                                </div>

                                <div class="w-1/12 min-h-28 ml-2 relative cursor-pointer">
                                    <input wire:model="rulesAndRegulations.rule20"
                                           type="checkbox"
                                           name="rulesAndRegulations.rule20"
                                           id="rulesAndRegulations.rule20"
                                           required
                                           wire:click="{{ $rulesAndRegulationsSignature['signed'] ? 'clearRulesAndRegulationsSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-20">
                                    <div class="@error('rulesAndRegulations.rule20') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($rulesAndRegulations['rule20'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('rulesAndRegulations.rule20')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>



                            </li>

                            {{-- 21 GRAY TEXT ONLY --}}
                            <li class="flex justify-start items-center w-full mt-2">

                                <div class="flex justify-start items-start w-11/12">

                                    <label for="consentForm.rule21" class="text-2xl font-black text-gray-700 mr-2">{{ ++$ruleCounter }}.</label>

                                    <p class="text-lg text-gray-900 font-black">
                                        <span class="text-2xl">I understand:</span>
                                        If an individual's guest is found to be under the influence of any substance, the individual must submit to an immediate drutg test
                                        and may be subject to eviction.
                                    </p>

                                </div>

                                <div class="w-1/12 min-h-28 ml-2 relative cursor-pointer">
                                    <input wire:model="rulesAndRegulations.rule21"
                                           type="checkbox"
                                           name="rulesAndRegulations.rule21"
                                           id="rulesAndRegulations.rule21"
                                           required
                                           wire:click="{{ $rulesAndRegulationsSignature['signed'] ? 'clearRulesAndRegulationsSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-20">
                                    <div class="@error('rulesAndRegulations.rule21') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($rulesAndRegulations['rule21'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('rulesAndRegulations.rule21')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>



                            </li>

                            {{-- 22 GRAY TEXT ONLY --}}
                            <li class="flex justify-start items-center w-full mt-2">

                                <div class="flex justify-start items-start w-11/12">

                                    <label for="consentForm.rule22" class="text-2xl font-black text-gray-700 mr-2">{{ ++$ruleCounter }}.</label>

                                    <p class="text-lg text-gray-900 font-black">
                                        <span class="text-2xl">I understand:</span>
                                        If the member is going to be absent from the House for more than two (2) consecutive days, they must notify the director
                                        or house manager 24 hours before leaving.
                                    </p>

                                </div>

                                <div class="w-1/12 min-h-28 ml-2 relative cursor-pointer">
                                    <input wire:model="rulesAndRegulations.rule22"
                                           type="checkbox"
                                           name="rulesAndRegulations.rule22"
                                           id="rulesAndRegulations.rule22"
                                           required
                                           wire:click="{{ $rulesAndRegulationsSignature['signed'] ? 'clearRulesAndRegulationsSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-20">
                                    <div class="@error('rulesAndRegulations.rule22') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($rulesAndRegulations['rule22'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('rulesAndRegulations.rule22')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>



                            </li>

                            {{-- 23 GRAY TEXT ONLY --}}
                            <li class="flex justify-start items-center w-full mt-2">

                                <div class="flex justify-start items-start w-11/12">

                                    <label for="consentForm.rule23" class="text-2xl font-black text-gray-700 mr-2">{{ ++$ruleCounter }}.</label>

                                    <p class="text-lg text-gray-900 font-black">
                                        <span class="text-2xl">I understand:</span>
                                        Any medically prescribed medications must be reported to the director and house manager. All personal medications will be kept in a locked
                                        receptable which the member must provide. Sharing or distributing personal medication is PROHIBITED and may result in eviction.
                                    </p>

                                </div>

                                <div class="w-1/12 min-h-28 ml-2 relative cursor-pointer">
                                    <input wire:model="rulesAndRegulations.rule23"
                                           type="checkbox"
                                           name="rulesAndRegulations.rule23"
                                           id="rulesAndRegulations.rule23"
                                           required
                                           wire:click="{{ $rulesAndRegulationsSignature['signed'] ? 'clearRulesAndRegulationsSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-20">
                                    <div class="@error('rulesAndRegulations.rule23') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($rulesAndRegulations['rule23'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('rulesAndRegulations.rule23')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>



                            </li>

                            {{-- 24 GRAY TEXT ONLY --}}
                            <li class="flex justify-start items-center w-full mt-2">

                                <div class="flex justify-start items-start w-11/12">

                                    <label for="consentForm.rule24" class="text-2xl font-black text-gray-700 mr-2">{{ ++$ruleCounter }}.</label>

                                    <p class="text-lg text-gray-900 font-black">
                                        <span class="text-2xl">I understand:</span>
                                        Any unlawful activity may result in immediate eviction.
                                    </p>

                                </div>

                                <div class="w-1/12 min-h-28 ml-2 relative cursor-pointer">
                                    <input wire:model="rulesAndRegulations.rule24"
                                           type="checkbox"
                                           name="rulesAndRegulations.rule24"
                                           id="rulesAndRegulations.rule24"
                                           required
                                           wire:click="{{ $rulesAndRegulationsSignature['signed'] ? 'clearRulesAndRegulationsSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-20">
                                    <div class="@error('rulesAndRegulations.rule24') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($rulesAndRegulations['rule24'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('rulesAndRegulations.rule24')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>



                            </li>

                            {{-- 25 GRAY TEXT ONLY --}}
                            <li class="flex justify-start items-center w-full mt-2">

                                <div class="flex justify-start items-start w-11/12">

                                    <label for="consentForm.rule25" class="text-2xl font-black text-gray-700 mr-2">{{ ++$ruleCounter }}.</label>

                                    <p class="text-lg text-gray-900 font-black">
                                        <span class="text-2xl">I understand:</span>
                                        Any disruptive behavior inside Pura Vida Sober Living or Revival General Contracting may result in immediate eviction from the program.
                                    </p>

                                </div>

                                <div class="w-1/12 min-h-28 ml-2 relative cursor-pointer">
                                    <input wire:model="rulesAndRegulations.rule25"
                                           type="checkbox"
                                           name="rulesAndRegulations.rule25"
                                           id="rulesAndRegulations.rule25"
                                           required
                                           wire:click="{{ $rulesAndRegulationsSignature['signed'] ? 'clearRulesAndRegulationsSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-20">
                                    <div class="@error('rulesAndRegulations.rule25') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($rulesAndRegulations['rule25'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('rulesAndRegulations.rule25')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>



                            </li>

                            {{-- 26 GRAY TEXT ONLY --}}
                            <li class="flex justify-start items-center w-full mt-2">

                                <div class="flex justify-start items-start w-11/12">

                                    <label for="consentForm.rule26" class="text-2xl font-black text-gray-700 mr-2">{{ ++$ruleCounter }}.</label>

                                    <p class="text-lg text-gray-900 font-black">
                                        <span class="text-2xl">I understand:</span>
                                        Absolutely NO sleeping on couches if you are not being couched.
                                    </p>

                                </div>

                                <div class="w-1/12 min-h-28 ml-2 relative cursor-pointer">
                                    <input wire:model="rulesAndRegulations.rule26"
                                           type="checkbox"
                                           name="rulesAndRegulations.rule26"
                                           id="rulesAndRegulations.rule26"
                                           required
                                           wire:click="{{ $rulesAndRegulationsSignature['signed'] ? 'clearRulesAndRegulationsSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-20">
                                    <div class="@error('rulesAndRegulations.rule26') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($rulesAndRegulations['rule26'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('rulesAndRegulations.rule26')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>



                            </li>

                            {{-- 27 GRAY TEXT ONLY --}}
                            <li class="flex justify-start items-center w-full mt-2">

                                <div class="flex justify-start items-start w-11/12">

                                    <label for="consentForm.rule27" class="text-2xl font-black text-gray-700 mr-2">{{ ++$ruleCounter }}.</label>

                                    <p class="text-lg text-gray-900 font-black">
                                        <span class="text-2xl">I understand:</span>
                                        House members will NOT USE the following products: marijuana (with or without a prescription), spice, Kratom, alcohol-based Nyquil or Dayquil,
                                        or ANY over-the-counter <i>mind altering substance.</i>
                                    </p>

                                </div>

                                <div class="w-1/12 min-h-28 ml-2 relative cursor-pointer">
                                    <input wire:model="rulesAndRegulations.rule27"
                                           type="checkbox"
                                           name="rulesAndRegulations.rule27"
                                           id="rulesAndRegulations.rule27"
                                           required
                                           wire:click="{{ $rulesAndRegulationsSignature['signed'] ? 'clearRulesAndRegulationsSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-20">
                                    <div class="@error('rulesAndRegulations.rule27') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($rulesAndRegulations['rule27'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('rulesAndRegulations.rule27')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>



                            </li>

                            {{-- 28 GRAY TEXT ONLY --}}
                            <li class="flex justify-start items-center w-full mt-2">

                                <div class="flex justify-start items-start w-11/12">

                                    <label for="consentForm.rule28" class="text-2xl font-black text-gray-700 mr-2">{{ ++$ruleCounter }}.</label>

                                    <p class="text-lg text-gray-900 font-black">
                                        <span class="text-2xl">I understand:</span>
                                        Program members will be highly encouraged to take all of their belongings with them. Members will be given thirty (30) minutes
                                        to gather all belongings after being discharged from the program. The member will be supervised by PVSL staff and ALL items removed
                                        from PVSL property will be examined to protect the property rights of PVSL and the member. Any remaining items will be stored for
                                        sixty (60) days. After sixty (60) days, all unclaimed belongings will be donated to the Arc of Spokane.
                                    </p>

                                </div>

                                <div class="w-1/12 min-h-28 ml-2 relative cursor-pointer">
                                    <input wire:model="rulesAndRegulations.rule28"
                                           type="checkbox"
                                           name="rulesAndRegulations.rule28"
                                           id="rulesAndRegulations.rule28"
                                           required
                                           wire:click="{{ $rulesAndRegulationsSignature['signed'] ? 'clearRulesAndRegulationsSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-20">
                                    <div class="@error('rulesAndRegulations.rule28') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($rulesAndRegulations['rule28'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('rulesAndRegulations.rule28')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>



                            </li>

                            {{-- 29 RED TEXT SPAN --}}
                            <li class="flex justify-start items-center w-full mt-2">

                                <div class="flex justify-start items-start w-11/12">

                                    <label for="rulesAndRegulations.rule29" class="text-2xl font-black text-gray-700 mr-2">{{ ++$ruleCounter }}.</label>

                                    <p class="text-lg text-gray-900 font-black">
                                        <span class="text-2xl">I understand:</span>
                                        All house members are required to pay a
                                        <span class="text-red-500">
                                            $250.00 NON-REFUNDABLE Administration Fee
                                        </span>
                                        in lieu of deposit. This fee will be used to help fund the cost of drug tests, paperwork and move-in/move-out expenses.
                                    </p>

                                </div>

                                <div class="w-1/12 min-h-28 ml-2 relative cursor-pointer">
                                    <input wire:model="rulesAndRegulations.rule29"
                                           type="checkbox"
                                           name="rulesAndRegulations.rule29"
                                           id="rulesAndRegulations.rule29"
                                           required
                                           wire:click="{{ $rulesAndRegulationsSignature['signed'] ? 'clearRulesAndRegulationsSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-20">
                                    <div class="@error('rulesAndRegulations.rule29') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($rulesAndRegulations['rule29'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('rulesAndRegulations.rule29')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>



                            </li>

                            {{-- 30 GRAY TEXT ONLY --}}
                            <li class="flex justify-start items-center w-full mt-2">

                                <div class="flex justify-start items-start w-11/12">

                                    <label for="consentForm.rule30" class="text-2xl font-black text-gray-700 mr-2">{{ ++$ruleCounter }}.</label>

                                    <p class="text-lg text-gray-900 font-black">
                                        <span class="text-2xl">I understand:</span>
                                        Pura Vida Sober Living is not responsible for the acceptance, storage, transmission, redirection, or destruction of digital
                                        or physical mail. The member is encouraged to update personal address information as necessary, i.e., when entering the program,
                                        moving to another address withing the program, or exiting the program.
                                    </p>

                                </div>

                                <div class="w-1/12 min-h-28 ml-2 relative cursor-pointer">
                                    <input wire:model="rulesAndRegulations.rule30"
                                           type="checkbox"
                                           name="rulesAndRegulations.rule30"
                                           id="rulesAndRegulations.rule30"
                                           required
                                           wire:click="{{ $rulesAndRegulationsSignature['signed'] ? 'clearRulesAndRegulationsSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-20">
                                    <div class="@error('rulesAndRegulations.rule30') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($rulesAndRegulations['rule30'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('rulesAndRegulations.rule30')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>



                            </li>

                            {{-- 31 GRAY TEXT ONLY --}}
                            <li class="flex justify-start items-center w-full mt-2">

                                <div class="flex justify-start items-start w-11/12">

                                    <label for="consentForm.rule31" class="text-2xl font-black text-gray-700 mr-2">{{ ++$ruleCounter }}.</label>

                                    <p class="text-lg text-gray-900 font-black">
                                        <span class="text-2xl">I understand:</span>
                                        <span class="text-2xl">NO WEAPONS</span>
                                        of any type are allowed on PVSL property. Tools, implements, or any other item that could be used or defined as a weapon is NOT permitted.
                                        PVSL staff have final approval on all such items. Example: Camping or sporting tools that could be used as a weapon are NOT permitted on
                                        the property.
                                    </p>

                                </div>

                                <div class="w-1/12 min-h-28 ml-2 relative cursor-pointer">
                                    <input wire:model="rulesAndRegulations.rule31"
                                           type="checkbox"
                                           name="rulesAndRegulations.rule31"
                                           id="rulesAndRegulations.rule31"
                                           required
                                           wire:click="{{ $rulesAndRegulationsSignature['signed'] ? 'clearRulesAndRegulationsSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-20">
                                    <div class="@error('rulesAndRegulations.rule31') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($rulesAndRegulations['rule31'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('rulesAndRegulations.rule31')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>



                            </li>

                            {{-- 32 GRAY TEXT ONLY --}}
                            <li class="flex justify-start items-center w-full mt-2">

                                <div class="flex justify-start items-start w-11/12">

                                    <label for="consentForm.rule32" class="text-2xl font-black text-gray-700 mr-2">{{ ++$ruleCounter }}.</label>

                                    <p class="text-lg text-gray-900 font-black">
                                        <span class="text-2xl">I understand:</span>
                                        If the member is required to report address information to the Department of Corrections (D.O.C.), PVSL is obligated to inform
                                        D.O.C. and all relevant ancillary agencies when the member leaves the housing program including failure to follow PVSL substance
                                        abuse policies.
                                    </p>

                                </div>

                                <div class="w-1/12 min-h-28 ml-2 relative cursor-pointer">
                                    <input wire:model="rulesAndRegulations.rule32"
                                           type="checkbox"
                                           name="rulesAndRegulations.rule32"
                                           id="rulesAndRegulations.rule32"
                                           required
                                           wire:click="{{ $rulesAndRegulationsSignature['signed'] ? 'clearRulesAndRegulationsSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-20">
                                    <div class="@error('rulesAndRegulations.rule32') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($rulesAndRegulations['rule32'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('rulesAndRegulations.rule32')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>



                            </li>

                            {{-- 33 RED TEXT SPAN --}}
                            <li class="flex justify-start items-center w-full mt-2">

                                <div class="flex justify-start items-start w-11/12">

                                    <label for="rulesAndRegulations.rule33" class="text-2xl font-black text-gray-700 mr-2">{{ ++$ruleCounter }}.</label>

                                    <p class="text-lg text-gray-900 font-black">
                                        <span class="text-2xl">I understand:</span>
                                        All house members are required to pay a
                                        <span class="text-red-500">
                                            The member will participate in
                                        </span>
                                        <span class="text-red-500 underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                        <span class="text-red-500">
                                            Reclaim Project program(s) per week.
                                        </span>
                                        A Reclaim Project program is defined as an amount of time determined by PVSL to facilitate, encourage, and strangthen the member's personal
                                        recovery and the strength of the recovery community. This includes, but is not limited to, Integrated Men's Meetings and Community Engagement.
                                    </p>

                                </div>

                                <div class="w-1/12 min-h-28 ml-2 relative cursor-pointer">
                                    <input wire:model="rulesAndRegulations.rule33"
                                           type="checkbox"
                                           name="rulesAndRegulations.rule33"
                                           id="rulesAndRegulations.rule33"
                                           required
                                           wire:click="{{ $rulesAndRegulationsSignature['signed'] ? 'clearRulesAndRegulationsSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-20">
                                    <div class="@error('rulesAndRegulations.rule33') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($rulesAndRegulations['rule33'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('rulesAndRegulations.rule33')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>



                            </li>

                            {{-- 34 GRAY TEXT ONLY --}}
                            <li class="flex justify-start items-center w-full mt-2">

                                <div class="flex justify-start items-start w-11/12">

                                    <label for="consentForm.rule34" class="text-2xl font-black text-gray-700 mr-2">{{ ++$ruleCounter }}.</label>

                                    <p class="text-lg text-gray-900 font-black">
                                        <span class="text-2xl">I understand:</span>
                                        The member will be subject to a 30-day progress review. This review is a continuum of observations and metrics to record the member's
                                        progress and participation in their own recovery. Non-compliance or failure to meet or exceed the criteria for the 30-day progrss review
                                        may result in eviction.
                                    </p>

                                </div>

                                <div class="w-1/12 min-h-28 ml-2 relative cursor-pointer">
                                    <input wire:model="rulesAndRegulations.rule34"
                                           type="checkbox"
                                           name="rulesAndRegulations.rule34"
                                           id="rulesAndRegulations.rule34"
                                           required
                                           wire:click="{{ $rulesAndRegulationsSignature['signed'] ? 'clearRulesAndRegulationsSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-20">
                                    <div class="@error('rulesAndRegulations.rule34') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($rulesAndRegulations['rule34'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('rulesAndRegulations.rule34')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>



                            </li>

                            {{-- 35 GRAY TEXT ONLY --}}
                            <li class="flex justify-start items-center w-full mt-2">

                                <div class="flex justify-start items-start w-11/12">

                                    <label for="consentForm.rule35" class="text-2xl font-black text-gray-700 mr-2">{{ ++$ruleCounter }}.</label>

                                    <p class="text-lg text-gray-900 font-black">
                                        <span class="text-2xl">I understand:</span>
                                        <span class="text-2xl">NO PETS</span>
                                        allowed on PVSL property without prior written consent from PVSL authority.
                                    </p>

                                </div>

                                <div class="w-1/12 min-h-28 ml-2 relative cursor-pointer">
                                    <input wire:model="rulesAndRegulations.rule35"
                                           type="checkbox"
                                           name="rulesAndRegulations.rule35"
                                           id="rulesAndRegulations.rule35"
                                           required
                                           wire:click="{{ $rulesAndRegulationsSignature['signed'] ? 'clearRulesAndRegulationsSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-20">
                                    <div class="@error('rulesAndRegulations.rule35') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($rulesAndRegulations['rule35'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('rulesAndRegulations.rule35')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>



                            </li>

                            {{-- 36 RED TEXT SPAN --}}
                            <li class="flex justify-start items-center w-full mt-2">

                                <div class="flex justify-start items-start w-11/12">

                                    <label for="rulesAndRegulations.rule36" class="text-2xl font-black text-gray-700 mr-2">{{ ++$ruleCounter }}.</label>

                                    <p class="text-lg text-gray-900 font-black">
                                        <span class="text-2xl">I understand:</span>
                                        <span class="text-red-500">
                                            My personal property, including but not limited to, my room, my vehicle, and all other material may be searched at any time by PVSL staff.
                                        </span>
                                    </p>

                                </div>

                                <div class="w-1/12 min-h-28 ml-2 relative cursor-pointer">
                                    <input wire:model="rulesAndRegulations.rule36"
                                           type="checkbox"
                                           name="rulesAndRegulations.rule36"
                                           id="rulesAndRegulations.rule36"
                                           required
                                           wire:click="{{ $rulesAndRegulationsSignature['signed'] ? 'clearRulesAndRegulationsSignature()' : '' }}"
                                           autocomplete=""
                                           class="absolute inset-0 w-full h-full opacity-0 z-20">
                                    <div class="@error('rulesAndRegulations.rule36') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                        @if ($rulesAndRegulations['rule36'])
                                            <div class="text-md font-black text-gray-900">
                                                {{ $userInitials }}
                                            </div>
                                        @else
                                            <img src="/svg/signature-solid.svg" alt="Click to acknowledge">
                                        @endif
                                    </div>
                                           @error('rulesAndRegulations.rule36')
                                        <div class="flex w-full invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>



                            </li>

                            {{-- Select All Consent Form --}}
                            <li class="flex justify-end items-center w-full mt-3">

                                <label for="selectAllRulesAndRegulations" class="block text-lg font-black text-red-500 text-end mr-2">INITIAL ALL</label>

                                <input wire:model="selectAllRulesAndRegulations"
                                    type="checkbox"
                                    name="selectAllRulesAndRegulations"
                                    id="selectAllRulesAndRegulations"
                                    wire:click="selectAllRulesAndRegulations()"
                                    class="h-6 w-6 ml-2 text-accent text-accent_hover shadow-lg bg-input bg-input_hover focus:bg-white focus:ring-indigo-500 focus:border-indigo-500 border-1 border-accent-dark rounded-md z-10" />

                            </li>

                        </ul>

                        {{-- SIGN & DATE --}}
                        <div class="flex w-full gap-2 mt-4">

                            {{-- Signature --}}
                            <div class="w-1/2 min-h-28 mr-2 relative">
                                <label for="rulesAndRegulationsSignature.signed" class="block text-lg font-black text-gray-700 text-end">Signature</label>

                                <input wire:model="rulesAndRegulationsSignature.signed"
                                        type="checkbox"
                                        name="rulesAndRegulationsSignature.signed"
                                        id="rulesAndRegulationsSignature.signed"
                                        required
                                        autocomplete=""
                                        wire:click="signRulesAndRegulations()"
                                        class="absolute inset-0 w-full h-full opacity-0 z-10 cursor-pointer">
                                <div class="@error('rulesAndRegulationsSignature.signed') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                    @if ($rulesAndRegulationsSignature['signed'])
                                        <div class="text-md font-black text-gray-900">
                                            {{ $userSignature }}
                                        </div>
                                    @else
                                        <img src="/svg/signature-solid.svg" alt="Click to sign consent form">
                                    @endif
                                </div>
                                        @error('rulesAndRegulationsSignature.signed')
                                    <div class="flex w-full invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            {{-- Date --}}
                            <div class="w-1/2 min-h-28 relative">
                                <label for="consentFormSignature.date" class="block text-lg font-black text-gray-700 text-end">Date</label>

                                <input wire:model="consentFormSignature.date"
                                        type="checkbox"
                                        name="consentFormSignature.date"
                                        id="consentFormSignature.date"
                                        required
                                        autocomplete=""
                                        class="absolute inset-0 w-full h-full opacity-0 z-10 cursor-pointer">
                                <div class="@error('consentFormSignature.date') is-invalid bg-input-error @enderror px-3 py-2 flex justify-center items-center w-full shadow-lg text-gray-900 bg-input border-1 border-accent-dark rounded-md z-10">
                                    @if ($consentFormSignature['date'])
                                        <div class="text-md font-black text-gray-900">
                                            {{ $today }}
                                        </div>
                                    @else
                                        <img src="/svg/calendar-alt-solid.svg" alt="Click to date consent form">
                                    @endif
                                </div>
                                        @error('consentFormSignature.date')
                                    <div class="flex w-full invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

    <!-- Bottom Navigation -->
    <div class="{{ $previewActive || $previewIDFrontActive || $previewIDBackActive ? 'relative z-1' : 'sticky z-30' }}  bottom-0 left-0 right-0 flex flex-col justify-center max-w-screen-lg mx-auto align-middle rounded-b-md">

        <!-- Bottom Navigation 1 -->
        <div class="relative flex flex-col justify-center w-full py-1 bg-white px-2">

            @php
                $progressBar = array();
                foreach ($stepStatuses as $stepStatus) {
                    if ($stepStatus == 'complete') $progressBar[] = $stepStatus;
                }
                $progressBarCompleted = count($progressBar);
            @endphp

            <!-- Progress Bar -->
            <div class="flex items-center justify-end w-full mb-2 pt-2 border-t-2 border-gray-300">
                <div class="relative mr-2 progress-bar-width">
                    <div class="absolute bottom-0 right-0 h-2 text-xs leading-none text-center text-white border-gray-900 rounded-full top-px left-px bg-accent border-1 z-10" style="width: {{ $progressBarCompleted > 0 ? intval($progressBarCompleted / $totalSteps * 100) . '%' : '1%' }}"></div>
                    <div class="rounded-full bg-form-progress-bar border-1 border-gray-300 text-xs leading-none h-2.5 text-center text-white relative z-0"></div>
                </div>
                <div class="w-10 font-bold text-gray-900 text-md text-end">{{ intval($progressBarCompleted / $totalSteps * 100) }}%</div>
            </div>

        </div>

        <!-- Bottom Navigation 2 -->
        <div class="flex justify-between w-full p-2 shadow-lg bg-gray-600 rounded-b-md">
            <div class="flex w-1/2 justify-start items-center test">

                <button type="button"
                        wire:click.prevent="prevStep"
                        class="{{ $currentStep > 0 ? '' : 'hidden' }} flex w-auto justify-center items-center border border-transparent rounded-md shadow-md text-md font-medium text-white bg-accent bg-accent_hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <div wire:loading wire:target="prevStep">
                        <x-loading-blocks />
                    </div>
                    <div class="flex items-center justify-between p-2 md:p-1 w-full font-bold text-white text-md md:text-sm md:font-semibold whitespace-nowrap" wire:loading.remove wire:target="prevStep">
                        <img class="flex md:mr-2" src="/svg/angle-double-left.svg" alt="Previous Step">
                        Step {{ $currentStep - 1 < 0 ? 0 : $currentStep . ': ' . $stepTitles[$currentStep - 1 < 0 ? 0 : $currentStep - 1] }}
                    </div>
                </button>
            </div>

            <div class="flex w-1/2 justify-end items-center test2">

                <button type="button"
                        wire:click.prevent="completeStep"
                        class="{{ $currentStep < $totalSteps - 1 ? '' : 'hidden' }} {{ $currentStep == 9 && !$submitted ? 'hidden' : '' }} flex w-auto justify-center items-center border border-transparent rounded-md shadow-md text-md font-medium text-white bg-accent bg-accent_hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <div wire:loading wire:target="completeStep">
                        <x-loading-blocks />
                    </div>
                    <div class="flex items-center justify-between md:p-2 p-1 w-full md:font-bold text-white md:text-md text-sm font-semibold whitespace-nowrap" wire:loading.remove wire:target="completeStep">
                        Step {{ $currentStep + 2 . ': ' . $stepTitles[$currentStep + 1 < 11 ? $currentStep + 1 : 11] }}
                        <img class="flex md:ml-2" src="/svg/angle-double-right.svg" alt="Next Step">
                    </div>
                </button>

                <button wire:click.prevent="rentalAppFormSubmit"
                        class="{{ $currentStep == 9 && !$submitted ? '' : 'hidden' }} flex w-auto justify-center items-center border border-transparent rounded-md shadow-md text-md font-medium text-white bg-accent bg-accent_hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 whitespace-nowrap">
                    Submit Application
                </button>
            </div>
        </div>
    </div>

</div>
