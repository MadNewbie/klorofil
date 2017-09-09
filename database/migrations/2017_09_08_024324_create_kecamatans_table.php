<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKecamatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kecamatans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('detail_area')->nullable();
            $table->unsigndeInteger('created_by')->nullable();
            $table->unsigndeInteger('updated_by')->nullable();
            $table->timestamps();
            $table->unsignedInteger('kabupaten_kota_id');
            
            $table->foreign('kabupaten_kota_id')->references('id')->on('kabupaten_kotas')->onUpdate('cascade');
        });
        DB::statement('ALTER TABLE `kecamatans` MODIFY COLUMN `detail_area` POLYGON NULL DEFAULT NULL;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kecamatans');
    }
}
