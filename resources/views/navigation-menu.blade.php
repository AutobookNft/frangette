<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 fixed top-0 w-full z-10">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center flex-shrink-0">
                    <a href="{{ route('dashboard') }}">
                        <x-jet-application-mark class="block w-auto h-9" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-jet-nav-link>
                    @canany(['isAdmin', 'isSuperadmin'])
                        <x-jet-nav-link href="{{ route('authorizations.index') }}" :active="request()->routeIs('authorizations.index')">
                            {{ __('Roles policy') }}
                        </x-jet-nav-link>
                    @endcan
                    @can('isSuperadmin')
                        <x-jet-nav-link href="{{ route('drops') }}" :active="request()->routeIs('drops')">
                            {{ __('Drops manage') }}
                        </x-jet-nav-link>
                    @endcan

                    @if (isset(Auth::user()->currentTeam->id))

                        {{-- @if(strpos(url()->current(),'update')) --}}

                            {{-- <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex"> --}}
                                {{-- <x-jet-nav-link href="{{ url('dashboard/collection') }}"> --}}
                                {{-- <x-jet-nav-link href="{{ route('preview') }}" :active="request()->routeIs('preview')">
                                    {{ __('Collections preview') }}
                                </x-jet-nav-link>
                            </div> --}}

                        {{-- @else --}}

                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                {{-- <x-jet-nav-link href="{{ url('dashboard/collection/' . Auth::user()->currentTeam->id . '/items') }}"> --}}
                                <x-jet-nav-link href="{{ route('collections') }}" :active="request()->routeIs('collections')">
                                    {{ __('Collections') }}
                                </x-jet-nav-link>
                            </div>

                        {{-- @endif --}}
                    @endif

                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-jet-nav-link href="{{ route('categories') }}" :active="request()->routeIs('categories')">
                            {{ __('Categories') }}
                        </x-jet-nav-link>
                    </div>

                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-jet-nav-link href="{{ route('posts') }}" :active="request()->routeIs('posts')">
                            {{ __('Posts') }}
                        </x-jet-nav-link>
                    </div>

                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-jet-nav-link href="{{ route('tags') }}" :active="request()->routeIs('tags')">
                            {{ __('Tags') }}
                        </x-jet-nav-link>
                    </div>

                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <button
                                class="flex text-sm transition duration-150 ease-in-out border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300">
                                <img class="object-cover w-8 h-8 rounded-full" title="{{ Auth::user()->profile_photo_path }}" src="{{ Auth::user()->profile_photo_path }}"
                                    alt="{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}" />
                            </button>
                        @else
                            <button
                                class="flex items-center text-sm font-medium text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300">
                                <div>{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</div>

                                <div class="ml-1">
                                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        @endif
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        {{-- <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div> --}}

                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-jet-dropdown-link>

                        {{-- @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                {{ __('API Tokens') }}
                            </x-jet-dropdown-link>
                        @endif --}}

                        <div class="border-t border-gray-100"></div>

                        <!-- Team Management -->
                        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Team') }}
                            </div>
                        @endif

                        <!-- Team Settings -->
                        @if (isset(Auth::user()->currentTeam->id))
                            <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                {{ __('Switch Collection') }}
                            </x-jet-dropdown-link>
                        @endif

                        {{-- @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-jet-dropdown-link href="{{ route('teams.create') }}">
                            {{ __('Create New Team') }}
                        </x-jet-dropdown-link>
                        @endcan --}}

                        {{-- <div class="border-t border-gray-100"></div> --}}

                        <!-- Team Switcher -->
                        {{-- <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Switch Teams') }}
                        </div> --}}

                       <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Collection list') }}
                       </div>

                        @foreach (Auth::user()->allTeams() as $team)
                            <x-jet-switchable-team :team="$team" />
                        @endforeach

                        <div class="border-t border-gray-100"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                {{ __('Logout') }}
                            </x-jet-dropdown-link>

                        </form>
                    </x-slot>
                </x-jet-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="flex items-center -mr-2 sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
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
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-jet-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                <div class="flex-shrink-0">
                    <img class="w-10 h-10 rounded-full" src="{{ Auth::user()->profile_photo_path }}"
                        alt="{{ Auth::user()->name }}" />
                </div>

                <div class="ml-3">
                    <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}"
                    :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-jet-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}"
                    :active="request()->routeIs('api-tokens.index')">
                    {{ __('API Tokens') }}
                </x-jet-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        {{ __('Logout') }}
                    </x-jet-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                <div class="border-t border-gray-200"></div>

                <div class="block px-4 py-2 text-xs text-gray-400">
                    {{ __('Manage Team') }}
                </div>

                <!-- Team Settings -->
                @if (isset(Auth::user()->currentTeam->id))
                <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"
                    :active="request()->routeIs('teams.show')">
                    {{ __('Team Settings') }}
                </x-jet-responsive-nav-link>
                @endif

                <x-jet-responsive-nav-link href="{{ route('teams.create') }}"
                    :active="request()->routeIs('teams.create')">
                    {{ __('Create New Team') }}
                </x-jet-responsive-nav-link>

                <div class="border-t border-gray-200"></div>

                <!-- Team Switcher -->
                <div class="block px-4 py-2 text-xs text-gray-400">
                    {{ __('Switch Teams') }}
                </div>

                @foreach (Auth::user()->allTeams() as $team)
                <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                @endforeach
                @endif
            </div>
        </div>
    </div>
</nav>
