<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiseaseSeverityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disease_severity', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->double('range_alfa',5,2);
            $table->double('range_beta',5,2);
            $table->double('weight',2,1);
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->timestamps();
        });

        Schema::table('plant_healths', function (Blueprint $table) {
            $table->foreign('disease_severity_id')->references('id')->on('disease_severity')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disease_severity');
    }
}
