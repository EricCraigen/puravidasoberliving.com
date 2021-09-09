<x-app-layout>

    <div class="min-h-screen bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">

        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-center text-5xl font-extrabold text-gray-900" id="login-register-notification">
                {{ __('Sign in to your account') }}
            </h2>
        </div>

        <div class="box-container mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="box-item">

                <div class="flip-box">

                    <div class="flip-box-front flip-box-front-height bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10 relative overflow-hidden z-10" id="flip_box_front">
                        <svg class="absolute left-28 -top-36 right-0 bottom-0 transform translate-x-1/2 opacity-30 z-0" width="404" height="404" fill="none" viewBox="0 0 404 404" aria-hidden="true">
                                <defs>
                                  <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                    <rect x="0" y="0" width="4" height="4" class="text-accent" fill="currentColor" />
                                  </pattern>
                                </defs>
                                <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)" />
                              </svg>
                            <svg class="absolute right-0 bottom-0 -left-11 top-76 transform -translate-x-1/2 opacity-30 z-0" width="404" height="404" fill="none" viewBox="0 0 404 404" aria-hidden="true">
                                <defs>
                                    <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                    <rect x="0" y="0" width="4" height="4" class="text-accent" fill="currentColor" />
                                    </pattern>
                                </defs>
                                <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)" />
                            </svg><div class="inner text-black">



                            <a class="inline-flex w-full justify-center relative z-10" href="/">
                                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                            </a>

                            <form class="space-y-6 relative z-10" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div>
                                    <label for="email" class="block text-lg font-black text-gray-700">
                                        {{ __('Email address') }}
                                    </label>
                                    <div class="mt-1 relative z-10">
                                        <input id="email_login" type="email" name="email" :value="old('email')" required autocomplete="email" autofocus placeholder="youremail@aol.com" class="@error('email_login') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md relative z-10">
                                        @error('email_login')
                                            <span class="invalid-feedback relative z-10" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <label for="password" class="block text-lg font-black text-gray-700">
                                        {{ __('Password') }}
                                    </label>
                                    <div class="mt-1 relative z-10">
                                        <input id="password_login" type="password" name="password" required autocomplete="current-password" autofocus placeholder="DaP@ssword1" class="@error('password_login') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md relative z-10">
                                        @error('password_login')
                                            <span class="invalid-feedback relative z-10" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="flex items-center justify-between relative z-10">
                                    <div x-data="{
                                            isChecked: $persist(false).as('remember_me_checker')
                                        }"
                                        class="flex items-center"
                                    >
                                        <input @click="isChecked = ! isChecked" x-bind:checked="isChecked" id="remember-me" name="remember-me" type="checkbox"  class="h-4 w-4 text-accent text-accent_hover shadow-lg focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                                        <label  for="remember-me" class="ml-2 block text-md font-extrabold text-gray-900">
                                            {{ __('Remember me') }}
                                        </label>
                                    </div>


                                    <div class="text-sm relative z-10">
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" class="text-md font-extrabold text-accent text-accent_hover">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>

                                <div class="relative z-10">
                                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-lg text-lg font-black text-white bg-accent bg-accent_hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                                        {{ __('Sign in') }}
                                    </button>
                                </div>
                            </form>

                            <div class="mt-6 relative z-10">
                                <div class="relative">
                                    <div class="absolute inset-0 flex items-center">
                                        <div class="w-full border-t border-gray-300"></div>
                                    </div>
                                    <div class="relative flex justify-center text-sm">
                                        <span class="px-2 my-4 bg-white text-gray-500">
                                            {{ __('Or continue with') }}
                                        </span>
                                    </div>
                                </div>

                                <div class="mt-6 grid grid-cols-3 gap-3 relative z-10">
                                    <div>
                                        <a href="#" class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-lg bg-white hover:bg-gray-50">
                                            <span class="sr-only">
                                                {{ __('Sign in with Facebook') }}
                                            </span>
                                            <svg class="w-5 h-5 text-accent text-accent_hover" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M20 10c0-5.523-4.477-10-10-10S0 4.477 0 10c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V10h2.54V7.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V10h2.773l-.443 2.89h-2.33v6.988C16.343 19.128 20 14.991 20 10z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </div>

                                    <div>
                                        <a href="#"  class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-lg bg-white hover:bg-gray-50">
                                            <span class="sr-only">
                                                {{ __('Sign in with Twitter') }}
                                            </span>
                                            <svg class="w-5 h-5 text-accent text-accent_hover" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                                <path d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84" />
                                            </svg>
                                        </a>
                                    </div>

                                    <div>
                                        <a href="#" class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-lg bg-white hover:bg-gray-50">
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

                            <div class="flex w-full items-center justify-center my-5 text-black relative z-10">
                                <div class="switch-wrapper bg-white shadow-lg">
                                    <div class="switch-content-wrapper text-black">
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

                    <div class="flip-box-back flip-box-back-height flip-box-front-height bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10 relative overflow-hidden z-10" id="flip_box_back">
                        <svg class="absolute left-28 top-4 right-0 bottom-0 transform translate-x-1/2 opacity-30 z-0" width="404" height="404" fill="none" viewBox="0 0 404 404" aria-hidden="true">
                            <defs>
                              <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                <rect x="0" y="0" width="4" height="4" class="text-accent" fill="currentColor" />
                              </pattern>
                            </defs>
                            <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)" />
                          </svg>
                        <svg class="absolute right-0 bottom-0 -left-11 top-105 transform -translate-x-1/2 opacity-30 z-0" width="404" height="404" fill="none" viewBox="0 0 404 404" aria-hidden="true">
                            <defs>
                                <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                <rect x="0" y="0" width="4" height="4" class="text-accent" fill="currentColor" />
                                </pattern>
                            </defs>
                            <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)" />
                        </svg>

                        <div class="inner text-black relative z-10">

                            <a class="inline-flex w-full justify-center relative z-10" href="/">
                                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                            </a>

                            <form class="space-y-6 relative z-10" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="flex w-full gap-x-2 relative z-10">

                                    <div>
                                        <label for="firstName" class="block text-lg font-black text-gray-700 relative z-10">
                                            {{ __('First Name') }}
                                        </label>
                                        <div class="mt-1">
                                            <input id="firstName" type="text" name="firstName" value="{{ old('firstName') }}" required autocomplete="given-name" autofocus placeholder="Issac" class="@error('firstName') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                                            @error('firstName')
                                            <span class="invalid-feedback relative z-10" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>

                                    <div>
                                        <label for="lastName" class="block text-lg font-black text-gray-700 relative z-10">
                                            {{ __('Last Name') }}
                                        </label>
                                        <div class="mt-1 relative z-10">
                                            <input id="lastName" type="text" name="lastName" value="{{ old('lastName') }}" required autocomplete="family-name" autofocus placeholder="Newton" class="@error('lastName') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                                            @error('lastName')
                                            <span class="invalid-feedback relative z-10" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label for="email" class="block text-lg font-black text-gray-700 relative z-10">
                                        {{ __('Email') }}
                                    </label>
                                    <div class="mt-1 relative z-10">
                                        <input id="email" type="text" name="email" value="{{ old('email') }}"  required autocomplete="email" autofocus placeholder="theNEWT@aol.com" class="@error('email') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                                        @error('email')
                                            <span class="invalid-feedback relative z-10" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <label for="password" class="block text-lg font-black text-gray-700 relative z-10">
                                        {{ __('Password') }}
                                    </label>
                                    <div class="mt-1 relative z-10">
                                        <input id="password" type="password" name="password" value="{{ old('password') }}"  required autocomplete="password" autofocus placeholder="DaP@ssword1" class="@error('password') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                                        @error('password')
                                            <span class="invalid-feedback relative z-10" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <label for="password_confirmation" class="block text-lg font-black text-gray-700 relative z-10">
                                        {{ __('Confirm Password') }}
                                    </label>
                                    <div class="mt-1 relative z-10">
                                        <input id="password_confirmation" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" required autofocus class="@error('password_confirmation') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                                        @error('password_confirmation')
                                            <span class="invalid-feedback relative z-10" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="flex items-center justify-center mt-4 relative z-10">
                                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-lg text-lg font-black text-white bg-accent bg-accent_hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 relative z-10">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </form>

                            <div class="mt-6 relative z-10">
                                <div class="relative z-10">
                                    <div class="absolute inset-0 flex items-center">
                                        <div class="w-full border-t border-gray-300"></div>
                                    </div>
                                    <div class="relative flex justify-center text-sm">
                                        <span class="px-2 my-4 bg-white text-gray-500">
                                            {{ __('Or continue with') }}
                                        </span>
                                    </div>
                                </div>

                                <div class="mt-6 grid grid-cols-3 gap-3 relative z-10">
                                    <div class="relative z-10">
                                        <a href="#" class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-lg bg-white hover:bg-gray-50">
                                            <span class="sr-only">
                                                {{ __('Sign in with Facebook') }}
                                            </span>
                                            <svg class="w-5 h-5 text-accent text-accent_hover" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M20 10c0-5.523-4.477-10-10-10S0 4.477 0 10c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V10h2.54V7.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V10h2.773l-.443 2.89h-2.33v6.988C16.343 19.128 20 14.991 20 10z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </div>

                                    <div>
                                        <a href="#"  class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-lg bg-white hover:bg-gray-50 relative z-10">
                                            <span class="sr-only">
                                                {{ __('Sign in with Twitter') }}
                                            </span>
                                            <svg class="w-5 h-5 text-accent text-accent_hover" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                                <path d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84" />
                                            </svg>
                                        </a>
                                    </div>

                                    <div>
                                        <a href="#" class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-lg bg-white hover:bg-gray-50 relative z-10">
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

                            <div class="flex w-full items-center justify-center my-5 text-black relative z-10">
                                <div class="switch-wrapper bg-white">
                                    <div class="switch-content-wrapper text-black">
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

    </div>

