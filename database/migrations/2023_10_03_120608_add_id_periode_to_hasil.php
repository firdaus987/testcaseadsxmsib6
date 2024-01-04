<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdPeriodeToHasil extends Migration
{

    public function up()
    {
        Schema::table('hasil', function (Blueprint $table) {
            $table->foreign('id_periode')->references('id')->on('periode');
            $table->foreign(['id_periode'], 'produk_ibfk_2')
                ->references(['id'])
                ->on('periode')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    public function down()
    {
        // Schema::table('hasil', function (Blueprint $table) {
        //     $table->dropForeign(['id_periode']); // Menghapus foreign key
        //     $table->dropColumn('id_periode'); // Menghapus kolom foreign key
        // });
    }
}
