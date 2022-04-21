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
        Schema::create('historipelanggaran', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pelanggaran_id');
            $table->bigInteger('santri_id');
            $table->date('waktu');
            $table->string('keterangan');
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