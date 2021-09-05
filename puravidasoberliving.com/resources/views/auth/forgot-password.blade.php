<x-app-layout>

    <div class="min-h-screen bg-gray-50 flex flex-col items-center justify-center py-12 sm:px-6 lg:px-8">

        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900" id="login-register-notification">
                {{ __('Password Reset') }}
            </h2>
        </div>

        <div class="w-3/12 bg-white py-8 px-4 mt-8 shadow sm:rounded-lg sm:px-10">

            <a class="inline-flex w-full justify-center" href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>

            <div class="my-4 text-lg text-gray-600">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

            <div class="flex mb-4 text-lg text-accent">
                <span>{{ session('status') }}</span>
                {{-- <div class="flex items-center justify-center rounded-md border p-2 cursor-pointer font-black text-black">X</div> --}}
            </div>

            <form class="space-y-6" method="POST" action="{{ route('password.email') }}">
                @csrf
                <div>
                    <label for="email" class="block text-lg font-medium text-gray-700">
                        {{ __('Email') }}
                    </label>
                    <div class="mt-1">
                        <input id="email" type="text" name="email" value="{{ old('email') }}"  required autocomplete="email" autofocus placeholder="theNEWT@aol.com" class="px-3 py-2 block w-full shadow-sm text-gray-900 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                    </div>
                </div>

                <div class="flex items-center justify-center mt-4">
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-accent bg-accent_hover  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Email Password Reset Link') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>

