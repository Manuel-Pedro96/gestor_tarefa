<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Minhas Tarefas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if (session('success'))
                    <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400 bg-green-100 p-3 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="mb-6">
                    <form action="{{ route('tarefas.index') }}" method="GET" class="flex gap-2">
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </div>
                            <input type="text" name="search" value="{{ request('search') }}" class="block w-full p-2.5 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Buscar tarefas pelo título...">
                        </div>
                        <x-primary-button type="submit">
                            Buscar
                        </x-primary-button>
                        @if(request('search'))
                            <a href="{{ route('tarefas.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 dark:bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-gray-700 dark:text-gray-200 uppercase tracking-widest hover:bg-gray-300 dark:hover:bg-gray-500 transition ease-in-out duration-150">
                                Limpar
                            </a>
                        @endif
                    </form>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-6 w-full">
    
    <div class="bg-white dark:bg-gray-800 p-4 rounded-xl shadow-sm border-l-4 border-yellow-400">
        <div class="flex items-center">
            <div class="p-3 rounded-xl bg-yellow-100 dark:bg-yellow-900/30 text-yellow-500 flex-shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div class="ml-4">
                <p class="text-sm font-black text-gray-500 dark:text-gray-400 uppercase tracking-wider">Pendentes</p>
                <p class="text-2xl font-black text-gray-700 dark:text-gray-200">{{ $totalPendentes }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 p-4 rounded-xl shadow-sm border-l-4 border-blue-400">
        <div class="flex items-center">
            <div class="p-3 rounded-xl bg-blue-100 dark:bg-blue-900/30 text-blue-500 flex-shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
            </div>
            <div class="ml-4">
                <p class="text-sm font-black text-gray-500 dark:text-gray-400 uppercase tracking-wider">Fazendo</p>
                <p class="text-2xl font-black text-gray-700 dark:text-gray-200">{{ $totalFazendo }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 p-4 rounded-xl shadow-sm border-l-4 border-green-400">
        <div class="flex items-center">
            <div class="p-3 rounded-xl bg-green-100 dark:bg-green-900/30 text-green-500 flex-shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </div>
            <div class="ml-4">
                <p class="text-sm font-black text-gray-500 dark:text-gray-400 uppercase tracking-wider">Concluídas</p>
                <p class="text-2xl font-black text-gray-700 dark:text-gray-200">{{ $totalConcluidas }}</p>
            </div>
        </div>
    </div>

</div>

  

                <div class="mb-4 flex justify-end">
                    <a href="{{ route('tarefas.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        + Nova Tarefa
                    </a>
                </div>
                <div class="overflow-x-auto custom-scrollbar">
    <table class="w-full text-left text-gray-500 dark:text-gray-400 min-w-[800px]"> <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th class="px-6 py-3">Tarefa</th>
                <th class="px-6 py-3">Projeto</th>
                <th class="px-6 py-3">Status</th>
                <th class="px-6 py-3">Prazo</th>
                <th class="px-6 py-3 text-right">Ações</th> </tr>
        </thead>
        <tbody>
            @foreach($tarefas as $tarefa)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                <td class="px-6 py-4 font-bold text-slate-900 dark:text-white">
                    {{ $tarefa->titulo }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $tarefa->projeto->nome }}</td>

                <td class="px-6 py-4">
                    @if($tarefa->status === 'concluido')
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-black bg-emerald-100 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-400">
                            {{ __('CONCLUÍDO') }}
                        </span>
                    @elseif($tarefa->status === 'Fazendo')
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-black bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400">
                            {{ __('EM ANDAMENTO') }}
                        </span>
                    @else
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-black bg-slate-100 text-slate-800 dark:bg-gray-700 dark:text-gray-300">
                            {{ strtoupper($tarefa->status) }}
                        </span>
                    @endif
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                        {{ $tarefa->prazo_final ? \Carbon\Carbon::parse($tarefa->prazo_final)->format('d/m/Y') : '---' }}
                    </div>
                </td>

                <td class="px-6 py-4">
                    <div class="flex items-center justify-end gap-2 md:gap-3 min-w-[200px] ml-auto">
                        
                        <div class="flex justify-center min-w-[80px]">
                            @if($tarefa->status !== 'concluido')
                                <form action="{{ route('tarefas.concluir', $tarefa) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="bg-emerald-500 hover:bg-emerald-600 text-white px-3 py-1.5 rounded-xl text-[10px] font-black shadow-sm transition-all transform active:scale-95 uppercase tracking-tighter">
                                        Concluir
                                    </button>
                                </form>
                            @else
                                <div class="bg-emerald-50 dark:bg-emerald-900/20 p-1.5 rounded-lg">
                                    <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                            @endif
                        </div>

                        <a href="{{ route('tarefas.edit', $tarefa) }}" 
                           class="flex items-center justify-center w-9 h-9 bg-slate-100 hover:bg-indigo-100 dark:bg-slate-800 dark:hover:bg-indigo-900/40 text-slate-600 dark:text-slate-400 dark:hover:text-indigo-400 rounded-xl transition-all shadow-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        </a>

                        <form action="{{ route('tarefas.destroy', $tarefa) }}" method="POST" onsubmit="return confirm('Tem certeza?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="flex items-center justify-center w-9 h-9 bg-red-50 hover:bg-red-600 dark:bg-red-900/20 dark:hover:bg-red-600 text-red-600 dark:text-red-500 dark:hover:text-white rounded-xl transition-all shadow-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $tarefas->links() }}
</div>

            </div>
        </div>
    </div>
</x-app-layout>