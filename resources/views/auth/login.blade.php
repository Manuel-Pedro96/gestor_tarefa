<x-guest-layout>
    <div class="mb-10 text-center">
        <h2 class="text-3xl font-black text-slate-900 dark:text-white tracking-tighter">
            Bem-vindo de Volta!
        </h2>
        <p class="text-slate-500 dark:text-slate-400 font-medium mt-2">
            Prepare-se para conquistar suas missões de hoje.
        </p>
    </div>

    <x-auth-session-status class="mb-6 p-4 bg-indigo-50 dark:bg-indigo-900/20 text-indigo-600 rounded-2xl font-bold text-sm" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Seu E-mail')" class="text-lg font-black text-slate-800 dark:text-slate-200" />
            <x-text-input id="email" 
                class="block mt-2 w-full border-slate-200 dark:border-slate-700 dark:bg-slate-800 rounded-2xl p-4 text-slate-900 dark:text-white font-bold focus:ring-4 focus:ring-indigo-500/10 transition-all placeholder:text-slate-400" 
                type="email" 
                name="email" 
                :value="old('email')" 
                placeholder="exemplo@email.com"
                required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <div class="flex items-center justify-between">
                <x-input-label for="password" :value="__('Sua Senha')" class="text-lg font-black text-slate-800 dark:text-slate-200" />
                @if (Route::has('password.request'))
                    <a class="text-sm font-bold text-indigo-600 hover:text-indigo-500 transition-colors" href="{{ route('password.request') }}">
                        {{ __('Esqueceu?') }}
                    </a>
                @endif
            </div>
            
            <x-text-input id="password" 
                class="block mt-2 w-full border-slate-200 dark:border-slate-700 dark:bg-slate-800 rounded-2xl p-4 text-slate-900 dark:text-white font-bold focus:ring-4 focus:ring-indigo-500/10 transition-all"
                type="password"
                name="password"
                placeholder="••••••••"
                required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                <input id="remember_me" type="checkbox" class="w-5 h-5 rounded-lg border-slate-300 dark:border-slate-700 text-indigo-600 shadow-sm focus:ring-indigo-500/20 transition-all cursor-pointer" name="remember">
                <span class="ms-3 text-sm font-bold text-slate-600 dark:text-slate-400 group-hover:text-slate-900 dark:group-hover:text-white transition-colors">{{ __('Manter conectado') }}</span>
            </label>
        </div>

        <div class="pt-2">
            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-4 rounded-2xl font-black text-lg shadow-xl shadow-indigo-500/30 transition-all transform hover:-translate-y-1 active:scale-95 flex justify-center items-center gap-3">
                {{ __('Entrar no Sistema') }}
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
            </button>
        </div>

        <div class="text-center pt-4">
            <p class="text-sm font-medium text-slate-500">
                Não tem uma conta? 
                <a href="{{ route('register') }}" class="text-indigo-600 font-black hover:underline ml-1">Crie uma agora</a>
            </p>
        </div>
    </form>
</x-guest-layout>