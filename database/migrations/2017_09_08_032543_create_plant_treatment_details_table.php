<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantTreatmentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plant_treatment_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('plant_general_id');
            $table->unsignedInteger('plant_treatment_id');
            $table->text('note');
            $table->timestamps();
            
            $table->foreign('plant_general_id')->references('id')->on('plant_generals')->onUpdate('cascade');
            $table->foreign('plant_treatment_id')->references('id')->on('plant_treatments')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plant_treatment_details');
    }
}
