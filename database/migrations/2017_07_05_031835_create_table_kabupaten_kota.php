<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKabupatenKota extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kabupaten_kota', function (Blueprint $table) {
            $table->increments('id_kabupaten_kota');
            $table->string('nama_kabupaten_kota');
            $table->integer('id_provinsi');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE kabupaten_kota ADD detail_wilayah POLYGON');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kabupaten_kota');
    }
}
