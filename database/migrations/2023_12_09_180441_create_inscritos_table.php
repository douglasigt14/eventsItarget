<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscritosTable extends Migration
{
    public function up()
    {
        Schema::create('inscritos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('cpf');
            $table->string('email');
            $table->foreignId('event_id')->constrained('events');
            // Adicione outros campos, se necessário
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inscritos');
    }
}