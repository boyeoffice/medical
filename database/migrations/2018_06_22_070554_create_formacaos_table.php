<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formacaos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo')->nullable();
            $table->string('nome', 255)->nullable();
            $table->string('entidade_organizadora', 255)->nullable();
            $table->string('local', 255)->nullable();
            $table->string('data', 255)->nullable();
            $table->string('nacional', 255)->nullable();
            $table->string('nota', 255)->nullable();
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
        Schema::dropIfExists('formacaos');
    }
}
