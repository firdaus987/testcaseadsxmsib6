<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePilihPeriodeTable extends Migration
{
    public function up()
    {
        Schema::create('pilih_periode', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_periode');
            $table->enum('aktif', ['0', '1']);

            // Menambahkan foreign key constraint ke tabel periode
            $table->foreign('id_periode')->references('id')->on('periode');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pilih_periode');
    }
}
