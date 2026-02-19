<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\User;


class Equipe extends Model
{
   protected $table = 'equipes';
    protected $fillable = [
        'nome', 'usuario_id'
    ];

    public function membros()
    {
        return $this->belongsToMany(User::class, 'equipe_usuario', 'equipe_id', 'usuario_id');
    }
}
