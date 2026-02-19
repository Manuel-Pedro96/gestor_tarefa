<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,800&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-slate-50 dark:bg-slate-950 text-slate-900 dark:text-slate-100 antialiased selection:bg-indigo-500 selection:text-white">
        
        <nav class="fixed top-0 w-full p-6 flex justify-end gap-4 z-50">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="px-6 py-2 bg-white/10 backdrop-blur-md border border-white/20 rounded-xl font-bold hover:bg-white/20 transition-all">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="px-6 py-2 text-slate-600 dark:text-slate-400 font-bold hover:text-indigo-600 transition-colors">Entrar</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-6 py-2 bg-indigo-600 text-white rounded-xl font-black shadow-lg shadow-indigo-500/30 hover:bg-indigo-700 transition-all transform hover:-translate-y-1">Começar Agora</a>
                    @endif
                @endauth
            @endif
        </nav>

        <main class="min-h-screen flex items-center justify-center p-6">
            <div class="max-w-4xl w-full grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                
                <div class="space-y-8 text-center lg:text-left">
                    <div class="inline-block px-4 py-2 bg-indigo-100 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 rounded-full font-black text-xs uppercase tracking-widest">
                        🚀 Gerenciador de Missões
                    </div>
                    
                    <h1 class="text-5xl lg:text-7xl font-black leading-tight tracking-tighter">
                        Domine suas <span class="text-indigo-600">Tarefas</span> com Precisão.
                    </h1>
                    
                    <p class="text-lg text-slate-500 dark:text-slate-400 font-medium leading-relaxed">
                        Transforme sua rotina em uma sequência de vitórias. Organize projetos, defina prazos e conquiste seus objetivos com o Manuel Pedro System.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="{{ route('register') }}" class="px-8 py-4 bg-indigo-600 text-white rounded-2xl font-black text-lg shadow-2xl shadow-indigo-500/40 hover:bg-indigo-700 transition-all transform hover:scale-105">
                            Criar Conta Grátis
                        </a>
                        <div class="flex items-center gap-2 px-6 py-4 text-slate-400 font-bold italic">
                            "Simples, Rápido e Eficiente."
                        </div>
                    </div>
                </div>

                <div class="relative group">
                    <div class="absolute -inset-1 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-[3rem] blur opacity-25 group-hover:opacity-50 transition duration-1000"></div>
                    <div class="relative bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-[2.5rem] p-8 shadow-2xl">
                        <div class="space-y-4">
                            <div class="flex items-center gap-4 p-4 bg-slate-50 dark:bg-slate-800/50 rounded-2xl border border-slate-100 dark:border-slate-700">
                                <div class="w-6 h-6 rounded-full border-2 border-indigo-500"></div>
                                <div class="flex-1 h-3 bg-slate-200 dark:bg-slate-700 rounded-full"></div>
                                <div class="w-12 h-3 bg-indigo-200 dark:bg-indigo-900 rounded-full"></div>
                            </div>
                            <div class="flex items-center gap-4 p-4 bg-slate-50 dark:bg-slate-800/50 rounded-2xl border border-slate-100 dark:border-slate-700 opacity-75">
                                <div class="w-6 h-6 rounded-full bg-indigo-500 flex items-center justify-center text-white text-[10px]">✓</div>
                                <div class="flex-1 h-3 bg-slate-200 dark:bg-slate-700 rounded-full"></div>
                                <div class="w-12 h-3 bg-green-200 dark:bg-green-900 rounded-full"></div>
                            </div>
                            <div class="flex items-center gap-4 p-4 bg-slate-50 dark:bg-slate-800/50 rounded-2xl border border-slate-100 dark:border-slate-700 opacity-50">
                                <div class="w-6 h-6 rounded-full border-2 border-slate-300"></div>
                                <div class="flex-1 h-3 bg-slate-200 dark:bg-slate-700 rounded-full"></div>
                            </div>
                        </div>
                        
                        <div class="mt-8 pt-6 border-t border-slate-100 dark:border-slate-800 text-center">
                            <span class="text-slate-400 text-sm font-bold tracking-widest uppercase">Dashboard Preview</span>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>