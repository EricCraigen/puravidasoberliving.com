<x-app-layout>

    <div class="min-h-screen bg-gray-50 flex flex-col items-center justify-center py-12 sm:px-6 lg:px-8">

        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-center text-5xl font-extrabold text-gray-900" id="login-register-notification">
                {{ __('Password Reset') }}
            </h2>
        </div>

        <div class="lg:w-126 md:w-full bg-white py-8 px-4 mt-8 shadow sm:rounded-lg sm:px-10 relative overflow-hidden">

            <svg class="absolute -left-22 -top-8 right-0 bottom-0 transform translate-x-1/2 opacity-30 z-0" width="404" height="404" fill="none" viewBox="0 0 404 404" aria-hidden="true">
                <defs>
                  <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                    <rect x="0" y="0" width="4" height="4" class="text-accent" fill="currentColor" />
                  </pattern>
                </defs>
                <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)" />
              </svg>
            <svg class="absolute -right-22 bottom-0 left-0 top-40 transform -translate-x-1/2 opacity-30 z-0" width="404" height="404" fill="none" viewBox="0 0 404 404" aria-hidden="true">
                <defs>
                    <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                    <rect x="0" y="0" width="4" height="4" class="text-accent" fill="currentColor" />
                    </pattern>
                </defs>
                <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)" />
            </svg>

            <a class="inline-flex w-full justify-center relative z-10" href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>

            <div class="my-4 text-2xl font-black text-gray-600 relative text-center z-10">
                {{ __('Congrats! Your email was on file and our bots have generated this password reset form for you.') }}
            </div>

            <form class="space-y-6" method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <div class="relative z-10">
                    <label for="email" class="block text-lg font-black text-gray-700">
                        {{ __('Email address') }}
                    </label>
                    <div class="mt-1 z-10">
                        <input id="email_login" type="email" name="email" :value="old('email')" required autocomplete="email" autofocus placeholder="youremail@aol.com" class="@error('email') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">

                    </div>
                </div>
                <div class="relative z-10">
                    <label for="password" class="block text-lg font-black text-gray-700">
                        {{ __('Password') }}
                    </label>
                    <div class="mt-1">
                        <input id="password" type="password" name="password" value="{{ old('password') }}"  required autocomplete="current-password" autofocus placeholder="DaP@ssword1" class="@error('password') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="relative z-10">
                    <label for="password_confirmation" class="block text-lg font-black text-gray-700">
                        {{ __('Confirm Password') }}
                    </label>
                    <div class="mt-1">
                        <input id="password_confirmation" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" required autofocus class="@error('password_confirmation') is-invalid @enderror px-3 py-2 block w-full shadow-lg text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="flex mb-4 text-xl font-black text-indigo-600 relative z-10">
                    <span>{{ session('status') }}</span>
                </div>

                <div class="flex items-center justify-center mt-4 relative z-10">
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-lg text-lg font-black text-white bg-accent bg-accent_hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>

