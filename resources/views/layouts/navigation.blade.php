<!-- drawer component -->
<div id="drawer-navigation" class="fixed top-0 left-0 z-40 w-64 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-navigation-label">
    <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" >
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Close menu</span>
    </button>

    <div class="py-10 overflow-y-auto">
        <ul class="space-y-2 font-medium">
            <li>
                <button type="button" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <i class="fa fa-key {{ Request::is('admin/master*') ? 'text-indigo-500' : '' }}"></i>
                    <span class="flex-1 ml-3 text-left hover:text-indigo-300 whitespace-nowrap {{ Request::is('admin/master*') ? 'text-indigo-500' : '' }}">Master </span>
                    <svg class="w-6 h-6 hover:text-indigo-300 {{ Request::is('admin/master*') ? 'text-indigo-500' : '' }}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                <ul id="dropdown-example" class="hidden py-2 space-y-2">
                    <a href="{{ route('kecamatanIndex') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 active:text-slate-300 {{ Request::is('admin/master-kecamatan*') ? 'text-indigo-500' : '' }}"> {{ __("Master Kecamatan") }}</a>
                    <a href="{{ route('kelurahanIndex') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 active:text-slate-300 {{ Request::is('admin/master-kelurahan*') ? 'text-indigo-500' : '' }}"> {{ __("Master Kelurahan") }}</a>
                    <a href="{{ route('partaiIndex') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 active:text-slate-300 {{ Request::is('admin/master-partai*') ? 'text-indigo-500' : '' }}"> {{ __("Master Partai") }}</a>
                    <a href="{{ route('calegIndex') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 active:text-slate-300 {{ Request::is('admin/master-caleg*') ? 'text-indigo-500' : '' }}"> {{ __("Master Caleg") }}</a>
                    <a href="{{ route('userIndex') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 active:text-slate-300 {{ Request::is('admin/master-user*') ? 'text-indigo-500' : '' }}"> {{ __("Master User") }}</a>
                </ul>
            </li>
            
        </ul>
    </div>
</div>

<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                {{-- ! HAMBURGER MENU --}}
                @if (auth()->user()->role == 'Superadmin' || auth()->user()->role == 'Admin')
                    <div  class="hidden sm:flex">
                        <div class="shrink-0 flex items-center">
                            <i data-drawer-show="drawer-navigation" aria-controls="drawer-navigation" data-drawer-target="drawer-navigation" class="fa fa-bars"></i>
                        </div>
                    </div>
                @endif

                <div  class="flex sm:hidden">
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}">
                            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                        </a>
                    </div>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    @if (auth()->user()->role == 'Superadmin' || auth()->user()->role == 'Admin')
                        <x-nav-link :href="route('dataLengkap')" :active="request()->routeIs('dataLengkap')">
                            {{ __('Details') }}
                        </x-nav-link>
                    @else
                        <x-nav-link :href="route('dataLengkapMember')" :active="request()->routeIs('dataLengkapMember')">
                            {{ __('Details') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-500 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            @if (auth()->user()->role == 'Superadmin' || auth()->user()->role == 'Admin')
                <x-responsive-nav-link :href="route('dataLengkap')" :active="request()->routeIs('dataLengkap')">
                    {{ __('Details') }}
                </x-responsive-nav-link>
            @else
                <x-responsive-nav-link :href="route('dataLengkapMember')" :active="request()->routeIs('dataLengkapMember')">
                    {{ __('Details') }}
                </x-responsive-nav-link>
            @endif

            @if (auth()->user()->role == 'Superadmin' || auth()->user()->role == 'Admin')
                <x-responsive-nav-link :href="route('kecamatanIndex')" :active="request()->routeIs('kecamatanIndex')">
                    {{ __('Master Kecamatan') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('kelurahanIndex')" :active="request()->routeIs('kelurahanIndex')">
                    {{ __('Master Kelurahan') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('partaiIndex')" :active="request()->routeIs('partaiIndex')">
                    {{ __('Master Partai') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('calegIndex')" :active="request()->routeIs('calegIndex')">
                    {{ __('Master Caleg') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('userIndex')" :active="request()->routeIs('userIndex')">
                    {{ __('Master User') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
