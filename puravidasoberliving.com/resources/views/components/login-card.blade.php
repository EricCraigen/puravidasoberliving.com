<div class="mt-8 box-container sm:mx-auto sm:w-full sm:max-w-md">
    <div class="box-item">

        <div class="flip-box">

            <div class="relative z-10 px-4 py-8 overflow-hidden bg-white shadow flip-box-front flip-box-front-height sm:rounded-lg sm:px-10" id="flip_box_front">
                <svg class="absolute bottom-0 right-0 z-0 transform translate-x-1/2 left-28 -top-36 opacity-30" width="404" height="404" fill="none" viewBox="0 0 404 404" aria-hidden="true">
                        <defs>
                          <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-accent" fill="currentColor" />
                          </pattern>
                        </defs>
                        <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)" />
                      </svg>
                    <svg class="absolute bottom-0 right-0 z-0 transform -translate-x-1/2 -left-11 top-76 opacity-30" width="404" height="404" fill="none" viewBox="0 0 404 404" aria-hidden="true">
                        <defs>
                            <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-accent" fill="currentColor" />
                            </pattern>
                        </defs>
                        <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)" />
                    </svg><div class="text-black inner">



                    <a class="relative z-10 inline-flex justify-center w-full" href="/">
                        <x-application-logo class="w-20 h-20 text-gray-500 fill-current" />
                    </a>

                    <form class="relative z-10 space-y-6" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div>
                            <label for="email" class="block text-lg font-black text-gray-700">
                                {{ __('Email address') }}
                            </label>
                            <div class="relative z-10 mt-1">
                                <input id="email_login" type="email" name="email" :value="old('email')" required autocomplete="email" autofocus placeholder="youremail@aol.com" class="@error('email_login') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md relative z-10">
                                @error('email_login')
                                    <span class="relative z-10 invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="password" class="block text-lg font-black text-gray-700">
                                {{ __('Password') }}
                            </label>
                            <div class="relative z-10 mt-1">
                                <input id="password_login" type="password" name="password" required autocomplete="current-password" autofocus placeholder="DaP@ssword1" class="@error('password_login') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md relative z-10">
                                @error('password_login')
                                    <span class="relative z-10 invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="relative z-10 flex items-center justify-between">
                            <div x-data="{
                                    isChecked: $persist(false).as('remember_me_checker')
                                }"
                                class="flex items-center"
                            >
                                <input @click="isChecked = ! isChecked" x-bind:checked="isChecked" id="remember-me" name="remember-me" type="checkbox"  class="w-4 h-4 border-gray-300 rounded-md shadow-lg text-accent text-accent_hover focus:ring-indigo-500 focus:border-indigo-500">
                                <label  for="remember-me" class="block ml-2 font-extrabold text-gray-900 text-md">
                                    {{ __('Remember me') }}
                                </label>
                            </div>


                            <div class="relative z-10 text-sm">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="font-extrabold text-md text-accent text-accent_hover">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="relative z-10">
                            <button type="submit" class="flex justify-center w-full px-4 py-2 text-lg font-black text-white border border-transparent rounded-md shadow-lg bg-accent bg-accent_hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                                {{ __('Sign in') }}
                            </button>
                        </div>
                    </form>

                    <div class="relative z-10 mt-6">
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-2 my-4 text-gray-500 bg-white">
                                    {{ __('Or continue with') }}
                                </span>
                            </div>
                        </div>

                        <div class="relative z-10 grid grid-cols-3 gap-3 mt-6">
                            <div>
                                <a href="#" class="inline-flex justify-center w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-lg hover:bg-gray-50">
                                    <span class="sr-only">
                                        {{ __('Sign in with Facebook') }}
                                    </span>
                                    <svg class="w-5 h-5 text-accent text-accent_hover" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M20 10c0-5.523-4.477-10-10-10S0 4.477 0 10c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V10h2.54V7.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V10h2.773l-.443 2.89h-2.33v6.988C16.343 19.128 20 14.991 20 10z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>

                            <div>
                                <a href="#"  class="inline-flex justify-center w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-lg hover:bg-gray-50">
                                    <span class="sr-only">
                                        {{ __('Sign in with Twitter') }}
                                    </span>
                                    <svg class="w-5 h-5 text-accent text-accent_hover" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                        <path d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84" />
                                    </svg>
                                </a>
                            </div>

                            <div>
                                <a href="#" class="inline-flex justify-center w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-lg hover:bg-gray-50">
                                    <span class="sr-only">
                                        {{ __('Sign in with GitHub') }}
                                    </span>
                                    <svg class="w-5 h-5 text-accent text-accent_hover" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M10 0C4.477 0 0 4.484 0 10.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0110 4.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.203 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.942.359.31.678.921.678 1.856 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0020 10.017C20 4.484 15.522 0 10 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>

                        </div>

                    </div>

                    <div class="relative z-10 flex items-center justify-center w-full my-5 text-black">
                        <div class="bg-white shadow-lg switch-wrapper">
                            <div class="text-black switch-content-wrapper">
                                <div x-data class="switch-label-wrapper" x-on:click="loginFormAnimation()">
                                    <p class="switch-label active">
                                        {{ __('Login') }}
                                    </p>
                                </div>
                                <div x-data class="switch-label-wrapper" x-on:click="loginFormAnimation()">
                                    <p class="switch-label">
                                        {{ __('Register') }}
                                    </p>
                                </div>
                                <div class="switch-pill"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="relative z-10 px-4 py-8 overflow-hidden bg-white shadow flip-box-back flip-box-back-height flip-box-front-height sm:rounded-lg sm:px-10" id="flip_box_back">
                <svg class="absolute bottom-0 right-0 z-0 transform translate-x-1/2 left-28 top-4 opacity-30" width="404" height="404" fill="none" viewBox="0 0 404 404" aria-hidden="true">
                    <defs>
                      <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" class="text-accent" fill="currentColor" />
                      </pattern>
                    </defs>
                    <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)" />
                  </svg>
                <svg class="absolute bottom-0 right-0 z-0 transform -translate-x-1/2 -left-11 top-105 opacity-30" width="404" height="404" fill="none" viewBox="0 0 404 404" aria-hidden="true">
                    <defs>
                        <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" class="text-accent" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)" />
                </svg>

                <div class="relative z-10 text-black inner">

                    <a class="relative z-10 inline-flex justify-center w-full" href="/">
                        <x-application-logo class="w-20 h-20 text-gray-500 fill-current" />
                    </a>

                    <form class="relative z-10 space-y-6" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="relative z-10 flex w-full gap-x-2">

                            <div>
                                <label for="firstName" class="relative z-10 block text-lg font-black text-gray-700">
                                    {{ __('First Name') }}
                                </label>
                                <div class="mt-1">
                                    <input id="firstName" type="text" name="firstName" value="{{ old('firstName') }}" required autocomplete="given-name" autofocus placeholder="Issac" class="@error('firstName') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                                    @error('firstName')
                                    <span class="relative z-10 invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>

                            <div>
                                <label for="lastName" class="relative z-10 block text-lg font-black text-gray-700">
                                    {{ __('Last Name') }}
                                </label>
                                <div class="relative z-10 mt-1">
                                    <input id="lastName" type="text" name="lastName" value="{{ old('lastName') }}" required autocomplete="family-name" autofocus placeholder="Newton" class="@error('lastName') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                                    @error('lastName')
                                    <span class="relative z-10 invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="email" class="relative z-10 block text-lg font-black text-gray-700">
                                {{ __('Email') }}
                            </label>
                            <div class="relative z-10 mt-1">
                                <input id="email" type="text" name="email" value="{{ old('email') }}"  required autocomplete="email" autofocus placeholder="theNEWT@aol.com" class="@error('email') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                                @error('email')
                                    <span class="relative z-10 invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="password" class="relative z-10 block text-lg font-black text-gray-700">
                                {{ __('Password') }}
                            </label>
                            <div class="relative z-10 mt-1">
                                <input id="password" type="password" name="password" value="{{ old('password') }}"  required autocomplete="password" autofocus placeholder="DaP@ssword1" class="@error('password') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                                @error('password')
                                    <span class="relative z-10 invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="password_confirmation" class="relative z-10 block text-lg font-black text-gray-700">
                                {{ __('Confirm Password') }}
                            </label>
                            <div class="relative z-10 mt-1">
                                <input id="password_confirmation" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" required autofocus class="@error('password_confirmation') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                                @error('password_confirmation')
                                    <span class="relative z-10 invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="relative z-10 flex items-center justify-center mt-4">
                            <button type="submit" class="relative z-10 flex justify-center w-full px-4 py-2 text-lg font-black text-white border border-transparent rounded-md shadow-lg bg-accent bg-accent_hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>

                    <div class="relative z-10 mt-6">
                        <div class="relative z-10">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-2 my-4 text-gray-500 bg-white">
                                    {{ __('Or continue with') }}
                                </span>
                            </div>
                        </div>

                        <div class="relative z-10 grid grid-cols-3 gap-3 mt-6">
                            <div class="relative z-10">
                                <a href="#" class="inline-flex justify-center w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-lg hover:bg-gray-50">
                                    <span class="sr-only">
                                        {{ __('Sign in with Facebook') }}
                                    </span>
                                    <svg class="w-5 h-5 text-accent text-accent_hover" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M20 10c0-5.523-4.477-10-10-10S0 4.477 0 10c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V10h2.54V7.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V10h2.773l-.443 2.89h-2.33v6.988C16.343 19.128 20 14.991 20 10z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>

                            <div>
                                <a href="#"  class="relative z-10 inline-flex justify-center w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-lg hover:bg-gray-50">
                                    <span class="sr-only">
                                        {{ __('Sign in with Twitter') }}
                                    </span>
                                    <svg class="w-5 h-5 text-accent text-accent_hover" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                        <path d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84" />
                                    </svg>
                                </a>
                            </div>

                            <div>
                                <a href="#" class="relative z-10 inline-flex justify-center w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-lg hover:bg-gray-50">
                                    <span class="sr-only">
                                        {{ __('Sign in with GitHub') }}
                                    </span>
                                    <svg class="w-5 h-5 text-accent text-accent_hover" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M10 0C4.477 0 0 4.484 0 10.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0110 4.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.203 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.942.359.31.678.921.678 1.856 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0020 10.017C20 4.484 15.522 0 10 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>

                        </div>
                    </div>

                    <div class="relative z-10 flex items-center justify-center w-full my-5 text-black">
                        <div class="bg-white switch-wrapper">
                            <div class="text-black switch-content-wrapper">
                                <div x-data class="switch-label-wrapper" x-on:click="loginFormAnimation()">
                                    <p class="switch-label active">
                                        {{ __('Login') }}
                                    </p>
                                </div>
                                <div x-data class="switch-label-wrapper" x-on:click="loginFormAnimation()">
                                    <p class="switch-label">
                                        {{ __('Register') }}
                                    </p>
                                </div>
                                <div class="switch-pill"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
