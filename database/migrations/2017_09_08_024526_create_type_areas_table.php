<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_areas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();

            //$table->foreign('type_area_id')->references('id')->on('areas');
        });
        //DB::statement('ALTER TABLE `areas` ADD FOREIGN KEY (`type_area_id`) REFERENCES `type_areas`(`id`);');
        Schema::table('areas', function (Blueprint $table) {
            $table->foreign('type_area_id')->references('id')->on('type_areas')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('areas', function (Blueprint $table) {
            $table->dropForeign('areas_type_area_id_foreign');
         });
        Schema::dropIfExists('type_areas');
        //Schema::dropIfExists('areas');
    }
}
