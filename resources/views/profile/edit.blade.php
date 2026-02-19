<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-2xl text-slate-800 dark:text-white leading-tight">
            {{ __('⚙️ Configurações de Perfil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <div class="p-6 sm:p-10 bg-white dark:bg-slate-900 shadow-2xl sm:rounded-[2.5rem] border border-slate-100 dark:border-slate-800 transition-all">
                <div class="max-w-xl">
                    <h3 class="text-lg font-bold text-slate-800 dark:text-white mb-4">Informações Pessoais</h3>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-6 sm:p-10 bg-white dark:bg-slate-900 shadow-2xl sm:rounded-[2.5rem] border border-slate-100 dark:border-slate-800 transition-all">
                <div class="max-w-xl">
                    <h3 class="text-lg font-bold text-slate-800 dark:text-white mb-4">Segurança da Conta</h3>
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-6 sm:p-10 bg-white dark:bg-red-900/10 shadow-2xl sm:rounded-[2.5rem] border border-red-50 dark:border-red-900/20 transition-all">
                <div class="max-w-xl">
                    <h3 class="text-lg font-bold text-red-600 dark:text-red-400 mb-4">Zona de Perigo</h3>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>