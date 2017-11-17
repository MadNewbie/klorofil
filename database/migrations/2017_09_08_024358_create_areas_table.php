<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('detail_area')->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->timestamps();
            $table->unsignedInteger('kelurahan_desa_id');
            $table->unsignedInteger('type_area_id');
            
            $table->foreign('kelurahan_desa_id')->references('id')->on('kelurahan_desas')->onUpdate('cascade');
        });
        DB::statement('ALTER TABLE `areas` MODIFY COLUMN `detail_area` POLYGON NULL DEFAULT NULL;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('type_areas');
        Schema::dropIfExists('areas');
    }
}
