<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;

    protected $table = 'uploads';

    protected $fillable = [
        'formulario_id',
        'user_id',
        'name',
        'email',
        'tipo_membro',
        'file',
    ];

    public function formulario()
    {
        return $this->belongsTo(Formulario::class, 'formulario_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
