<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atividades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo', 255)->nullable();
            $table->string('titulo',255)->nullable();
            $table->string('nome', 255)->nullable();
            $table->string('data', 255)->nullable();
            $table->string('estado', 255)->nullable();
            $table->enum('indexada', ['Yes', 'No'])->default('Yes');
            $table->string('publicacao', 255)->nullable();
            $table->string('autores', 255)->nullable();
            $table->string('abstract', 255)->nullable();
            $table->enum('primeiro', ['Yes', 'No'])->default('Yes')->comment('yes, no');
            $table->enum('premios', ['Yes', 'No'])->default('Yes')->comment('yes, no');
            $table->string('observacoes', 255)->nullable();
            $table->string('anexos', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atividades');
    }
}
