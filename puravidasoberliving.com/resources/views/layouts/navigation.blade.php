<nav x-data="{
    open: false
    {{-- scrollTop: false, toggle() { this.scrollTop = ! this.scrollTop; console.log(scrollTop); }, --}}
    {{-- scrollToReveal() {
        let scrollPos = window.scrollY
        if (scrollPos > 0) {
            scrollTop = ! scrollTop
        }
        console.log(scrollTop)
      } --}}
    }" x-on:scroll.window="minifyNavOnScroll(window.scrollY)"
    class="bg-gray-200 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800 navTopPadding navTopSize sticky top-0 shadow">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">

                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('welcome') }}">
                        {{-- <img class="flex w-full h-auto" src="/img/pvsl-logo.png" alt="Pura Vida Sober Living"> --}}
                        <x-application-logo class="block h-10 w-auto text-gray-600" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 md:-my-px md:ml-10 md:flex">
                    <x-nav-link :href="route('welcome')" :active="request()->routeIs('welcome')">
                        {{ __('Welcome') }}
                    </x-nav-link>
                    <x-nav-link :href="route('mission')" :active="request()->routeIs('mission')">
                        {{ __('Our Mission') }}
                    </x-nav-link>
                    <div
                        class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent ml-6 {{ Route::currentRouteName() == 'a-la-carte-recovery' ? 'border-b-2 border-indigo-400' : 'hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out' }}">
                        <x-dropdown align="right" width="auto">
                            <x-slot name="trigger">
                                <button
                                    class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div>{{ __('Á La Carte Recovery') }}</div>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('a-la-carte-recovery')"
                                    :active="request()->routeIs('a-la-carte-recovery')">
                                    {{ __('About PVSL') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('a-la-carte-recovery')"
                                    :active="request()->routeIs('a-la-carte-recovery')">
                                    {{ __('Living Guidelines') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('a-la-carte-recovery')"
                                    :active="request()->routeIs('a-la-carte-recovery')">
                                    {{ __('FAQ\'s') }}
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
                        {{ __('Contact Us') }}
                    </x-nav-link>
                    <div class="inline-flex h-100 items-center px-1 pt-1 border-b-2 border-transparent ml-6">
                        <form action="{{ route('apply-now') }}" method="GET">
                            @csrf
                            <x-button onclick="event.preventDefault();
                            this.closest('form').submit();" :active="request()->routeIs('apply-now')">
                                {{ __('Apply Today') }}
                            </x-button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- <div class="flex items-center text-sm font-medium text-gray-500" x-data="{ count: $persist(0).as('page-visits') }">
                <button x-on:click="count++">Increment</button>

                <span x-text="count"></span>
            </div> --}}

            <!-- Settings Dropdown -->
            <div class="hidden md:flex md:items-center md:ml-6">
                @if (Auth::check())
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                {{ __('Dashboard') }}
                            </x-dropdown-link>
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endif
            </div>



            <!-- Hamburger -->
            <div class="-mr-2 flex items-center md:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>



    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('welcome')" :active="request()->routeIs('welcome')">
                {{ __('Welcome') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('mission')" :active="request()->routeIs('mission')">
                {{ __('Our Mission') }}
            </x-responsive-nav-link>
            <div
                class="block pl-3 pr-4 border-l-4 border-transparent text-base font-medium {{ Route::currentRouteName() == 'a-la-carte-recovery' ? 'border-indigo-400' : 'text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out' }}">
                {{--  --}}
                <x-dropdown align="left" width="auto">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center w-auto pr-4 py-2 text-base font-medium text-gray-500 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ __('Á La Carte Recovery') }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('a-la-carte-recovery')"
                            :active="request()->routeIs('a-la-carte-recovery')">
                            {{ __('About PVSL') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('a-la-carte-recovery')"
                            :active="request()->routeIs('a-la-carte-recovery')">
                            {{ __('Living Guidelines') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('a-la-carte-recovery')"
                            :active="request()->routeIs('a-la-carte-recovery')">
                            {{ __('FAQ\'s') }}
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>
            </div>
            <x-responsive-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
                {{ __('Contact Us') }}
            </x-responsive-nav-link>
            <div class="inline-flex w-100 h-100 items-center justify-end px-1 pt-4">
                <form action="{{ route('apply-now') }}" method="GET">
                    @csrf
                    <x-button onclick="event.preventDefault();
                    this.closest('form').submit();" :active="request()->routeIs('apply-now')">
                        {{ __('Apply Now') }}
                    </x-button>
                </form>
            </div>
        </div>

        @if (Auth::check())
            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>

                <div class="mt-3 space-y-1">
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @endif

    </div>
</nav>

<script type="text/javascript">
    // let atTopOfPage = true;

    function minifyNavOnScroll(scrollPos) {
        if (scrollPos == 0) {
            $('nav').addClass('navTopPadding').removeClass('navTopPaddingRemove');
            $('nav').addClass('navTopSize').removeClass('navTopSizeReduce');
            // return atTopOfPage = true;
            // console.log(atTopOfPage);
            // console.log(scrollPos);
        } else {
            // return atTopOfPage = false;
            $('nav').removeClass('navTopPadding').addClass('navTopPaddingRemove');
            $('nav').removeClass('navTopSize').addClass('navTopSizeReduce');
            // console.log(atTopOfPage);
            // console.log(scrollPos);
        }

        // if (scrollPos == 0) {
        //     $('nav').addClass('navTopPadding').removeClass('sticky').removeClass('top-0');
        // }
    }

</script>
