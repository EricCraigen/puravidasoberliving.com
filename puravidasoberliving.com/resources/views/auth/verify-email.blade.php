<x-app-layout>

    <div class="min-h-screen bg-gray-50 flex flex-col items-center justify-center py-12 sm:px-6 lg:px-8">

        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-center text-5xl font-extrabold text-gray-900" id="login-register-notification">
                {{ __('Request Verification Email') }}
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

            <div class="my-4 text-2xl text-center font-black text-gray-600 relative z-10">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>

            <div class="my-4 text-2xl text-center font-black text-gray-600 relative z-10">
                {{ __('Please remember to check your ') }}<span class="text-accent">{{ __('junk/spam ') }}</span>{{ __('folders if the message is not appearing in your inbox.') }}
            </div>

            <div class="flex mb-4 text-xl font-black text-indigo-600 relative z-10">
                {{-- add link to administrator to my portfolio contact page.... --}}
                <span>{{ session('status') == 'verification-link-sent' ? 'Verification link re-sent to the email used at signup' : '' }}</span>
            </div>

            <div class="mt-4 flex w-full items-center justify-between gap-2 relative z-10">


                <div class="flex w-3/6">
                    <form class="w-full" method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit"
                                class="flex w-full justify-center py-2 px-4 border border-transparent rounded-md shadow-lg text-lg font-black text-white bg-accent bg-accent_hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                onclick="this.closest('form').submit();">
                            {{ __('Resend Link') }}
                        </button>
                    </form>
                </div>

                <div class="flex w-3/6">
                    <form class="w-full" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="flex w-full justify-center py-2 px-4 border border-transparent rounded-md shadow-lg text-lg font-black text-white bg-red-500 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                onclick="this.closest('form').submit();">
                            {{ __('Logout') }}
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
