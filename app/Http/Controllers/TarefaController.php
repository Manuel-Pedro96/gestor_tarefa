<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tarefa;
use App\Models\Projeto;



class TarefaController extends Controller
{
    public function index(Request $request){

        $search = $request->input('search');

        // Iniciamos a query vinculada ao usuário
        $query = Auth::user()->tarefas()->with('projeto');

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('titulo', 'like', "%{$search}%")
                ->orWhere('descricao', 'like', "%{$search}%");
            });
        }

        // No método index, antes do ->get()
        $tarefas = $query->orderBy('prazo_final', 'asc')->paginate(5)->withQueryString();;

        $totalPendentes = Auth::user()->tarefas()->where('status', 'pendente')->count();
        $totalConcluidas = Auth::user()->tarefas()->where('status', 'concluido')->count();
        $totalFazendo = Auth::user()->tarefas()->where('status', 'fazendo')->count();


        return view('tarefas.index', compact('tarefas', 'totalPendentes', 'totalConcluidas', 'totalFazendo'));

    }

    public function concluir(Tarefa $tarefa)
    {
        // Segurança: Verifica se a tarefa pertence mesmo ao usuário logado
        if ($tarefa->responsavel_id !== Auth::id()) {
            abort(403);
        }

        $tarefa->update(['status' => 'concluido']);

        return back()->with('success', 'Tarefa concluída com sucesso!');
    }

    
    public function create()
    {
        $projetos = Projeto::all();
        return view('tarefas.create', compact('projetos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'projeto_id' => 'required|exists:projetos,id',
            'prazo_final' => 'nullable|date',
        ]);

        Auth::user()->tarefas()->create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'projeto_id' => $request->projeto_id,
            'status' => 'Fazendo', // Status inicial padrão
            'prazo_final' => $request->prazo_final,
        ]);

        return redirect()->route('tarefas.index')->with('success', 'Tarefa criada com sucesso!');
    }

    public function destroy(Tarefa $tarefa)
    {
        // Segurança: impede que um usuário delete a tarefa de outro via URL/ID
        if ($tarefa->responsavel_id !== Auth::id()) {
            abort(403);
        }

        $tarefa->delete();

        return redirect()->route('tarefas.index')->with('success', 'Tarefa excluída com sucesso!');
    }

    public function edit(Tarefa $tarefa)
{
    // Segurança: só edita se for o dono
    if ($tarefa->responsavel_id !== Auth::id()) {
        abort(403);
    }

    $projetos = Projeto::all();
    return view('tarefas.edit', compact('tarefa', 'projetos'));
}

public function update(Request $request, Tarefa $tarefa)
{
    if ($tarefa->responsavel_id !== Auth::id()) {
        abort(403);
    }

    $request->validate([
        'titulo' => 'required|string|max:255',
        'projeto_id' => 'required|exists:projetos,id',
        'status' => 'required|in:Fazendo,concluido,pendente',
        'prazo_final' => 'nullable|date',
    ]);

    $tarefa->update($request->all());

    return redirect()->route('tarefas.index')->with('success', 'Tarefa atualizada com sucesso!');
}
}
