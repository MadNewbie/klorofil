<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvinsisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provinsis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('detail_area')->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->timestamps();
            $table->unsignedInteger('negara_id');
            
            $table->foreign('negara_id')->references('id')->on('negaras')->onUpdate('cascade');
        });
        DB::statement('ALTER TABLE `provinsis` MODIFY COLUMN `detail_area` POLYGON NULL DEFAULT NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provinsis');
    }
}
