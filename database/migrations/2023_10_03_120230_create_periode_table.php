<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriode extends Migration
{
    public function up()
    {
        Schema::create('periode', function (Blueprint $table) {
            $table->id(); // Kolom ID dengan tipe data INT dan Auto Increment
            $table->enum('semester', ['1', '2'])->notNullable(); // Kolom ENUM untuk semester (1 atau 2)
            $table->char('tahun', 9)->notNullable(); // Kolom CHAR untuk tahun (misalnya, "2021/2023")
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('periode');
    }
}
