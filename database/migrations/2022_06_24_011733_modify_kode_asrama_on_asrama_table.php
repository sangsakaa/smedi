<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('asrama', function (Blueprint $table) {
            $table->renameColumn('kode_asrama', 'kelas_smt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('asrama', function (Blueprint $table) {
            $table->renameColumn('kode_asrama', 'kelas_smt');
        });
    }
};