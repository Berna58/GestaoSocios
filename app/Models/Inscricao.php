<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Evento;

class Inscricao extends Model
{
    use HasFactory;

    protected $table = 'inscricoes';

    protected $fillable = [
        'user_id',
        'evento_id',
        'presenca',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function evento()
    {
        return $this->belongsTo(Evento::class, 'evento_id');
    }

    public function inscricoesTemporarias()
    {
        return $this->hasMany(InscricaoTemporaria::class, 'id');
    }
}
