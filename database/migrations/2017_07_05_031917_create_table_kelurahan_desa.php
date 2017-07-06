<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKelurahanDesa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelurahan_desa', function (Blueprint $table) {
            $table->increments('id_kelurahan_desa');
            $table->string('nama_kelurahan_desa');
            $table->integer('id_provinsi');
            $table->integer('id_kabupaten_kota');
            $table->integer('id_kecamatan');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE kelurahan_desa ADD detail_wilayah POLYGON');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelurahan_desa');
    }
}
