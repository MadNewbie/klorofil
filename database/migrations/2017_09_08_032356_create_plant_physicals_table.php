<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantPhysicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plant_physicals', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('date');
            $table->double('height',6,2);
            $table->double('dbh',6,2);
            $table->double('crown_width',6,2);
            $table->double('crown_density',6,2);
            $table->double('root_radius_critical',6,2);
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by');
            $table->unsignedInteger('plant_general_id');
            $table->timestamps();
            
            $table->foreign('plant_general_id')->references('id')->on('plant_generals')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plant_physicals');
    }
}
