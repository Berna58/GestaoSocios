<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    use HasFactory;

    protected $table = 'pagamentos';


    protected $fillable = ['ano', 'pago'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
