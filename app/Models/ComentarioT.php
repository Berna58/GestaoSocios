<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComentarioT extends Model
{
    use HasFactory;

    protected $table = 'comentariosT';

    protected $fillable = [
        'user_id',
        'topico_id',
        'conteudo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function topico()
    {
        return $this->belongsTo(Topico::class);
    }

    public function respostas()
    {
        return $this->hasMany(RespostaT::class);
    }
}
