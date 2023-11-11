<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Noticia extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'noticias';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'titulo',
        'descricao',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
