<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProvinsi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provinsi', function (Blueprint $table) {
            $table->increments('id_provinsi');
            $table->string('nama_provinsi');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE provinsi ADD detail_wilayah POLYGON');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provinsi');
    }
}
