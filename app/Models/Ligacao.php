<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ligacao extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ligacoes';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'descricao',
        'instituicao',
        'email',
        'link',
        'telefone',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
