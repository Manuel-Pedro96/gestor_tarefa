<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tarefa extends Model
{
   protected $table = 'tarefas';

    protected $fillable = [
        
        'titulo', 'descricao', 'status',
         'projeto_id', 'responsavel_id', 'prazo_final'
    ];

    protected $casts = [
    'prazo_final' => 'datetime',
];

    public function responsavel()
    {
        return $this->belongsTo(User::class, 'responsavel_id');
    }

    public function projeto()
    {
        return $this->belongsTo(Projeto::class, 'projeto_id');
    }
}
