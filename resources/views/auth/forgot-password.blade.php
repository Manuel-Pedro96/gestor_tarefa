<x-guest-layout>
    <div class="mb-10 text-center">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-amber-100 dark:bg-amber-900/30 rounded-2xl mb-4">
            <span class="text-3xl">🔑</span>
        </div>
        <h2 class="text-3xl font-black text-slate-900 dark:text-white tracking-tighter">
            Recuperar Acesso
        </h2>
        <p class="mt-3 text-base font-medium text-slate-500 dark:text-slate-400 leading-relaxed">
            {{ __('Esqueceu sua senha? Sem problemas. Informe seu e-mail e enviaremos um link para você criar uma nova.') }}
        </p>
    </div>

    <x-auth-session-status class="mb-6 p-4 bg-green-50 dark:bg-green-900/20 text-green-600 dark:text-green-400 rounded-2xl font-bold text-sm border border-green-100 dark:border-green-900/30" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-8">
        @csrf

        <div class="group">
            <x-input-label for="email" :value="__('E-mail de Cadastro')" class="text-lg font-black text-slate-800 dark:text-slate-200" />
            <x-text-input id="email" 
                class="block mt-2 w-full border-slate-200 dark:border-slate-700 dark:bg-slate-800 rounded-2xl p-4 text-slate-900 dark:text-white font-bold focus:ring-4 focus:ring-indigo-500/10 transition-all placeholder:text-slate-400" 
                type="email" 
                name="email" 
                :value="old('email')" 
                placeholder="seu@email.com"
                required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex flex-col gap-4">
            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-4 rounded-2xl font-black text-lg shadow-xl shadow-indigo-500/30 transition-all transform hover:-translate-y-1 active:scale-95 flex justify-center items-center gap-3">
                {{ __('Enviar Link de Recuperação') }}
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            </button>

            <a href="{{ route('login') }}" class="text-center text-sm font-black text-slate-400 hover:text-slate-600 dark:hover:text-slate-200 transition-colors py-2">
                {{ __('Voltar para o Login') }}
            </a>
        </div>
    </form>
</x-guest-layout>