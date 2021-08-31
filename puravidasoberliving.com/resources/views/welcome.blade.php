<x-app-layout>

    <!--Hero
style="background: linear-gradient(90deg, #2b4554 0%, #767ba2 100%)"
-->
    <div class="py-36 bg-cover bg-no-repeat bg-fixed bg-opacity-40"
        style="background-image: url('/img/Forward_Facing_App/welcome/welcome-hero-1.jpg')">
        <div class="container m-auto text-center px-6 opacity-100">
            <h2 class="text-5xl font-black mb-2 text-accent text-stroke">
              {{ __('Pura Vida Sober Living') }}
            </h2>
            <h3 class="text-2xl mb-8 font-bold text-gray-200 text-stroke">
              {{ __('A community of men dedicated to recovery through active, sober lifestyles.') }}
            </h3>
            <form action="{{ route('apply-now') }}" method="GET">
                @csrf
                <x-button onclick="event.preventDefault();
                this.closest('form').submit();" :active="request()->routeIs('apply-now')">
                    {{ __('Apply Today') }}
                </x-button>
            </form>
            {{-- <button class="bg-accent text-lg font-bold text-gray-200 rounded-full py-4 px-8 shadow-lg uppercase tracking-wider hover:border-transparent hover:text-white bg-accent_hover">
              {{ __('Apply Today') }} 
            </button> --}}
        </div>
    </div>

    {{-- <section class="text-gray-700 body-font">
        <div class="container px-5 py-24 mx-auto">
          <div>Loading</div>
          <div class="flex flex-wrap -m-4">

            <div class="p-4 md:w-1/3">
              <div class="h-full border-2 border-gray-200 rounded-lg overflow-hidden">
                <div class="lg:h-48 bg-gray-400 md:h-36 w-full object-cover object-center"></div>
                <div class="p-6">
                  <h2 class="bg-gray-400 animate-pulse h-4 w-1/4 mb-2"></h2>
                  <h1 class="w-1/2 mb-4 h-6 animate-pulse bg-gray-500"></h1>
                  <p class="leading-relaxed mb-3 w-full h-3 animate-pulse bg-gray-400"></p>
                  <p class="leading-relaxed mb-3 w-2/3 h-3 animate-pulse bg-gray-400"></p>
                  <p class="leading-relaxed mb-3 w-1/2 h-3 animate-pulse bg-gray-400"></p>
                  <div class="flex items-center flex-wrap ">
                    <a class="bg-indigo-300 h-4 animate-pulse mt-2 w-32 inline-flex items-center md:mb-2 lg:mb-0">
                      
                    </a>
                    <span class="bg-indigo-300 w-16 mt-2 h-4 animate-pulse mr-3 px-2 inline-flex items-center ml-auto leading-none text-sm pr-5 py-1">
                      
                    </span>
                    
                  </div>
                </div>
              </div>
            </div>

  
          </div>
        </div>
      </section> --}}

    <!-- Features -->
    <section class="container mx-auto px-6 p-10">

        <x-lazy-loader>
            <x-slot name="loading">
                <div class="flex w-full justify-center flex-wrap loading mb-8">
                    <h2 class="bg-gray-400 animate-pulse h-8 w-full mb-2"></h2>
                    <h2 class="bg-gray-400 animate-pulse h-8 w-9/12 mb-2"></h2>
                </div>
            </x-slot>

            <x-slot name="loaded">
                <h2 class="text-4xl font-bold text-center text-gray-800 mb-8 loaded hidden">
                    {{ __('A transformational platform for men just starting or continuing thier journey through ') }}<span class="text-accent">{{ __('recovery ') }}</span>{{ __('from addiction, homelessness, and criminality.') }}
                </h2>
            </x-slot>
        </x-lazy-loader>

        <div class="flex items-center flex-wrap mb-28">
            <div class="w-full md:w-1/2 pr-10">
                <h4 class="text-3xl text-gray-800 font-bold mb-3">
                  {{ __('Modern, safe, affordable housing; lifestyle included') }}
                </h4>
                <p class="text-gray-600 mb-8">
                  {{ __('Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet 
                  nisi culpa, nam illum deserunt, dolore incidunt debitis similique 
                  beatae blanditiis quo. Sunt similique et magni maxime sint aliquid 
                  provident aspernatur nostrum illum? In, ad delectus quaerat aliquid 
                  repudiandae amet itaque sapiente accusamus iste impedit eaque corrupti 
                  aliquam blanditiis laudantium exercitationem minima?') }}
                </p>
            </div>
            <div class="w-full md:w-1/2">
                <img class="w-full max-h-96 rounded-lg " src="/img/Forward_Facing_App/welcome/spokane-downtown_1.jpg" alt="Connection Through Comminuty" />
            </div>
        </div>

        <div class="flex md:flex-row sm:flex-col-reverse items-center flex-wrap mb-28">
            <div class="w-full md:w-1/2">
                <img class="w-full max-h-96 rounded-lg" src="/img/Forward_Facing_App/welcome/welcome-martial-arts.jpg" alt="use the force" />
            </div>
            <div class="w-full  md:w-1/2 md:pl-10 sm:pl-0">
                <h4 class="text-3xl text-gray-800 font-bold mb-3">
                  {{ __('An active body is a happy body') }}
                </h4>
                <p class="text-gray-600 mb-8">
                  {{ __('Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet 
                  nisi culpa, nam illum deserunt, dolore incidunt debitis similique 
                  beatae blanditiis quo. Sunt similique et magni maxime sint aliquid 
                  provident aspernatur nostrum illum? In, ad delectus quaerat aliquid 
                  repudiandae amet itaque sapiente accusamus iste impedit eaque corrupti 
                  aliquam blanditiis laudantium exercitationem minima?') }}
                </p>
            </div>
        </div>

        <div class="flex items-center flex-wrap mb-28">
            <div class="w-full md:w-1/2 pr-10">
                <h4 class="text-3xl text-gray-800 font-bold mb-3">
                  {{ __('Building solid connections through community') }}
                </h4>
                <p class="text-gray-600 mb-8">
                  {{ __('Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet 
                  nisi culpa, nam illum deserunt, dolore incidunt debitis similique 
                  beatae blanditiis quo. Sunt similique et magni maxime sint aliquid 
                  provident aspernatur nostrum illum? In, ad delectus quaerat aliquid 
                  repudiandae amet itaque sapiente accusamus iste impedit eaque corrupti 
                  aliquam blanditiis laudantium exercitationem minima?') }}
                </p>
            </div>
            <div class="w-full md:w-1/2">
                <img class="w-full max-h-96 rounded-lg" src="/img/Forward_Facing_App/welcome/welcome-community.jpg" alt="Connection Through Comminuty" />
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="">
        <div class="container mx-auto px-6 py-20">
            <h2 class="text-4xl font-bold text-center text-gray-800 mb-8">
              {{ __('See what current and past ') }}<span class="text-accent">{{ __('PVSL ') }}</span>{{ __('members have to say') }}
            </h2>
            <div class="flex flex-wrap">
              <div class="w-full h-auto md:w-1/3 px-2 mb-4">
                <div class="flex flex-col justify-between h-full bg-white rounded shadow py-2">
                  <p class="text-gray-800 text-base px-6 mb-5">
                    {{ __('Lorem ipsum, dolor sit amet consectetur adipisicing elit. Soluta repellendus dicta dignissimos 
                    perferendis ea eligendi corporis nesciunt totam, facere officiis eum hic alias optio quam minima odit 
                    unde suscipit possimus aperiam! Quas, dolores qui eligendi tempora mollitia et nobis quos fuga incidunt 
                    totam, possimus perspiciatis inventore dolore dolor, maxime neque!') }} 
                  </p>
                  <div class="flex px-6">
                    <img class="inline-block h-6 w-6 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    <p class="text-gray-500 text-xs md:text-sm px-6">
                      {{ __('Luke Skywalker - ') }} <span class="text-accent">{{ __('PVSL member') }}</span>
                    </p>
                  </div>
                </div>
              </div>

              <div class="w-full h-auto md:w-1/3 px-2 mb-4">
                <div class="flex flex-col justify-between h-full bg-white rounded shadow py-2">
                  <p class="text-gray-800 text-base px-6 mb-5">
                    {{ __('Lorem ipsum, dolor sit amet consectetur adipisicing elit. Soluta repellendus dicta dignissimos 
                    perferendis ea eligendi corporis nesciunt totam, facere officiis eum hic alias optio quam minima odit 
                    unde suscipit possimus aperiam! Quas, dolores qui eligendi tempora mollitia et nobis quos fuga incidunt 
                    totam, possimus perspiciatis inventore dolore dolor, maxime neque!') }} 
                  </p>
                  <div class="flex px-6">
                    <img class="inline-block h-6 w-6 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    <p class="text-gray-500 text-xs md:text-sm px-6">
                      {{ __('Luke Skywalker - ') }} <span class="text-accent">{{ __('PVSL member') }}</span>
                    </p>
                  </div>
                </div>
              </div>

              <div class="w-full h-auto md:w-1/3 px-2 mb-4">
                <div class="flex flex-col justify-between h-full bg-white rounded shadow py-2">
                  <p class="text-gray-800 text-base px-6 mb-5">
                    {{ __('Lorem ipsum, dolor sit amet consectetur adipisicing elit. Soluta repellendus dicta dignissimos 
                    perferendis ea eligendi corporis nesciunt totam, facere officiis eum hic alias optio quam minima odit 
                    unde suscipit possimus aperiam! Quas, dolores qui eligendi tempora mollitia et nobis quos fuga incidunt 
                    totam, possimus perspiciatis inventore dolore dolor, maxime neque!') }} 
                  </p>
                  <div class="flex px-6">
                    <img class="inline-block h-6 w-6 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    <p class="text-gray-500 text-xs md:text-sm px-6">
                      {{ __('Luke Skywalker - ') }} <span class="text-accent">{{ __('PVSL member') }}</span>
                    </p>
                  </div>
                </div>
              </div>
            </div>

        </div>
    </section>

    <!--Call to Action-->
    <section class="bg-gray-300">
        <div class="container mx-auto px-6 text-center py-20">
            <h2 class="mb-6 text-4xl font-bold text-center text-gray-800">
              {{ __('Have a question not anwered ') }}
              <a class="text-accent underline text-accent_hover" href="/à-la-carte-recovery">{{ __('here') }}</a>{{ __('?') }}
            </h2>
            <form action="{{ route('contact') }}" method="GET">
                @csrf
                <x-button onclick="event.preventDefault();
                this.closest('form').submit();" :active="request()->routeIs('contact')">
                    {{ __('Drop us a message') }}
                </x-button>
            </form>
        </div>
    </section>

</x-app-layout>


<script type="text/javascript">

document.addEventListener('DOMContentLoaded', function() {
    // alert('DOM ready!');
    window.setTimeout(function() {
        $('.loading').addClass('hidden');
        $('.loaded').removeClass('hidden');
    }, 1300);
});

</script>