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
        Schema::create('histori_pelanggaran', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pelanggaran');
            $table->string('nama_pelanggaran');
            $table->date('waktu_pelanggaran');
            $table->string('jenis_pelanggaran');
            $table->decimal('poin_pelanggaran');
            $table->string('keterangan');
            $table->bigInteger('santri_id');

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
        Schema::dropIfExists('histori_pelanggaran');
    }
};