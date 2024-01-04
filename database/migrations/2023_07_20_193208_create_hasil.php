<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_user');
            $table->integer('id_periode');
            $table->integer('declarative_knowledge');
            $table->integer('procedural_knowledge');
            $table->integer('conditional_knowledge');
            $table->integer('km_total');
            $table->string('km_class');
            $table->integer('planning');
            $table->integer('information_management');
            $table->integer('monitoring');
            $table->integer('debugging');
            $table->integer('evaluation');
            $table->integer('rm_total');
            $table->string('rm_class');
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
        Schema::dropIfExists('hasil');
    }
}
