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
        Schema::create('absensi_kelas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sesi_id');
            $table->bigInteger('kelassantri_id');
            $table->string('keterangan')->default('Alfa');
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
        Schema::dropIfExists('absensi_kelas');
    }
};