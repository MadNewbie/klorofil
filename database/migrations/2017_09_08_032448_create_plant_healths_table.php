<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantHealthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plant_healths', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('plant_physical_id');
            $table->unsignedInteger('disease_type_id');
            $table->unsignedInteger('disease_id');
            $table->unsignedDouble('overall_condition');
            $table->timestamps();
            
            $table->foreign('plant_physical_id')->references('id')->on('plant_physicals')->onUpdate('cascade');
            $table->foreign('disease_type_id')->references('id')->on('disease_types')->onUpdate('cascade');
            $table->foreign('disease_id')->references('id')->on('diseases')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plant_healths');
    }
}
