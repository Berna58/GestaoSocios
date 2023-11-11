<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Events\UserCreatedEvent;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'telemovel',
        'nif',
        'dataNascimento',
        'morada',
        'avatar',
        'emprego',
        'profissao',
        'bilheteIdentidade',
        'naturalidade',
        'empresa',
        'nivel',
        'curso',
        'estabelecimentoEnsino',
        'titulo_publicacao1',
        'link_publicacao1',
        'titulo_publicacao2',
        'link_publicacao2',
        'titulo_publicacao3',
        'link_publicacao3',
        'titulo_publicacao4',
        'link_publicacao4',
        'nib',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function isAdmin()
    {
        return $this->role->name === 'admin';
    }

    public function isSocio()
    {
        return $this->role->name === 'socio';
    }

    public function hasRole($role)
    {
        if ($this->role()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

    public function hasRole2($role)
    {
        if ($this->role()->skip(1)->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

    public function pagamentos()
    {
        return $this->hasMany(Pagamento::class);
    }

    public function eventosInscritos()
    {
        return $this->belongsToMany(Evento::class, 'inscricoes', 'user_id', 'evento_id')
            ->withTimestamps();
    }


    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            event(new UserCreatedEvent($user));
        });
    }
}
