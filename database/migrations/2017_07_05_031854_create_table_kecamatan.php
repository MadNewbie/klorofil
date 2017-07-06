<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKecamatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kecamatan', function (Blueprint $table) {
            $table->increments('id_kecamatan');
            $table->string('nama_kecamatan');
            $table->integer('id_provinsi');
            $table->integer('id_kabupaten_kota');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE kecamatan ADD detail_wilayah POLYGON');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kecamatan');
    }
}
