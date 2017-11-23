<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plant_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('notes');
            $table->text('path');
            $table->unsignedInteger('plant_physical_id');
            $table->timestamps();
            
            $table->foreign('plant_physical_id')->references('id')->on('plant_physicals')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plant_photos');
    }
}
