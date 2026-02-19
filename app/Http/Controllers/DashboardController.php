<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Buscamos os dados vinculados ao usuário logado
        $user = Auth::user();

        $totalPendentes = $user->tarefas()->where('status', 'pendente')->count();
        $totalFazendo   = $user->tarefas()->where('status', 'fazendo')->count();
        $totalConcluidas = $user->tarefas()->where('status', 'concluido')->count();

        return view('dashboard', compact('totalPendentes', 'totalFazendo', 'totalConcluidas'));
    }
}
