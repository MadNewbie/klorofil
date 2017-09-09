<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpeciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('species', function (Blueprint $table) {
            $table->increments('id');
            $table->string('species_id')->unique();
            $table->string('scientific_name')->unique();
            $table->double('age',10,2);
            $table->double('density',10,2);
            $table->double('max_age',10,2);
            $table->unsignedInteger('species_type_id');
            $table->unsignedInteger('leaf_type_id');
            $table->unsignedInteger('branch_type_id');
            $table->unsignedInteger('trunk_type_id');
            $table->unsignedInteger('root_type_id');
            $table->unsignedInteger('function_type_species_id');
            $table->timestamps();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            
            $table->foreign('species_type_id')->references('id')->on('species_types')->onUpdate('cascade');
            $table->foreign('leaf_type_id')->references('id')->on('leaf_types')->onUpdate('cascade');
            $table->foreign('branch_type_id')->references('id')->on('branch_types')->onUpdate('cascade');
            $table->foreign('trunk_type_id')->references('id')->on('trunk_types')->onUpdate('cascade');
            $table->foreign('root_type_id')->references('id')->on('root_types')->onUpdate('cascade');
            $table->foreign('function_type_species_id')->references('id')->on('function_type_species')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('species');
    }
}
