<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Evento extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'eventos';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'titulo',
        'descricao',
        'local',
        'imagem',
        'data',
        'hora',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function inscritos()
    {
        return $this->belongsToMany(User::class, 'inscricoes', 'evento_id', 'user_id');
    }

    public function inscricao()
    {
        return $this->hasMany(Inscricao::class, 'evento_id');
    }

    public function inscricoesTemporarias()
    {
        return $this->hasMany(InscricaoTemporaria::class, 'evento_id');
    }

    public function getTotalInscricoesAttribute()
    {
        $inscricoes = $this->inscritos()->count();
        $inscricoesTemporarias = $this->inscricoesTemporarias()->count();

        return $inscricoes + $inscricoesTemporarias;
    }

}
