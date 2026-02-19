<section>
    <header class="mb-8">
        <h2 class="text-2xl font-black text-slate-900 dark:text-white flex items-center gap-2">
            <span class="p-2 bg-amber-100 dark:bg-amber-900/40 rounded-lg">🔐</span>
            {{ __('Segurança da Conta') }}
        </h2>

        <p class="mt-2 text-base font-medium text-slate-500 dark:text-slate-400">
            {{ __('Certifique-se de usar uma senha longa e aleatória para manter sua conta protegida.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-8 space-y-8">
        @csrf
        @method('put')

        <div class="group">
            <x-input-label for="update_password_current_password" :value="__('Senha Atual')" class="text-lg font-black text-slate-800 dark:text-slate-200" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" 
                class="mt-2 block w-full border-slate-200 dark:border-slate-700 dark:bg-slate-800 rounded-2xl p-4 text-slate-900 dark:text-white font-bold focus:ring-4 focus:ring-indigo-500/10 transition-all" 
                autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div class="group">
            <x-input-label for="update_password_password" :value="__('Nova Senha')" class="text-lg font-black text-slate-800 dark:text-slate-200" />
            <x-text-input id="update_password_password" name="password" type="password" 
                class="mt-2 block w-full border-slate-200 dark:border-slate-700 dark:bg-slate-800 rounded-2xl p-4 text-slate-900 dark:text-white font-bold focus:ring-4 focus:ring-indigo-500/10 transition-all" 
                autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div class="group">
            <x-input-label for="update_password_password_confirmation" :value="__('Confirmar Nova Senha')" class="text-lg font-black text-slate-800 dark:text-slate-200" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" 
                class="mt-2 block w-full border-slate-200 dark:border-slate-700 dark:bg-slate-800 rounded-2xl p-4 text-slate-900 dark:text-white font-bold focus:ring-4 focus:ring-indigo-500/10 transition-all" 
                autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-6 pt-4">
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-10 py-4 rounded-2xl font-black text-lg shadow-xl shadow-indigo-200 dark:shadow-none transition-all transform hover:-translate-y-1 active:scale-95">
                {{ __('Atualizar Senha') }}
            </button>

            @if (session('status') === 'password-updated')
                <div
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 3000)"
                    class="flex items-center gap-2 text-green-600 dark:text-green-400 font-black"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                    {{ __('Senha alterada!') }}
                </div>
            @endif
        </div>
    </form>
</section>