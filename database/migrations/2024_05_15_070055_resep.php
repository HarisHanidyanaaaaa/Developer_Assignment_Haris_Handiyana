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
        Schema::create('resep', function (Blueprint $table) {
            $table->id('resep_id');
            $table->string('obatalkes_nama');
            $table->string('signa_nama');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('obatalkes_nama')->references('id')->on('obatalkes_m');
            $table->foreign('signa_nama')->references('id')->on('signa_m');
            $table->integer('qty');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resep');
    }
};
