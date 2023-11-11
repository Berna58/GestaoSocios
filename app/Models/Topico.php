<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topico extends Model
{
    use HasFactory;

    protected $table = 'topicos';

    protected $fillable = ['titulo', 'conteudo', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function respostas()
    {
        return $this->hasMany(RespostaT::class);
    }

    public function comentarios()
    {
        return $this->hasMany(ComentarioT::class);
    }
}
