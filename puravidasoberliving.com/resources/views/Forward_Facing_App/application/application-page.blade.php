<x-app-layout>

    <!--Hero
style="background: linear-gradient(90deg, #2b4554 0%, #767ba2 100%)"
-->
    {{-- <div class="py-48 bg-cover bg-no-repeat bg-fixed bg-opacity-40"
        style="background-image: url('/img/Forward_Facing_App/welcome/welcome-hero-1.jpg')">
       
    </div> --}}

 <div class="relative py-56">
            <div class="hidden absolute top-0 inset-x-0 h-1/2 lg:block" aria-hidden="true"></div>
            <div class="max-w-7xl mx-auto bg-gray-400 lg:bg-transparent lg:px-8">
                <div class="lg:grid lg:grid-cols-12">
                    <div class="relative z-10 lg:col-start-1 lg:row-start-1 lg:col-span-4 lg:py-16 lg:bg-transparent">
                      <div class="absolute inset-x-0 h-1/2 bg-gray-200 lg:hidden" aria-hidden="true"></div>
                      <div class="max-w-md mx-auto px-4 sm:max-w-3xl sm:px-6 lg:max-w-none lg:p-0">
                        <div class="aspect-w-10 aspect-h-6 sm:aspect-w-2 sm:aspect-h-1 lg:aspect-w-1">
                          <img class="object-cover object-bottom rounded-3xl shadow-2xl" src="/img/Forward_Facing_App/application/spokane-cityscape.png" alt="">
                        </div>
                      </div>
                    </div>
        
                    <div class="relative bg-gray-400 lg:col-start-3 lg:row-start-1 lg:col-span-10 lg:rounded-3xl lg:grid lg:grid-cols-10 lg:items-center">
                        <div class="hidden absolute inset-0 overflow-hidden rounded-3xl lg:block" aria-hidden="true">
                            <svg class="absolute bottom-full left-full transform translate-y-1/3 -translate-x-2/3 xl:bottom-auto xl:top-0 xl:translate-y-0" width="404" height="384" fill="none" viewBox="0 0 404 384" aria-hidden="true">
                                <defs>
                                    <pattern id="64e643ad-2176-4f86-b3d7-f2c5da3b6a6d" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                    <rect x="0" y="0" width="4" height="4" class="text-gray-900" fill="currentColor" />
                                    </pattern>
                                </defs>
                                <rect width="404" height="384" fill="url(#64e643ad-2176-4f86-b3d7-f2c5da3b6a6d)" />
                            </svg>

                            <svg class="absolute top-full transform -translate-y-1/3 -translate-x-1/3 xl:-translate-y-1/2" width="404" height="384" fill="none" viewBox="0 0 404 384" aria-hidden="true">
                                <defs>
                                    <pattern id="64e643ad-2176-4f86-b3d7-f2c5da3b6a6d" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                    <rect x="0" y="0" width="4" height="4" class="text-gray-900" fill="currentColor" />
                                    </pattern>
                                </defs>
                                <rect width="404" height="384" fill="url(#64e643ad-2176-4f86-b3d7-f2c5da3b6a6d)" />
                            </svg>
                        </div>

                        <div class="relative max-w-md mx-auto py-12 px-4 space-y-6 sm:max-w-3xl sm:py-16 sm:px-6 lg:max-w-none lg:p-0 lg:col-start-4 lg:col-span-6">
                            {{-- <x-lazy-loader>
                                <x-slot name="loading">
                                    <div class="hidden flex w-full justify-center flex-wrap loading mb-8">
                                        <h2 class="bg-gray-400 animate-pulse h-8 w-full mb-2"></h2>
                                        <h2 class="bg-gray-400 animate-pulse h-8 w-9/12 mb-2"></h2>
                                    </div>
                                </x-slot>
                    
                                <x-slot name="loaded">
                                    <h2 class="text-4xl font-bold text-center text-gray-800 mb-8 loaded hidden">
                                        {{ __('A transformational platform for men just starting or continuing thier journey through ') }}<span class="text-accent">{{ __('recovery ') }}</span>{{ __('from addiction, homelessness, and criminality.') }}
                                    </h2>
                                </x-slot>
                            </x-lazy-loader> --}}

                            <h2 class="text-4xl font-extrabold text-gray-900" id="join-heading">
                                {{ __('Rental Application') }}
                            </h2>
                            <p class="text-lg w-2/3 text-gray-900 font-bold">
                                {{ __('Come hang your hat and stay a while! The people are genuine, the homes are comfortable, and the recovery comes à la carte.') }}
                            </p>
                            <div class="inline-flex h-100 mr-3 items-center">
                                <form action="{{ route('application.step-one') }}" method="GET">
                                    @csrf
                                    <x-button onclick="event.preventDefault();
                                    this.closest('form').submit();" :active="request()->routeIs('login')">
                                        {{ __('Start Applying') }}
                                    </x-button>
                                </form>
                            </div>
                            {{-- <a class="block w-full py-3 px-5 text-center bg-white border border-transparent rounded-md shadow-md text-base font-medium text-indigo-700 hover:bg-gray-50 sm:inline-block sm:w-auto" href="#">
                                {{ __('Start Application') }}
                            </a> --}}
                        </div>
                    </div>

                </div>
            </div>
        </div>

    

</x-app-layout>
 