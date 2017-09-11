<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantGeneralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plant_generals', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedTinyInteger('status');
            $table->double('age',5,2);
            $table->unsignedInteger('plant_replacement_id')->nullable();
            $table->unsignedInteger('area_id');
            $table->unsignedInteger('species_id');
            
            $table->integer('geo_point')->nullable();
            $table->integer('geo_area')->nullable();
            
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->timestamps();
            
            $table->foreign('plant_replacement_id')->references('id')->on('plant_generals')->onUpdate('cascade');
            $table->foreign('area_id')->references('id')->on('areas')->onUpdate('cascade');
            $table->foreign('species_id')->references('id')->on('species')->onUpdate('cascade');
        });
        DB::statement('ALTER TABLE `plant_generals` MODIFY COLUMN `geo_point` POINT NULL DEFAULT NULL;');
        DB::statement('ALTER TABLE `plant_generals` MODIFY COLUMN `geo_area` POLYGON NULL DEFAULT NULL;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plant_generals');
    }
}
