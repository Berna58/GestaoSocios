<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $table = 'roles'; // nome da tabela no banco de dados

    // Definir relacionamento com os usuários
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
