<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InscricaoTemporaria extends Model
{
    use HasFactory;

    protected $table = 'inscricoes_temporarias';

    protected $fillable = [
        'nome',
        'email',
        'tipo_inscricao',
        'instituicao',
        'presenca',
        'evento_id',
    ];

    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }

}