</x-app-layout>

<script type="text/javascript">

// document.addEventListener('apline:init', () => {
//     Alpine.data('switch_pill', () => ({
//         hover: false,

//         toggle() {
//             this.hover = ! this.hover;
//         },
//     }));
// });

function loginFormAnimation() {

    if (!$('#flip_box_back').hasClass('flip-box-front-height')) {
            $('#login-register-notification').html('Sign in to your account');
        } else {
            $('#login-register-notification').html('Sign up for a new account');
        }

        $('.switch-pill').toggleClass('clicked');
        $('.switch-label').toggleClass('active');

        $('#flip_box_front').toggleClass('flip-box-front').toggleClass('flip-box-back');
        $('#flip_box_back').toggleClass('flip-box-back').toggleClass('flip-box-front').toggleClass('flip-box-front-height');

}



    // $(".switch-label-wrapper").click(function() {

    //     if (!$('#flip_box_back').hasClass('flip-box-front-height')) {
    //         $('#login-register-notification').html('Sign in to your account');
    //     } else {
    //         $('#login-register-notification').html('Sign up for a new account');
    //     }

    //     $('.switch-pill').toggleClass('clicked');
    //     $('.switch-label').toggleClass('active');

    //     $('#flip_box_front').toggleClass('flip-box-front').toggleClass('flip-box-back');
    //     $('#flip_box_back').toggleClass('flip-box-back').toggleClass('flip-box-front').toggleClass('flip-box-front-height');

    // });

</script>

