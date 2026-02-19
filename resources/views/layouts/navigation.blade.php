    <nav x-data="{ open: false }" class="bg-white/80 dark:bg-slate-900/80 backdrop-blur-md border-b border-slate-200 dark:border-slate-800 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="transition transform hover:scale-110">
                        <x-application-logo class="block h-9 w-auto fill-current text-indigo-600 dark:text-indigo-400" />
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-sm font-black uppercase tracking-widest text-slate-900 dark:text-white hover:text-indigo-600 dark:hover:text-indigo-400 transition">
                        {{ __('Painel Administrativo') }}
                    </x-nav-link>
                    
                    <x-nav-link :href="route('tarefas.index')" :active="request()->routeIs('tarefas.*')" class="text-sm font-black uppercase tracking-widest text-slate-900 dark:text-white hover:text-indigo-600 dark:hover:text-indigo-400 transition">
                        {{ __('Tarefas') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border border-slate-200 dark:border-slate-700 text-sm leading-4 font-bold rounded-xl text-slate-600 dark:text-slate-300 bg-white dark:bg-slate-800 hover:bg-slate-50 dark:hover:bg-slate-700 focus:outline-none transition ease-in-out duration-150 shadow-sm">
                            <div class="flex items-center gap-2">
                                <span class="flex h-6 w-6 items-center justify-center rounded-full bg-indigo-100 dark:bg-indigo-900 text-[10px] text-indigo-700 dark:text-indigo-300 uppercase font-black">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </span>
                                {{ Auth::user()->name }}
                            </div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <div class="p-2 bg-white dark:bg-slate-800 rounded-2xl shadow-xl border border-slate-100 dark:border-slate-700">
                            <x-dropdown-link :href="route('profile.edit')" class="flex items-center gap-2 rounded-lg hover:bg-slate-50 dark:hover:bg-slate-700 transition px-4 py-2">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                <span class="font-bold text-slate-700 dark:text-slate-200">{{ __('Meu Perfil') }}</span>
                            </x-dropdown-link>

                            <div class="my-1 border-t border-slate-100 dark:border-slate-700"></div>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        class="flex items-center gap-2 rounded-lg text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 transition px-4 py-2"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                    <span class="font-bold">{{ __('Sair do Sistema') }}</span>
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white dark:bg-slate-950 shadow-2xl transition-all duration-300">
    <div class="pt-4 pb-4 space-y-2">
        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
            class="text-2xl font-black py-4 px-6 border-l-8 tracking-tighter {{ request()->routeIs('dashboard') ? 'text-indigo-600 border-indigo-600 bg-indigo-50 dark:bg-indigo-900/20' : 'text-slate-700 dark:text-slate-300 border-transparent' }}">
            {{ __('DASHBOARD') }}
        </x-responsive-nav-link>

        <x-responsive-nav-link :href="route('tarefas.index')" :active="request()->routeIs('tarefas.*')"
            class="text-2xl font-black py-4 px-6 border-l-8 tracking-tighter {{ request()->routeIs('tarefas.*') ? 'text-indigo-600 border-indigo-600 bg-indigo-50 dark:bg-indigo-900/20' : 'text-slate-700 dark:text-slate-300 border-transparent' }}">
            {{ __('TAREFAS') }}
        </x-responsive-nav-link>
    </div>

    <div class="pt-6 pb-6 border-t-2 border-slate-100 dark:border-slate-800 bg-slate-50 dark:bg-slate-900/50">
        <div class="px-6 flex items-center gap-4">
            <div class="w-12 h-12 bg-indigo-600 rounded-2xl flex items-center justify-center text-white font-black text-xl shadow-lg">
                {{ substr(Auth::user()->name, 0, 1) }}
            </div>
            <div>
                <div class="font-black text-xl text-slate-900 dark:text-white leading-none uppercase tracking-tighter">
                    {{ Auth::user()->name }}
                </div>
                <div class="font-bold text-sm text-indigo-500 mt-1">
                    {{ Auth::user()->email }}
                </div>
            </div>
        </div>

        <div class="mt-6 space-y-2">
            <x-responsive-nav-link :href="route('profile.edit')" 
                class="text-lg font-black text-slate-600 dark:text-slate-400 py-3 hover:text-indigo-600 transition-colors">
                {{ __('MEU PERFIL') }}
            </x-responsive-nav-link>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        class="text-lg font-black text-red-500 py-3 hover:bg-red-50 dark:hover:bg-red-900/10 transition-all">
                    {{ __('SAIR DO SISTEMA') }}
                </x-responsive-nav-link>
            </form>
        </div>
    </div>
</div>
</nav>
