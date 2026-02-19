<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Painel de Controle') }}
        </h2>
    </x-slot>
    
<div class="bg-white dark:bg-slate-900 overflow-hidden shadow-[0_8px_30px_rgb(0,0,0,0.04)] sm:rounded-[2rem] p-8 border border-slate-100 dark:border-slate-800">
    
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-8">
                
                <div class="mb-8">
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white">
                        Olá, {{ Auth::user()->name }}! 👋
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400 px-2"> Aqui está o que está acontecendo com suas tarefas hoje.</p>
                </div>

                <div class="flex flex-col md:flex-row gap-6">
                    
                    <div class="flex-1 bg-amber-50 dark:bg-amber-900/10 border border-amber-200 dark:border-amber-800 p-6 rounded-2xl shadow-sm transition hover:shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-semibold text-amber-600 dark:text-amber-400 uppercase tracking-wider">Pendentes</p>
                                <p class="text-4xl font-black text-amber-700 dark:text-amber-200 mt-1">{{ $totalPendentes }}</p>
                            </div>
                            <div class="bg-amber-100 dark:bg-amber-800 p-3 rounded-xl text-amber-600 dark:text-amber-200">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                        </div>
                    </div>

                    <div class="flex-1 bg-blue-50 dark:bg-blue-900/10 border border-blue-200 dark:border-blue-800 p-6 rounded-2xl shadow-sm transition hover:shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-semibold text-blue-600 dark:text-blue-400 uppercase tracking-wider">Fazendo</p>
                                <p class="text-4xl font-black text-blue-700 dark:text-blue-200 mt-1">{{ $totalFazendo }}</p>
                            </div>
                            <div class="bg-blue-100 dark:bg-blue-800 p-3 rounded-xl text-blue-600 dark:text-blue-200">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            </div>
                        </div>
                    </div>

                    <div class="flex-1 bg-emerald-50 dark:bg-emerald-900/10 border border-emerald-200 dark:border-emerald-800 p-6 rounded-2xl shadow-sm transition hover:shadow-md">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-semibold text-emerald-600 dark:text-emerald-400 uppercase tracking-wider">Concluídas</p>
                                <p class="text-4xl font-black text-emerald-700 dark:text-emerald-200 mt-1">{{ $totalConcluidas }}</p>
                            </div>
                            <div class="bg-emerald-100 dark:bg-emerald-800 p-3 rounded-xl text-emerald-600 dark:text-emerald-200">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="mt-10 pt-6 border-t border-gray-100 dark:border-gray-700 flex justify-between items-center">
                    <span class="text-sm text-gray-500 px-2">Organize seu dia, Manuel Pedro.</span>
                    <a href="{{ route('tarefas.index') }}" class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl shadow-lg shadow-indigo-200 dark:shadow-none transition-all flex items-center gap-2">
                        Ir para minhas tarefas
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>