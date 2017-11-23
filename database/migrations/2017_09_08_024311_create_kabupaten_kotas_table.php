<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKabupatenKotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kabupaten_kotas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('detail_area')->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->timestamps();
            $table->unsignedInteger('provinsi_id');
            
            $table->foreign('provinsi_id')->references('id')->on('provinsis')->onUpdate('cascade');
        });
        DB::statement('ALTER TABLE `kabupaten_kotas` MODIFY COLUMN `detail_area` POLYGON NULL DEFAULT NULL;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kabupaten_kotas');
    }
}
