<section>
    <header class="mb-8">
        <h2 class="text-2xl font-black text-slate-900 dark:text-white flex items-center gap-2">
            <span class="p-2 bg-indigo-100 dark:bg-indigo-900/40 rounded-lg">👤</span>
            {{ __('Informações do Perfil') }}
        </h2>

        <p class="mt-2 text-base font-medium text-slate-500 dark:text-slate-400">
            {{ __("Mantenha seus dados atualizados para facilitar a comunicação no sistema.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-8 space-y-8">
        @csrf
        @method('patch')

        <div class="group">
            <x-input-label for="name" :value="__('Nome Completo')" class="text-lg font-black text-slate-800 dark:text-slate-200" />
            <x-text-input id="name" name="name" type="text" 
                class="mt-2 block w-full border-slate-200 dark:border-slate-700 dark:bg-slate-800 rounded-2xl p-4 text-slate-900 dark:text-white font-bold focus:ring-4 focus:ring-indigo-500/10 transition-all" 
                :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="group">
            <x-input-label for="email" :value="__('Endereço de E-mail')" class="text-lg font-black text-slate-800 dark:text-slate-200" />
            <x-text-input id="email" name="email" type="email" 
                class="mt-2 block w-full border-slate-200 dark:border-slate-700 dark:bg-slate-800 rounded-2xl p-4 text-slate-900 dark:text-white font-bold focus:ring-4 focus:ring-indigo-500/10 transition-all" 
                :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-4 p-4 bg-amber-50 dark:bg-amber-900/20 rounded-xl border border-amber-200 dark:border-amber-800">
                    <p class="text-sm font-bold text-amber-800 dark:text-amber-400">
                        {{ __('Seu e-mail ainda não foi verificado.') }}

                        <button form="send-verification" class="ml-2 underline hover:text-amber-900 dark:hover:text-amber-200 transition">
                            {{ __('Clique aqui para reenviar o e-mail de verificação.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-black text-sm text-green-600 dark:text-green-400">
                            {{ __('Um novo link de verificação foi enviado para você!') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-6 pt-4">
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-10 py-4 rounded-2xl font-black text-lg shadow-xl shadow-indigo-200 dark:shadow-none transition-all transform hover:-translate-y-1 active:scale-95">
                {{ __('Salvar Alterações') }}
            </button>

            @if (session('status') === 'profile-updated')
                <div
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 3000)"
                    class="flex items-center gap-2 text-green-600 dark:text-green-400 font-black"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                    {{ __('Atualizado com sucesso!') }}
                </div>
            @endif
        </div>
    </form>
</section>