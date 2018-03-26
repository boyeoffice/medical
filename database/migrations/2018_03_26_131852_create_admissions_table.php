<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admissions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('iniciais_paciente')->nullable();
            $table->enum('primeira_consulta', ['yes', 'no'])->comment('Yes, No');
            $table->enum('sexo', ['m','f'])->comment('Male, Female');
            $table->string('idade')->nullable();
            $table->string('origem')->nullable();
            $table->string('especialidade_origem')->nullable();
            $table->string('destino')->nullable();
            $table->string('grupo_ICD_10')->nullable();
            $table->string('ICD_10_primario')->nullable();
            $table->string('ICD_10_secundario')->nullable();
            $table->string('ICD_10_secundario_II')->nullable();
            $table->string('ICD_10_secundario_III')->nullable();
            $table->string('ICD_10_secundario_IV')->nullable();
            $table->string('ICD_10_secundario_V')->nullable();
            $table->enum('obito', ['yes', 'no'])->comment('Yes, No');
            $table->string('ICD_10_obito')->nullable();
            $table->string('alta_destino')->nullable();
            $table->string('alta_especialidade')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('admissions');
    }
}
