<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKelurahanDesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelurahan_desas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('detail_area')->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->timestamps();
            $table->unsignedInteger('kecamatan_id')->nullable();
            $table->unsignedInteger('kabupaten_kota_id')->nullable();
            
            $table->foreign('kecamatan_id')->references('id')->on('kecamatans')->onUpdate('cascade');
            $table->foreign('kabupaten_kota_id')->references('id')->on('kabupaten_kotas')->onUpdate('cascade');
        });
        DB::statement('ALTER TABLE `kelurahan_desas` MODIFY COLUMN `detail_area` POLYGON NULL DEFAULT NULL;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelurahan_desas');
    }
}
