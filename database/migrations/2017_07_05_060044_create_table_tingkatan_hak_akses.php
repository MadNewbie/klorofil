<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTingkatanHakAkses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tingkatan_hak_akses', function (Blueprint $table) {
            $table->increments('id_tingkatan_hak_akses');
            $table->string('nama_tingkatan_hak_akses');
            $table->integer('nilai_tingkatan_hak_akses');
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
        Schema::dropIfExists('tingkatan_hak_akses');
    }
}
