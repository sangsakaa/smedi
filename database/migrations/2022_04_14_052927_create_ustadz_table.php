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
        Schema::create('ustadz', function (Blueprint $table) {
            $table->id();
            $table->string('nig');
            $table->string('nama_ustadz');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->date('tanggal_masuk')->date_format("d-m-Y");
            $table->string('nama_bank')->nullable();
            $table->string('no_hp',50)->nullable();
            $table->string('no_rekening',50)->nullable();
            $table->string('alamat')->nullable();
            
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
        Schema::dropIfExists('ustadz');
    }
};