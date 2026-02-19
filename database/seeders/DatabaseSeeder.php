<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Equipe;
use App\Models\Projeto;
use App\Models\Tarefa;
use Illuminate\Support\Facades\Bcrypt;


class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Criar um usuário de teste
        $admin = User::factory()->create([
            'name' => 'Manuel Pedro',
            'email' => 'admin@exemplo.com',
            'password' => bcrypt('senha123'),
        ]);

        // 2. Criar uma equipe
        $equipe = Equipe::create([
            'nome' => 'Time de Desenvolvimento Fedora',
            'usuario_id' => $admin->id,
        ]);

        // Vincular o admin à equipe na tabela pivô
        $admin->equipes()->attach($equipe->id, ['papel' => 'admin']);

        // 3. Criar um projeto
        $projeto = Projeto::create([
            'nome' => 'Lançamento do Sistema',
            'equipe_id' => $equipe->id,
        ]);

        // 4. Criar algumas tarefas
        Tarefa::create([
            'titulo' => 'Configurar o Banco MariaDB',
            'descricao' => 'Finalizar as migrações e testar conexão',
            'status' => 'concluido',
            'projeto_id' => $projeto->id,
            'responsavel_id' => $admin->id,
        ]);

        Tarefa::create([
            'titulo' => 'Implementar UI com Livewire Volt',
            'descricao' => 'Criar os componentes de listagem de tarefas',
            'status' => 'fazendo',
            'projeto_id' => $projeto->id,
            'responsavel_id' => $admin->id,
        ]);
    }
}
