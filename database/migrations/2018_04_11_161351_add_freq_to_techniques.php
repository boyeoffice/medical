<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFreqToTechniques extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('techniques', function (Blueprint $table) {
            $table->dropColumn('"frequência');
            $table->dropColumn('data');
            $table->dropColumn('tecnica _realizada');
            $table->string('tecnica_realizada')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('techniques', function (Blueprint $table) {
            $table->dropColumn('tecnica_realizada');
        });
    }
}
