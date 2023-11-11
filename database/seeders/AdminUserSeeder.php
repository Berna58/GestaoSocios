<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $adminRole = Role::where('name', 'admin')->first();

        $admin = new User();
        $admin->name = 'Bernardo';
        $admin->email = 'jose.azevedo@ipvc.pt';
        $admin->password = Hash::make('password');
        $admin->status = 'aprovado';
        $admin->role_id = $adminRole->id;
        $admin->avatar = '/images/default.jpg';
        $admin->nif = '123456789';
        $admin->telemovel = '962480306';
        $admin->morada = 'Rua Alfredo';
        $admin->dataNascimento = Carbon::create(2001, 12, 4);
        $admin->emprego = 'empregado';
        $admin->profissao = 'Administrador';
        $admin->empresa = 'Empresa XYZ';
        $admin->nivel = 'licenciatura';
        $admin->naturalidade = 'Portuguesa';
        $admin->bilheteIdentidade = '14706171';
        $admin->curso = 'Ciência da Computação';
        $admin->estabelecimentoEnsino = 'Universidade ABC';
        $admin->titulo_publicacao1 = 'Título da Publicação 1';
        $admin->link_publicacao1 = 'https://exemplo.com/publicacao1';
        $admin->titulo_publicacao2 = 'Título da Publicação 2';
        $admin->link_publicacao2 = 'https://exemplo.com/publicacao2';
        $admin->titulo_publicacao3 = 'Título da Publicação 3';
        $admin->link_publicacao3 = 'https://exemplo.com/publicacao3';
        $admin->titulo_publicacao4 = 'Título da Publicação 4';
        $admin->link_publicacao4 = 'https://exemplo.com/publicacao4';
        $admin->nib = '12345678901234567890123';

        $admin->save();

        // Utilizador 1
        $user1 = new User();
        $user1->name = 'José Monteiro';
        $user1->email = 'utilizador1@example.com';
        $user1->password = Hash::make('12345678');
        $user1->status = 'aprovado';
        $user1->role_id = $adminRole->id;
        $user1->avatar = '/images/default.jpg';
        $user1->nif = '123456788';
        $user1->telemovel = '962480305';
        $user1->morada = 'Rua Condes Torre 61 7350-291 ELVAS';
        $user1->dataNascimento = Carbon::create(1985, 05, 20);
        $user1->emprego = 'empregado';
        $user1->profissao = 'Sociólogo';
        $user1->empresa = 'ASSOCIAM';
        $user1->nivel = 'licenciatura';
        $user1->naturalidade = 'Portuguesa';
        $user1->bilheteIdentidade = '14706172';
        $user1->curso = 'Sociologia';
        $user1->estabelecimentoEnsino = 'FLUP';
        $user1->titulo_publicacao1 = 'Título da Publicação 1';
        $user1->link_publicacao1 = 'https://exemplo.com/publicacao1';
        $user1->titulo_publicacao2 = 'Título da Publicação 2';
        $user1->link_publicacao2 = 'https://exemplo.com/publicacao2';
        $user1->titulo_publicacao3 = 'Título da Publicação 3';
        $user1->link_publicacao3 = 'https://exemplo.com/publicacao3';
        $user1->titulo_publicacao4 = 'Título da Publicação 4';
        $user1->link_publicacao4 = 'https://exemplo.com/publicacao4';
        $user1->nib = '12345678901234567890125';

        $user1->save();

        // Utilizador 2
        $user2 = new User();
        $user2->name = 'Paulo Rodrigues';
        $user2->email = 'utilizador2@example.com';
        $user2->password = Hash::make('12345677');
        $user2->status = 'aprovado';
        $user2->role_id = $adminRole->id;
        $user2->avatar = '/images/default.jpg';
        $user2->nif = '123456787';
        $user2->telemovel = '962480304';
        $user2->morada = 'Rua Internacional 1º APT 200';
        $user2->dataNascimento = Carbon::create(1974, 11, 3);
        $user2->emprego = 'empregado';
        $user2->profissao = 'Sociólogo';
        $user2->empresa = 'ASSOCIAM';
        $user2->nivel = 'licenciatura';
        $user2->naturalidade = 'Portuguesa';
        $user2->bilheteIdentidade = '14706122';
        $user2->curso = 'Sociologia';
        $user2->estabelecimentoEnsino = 'FLUP';
        $user2->titulo_publicacao1 = 'Título da Publicação 1';
        $user2->link_publicacao1 = 'https://exemplo.com/publicacao1';
        $user2->titulo_publicacao2 = 'Título da Publicação 2';
        $user2->link_publicacao2 = 'https://exemplo.com/publicacao2';
        $user2->titulo_publicacao3 = 'Título da Publicação 3';
        $user2->link_publicacao3 = 'https://exemplo.com/publicacao3';
        $user2->titulo_publicacao4 = 'Título da Publicação 4';
        $user2->link_publicacao4 = 'https://exemplo.com/publicacao4';
        $user2->nib = '12345678901234567890124';

        $user2->save();

        // Utilizador 3
        $user3 = new User();
        $user3->name = 'Maria Almeida';
        $user3->email = 'utilizador3@example.com';
        $user3->password = Hash::make('12345676');
        $user3->status = 'aprovado';
        $user3->role_id = $adminRole->id;
        $user3->avatar = '/images/default.jpg';
        $user3->nif = '123456786';
        $user3->telemovel = '962480302';
        $user3->morada = 'Rua Augusta 112 3040-713 CASTELO VIEGAS';
        $user3->dataNascimento = Carbon::create(1989, 03, 3);
        $user3->emprego = 'empregado';
        $user3->profissao = 'Sociólogo';
        $user3->empresa = 'ASSOCIAM';
        $user3->nivel = 'licenciatura';
        $user3->naturalidade = 'Portuguesa';
        $user3->bilheteIdentidade = '14706121';
        $user3->curso = 'Sociologia';
        $user3->estabelecimentoEnsino = 'FLUP';
        $user3->titulo_publicacao1 = 'Título da Publicação 1';
        $user3->link_publicacao1 = 'https://exemplo.com/publicacao1';
        $user3->titulo_publicacao2 = 'Título da Publicação 2';
        $user3->link_publicacao2 = 'https://exemplo.com/publicacao2';
        $user3->titulo_publicacao3 = 'Título da Publicação 3';
        $user3->link_publicacao3 = 'https://exemplo.com/publicacao3';
        $user3->titulo_publicacao4 = 'Título da Publicação 4';
        $user3->link_publicacao4 = 'https://exemplo.com/publicacao4';
        $user3->nib = '12345678901234567890224';

        $user3->save();

        // Redirecionar para a dashboard do admin após a criação do utilizador
        return redirect()->route('admin.dashboard');
    }
}
