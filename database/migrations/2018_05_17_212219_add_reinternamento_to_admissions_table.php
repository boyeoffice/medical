<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReinternamentoToAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admissions', function (Blueprint $table) {
            $table->enum('reinternamento', ['Yes', 'No'])->comment('Yes, No')->after('alta_especialidade');
            $table->enum('mort_30_dias', ['Yes', 'No'])->comment('Yes, No')->after('reinternamento');
            $table->text('observacoes')->nullable()->after('mort_30_dias');
           // $table->dropColumnIfExists('destino');
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
            $table->dropColumn('reinternamento');
            $table->dropColumn('mort_30_dias');
            $table->dropColumn('observacoes');
        });
    }
}
