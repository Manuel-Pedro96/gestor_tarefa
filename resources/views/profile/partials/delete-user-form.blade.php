<section class="space-y-6">
    <header class="mb-8">
        <h2 class="text-2xl font-black text-red-600 dark:text-red-400 flex items-center gap-2">
            <span class="p-2 bg-red-100 dark:bg-red-900/40 rounded-lg">⚠️</span>
            {{ __('Excluir Conta') }}
        </h2>

        <p class="mt-2 text-base font-medium text-slate-500 dark:text-slate-400">
            {{ __('Uma vez que sua conta for excluída, todos os seus dados serão removidos permanentemente. Por favor, tenha certeza antes de prosseguir.') }}
        </p>
    </header>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="bg-red-600 hover:bg-red-700 text-white px-8 py-3 rounded-2xl font-black shadow-lg shadow-red-200 dark:shadow-none transition-all transform hover:-translate-y-1"
    >
        {{ __('Excluir Minha Conta') }}
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-8 bg-white dark:bg-slate-900 rounded-[2rem]">
            @csrf
            @method('delete')

            <h2 class="text-2xl font-black text-slate-900 dark:text-white">
                {{ __('Você tem certeza absoluta?') }}
            </h2>

            <p class="mt-4 text-base font-medium text-slate-500 dark:text-slate-400">
                {{ __('Para confirmar a exclusão permanente, por favor digite sua senha atual abaixo.') }}
            </p>

            <div class="mt-8 group">
                <x-input-label for="password" value="{{ __('Sua Senha') }}" class="text-lg font-black text-slate-800 dark:text-slate-200" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-2 block w-full border-slate-200 dark:border-slate-700 dark:bg-slate-800 rounded-2xl p-4 text-slate-900 dark:text-white font-bold focus:ring-4 focus:ring-red-500/10 transition-all"
                    placeholder="{{ __('Sua Senha de Confirmação') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-10 flex justify-end gap-4">
                <button 
                    type="button"
                    x-on:click="$dispatch('close')"
                    class="px-6 py-3 text-sm font-black text-slate-500 hover:text-slate-800 dark:hover:text-white transition-colors"
                >
                    {{ __('Cancelar') }}
                </button>

                <button 
                    type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white px-8 py-3 rounded-2xl font-black shadow-lg shadow-red-200 dark:shadow-none transition-all"
                >
                    {{ __('Sim, Excluir Conta') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>