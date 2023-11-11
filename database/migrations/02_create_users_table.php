<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('status', ['pendente', 'aprovado', 'rejeitado', 'suspenso'])->default('pendente');
            $table->unsignedBigInteger('role_id')->default(2);
            $table->string('avatar')->default('/images/default.jpg');
            $table->dateTime('dataNascimento');
            $table->string('nif')->unique();
            $table->string('telemovel')->unique();
            $table->string('morada');
            $table->string('naturalidade');
            $table->string('bilheteidentidade');
            $table->enum('emprego', ['procura_emprego', 'empregado', 'desempregado'])->nullable();
            $table->string('profissao')->nullable();
            $table->string('empresa')->nullable();
            $table->enum('nivel', ['estudante', 'licenciatura', 'mestrado', 'pós-graduação', 'doutoramento'])->nullable();
            $table->string('curso')->nullable();
            $table->string('estabelecimentoEnsino')->nullable();
            for ($i = 1; $i <= 4; $i++) {
                $table->string('titulo_publicacao'.$i)->nullable();
                $table->string('link_publicacao'.$i)->nullable();
            }
            $table->string('nib')->nullable();
            $table->timestamps();
            $table->foreign('role_id')->references('id')->on('roles');
            $table->boolean('pagamento')->default(false);
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
