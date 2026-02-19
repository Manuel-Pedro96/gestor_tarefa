<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-2xl text-slate-800 dark:text-white leading-tight">
            {{ __('✏️ Editar Missão') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-slate-900 overflow-hidden shadow-2xl sm:rounded-[2rem] border border-slate-100 dark:border-slate-800">
                <div class="p-8">
                    <form action="{{ route('tarefas.update', $tarefa) }}" method="POST" class="space-y-8">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-input-label for="titulo" :value="__('Título da Tarefa')" class="text-slate-700 dark:text-slate-300 font-bold mb-2 ml-1" />
                            <x-text-input id="titulo" name="titulo" type="text" 
                                class="block w-full border-slate-200 dark:border-slate-700 dark:bg-slate-800 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 transition-all p-4 text-slate-900 dark:text-white font-medium" 
                                :value="old('titulo', $tarefa->titulo)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('titulo')" />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="projeto_id" :value="__('Projeto')" class="text-slate-700 dark:text-slate-300 font-bold mb-2 ml-1" />
                                <select name="projeto_id" id="projeto_id" 
                                    class="mt-1 block w-full border-slate-200 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300 focus:ring-4 focus:ring-indigo-500/10 rounded-2xl shadow-sm p-3 transition-all font-medium">
                                    @foreach($projetos as $projeto)
                                        <option value="{{ $projeto->id }}" {{ $tarefa->projeto_id == $projeto->id ? 'selected' : '' }}>
                                            📁 {{ $projeto->nome }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <x-input-label for="status" :value="__('Status Atual')" class="text-slate-700 dark:text-slate-300 font-bold mb-2 ml-1" />
                                <select name="status" id="status" 
                                    class="mt-1 block w-full border-slate-200 dark:border-slate-700 dark:bg-slate-800 dark:text-slate-300 focus:ring-4 focus:ring-indigo-500/10 rounded-2xl shadow-sm p-3 transition-all font-bold">
                                    <option value="pendente" {{ $tarefa->status == 'pendente' ? 'selected' : '' }} class="text-yellow-600">⏳ Pendente</option>
                                    <option value="Fazendo" {{ $tarefa->status == 'Fazendo' ? 'selected' : '' }} class="text-blue-600">🚀 Fazendo</option>
                                    <option value="concluido" {{ $tarefa->status == 'concluido' ? 'selected' : '' }} class="text-green-600">✅ Concluído</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <x-input-label for="prazo_final" :value="__('Prazo Final')" class="text-slate-700 dark:text-slate-300 font-bold mb-2 ml-1" />
                            <x-text-input id="prazo_final" name="prazo_final" type="date" 
                                class="mt-1 block w-full border-slate-200 dark:border-slate-700 dark:bg-slate-800 rounded-2xl p-3 focus:ring-4 focus:ring-indigo-500/10 transition-all text-slate-900 dark:text-white font-medium" 
                                :value="old('prazo_final', $tarefa->prazo_final ? \Carbon\Carbon::parse($tarefa->prazo_final)->format('Y-m-d') : '')" />
                        </div>

                        <div class="flex items-center justify-between pt-6 border-t border-slate-100 dark:border-slate-800">
                            <a href="{{ route('tarefas.index') }}" class="text-sm font-bold text-slate-500 hover:text-red-500 transition-colors flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                                {{ __('Cancelar') }}
                            </a>

                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-2xl font-black shadow-lg shadow-indigo-200 dark:shadow-none transition-all transform hover:-translate-y-1 active:scale-95">
                                {{ __('Atualizar Missão') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>