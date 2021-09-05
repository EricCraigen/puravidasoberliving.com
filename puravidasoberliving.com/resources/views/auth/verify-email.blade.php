<x-app-layout>

    <div class="min-h-screen bg-gray-50 flex flex-col items-center justify-center py-12 sm:px-6 lg:px-8">

        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900" id="login-register-notification">
                {{ __('Request Verification Email') }}
            </h2>
        </div>

        <div class="w-3/12 bg-white py-8 px-4 mt-8 shadow sm:rounded-lg sm:px-10">

            <a class="inline-flex w-full justify-center" href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>

            <div class="my-4 text-lg text-gray-600">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>

            <div class="my-4 text-lg text-gray-600">
                {{ __('Please remember to check your junk/spam folders if the message is not appearing in your inbox.') }}
            </div>

            <div class="flex mb-4 text-lg text-accent">
                {{-- add link to administrator to my portfolio contact page.... --}}
                <span>{{ session('status') == 'verification-link-sent' ? 'Verification link re-sent to the email used at signup' : '' }}</span>
            </div>

            <div class="mt-4 flex w-full items-center justify-between gap-2">


                <div class="flex w-3/6">
                    <form class="w-full" method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit"
                                class="flex w-full justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-md font-medium text-white bg-accent bg-accent_hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                onclick="this.closest('form').submit();">
                            {{ __('Resend Verification Email') }}
                        </button>
                    </form>
                </div>

                <div class="flex w-3/6">
                    <form class="w-full" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="flex w-full justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-md font-medium text-white bg-red-500 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                onclick="this.closest('form').submit();">
                            {{ __('Logout') }}
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
