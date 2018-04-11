<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDayToAdmissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admissions', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn(['user_id','primeira_consulta']);
            $table->string('data_entrada')->nullable()->after('iniciais_paciente');
            $table->string('data_saída')->nullable()->after('data_entrada');
            $table->string('dias_internamento')->nullable()->after('data_saída');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admissions', function (Blueprint $table) {
            $table->dropColumn(['data_entrada','data_saída', 'dias_internamento']);
        });
    }
}
