<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Resposta extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'comentario_id', 'conteudo'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comentariosT()
    {
        return $this->belongsTo(Comentario::class);
    }
}
