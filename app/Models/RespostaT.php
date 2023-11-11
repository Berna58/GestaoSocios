<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RespostaT extends Model
{
    use HasFactory;

    protected $table = 'respostasT';

    protected $fillable = ['conteudo', 'user_id', 'comentario_t_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comentarios()
    {
        return $this->belongsTo(ComentarioT::class);
    }
}
