<x-guest-layout>
    <div class="mb-10 text-center">
        <h2 class="text-3xl font-black text-slate-900 dark:text-white tracking-tighter">
            Criar Nova Conta
        </h2>
        <p class="text-slate-500 dark:text-slate-400 font-medium mt-2">
            Junte-se a nós e comece a organizar suas missões.
        </p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Nome Completo')" class="text-lg font-black text-slate-800 dark:text-slate-200" />
            <x-text-input id="name" 
                class="block mt-2 w-full border-slate-200 dark:border-slate-700 dark:bg-slate-800 rounded-2xl p-4 text-slate-900 dark:text-white font-bold focus:ring-4 focus:ring-indigo-500/10 transition-all placeholder:text-slate-400" 
                type="text" name="name" :value="old('name')" 
                placeholder="Como quer ser chamado?"
                required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Melhor E-mail')" class="text-lg font-black text-slate-800 dark:text-slate-200" />
            <x-text-input id="email" 
                class="block mt-2 w-full border-slate-200 dark:border-slate-700 dark:bg-slate-800 rounded-2xl p-4 text-slate-900 dark:text-white font-bold focus:ring-4 focus:ring-indigo-500/10 transition-all placeholder:text-slate-400" 
                type="email" name="email" :value="old('email')" 
                placeholder="exemplo@email.com"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="__('Defina uma Senha')" class="text-lg font-black text-slate-800 dark:text-slate-200" />
            <x-text-input id="password" 
                class="block mt-2 w-full border-slate-200 dark:border-slate-700 dark:bg-slate-800 rounded-2xl p-4 text-slate-900 dark:text-white font-bold focus:ring-4 focus:ring-indigo-500/10 transition-all placeholder:text-slate-400"
                type="password"
                name="password"
                placeholder="Mínimo 8 caracteres"
                required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Confirme a Senha')" class="text-lg font-black text-slate-800 dark:text-slate-200" />
            <x-text-input id="password_confirmation" 
                class="block mt-2 w-full border-slate-200 dark:border-slate-700 dark:bg-slate-800 rounded-2xl p-4 text-slate-900 dark:text-white font-bold focus:ring-4 focus:ring-indigo-500/10 transition-all placeholder:text-slate-400"
                type="password"
                name="password_confirmation" 
                placeholder="Repita a senha escolhida"
                required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="pt-4 space-y-4">
            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-4 rounded-2xl font-black text-lg shadow-xl shadow-indigo-500/30 transition-all transform hover:-translate-y-1 active:scale-95 flex justify-center items-center gap-3">
                {{ __('Criar Minha Conta') }}
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
            </button>

            <div class="text-center">
                <a class="text-sm font-bold text-slate-500 hover:text-indigo-600 transition-colors" href="{{ route('login') }}">
                    {{ __('Já tem uma conta? Faça login') }}
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>