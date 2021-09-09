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
            <div x-data="{ isShowing: true }" class="border-b-2 border-gray-300 pb-4 relative z-10">

                <div x-data @scroll.window="isShowing = (window.scrollY > 300) ? false : true"  class="flex flex-col md:items-center md:justify-between relative"  :class="{'hidden' : !isShowing}">

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
                                                <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-indigo-600 rounded-full group-hover:bg-indigo-800">
                                                    <!-- Heroicon name: solid/check -->
                                                    <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                    </svg>
                                                </span>
                                                <span class="ml-4 text-sm font-medium text-gray-900">
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

                                  {{-- <li class="relative md:flex-1 md:flex">
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
                                  </li> --}}

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
            <div class="py-10 mx-1 relative z-10">
                <div class="{{ $currentStep == 1 ? '' : 'hidden' }}">
                    <div class="mb-5 text-center">
                        <div class="mx-auto w-32 h-32 border rounded-full relative bg-gray-100 mb-4 shadow-inset">
                            <img id="image" class="object-cover w-full h-32 rounded-full" :src="image" />
                        </div>

                        <label
                            for="fileInput"
                            type="button"
                            class="cursor-pointer inine-flex justify-between items-center focus:outline-none border py-2 px-4 rounded-lg shadow-sm text-left text-gray-600 bg-white hover:bg-gray-100 font-medium"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline-flex flex-shrink-0 w-6 h-6 -mt-1 mr-1" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                                <path d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" />
                                <circle cx="12" cy="13" r="3" />
                            </svg>
                            Browse Photo
                        </label>

                        <div class="mx-auto w-48 text-gray-500 text-xs text-center mt-1">Click to add profile picture</div>

                        <input name="photo" id="fileInput" accept="image/*" class="hidden" type="file" @change="let file = document.getElementById('fileInput').files[0];
                            var reader = new FileReader();
                            reader.onload = (e) => image = e.target.result;
                            reader.readAsDataURL(file);">
                    </div>

                    <div class="mb-5">
                        <label for="firstname" class="font-bold mb-1 text-gray-700 block">Firstname</label>
                        <input type="text"
                            class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                            placeholder="Enter your firstname...">
                    </div>

                    <div class="mb-5">
                        <label for="email" class="font-bold mb-1 text-gray-700 block">Email</label>
                        <input type="email"
                            class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                            placeholder="Enter your email address...">
                    </div>

                </div>

                <div class="{{ $currentStep == 2 ? '' : 'hidden' }}">

                    <div class="mb-5">
                        <label for="password" class="font-bold mb-1 text-gray-700 block">Set up password</label>
                        <div class="text-gray-600 mt-2 mb-4">
                            Please create a secure password including the following criteria below.

                            <ul class="list-disc text-sm ml-4 mt-2">
                                <li>lowercase letters</li>
                                <li>numbers</li>
                                <li>capital letters</li>
                                <li>special characters</li>
                            </ul>
                        </div>

                        <div class="relative">
                            <input
                                {{-- :type="togglePassword ? 'text' : 'password'" --}}
                                {{-- @keydown="checkPasswordStrength()" --}}
                                {{-- x-model="password" --}}
                                class="w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                placeholder="Your strong password...">

                            <div class="absolute right-0 bottom-0 top-0 px-3 py-3 cursor-pointer"
                                {{-- @click="togglePassword = !togglePassword" --}}
                            >
                                {{-- <svg :class="{'hidden': !togglePassword, 'block': togglePassword }" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current text-gray-500" viewBox="0 0 24 24"><path d="M12 19c.946 0 1.81-.103 2.598-.281l-1.757-1.757C12.568 16.983 12.291 17 12 17c-5.351 0-7.424-3.846-7.926-5 .204-.47.674-1.381 1.508-2.297L4.184 8.305c-1.538 1.667-2.121 3.346-2.132 3.379-.069.205-.069.428 0 .633C2.073 12.383 4.367 19 12 19zM12 5c-1.837 0-3.346.396-4.604.981L3.707 2.293 2.293 3.707l18 18 1.414-1.414-3.319-3.319c2.614-1.951 3.547-4.615 3.561-4.657.069-.205.069-.428 0-.633C21.927 11.617 19.633 5 12 5zM16.972 15.558l-2.28-2.28C14.882 12.888 15 12.459 15 12c0-1.641-1.359-3-3-3-.459 0-.888.118-1.277.309L8.915 7.501C9.796 7.193 10.814 7 12 7c5.351 0 7.424 3.846 7.926 5C19.624 12.692 18.76 14.342 16.972 15.558z"/></svg> --}}

                                {{-- <svg :class="{'hidden': togglePassword, 'block': !togglePassword }" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current text-gray-500" viewBox="0 0 24 24"><path d="M12,9c-1.642,0-3,1.359-3,3c0,1.642,1.358,3,3,3c1.641,0,3-1.358,3-3C15,10.359,13.641,9,12,9z"/><path d="M12,5c-7.633,0-9.927,6.617-9.948,6.684L1.946,12l0.105,0.316C2.073,12.383,4.367,19,12,19s9.927-6.617,9.948-6.684 L22.054,12l-0.105-0.316C21.927,11.617,19.633,5,12,5z M12,17c-5.351,0-7.424-3.846-7.926-5C4.578,10.842,6.652,7,12,7 c5.351,0,7.424,3.846,7.926,5C19.422,13.158,17.348,17,12,17z"/></svg> --}}
                            </div>
                        </div>

                        <div class="flex items-center mt-4 h-3">
                            <div class="w-2/3 flex justify-between h-2">
                                {{-- <div :class="{ 'bg-red-400': passwordStrengthText == 'Too weak' ||  passwordStrengthText == 'Could be stronger' || passwordStrengthText == 'Strong password' }" class="h-2 rounded-full mr-1 w-1/3 bg-gray-300"></div> --}}
                                {{-- <div :class="{ 'bg-orange-400': passwordStrengthText == 'Could be stronger' || passwordStrengthText == 'Strong password' }" class="h-2 rounded-full mr-1 w-1/3 bg-gray-300"></div> --}}
                                {{-- <div :class="{ 'bg-green-400': passwordStrengthText == 'Strong password' }" class="h-2 rounded-full w-1/3 bg-gray-300"></div> --}}
                            </div>
                            {{-- <div x-text="passwordStrengthText" class="text-gray-500 font-medium text-sm ml-3 leading-none"></div> --}}
                        </div>

                        <p class="mt-5 text-gray-600">Inspired from dribbble shot: Exploration for a password strength meter by <a href="https://dribbble.com/OvertonGraphics" class="text-blue-500">Josh Overton</a>.</p>
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
            <div x-data @scroll.window="isHidden = (window.scrollY > 300) ? false : true" class="flex flex-col justify-center w-full py-1 px-14 bg-white relative" :class="{'hidden' : isHidden}">

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

            </div>

            <!-- Bottom Navigation 2 -->
            <div class="flex w-full justify-between py-2 px-14 bg-accent-dark rounded-b-md shadow-lg">
                <div class="w-1/3">

                    <button type="button"
                            wire:click.prevent="prevStep"
                            class="{{ $currentStep > 1 ? '' : 'hidden' }} inline-flex min-w-36 justify-center h-full items-center border border-transparent rounded-md shadow-md text-md font-medium text-white bg-accent bg-accent_hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <div wire:loading wire:target="prevStep">
                            <x-loading-blocks />
                        </div>
                        <div class="flex w-full justify-between items-center p-2 text-white text-md font-bold" wire:loading.remove wire:target="prevStep">
                            <img class="flex" src="/svg/angle-double-left.svg" alt="Previous Step">
                            {{ $stepTitles[$currentStep - 2 < 0 ? 0 : $currentStep - 2] }}
                        </div>
                    </button>
                </div>

                <div class="w-1/3 text-right">

                    <button type="button"
                            wire:click.prevent="nextStep"
                            class="{{ $currentStep < $totalSteps ? '' : 'hidden' }} inline-flex min-w-36 justify-center h-full items-center border border-transparent rounded-md shadow-md text-md font-medium text-white bg-accent bg-accent_hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <div wire:loading wire:target="nextStep">
                            <x-loading-blocks />
                        </div>
                        <div class="flex w-full justify-between items-center p-2 text-white text-md font-bold" wire:loading.remove wire:target="nextStep">
                            {{ $stepTitles[$currentStep >= count($stepTitles) ? count($stepTitles) - 1 : $currentStep] }}
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
