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
            $table->text('iniciais_paciente')->nullable();
            $table->text('data_entrada')->nullable();
            $table->text('data_saída')->nullable();
            $table->text('dias_internamento')->nullable();
            $table->enum('sexo', ['M','F'])->comment('Male, Female');
            $table->text('idade')->nullable();
            $table->text('origem')->nullable();
            $table->text('especialidade_origem')->nullable();
           // $table->text('destino')->nullable();
            $table->text('grupo_ICD_10')->nullable();
            $table->text('ICD_10_primario')->nullable();
            $table->text('ICD_10_secundario')->nullable();
            $table->text('ICD_10_secundario_II')->nullable();
            $table->text('ICD_10_secundario_III')->nullable();
            $table->text('ICD_10_secundario_IV')->nullable();
            $table->text('ICD_10_secundario_V')->nullable();
            $table->enum('obito', ['Yes', 'No'])->comment('Yes, No');
            $table->text('ICD_10_obito')->nullable();
            $table->text('alta_destino')->nullable();
            $table->text('alta_especialidade')->nullable();
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
