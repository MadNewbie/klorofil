<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableArea extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area', function (Blueprint $table) {
            $table->increments('id_area');
            $table->string('nama_area');
            $table->integer('id_provinsi');
            $table->integer('id_kabupaten_kota');
            $table->integer('id_kecamatan');
            $table->integer('id_kelurahan_desa');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE area ADD detail_wilayah POLYGON');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('area');
    }
}
