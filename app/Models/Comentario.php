<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Publicacao;

class Comentario extends Model
{
    use HasFactory;

    protected $table = 'comentarios';

    protected $fillable = [
        'user_id',
        'publicacao_id',
        'conteudo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function publicacao()
    {
        return $this->belongsTo(Publicacao::class);
    }

    public function respostas()
    {
        return $this->hasMany(Resposta::class);
    }
}
