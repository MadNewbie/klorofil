<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHabitatPlantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habitat_plants', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('plant_id');
            $table->unsignedInteger('habitat_id');
            $table->timestamps();
            
            $table->foreign('plant_id')->references('id')->on('plant_generals')->onUpdate('cascade');
            $table->foreign('habitat_id')->references('id')->on('habitats')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('habitat_plants');
    }
}
